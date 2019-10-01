<?php
/*
Plugin Name:  Kanakuk.com CircuiTree Integration
Description:  Handles CircuiTree API integration and user session management
Author:       Josh Brown <josh.brown@digitalscientists.com>
Author URI:   https://digitalscientists.com
License:      MIT
License URI:  https://opensource.org/licenses/MIT
*/

/*
    What does this plugin do?
    =========================
    SESSION/COOKIE MANAGEMENT
    API CALLS
    FORMATS CIRCUITREE URLs (for redirecting)
    INTERCEPTS URLs (for passing along someone who is logged in on register.kanakuk.com)
*/

defined( 'ABSPATH' ) or die( 'I don\'t know you!' );

require_once(dirname(__FILE__) . '/lib/CircuiTreeApiFactory.php');

/**************************************************************************************************************************
 * Sessions
 */

add_action('init', 'start_session', 1);

function start_session() 
{
    if (!session_id()) session_start();
}

function end_session() 
{
    session_destroy ();
}

add_action('wp_logout', 'end_session');
add_action('wp_login', 'end_session');
add_action('end_session_action', 'end_session');

function check_clear_session() 
{
    if (array_extract($_GET, 'clear_session')) {
        $_SESSION = [];
    }
}

add_action('wp_loaded', 'check_clear_session');

// force kill session
// do_action('end_session_action');

/**************************************************************************************************************************
 * Registration-related API Calls
 */

// accepts POST of search data from homepage, stores in session
function kan_search()
{
    $registrations = isset($_SESSION['registrations']) ? $_SESSION['registrations'] : [];

    // take POST data and normalize it, store results into the session
    if (isset($_POST['selected_type'])) {
        if ($_POST['selected_type'] == 'Children') {
            foreach ($_POST['selected_kamp']['added_children']['selections'] as $child) {
                $registrations[] = array_merge(['type' => 'child'], $child);
            }
        }
        else if ($_POST['selected_type'] == 'Families') {
            $registrations[] = [
                'type'        => 'family',
                'registrants' => [
                    'young_children' => count(array_extract($_POST, 'selected_kamp.added_children_young.selections')),
                    'old_children'   => count(array_extract($_POST, 'selected_kamp.added_children_old.selections')),
                    'adults'         => count(array_extract($_POST, 'selected_kamp.added_adults.selections')),
                    'infants'        => count(array_extract($_POST, 'selected_kamp.added_infants.selections'))
                ]
            ];

        }
    }

    $_SESSION['registrations'] = $registrations;


    $data = [
        'status' => 'error',
        'message' => ''
    ];

    // wp_redirect('/search-results');
    exit;
}

// hooks that allow the kan_search action to be processed
add_action('admin_post_nopriv_kan_search', 'kan_search');
add_action('admin_post_kan_search', 'kan_search');

// delete a registration from the session
function kan_delete_registration()
{
    if (isset($_POST['registration_index'])) {
        $deletable = $_POST['registration_index'];
        if (array_extract($_SESSION, 'registrations.' . $deletable)) {
            unset($_SESSION['registrations'][$deletable]); // remove the offending value
            $_SESSION['registrations'] = array_values($_SESSION['registrations']);  // reindex the array
        }
        header("Location: /search-results?tab=0");
        exit;
    }
}

// hooks that allow the kan_delete_registration action to be processed
add_action('admin_post_nopriv_kan_delete_registration', 'kan_delete_registration');
add_action('admin_post_kan_delete_registration', 'kan_delete_registration');

function kan_select_event()
{
    if (isset($_POST['event_id']) && isset($_POST['registration_index'])) {
        if (array_extract($_SESSION, 'registrations.' . $_POST['registration_index'])) {
            $_SESSION['registrations'][$_POST['registration_index']]['event_id'] = $_POST['event_id'];
        }

        // find the next unassigned registration to redirect to, or else the first one
        $tab = 0;
        foreach ($_SESSION['registrations'] as $index => $registration) {
            if (!isset($registration['event_id']) || !$registration['event_id']) {
                $tab = $index;
                break;
            }
        }

        header("Location: /search-results?tab=" . $tab);
        exit;
    }
}

