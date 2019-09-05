<?php

class CircuiTreeApiClient {
    
    protected $auth_response = null;

    protected $settings = [
        'logging'      => false,
        'base_url'     => null,
        'url_code'     => null,
        'company_code' => null,
        'company_abbr' => null,
        'debug'        => true,   // controls output of out() function
        'username'     => null,   // api username/password used to retrieve a valid API token
        'password'     => null,
        'api_key'      => null,
        'api_token'    => null,
        'user_token'   => null    // only used in V2 of the API
    ];

    public function __construct($options = [])
    {
        $this->settings = array_merge($this->settings, $options);
    }

    public function setAuthResponse($auth)
    {
        $this->auth_response = [
            'StatusCode'        => $auth['status_code'],
            'StatusMessage'     => $auth['status_message'],
            'ApiToken'          => $auth['ApiToken'],
            'CompanyAPIURL'     => $auth['company_apiurl'],
            'CompanyID'         => $auth['company_id'],
            'CompanyName'       => $auth['company_name'],
            'CompanyWebsiteURL' => $auth['company_website_url'],
            'EntityID'          => $auth['entity_id'],
            'FirstName'         => $auth['first_name'],
            'IsAuthentic'       => $auth['is_authentic'],
            'LastName'          => $auth['last_name']
        ];
    }

    public function attr($key, $value = null)
    {
        // getter
        if (func_num_args() == 1) {
            if (isset($this->settings[$key])) {
                return $this->settings[$key];
            }
            else {
                throw new Exception("Invalid key passed to attr() : $key");
            }
        }
        // setter
        $this->settings[$key] = $value;
    }

    public function createRegistration($attendees = [])
    {
        $data = [
            'ApiToken'  => $this->attr('api_token'),
            'Attendees' => $attendees
        ];
        echo "<pre>"; print_r($data);
        return $this->send($this->attr('base_url') . $this->attr('url_code') . '/Registration/CreateCart.json', $data);
    }

    public function getAutoLoginToken()
    {
        $data = [
            'ApiToken'  => $this->attr('api_token')
        ];

        return $this->send($this->attr('base_url') . $this->attr('url_code') . '/Authentication/CreateAutoLoginToken.json', $data);
    }

    public function getCharterAvailability($timestamp = null)
    {
        $date = $timestamp ? date('m/d/Y', $timestamp) : date('m/d/Y');
        $data = [
            'ApiToken'  => $this->attr('api_token'),
            'EndDate'   => "",
            'StartDate' => $date,
            'Year'      => date('Y', strtotime($date))
        ];

        return $this->send($this->attr('base_url') . $this->attr('url_code') . '/Transportation/GetCharterAvailability.json', $data);
    }

    public function getTransportationOptions($regId = '')
    {
        $registrationId = $regId != '' ? $regId : $this->auth_response['EntityID'];
        $data = [
            'ApiToken'        => $this->attr('api_token'),
            'ExportQueryID'   => 1616,
            'QueryParameters' => [
                [
                    'ParameterID' => 27,
                    'ParameterValue' => $registrationId
                ]
            ]
        ];

        return $this->send($this->attr('base_url') . $this->attr('url_code') . '/Exports/ExecuteQuery.json', $data);
    }

    public function getRegistrationInfo($child_enity='')
    {
        $data = [
            'ApiToken'        => $this->attr('api_token'),
            'ExportQueryID'   => 1614,
            'QueryParameters' => [
                [
                    'ParameterID' => 43,
                    'ParameterValue' => $child_enity
                ]
            ]
        ];

        return $this->send($this->attr('base_url') . $this->attr('url_code') . '/Exports/ExecuteQuery.json', $data);
    }

    public function getFamilyInfo()
    {
        $data = [
            'ApiToken'        => $this->attr('api_token'),
            'ExportQueryID'   => 1608,
            'QueryParameters' => [
                [
                    'ParameterID' => 43,
                    'ParameterValue' => $this->auth_response['EntityID']
                ]
            ]
        ];

        return $this->send($this->attr('base_url') . $this->attr('url_code') . '/Exports/ExecuteQuery.json', $data);
    }

    public function getKamps() 
    {
        $data = [
            'ApiToken' => $this->attr('api_token'),
            "ExportQueryID" => 293,
            "QueryParameters" => [
                [
                    "ParameterID" => 230,
                    "ParameterValue" => 1
                ]
            ]
        ];

        return $this->send($this->attr('base_url') . $this->attr('url_code') . '/Exports/ExecuteQuery.json', $data);
    }

    public function getKampers()
    {
        $data = [
            'ApiToken' => $this->attr('api_token')
        ];

        return $this->send($this->attr('base_url') . $this->attr('url_code') . '/Registration/QuickEnroll/RegsAvailableForQuickEnroll.json', $data);
    }

    
    // makes request to retrieve the api token for the currently configured user & sets value to the current object
    // all subsequent calls require the api token 
    // returns json response from endpoint
    public function authenticate($options = [], $is_entity = false)
    {
       
        $defaults = [
            'AuthenticateForEntity' => $is_entity,
            'CompanyCode'           => $is_entity ? $this->attr('company_abbr') : $this->attr('company_code'),
            'Username'              => $this->attr('username'),
            'Password'              => $this->attr('password'),
            'APIKey'                => $this->attr('api_key'),
        ];
        

//         $defaults = [
//             'AuthenticateForEntity' => true,
//             'CompanyCode'           => $this->attr('company_code'),
//             'Username'              => $this->attr('username'),
//             'Password'              => $this->attr('password'),
//             'APIKey'                => $this->attr('api_key'),
//         ];
        $data = array_merge($defaults, $options);
 
        try {
            $response = $this->send($this->attr('base_url') . 'Authentication/Authenticate.json', $data);
            if ($response['StatusCode'] === 1) {
                $this->attr('api_token', $response['ApiToken']);
            }
        }
        catch (Exception $e) {
            echo $e->getMessage();
            return;
        }

        $this->auth_response = $response;

        return $response;
    }

    protected function send($endpoint, $data) 
    {
        $this->log("\n\nSending api request to $endpoint\n" . json_encode($data, JSON_PRETTY_PRINT));

        $data_string = json_encode($data);

        $ch = curl_init($endpoint);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );
        $response = curl_exec($ch);

        $this->log("\nReceiving api response from $endpoint\n" . json_encode(json_decode($response), JSON_PRETTY_PRINT));

        if ($response === false) {
            $response = curl_error($ch);
            throw new Exception($response);
        }
        else {
            $decoded = json_decode($response, true);
            if (isset($decoded['Results'])) {
                $decoded['Results'] = json_decode($decoded['Results'], true);
            }
            return $decoded;
        }
    }

    protected function out($var) 
    {
        if ($this->settings['debug']) {
            if (is_string($var)) {
                echo $var . "\n";
            }
            else {
                print_r($var);
                echo "\n";
            }
        }
    }

    protected function log($str)
    {
        if (CT_API_LOGGING) {
            file_put_contents(
                dirname(dirname(__FILE__)) . '/log/api.log',
                $str,
                FILE_APPEND
            );
        }
    }

}