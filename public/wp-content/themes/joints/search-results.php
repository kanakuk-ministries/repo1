<?php /* Template Name: Search Results */?>
<?php
/**
 * The template for displaying search results
 *
 * Here we are pulling in ALL AVAILABLE KAMP EVENTS and using javascript to filter that list
 */

// To be on this page, the user MUST have made a search from the homepage and therefore MUST have
// one or more children to register in their session.  The specific child to register corresponds
// to the currently selected tab on the page.  The currently selected tab corresponds to the GET
// parameter ?tab={index}.  Thus, this page should ALWAYS have a tab GET param specified.  If none
// is specified, default to tab=0 (assuming one exists in the session).  If no tab is specified
// OR the tab specified doesn't exist in the session, redirect back to the homepage


// if no tab specified, redirect back to this page with tab=0 (the default state)
// if (!isset($_GET['tab'])) {
//     header("Location: /search-results?tab=0");
//     exit;
// }
// get the current registration to display
if(isset($_GET['kamp_type']) && $_GET['kamp_type'] != ''){
    $kamp_age= $_GET['kamp_age'];
    $kamp_gender= $_GET['kamp_gender'];
    $tab = $_GET['tab'];
    $_SESSION['kamp_type_manual'] = $_GET['kamp_type'];
    $_SESSION['registrations'] = array(
        $tab=>array(
            'type' => "child",
            "age" => $kamp_age,
            "gender" => $kamp_gender
            )
        
    );
}
$registration = array_extract($_SESSION, 'registrations.' . $_GET['tab']);
//print_r($registration);
//echo "step 1<pre>"; print_r($registration); 
if (isset($_GET['kamp_type'])) {
    $kamp_session = array();
    $kamp_age= $_GET['kamp_age'];
     $sessionArray =  array(
               'type' => "child",
                "age" => $kamp_age,
                "gender" => "male"
            
            );
     array_push($kamp_session,$sessionArray);
        
//         $registration =  array(
//             'type' => "child",
//             "age" => $kamp_age,
//             "gender" => "male" 
            
//         );  
    
 }


// if no registration matched the tab specified, redirect back to the homepage
// if (!$registration) {
//     header("Location: /");
//     exit;
// }
// get a list of kamp titles
$kamp_titles = get_kamp_titles();
//echo "step 1<pre>"; print_r($kamp_titles);
if (isset($_GET['kamp_type'])) {
    $kamp_titles = array($_GET['kamp_type']);
}elseif(isset($_SESSION['kamp_type_manual'])) {
    $kamp_titles = array($_SESSION['kamp_type_manual']);
}
$kamps = array_flip($kamp_titles);
//echo "step 1b<pre>"; print_r($kamps);
// the kamps from the API
$ct_kamps = kan_get_circuitree_kamps();
/*
                   .
         /^\     .
    /\   "V"
   /__\   I      O  o
  //..\\  I     .
  \].`[/  I
  /l\/j\  (]    .  O
 /. ~~ ,\/I          .
 \\L__j^\/I       o
  \/--v}  I     o   .
  |    |  I   _________
  |    |  I c(`       ')o
  |    l  I   \.     ,/
_/j  L l\_!  _//^---^\\_ 

"You have just entered a magic zone, consider this your warning!"
 */

// we are merging the local custom post type data with the api data
// this code is NOT optimized, but probably adequate

foreach ($kamps as $key => $val) {
    $kamps[$key] = get_kamp_by_title($key);
    $kamps[$key]['circuitree'] = [];
    $kamps[$key]['type'] = get_kamp_type($kamps[$key]['kamp_type']);
    $kamps[$key]['visible'] = true;
    foreach ($ct_kamps['Results'] as $ct_kamp_event) {
       // echo "<pre>"; print_r($ct_kamp_event);
        $short_title = substr($ct_kamp_event['CostCenterName'], 0, strpos($ct_kamp_event['CostCenterName'], ' '));
       // echo "<pre>short title"; print_r($short_title);
        if (stripos($key, $short_title) !== false) {
            $ct_kamp_event['KampName'] = $key;
            //echo "<pre>step3CA"; print_r($ct_kamp_event);
            $ct_kamp_event['Month'] = date('F', strtotime($ct_kamp_event['BeginDate']));
            $ct_kamp_event['visible'] = true;
            $ct_kamp_event['CityState'] = $ct_kamp_event['City'] . ', ' . $ct_kamp_event['StateAbbreviation'];
            $kamps[$key]['circuitree'][] = $ct_kamp_event;
        }
    }
}

// now that we have a set of possible events, let's remove the ones that aren't valid for the current registrant
foreach ($kamps as $key => $kamp) {
    //echo "<pre>kampdata"; print_r($kamps);
    //echo "<pre>kampdata"; print_r($kamps);
    $kamps[$key]['circuitree'] = array_values(array_filter($kamp['circuitree'], function($val) use ($registration) {
        // return false if wrong gender
        //echo "genderred"; print_r($registration);
        //echo "val"; print_r($val);
        if (strtolower(substr($registration['gender'], 0, 1)) != strtolower(substr($val['Gender'], 0, 1))) {
            return false;
        }
        // return false if age inappropriate
        if ($registration['age'] < $val['RangeMin'] || $registration['age'] > $val['RangeMax']) {
            return false;
        }
        return true;
    }));

    if (count($kamps[$key]['circuitree']) == 0) {
        $kamps[$key] = null;
    }
}