// hooks that allow the kan_select_event action to be processed
add_action('admin_post_nopriv_kan_select_event', 'kan_select_event');
add_action('admin_post_kan_select_event', 'kan_delete_registration');

// returns the number of active registrations in the session
function kan_get_registration_count()
{
    return isset($_SESSION['registrations']) ? count($_SESSION['registrations']) : 0;
}

// when the user clicks "register now", send info to circuitree before forwarding along the user
function kan_register()
{
    // properly format the attendees info
    $attendees = [];
    if (isset($_SESSION['registrations'])) {
        foreach ($_SESSION['registrations'] as $registration) {
            $attendee = [
                'Age' => $registration['age'],
                'Gender' => $registration['gender'],
                'EventDivisionSelections' => [
                    $registration['event_id']
                ]
            ];

            if (isset($registration['first_name'])) {
                $attendee['AttendeeName'] = $registration['first_name'] . ' ' . $registration['last_name'];
            }
            $attendees[] = $attendee;
        }
    }

    // setup the api client depending on whether or not we are logged in
    if (kan_is_logged_in()) {
        $client = CircuiTreeApiFactory::create([
            'api_token' => array_extract($_SESSION, 'circuitree.auth.api_token')
        ]);
      
        // create registrations
        $response = $client->createRegistration($attendees);
        
        // get auto-login token
        $token = $client->getAutoLoginToken();
        $url = sprintf(
            CT_BASE_URL . '/Account/AutoLogin?autoLoginToken=%s&entityID=%s&ReturnURL=/Registration/LoadCart/%s',
            $token['AutoLoginToken'],
            $token['EncryptedEntityID'],
            $response['RegistrationCartID']
        );
        echo "<pre>"; print_r($url);\
        die();
        
       
    }
    else {
        $client = CircuiTreeApiFactory::create();
        $client->authenticate();
        // create registrations
        $response = $client->createRegistration($attendees);
        $url = CT_BASE_URL . '/Registration/LoadCart/' . $response['RegistrationCartID'];
    }
    
    // remove the registrations from the session
    unset($_SESSION['registrations']);

    // redirect to circuitree site
    wp_redirect($url);
    exit;
}

// hooks that allow the kan_register action to be processed
add_action('admin_post_nopriv_kan_register', 'kan_register');
add_action('admin_post_kan_register', 'kan_register');

// returns circuitree api list of kamps, cached
function kan_get_circuitree_kamps() 
{ 
    $kamps = get_transient('circuitree_get_kamps');

    if (!CT_API_CACHE || (empty($kamps) || $kamps['StatusCode'] !== 1)) {
        $token = array_extract($_SESSION, 'circuitree.auth.api_token');
        if ($token) {
            $client = CircuiTreeApiFactory::create([
                'api_token' => $token
            ]);
        }
        else {
            $client = CircuiTreeApiFactory::create();
            $client->authenticate();
        }

        $kamps = $client->getKamps();
        set_transient('circuitree_get_kamps', $kamps, strtotime(CT_API_CACHE_DURATION));
    }

    return $kamps;
}

function kan_get_transportation_options($regId = '')
{
    $trans = get_transient('circuitree_get_transportation_options');

    if (!CT_API_CACHE || (empty($trans) || $trans['StatusCode'] !== 1)) {
        $token = array_extract($_SESSION, 'circuitree.auth.api_token');
        if ($token) {
            $client = CircuiTreeApiFactory::create([
                'api_token' => $token
            ]);
            $client->setAuthResponse(array_extract($_SESSION, 'circuitree.auth'));
        }
        else {
            $client = CircuiTreeApiFactory::create();
            $client->authenticate();
        }

        $trans = $client->getTransportationOptions($regId);
        set_transient('circuitree_get_transportation_options', $trans, strtotime(CT_API_CACHE_DURATION));
    }

    return $trans;
}

