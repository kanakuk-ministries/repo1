<?php

require_once(dirname(dirname(__FILE__)) . '/lib/CircuiTreeApiFactory.php');

// API & site info
define('CT_API_MOCK_DATA', false);
define('CT_BASE_URL', 'https://test-newreg.circuitree.com/kukdev');
define('CT_API_BASE_URL', 'https://api.circuitree.com/');
define('CT_API_KEY', '4B640407-DCD1-4EE3-ABD0-577454C02FEA');
define('CT_API_USERNAME', 'kuk.ds1');
define('CT_API_PASSWORD', 'Developers!');
define('CT_API_URL_CODE', 'kukdev');
define('CT_API_COMPANY_CODE', 124);
define('CT_API_COMPANY_ABBR', 'Kanakuk_Dev');
define('CT_API_DEBUG', true);
define('CT_API_LOGGING', true);

class ApiTest
{

    public function __construct()
    {
        // clear the log file
        if (CT_API_LOGGING) {
            file_put_contents(
                dirname(dirname(__FILE__)) . '/log/api.log',
                ''
            );
        }

        $this->test_createApiClient();
        $this->test_defaultAuthenticate();
        $this->test_customAuthenticate();
        $this->test_createFromToken();
        $this->test_getCharterAvailability();
        // $this->test_getKamps();
        $this->test_getTransportationOptions();
        $this->test_getRegistrationInfo();
        $this->test_getKampers();
        $this->test_getAutoLoginToken();
        $this->test_getFamilyInfo();
        $this->test_createRegistration();
    }

    private function test_createApiClient()
    {
        $client = CircuiTreeApiFactory::create();
        $this->assert(
            get_class($client) == 'CircuiTreeApiClient' || get_class($client) == 'CircuiTreeApiClientMock',
            'Create API Client'
        );
    }

    private function test_defaultAuthenticate()
    {
        $client = CircuiTreeApiFactory::create();
        $response = $client->authenticate();
        $this->assert(
            $response['StatusCode'] == '1' && $response['StatusMessage'] == 'Success',
            'Default Authentication'
        );
    }

    private function test_customAuthenticate()
    {
        $client = CircuiTreeApiFactory::create();
        $response = $client->authenticate([
            'Username' => 'josh.brown+1@digitalscientists.com',
            'Password' => 'fridaythe13th',
        ], true);

        $this->assert(
            $response['StatusCode'] == '1' && $response['StatusMessage'] == 'Success',
            'Custom Authentication'
        );
    }

    private function test_createFromToken()
    {
        $client = CircuiTreeApiFactory::create([
            'api_token' => '1234567890'
        ]);

        $this->assert(
            $client->attr('api_token') == '1234567890',
            'Create from Token'
        );
    }

    private function test_getCharterAvailability()
    {
        $client = CircuiTreeApiFactory::create();
        $client->authenticate();
        $response = $client->getCharterAvailability();
        $this->assert(
            $response['StatusCode'] == '1' && $response['StatusMessage'] == 'Success',
            'Get Charter Availability'
        );
    }

    private function test_getKamps()
    {
        $client = CircuiTreeApiFactory::create();
        $client->authenticate();
        $response = $client->getKamps();
        $this->assert(
            $response['StatusCode'] == '1' && $response['StatusMessage'] == 'Success',
            'Get Kamps'
        );
    }

    private function test_getKampers()
    {
        $client = CircuiTreeApiFactory::create();
        $client->authenticate();
        $response = $client->getKampers();
        $this->assert(
            $response['StatusCode'] == '1' && $response['StatusMessage'] == 'Success',
            'Get Kampers'
        );
    }

    private function test_getAutoLoginToken()
    {
        $client = CircuiTreeApiFactory::create();
        $client->authenticate([
            'Username' => 'josh.brown+1@digitalscientists.com',
            'Password' => 'fridaythe13th',
        ], true);

        $response = $client->getAutoLoginToken();

        $this->assert(
            $response['StatusCode'] == '1' && $response['StatusMessage'] == 'Success',
            'Auto Login Token'
        );
    }

    private function test_getTransportationOptions()
    {
        $client = CircuiTreeApiFactory::create();
        $client->authenticate([
            'Username' => 'josh.brown+1@digitalscientists.com',
            'Password' => 'fridaythe13th',
        ], true);        
        $response = $client->getTransportationOptions();
        $this->assert(
            $response['StatusCode'] == '1',
            'Get Transportation Options'
        );
    }

    private function test_getFamilyInfo()
    {
        $client = CircuiTreeApiFactory::create();
        $client->authenticate([
            'Username' => 'josh.brown+1@digitalscientists.com',
            'Password' => 'fridaythe13th',
        ], true);        
        $response = $client->getFamilyInfo();
        $this->assert(
            $response['StatusCode'] == '1',
            'Get Family Info'
        );
    }

    private function test_getRegistrationInfo()
    {
        $client = CircuiTreeApiFactory::create();
        $client->authenticate([
            'Username' => 'josh.brown+1@digitalscientists.com',
            'Password' => 'fridaythe13th',
        ], true);        
        $response = $client->getRegistrationInfo();
        $this->assert(
            $response['StatusCode'] == '1',
            'Get Registration Info'
        );
    }

    private function test_createRegistration()
    {
        $client = CircuiTreeApiFactory::create();
        $client->authenticate();
        $response = $client->createRegistration([
            [
                'Age'                     => 7,
                'AttendeeName'            => 'Brian',
                'EventDivisionSelections' => [5383],
                'Gender'                  => 'M',
                'RegistrationTypeID'      => 1
            ]
        ]);
        $this->assert(
            $response['StatusCode'] == '1',
            'Create Registration'
        );
    }
    
    private function assert($assertion, $test)
    {

        $message = "Testing $test";

        $message .= str_repeat('.', 120-strlen($message));

        if ($assertion) {
            $message .= "\033[32m PASS\033[0m\n";
        }
        else {
            $message .= "\033[31m FAIL\033[0m\n";
        }

        echo $message;
    }

}

$apitest = new ApiTest();