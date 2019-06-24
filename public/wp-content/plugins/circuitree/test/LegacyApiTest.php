<?php

require_once(dirname(dirname(__FILE__)) . '/lib/CircuiTreeApiFactory.php');

define('CT_API_LEGACY', true);
define('CT_API_USERNAME', 'kuk.api');
define('CT_API_PASSWORD', '19_Kanakuk_26');
define('CT_API_KEY', '4B640407-DCD1-4EE3-ABD0-577454C02FEA');
define('CT_API_TEST_MODE', true);												// works with test domains
define('CT_API_DEBUG', true);
define('CT_API_BASE_URL', 'https://api.mycircuitree.com/');

class LegacyApiTest
{

    public function __construct()
    {
        $this->test_createApiClient();
        $this->test_defaultAuthenticate();
        $this->test_customAuthenticate();
        $this->test_createFromToken();
        $this->test_getKamps();
        $this->test_getKampers();
    }

    private function test_createApiClient()
    {
        $client = CircuiTreeApiFactory::create();
        $this->assert(
            get_class($client) == 'CircuiTreeApiClientV1',
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
            'Username' => 'josh.brown+parent@digitalscientists.com',
            'Password' => 'fridaythe13th'
        ]);
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
            $client->getApiToken() == '1234567890',
            'Create from Token'
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

$apitest = new LegacyApiTest();