function kan_get_charter_availability()
{
    $charters = get_transient('circuitree_get_charter_availability');

    if (!CT_API_CACHE || (empty($charters) || $charters['StatusCode'] !== 1)) {
        $token = array_extract($_SESSION, 'circuitree.auth.api_token');

        if ($token) {
            $client = CircuiTreeApiFactory::create([
                'api_token' => $token
            ]);
            $client->setAuthResponse(array_extract($_SESSION, 'circuitree.auth'));
        }
        else {
            $client = CircuiTreeApiFactory::create();
            $client->authenticate();
        }

        // we have the client, now we need to get all of the available charters
        $events = kan_get_circuitree_kamps();
        $min_date = strtotime('+1 year');
        $max_date = strtotime('-1 year');

        // extract the min/max dates from the results set
        foreach ($events['Results'] as $event) {
            $start_date = strtotime($event['BeginDate']);
            $end_date = strtotime($event['EndDate']);
            if ($start_date < $min_date) $min_date = $start_date;
            if ($end_date > $max_date) $max_date = $end_date;
        }

        // given the min/max dates, extract all of the saturdays
        $saturdays = [];
        for ($i = strtotime('Saturday', $min_date); $i <= $max_date; $i = strtotime('+1 week', $i)) {
            $saturdays[] = $i;
        }

        // fetch charter info for each saturday
        $charters = [];
        foreach ($saturdays as $saturday) {
            $charters[date('m/d/Y', $saturday)] = $client->getCharterAvailability($saturday);
        }

        // cache the result
        set_transient('circuitree_get_charter_availability', $charters, strtotime(CT_API_CACHE_DURATION));
    }

    return $charters;
}

function kan_get_family_info()
{
    $family_info = get_transient('circuitree_get_family_info');

    if (!CT_API_CACHE || (empty($family_info) || $family_info['StatusCode'] !== 1)) {
        $token = array_extract($_SESSION, 'circuitree.auth.api_token');
        if ($token) {
            $client = CircuiTreeApiFactory::create([
                'api_token' => $token
            ]);
            $client->setAuthResponse(array_extract($_SESSION, 'circuitree.auth'));
        }
        else {
            $client = CircuiTreeApiFactory::create();
            $client->authenticate();
        }

        $family_info = $client->getFamilyInfo();
        set_transient('circuitree_get_family_info', $family_info, strtotime(CT_API_CACHE_DURATION));
    }

    return $family_info;
}

function kan_get_registration_info($child_enity ='')
{
    $reg_info = get_transient('circuitree_get_reg_info');
    
    if (!CT_API_CACHE || (empty($reg_info) || $reg_info['StatusCode'] !== 1)) {
        $token = array_extract($_SESSION, 'circuitree.auth.api_token');
        if ($token) {
            $client = CircuiTreeApiFactory::create([
                'api_token' => $token
            ]);
            $client->setAuthResponse(array_extract($_SESSION, 'circuitree.auth'));
        }
        else {
            $client = CircuiTreeApiFactory::create();
            $client->authenticate();
        }
        
        $reg_info = $client->getRegistrationInfo($child_enity);
        set_transient('circuitree_get_reg_info', $reg_info, strtotime(CT_API_CACHE_DURATION));
    }
    
    return $reg_info;
}



/**************************************************************************************************************************
 * Login-related API Calls
 */