// filter out empties
//echo "step 1d<pre>"; print_r($kamps);
$kamps = array_filter($kamps);

// make overnight kamps show up first
uasort($kamps, function($a, $b) {
    $atype = $a['type'][0]['icon_name'];
    $btype = $b['type'][0]['icon_name'];
    if ($atype == 'overnight') {
        return -1;
    }
    return 1;
});

// filter out kamps that don't apply to our selected age
$kamps = array_filter($kamps, function($kamp) use ($registration) {
    $current_age = $registration['age'];
    return ($kamp['min_age'] <= $current_age && $kamp['max_age'] >= $current_age);
});
    //echo "step 1e<pre>"; print_r($kamps);
// console_log('ct_kamps', $ct_kamps);
// console_log('registration', $registration);
// console_log('kamps', $kamps);


// the kamp custom post types
$cpt_kamps = get_kamps();


get_header();?>

<div class="content">

    <div class="inner-content grid-x grid-margin-x">

        <main class="main small-12 medium-12 large-12 cell no-hero" role="main">
            <div class="grid-container mobile-full">
                <div id="search-results-tabs-container" class="grid-x mobile-light-gray">
                
                    <?php 
                    if (isset($_GET['kamp_type'])) {
                        
                        echo element('search-results/tabs', [
                            'registrations' => $_SESSION['registrations'],
                            'current'       => $_GET['tab']
                        ]); 
                        
                    }else{
                        echo element('search-results/tabs', [
                            'registrations' => $_SESSION['registrations'],
                            'current'       => $_GET['tab']
                        ]);
                        
                    }
                   ?>
                </div>
            </div>
            <div class="grid-x gray-bg" id="search-results" v-cloak>
                <div class="tabs-content search-results-tabs-content" data-tabs-content="search-results-tabs">
                    <div class="tabs-panel is-active mod-no-padding" id="panel1">
                        <div class="search-selection-container">
                            <div class="grid-container grid-x">
                                <div class="cell medium-2 margin-right-75">
                                    <div class="show-for-small-only flex-container align-center justify-flex-start">
                                        <p class="dark-blue medium-text margin-bottom-0 margin-right-20">Current child title</p>
                                        <a data-open="confirm-modal-<?php echo $_GET['tab']; ?>">Delete</a>
                                        <div class="confirm-modal tiny reveal" id="confirm-modal-<?php echo $_GET['tab']; ?>" data-reveal data-v-offset="200">
                                            <p>Are you sure you want to delete this tab?</p>
                                            <a class="clear button float-right" data-close>
                                                No
                                            </a>
                                            <a class="button float-right" href="/search-results?tab=<?php echo $_GET['tab']; ?>&delete=<?php echo $_GET['tab']; ?>">
                                                Yes
                                            </a>
                                            <a class="close-button" data-close aria-label="Close modal">
                                                <span aria-hidden="true">&times;</span>
                                            </a>
                                        </div>
                                    </div>
                                    <hr class="hr-light show-for-small-only hr-medium">
                                    <p class="search-selection-label uppercase dark-gray margin-bottom-0">Your selection</p>
                                </div>
                                <!-- Selection made state -->
                                <?php
                                    echo element('search-results/your-selection', [
                                        'kamps'        => $kamps,
                                        'registration' => $registration
                                        
                                    ]);
                                ?>
                            </div>

                            <!-- Register Now Button -->
                            <?php 
                           
                            if (isset($_GET['kamp_type'])) {
                                
                                echo element('search-results/register-now', [
                                    'registrations' => $kamp_session
                                    
                                ]);
                                
                            }else{
                                echo element('search-results/register-now', [
                                    'registrations' => $_SESSION['registrations']
                                ]);
                                
                            }
                           
                            ?>

                        </div>
                        <div class="grid-container search-filter-outer-container">
                            <!-- ON MOBILE ONLY -->
                            <div class="show-for-small-only search-filter-mobile-controls-container">
                                <a class="medium-text" @click="toggleMobileFilterMenu()">{{ mobile_filter_menu_visible ? 'Close' : 'Open' }} Filters</a>
                                <div class="checkbox-container">
                                    <input id="hide-full-terms" type="checkbox" v-model="filters.hide_full_terms" @change="toggleEventsVisibility()">
                                    <label for="hide-full-terms"><span class="medium-text">Hide Full Terms</span></label>
                                </div>
                            </div>
                            <!-- END MOBILE ONLY -->

                            <!-- Search Filters -->
                            <?php echo element('search-results/search-filters'); ?>

                            <!-- Search Results -->
                            <div class="search-results-container">
                                <ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true" data-deep-link="true">

                                    <li class="accordion-item is-active" data-accordion-item v-for="kamp in kamps" v-show="kamp.visible">
                                        <!-- Accordion tab title -->
                                        <a href="#" class="accordion-title" v-bind:style="{ backgroundImage: 'url(' + kamp.search_results_image.url + ')'}">
                                            <div class="accordion-title-gradient-overlay"
                                            v-bind:class="[kamp.kamp_type.post_name.toLowerCase()]"
                                            ></div>
                                            <!-- <div class="accordion-title-gradient-overlay" v-bind:style="{ background: 'linear-gradient(.25turn, ' + kamp.type.0.color + ', 90%, transparent)'}"></div> -->
                                            <div class="accordion-title-content-container">
                                                <div class="accordion-title-icon-container"><i class="icon accordion-title-icon white"></i></div>
                                                <div class="accordion-title-text-container">
                                                    <div class="accordion-title-type-container">
                                                        <div class="accordion-title-type-title-container">
                                                            <h4 class="white">{{ kamp.kamp_title }}</h4>
                                                            <!-- <i class="icon icon-{{ kamp.type.0.icon_name }} white large margin-left-5"></i> -->
                                                            <i class="icon white margin-left-5 accordion-title-type-title-icon" v-bind:class="'icon-' + [kamp.type[0].icon_name]"></i>
                                                        </div>
                                                        <div class="accordion-title-type-terms-container show-for-medium">
                                                            <h6 class="white secondary">{{ kamp.term_count }} {{kamp.term_count > 1 ? 'Terms' : 'Term'}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-title-description-container">
                                                        <p class="white">
                                                            <span class="show-for-medium">{{ kamp.search_results_text }}</span>
                                                            <span href="kamp.kamp_url" class="white accordion-learn-more-link">Learn More</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- Accordion tab content: use `is-active` state class to start in open position. -->
                                        <div class="accordion-content" data-tab-content>
                                            <table class="unstriped search-results-container-table">
                                                <thead>
                                                    <tr>
                                                        <th class="show-for-medium">Term Length</th>
                                                        <th class="mobile-padding-left">Date</th>
                                                        <th class="show-for-medium">Location</th>
                                                        <th>Price</th>
                                                        <th class="show-for-medium">Status</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="row in kamp.circuitree" v-show="row.visible">
                                                        <td class="show-for-medium">
                                                            <span v-show="row.Weeks <= 1">1 Week</span>
                                                            <span v-show="row.Weeks > 1">
                                                                {{ (row.Weeks) }} Weeks
                                                            </span>
                                                        </td>
                                                        <td class="mobile-padding-left mobile-padding-right">
                                                            {{ moment(row.BeginDate).format('MMM D') }} - {{ moment(row.EndDate).format('MMM D, YYYY') }}
                                                        </td>
                                                        <td class="show-for-medium">{{ row.CityState }}</td>
                                                        <td>
                                                            <p class="bold">${{ row.EventDivisionPrice }}</p>
                                                        </td>
                                                        <td class="show-for-medium">
                                                            {{ row.PercentFull > 99 ? 'Closed' : 'Open' }}
                                                        </td>
                                                        <td class="mobile-padding-left mobile-padding-right">

                                                            <form action="/wp-admin/admin-post.php" method="post" v-show="row.EventID != <?php echo isset($registration['event_id']) ? $registration['event_id'] : 0; ?>">
                                                                <input type="hidden" name="action" value="kan_select_event" />
                                                                <input type="hidden" name="event_id" v-bind:value="row.EventID" />
                                                                <input type="hidden" name="registration_index" value="<?php echo $_GET['tab']; ?>" />
                                                                <button class="button search-table-button">Select</button>
                                                            </form>

                                                            <form action="/wp-admin/admin-post.php" method="post" v-show="row.EventID == <?php echo isset($registration['event_id']) ? $registration['event_id'] : 0; ?>">
                                                                <input type="hidden" name="action" value="kan_select_event" />
                                                                <input type="hidden" name="event_id" value="0" />
                                                                <input type="hidden" name="registration_index" value="<?php echo $_GET['tab']; ?>" />
                                                                <button class="button hollow search-table-button">Deselect</button>
                                                            </form>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </li>


                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <?php if (have_posts()): while (have_posts()): the_post();?>

                <?php
                    $post = get_post();

                    if (has_blocks($post->post_content)) {
                        $blocks = gutenberg_parse_blocks($post->post_content);

                        foreach ($blocks as $block) {
                            echo gutenberg_render_block($block);
                        }
                    }
                ?>

            <?php endwhile;endif;?>

            <!-- Tooltips -->
            <div class="dropdown-pane register-now-button-tooltip" id="register-now-button-tooltip" data-dropdown data-close-on-click="true" data-v-offset="20" data-position="top" data-alignment="center">
                <div class="tooltip-triangle"></div>
                <div class="grid-x align-center">
                    <span>Please finish selecting terms for each kamper before proceeding to registration.</span>
                </div>
            </div>

        </main> <!-- end #main -->

        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

        <script type="text/javascript">
            var kamps = <?php echo json_encode($kamps); ?>;
            str = JSON.stringify(kamps);
            console.log("kamps"+str);
        </script>

        
        <?php get_sidebar();?>

    </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer();?>

<!-- <?php echo basename(__FILE__); ?> -->