// Accepts POST of login data, authenticated against CircuiTree API, on success stores token in session
function kan_login()
{
    $data = [
        'status'   => 'error',
        'message'  => 'Unable to authenticate.  Your username or password is invalid.',
        'redirect' => ''
    ];

    
    if (wp_verify_nonce($_POST['_wpnonce'], 'kan_login')) {
        $client = CircuiTreeApiFactory::create();

        $response = $client->authenticate([
            'Username' => $_POST['username'],
            'Password' => $_POST['password'],
            'CompanyCode' => $_POST['company_code']
        ], true);

        // ok, we logged in successfully
        if ($response['StatusCode'] == 1) {

            // populate the session with this user's data
            $_SESSION['kan_post_login_redirect'] = '';
            $_SESSION['circuitree'] = [
                'auth' => underscore_array_keys($response),
            ];

            $fresponse = $client->getFamilyInfo();
            if ($fresponse['StatusCode'] == 1) {
                $_SESSION['circuitree']['family'] = [];
                $family = $fresponse['Results'];
                foreach ($family as $member) {
                    $_SESSION['circuitree']['family'][] = underscore_array_keys((array) $member);
                } 

                // if remember me checked
                if (isset($_POST['remember_me'])) {
                    setcookie('rememberme', kan_encrypt_decrypt('encrypt', json_encode($response)), strtotime('+2 weeks'), '/');
                }
            }

            $redirect = '/my-kanakuk';

            if (isset($_SESSION['kan_post_login_redirect']) && !empty($_SESSION['kan_post_login_redirect'])) {
                $redirect = kan_url($_SESSION['kan_post_login_redirect']['action'], $_SESSION['kan_post_login_redirect']['legacy']);
            }

            $data = [
                'status'   => 'success',
                'message'  => '',
                // if we have a redirect stashed in the session, use it
                'redirect' =>  $redirect
            ];
        }
    }
    else {
        $data['message'] = 'Something went wrong with your submission.  Try again.';
    }

    wp_send_json($data);
}

// hooks that allow the kan_login action to be processed
add_action('admin_post_nopriv_kan_login', 'kan_login');
add_action('admin_post_kan_login', 'kan_login');


function kan_logout()
{
    if ($_SERVER['REQUEST_URI'] == '/logout') {      
        // @TODO: when they logout, we need to log them out of the other site as well...
        end_session();
        
        $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : '/';
        
        wp_redirect($redirect);

        setcookie('rememberme', '', time() - 3600);
        exit;
        // wp_redirect('https://register.kanakuk.com/logout');
    }
}

add_action('init','kan_logout');


// returns true iff user is logged in with a valid circuitree token in the session
function kan_is_logged_in()
{
    return (bool) array_extract($_SESSION, 'circuitree.auth');
}

/**************************************************************************************************************************
 * Other
 */

// given a remote url, checks the user session to decide if login is necessary first
// this is the most muddled bit of code in this plugin.  sorry about that.
function kan_url($action = 'login', $legacy = false, $auto_login = true) 
{
    $action = strtolower($action);

    $base_url = CT_BASE_URL;
    $base_legacy_url = CT_BASE_URL_LEGACY;

    $routes = [
        'legacy' => [
            'dashboard'       => '/Account/',
            'logout'          => '/Login/Logout.aspx',
            'my_profile'      => '/Account/Profile/',
            'register'        => '',
            'registrations'   => '/Itineraries/?a=all',
        ],
        'default' => [
            'dashboard'       => '/Dashboard/',
            'logout'          => '/Account/LogOff/',
            'my_profile'      => '/Manage/',
            'register'        => '/Account/Register/',
            'registrations'   => '/Dashboard/Registrations/',
        ]
    ];

    if ($legacy) {
        $route = isset($routes['legacy'][$action]) ? $routes['legacy'][$action] : false;
        $url = CT_BASE_URL_LEGACY . $route;
    }
    else {
        $route = isset($routes['default'][$action]) ? $routes['default'][$action] : false;
        $url = CT_BASE_URL . $route;
    }

    if ($route && $auto_login) {

        // if the user is logged in, we are safe to redirect them, we just need to properly format the url
        if (kan_is_logged_in()) {

            $client = CircuiTreeApiFactory::create([
                'api_token' => array_extract($_SESSION, 'circuitree.auth.api_token')
            ]);

            $token = $client->getAutoLoginToken();

            $url = $legacy ? CT_BASE_URL_LEGACY : CT_BASE_URL;
            $url .= '?AutoLoginToken=' . $token . '&ReturnURL=' . $route;

        }
        else {
            $_SESSION['kan_post_login_redirect'] = [
                'action' => $action,
                'legacy' => $legacy
            ];
            $url = '/login';
        }

    }

    return $url;
}

/**
 * a redirect action that allows redirection to the off-site circuitree applications
 * You can use something like
 * Example:
 *      Instead of needing a url like https://events.kanakuk.com/dashboard?AutoLoginToken=XXXXXXXX
 * 
 *      You can just use the simpler https://kanakuk.com/kan_redirect?action=dashboard
 *  
 * It will automatically detect if the action needs an AutoLoginToken, or if the user needs to authenticate first, etc.
 */
function kan_redirect()
{
    if (substr($_SERVER['REQUEST_URI'], 0, 13) == '/kan_redirect') {
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        $legacy = isset($_GET['legacy']) ? $_GET['legacy'] : false;
        $url = kan_url($action, $legacy);
        wp_redirect($url);
        exit;
    }
}
// this needs to be checked on every page load
add_action('init','kan_redirect');

// generic pre-filter
function kan_pre_filter()
{
    // check for remember me cookie if they aren't currently logged in
    if (!kan_is_logged_in() && isset($_COOKIE['rememberme']) && !empty($_COOKIE['rememberme'])) {
        // decrypt the cookie
        $auth = json_decode(
            kan_encrypt_decrypt('decrypt', $_COOKIE['rememberme']),
            true
        );
        // if successful
        if ($auth) {
            // seed the session with the cookie info
            $_SESSION['circuitree'] = [
                'auth' => underscore_array_keys($auth),
            ];
            // get the family info into the session
            $client = CircuiTreeApiFactory::create([
                'api_token' => $auth['ApiToken']
            ]);
            $fresponse = $client->getFamilyInfo();
            if ($fresponse['StatusCode'] == 1) {
                $_SESSION['circuitree']['family'] = [];
                $family = $fresponse['Results'];
                foreach ($family as $member) {
                    $_SESSION['circuitree']['family'][] = underscore_array_keys((array) $member);
                } 
            }
        }
    }
}

add_action('init','kan_pre_filter');


if (!function_exists('unparse_url')) {
    function unparse_url($parsed_url) { 
        $scheme   = isset($parsed_url['scheme']) ? $parsed_url['scheme'] . '://' : ''; 
        $host     = isset($parsed_url['host']) ? $parsed_url['host'] : ''; 
        $port     = isset($parsed_url['port']) ? ':' . $parsed_url['port'] : ''; 
        $user     = isset($parsed_url['user']) ? $parsed_url['user'] : ''; 
        $pass     = isset($parsed_url['pass']) ? ':' . $parsed_url['pass']  : ''; 
        $pass     = ($user || $pass) ? "$pass@" : ''; 
        $path     = isset($parsed_url['path']) ? $parsed_url['path'] : '';
        $query    = isset($parsed_url['query']) ? '?' . $parsed_url['query'] : ''; 
        $fragment = isset($parsed_url['fragment']) ? '#' . $parsed_url['fragment'] : ''; 
        return "$scheme$user$pass$host$port$path$query$fragment"; 
    }
}

/**
 * @from https://gist.github.com/joashp/a1ae9cb30fa533f4ad94
 * 
 * A simple method to encrypt or decrypt a plain text string
 * initialization vector(IV) has to be the same when encrypting and decrypting
 * 
 * @param string $action: can be 'encrypt' or 'decrypt'
 * @param string $string: string to encrypt or decrypt
 * 
 * @return string
 */
function kan_encrypt_decrypt($action, $string) 
{
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'life would be a ding a derry';
    $secret_iv = '... if I only had a brain!';
    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'decrypt' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}