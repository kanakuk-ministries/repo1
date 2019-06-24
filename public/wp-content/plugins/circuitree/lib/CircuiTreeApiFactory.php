<?php

require_once(dirname(__FILE__) . '/CircuiTreeApiClient.php');
require_once(dirname(__FILE__) . '/CircuiTreeApiClientMock.php');

/**
 * We started development with 2 apis: one modern and one legacy.  This class originally
 * would instantiate the proper API class depending on which was needed.  We scrapped the
 * legacy API, but kep this class as a way to set defaults from constants defined in wp-config.php
 */
class CircuiTreeApiFactory
{
    public static function create($options = [])
    {
        $defaults = [
            'username'     => CT_API_USERNAME,
            'password'     => CT_API_PASSWORD,
            'api_key'      => CT_API_KEY,
            'base_url'     => CT_API_BASE_URL,
            'url_code'     => CT_API_URL_CODE,
            'company_code' => CT_API_COMPANY_CODE,
            'company_abbr' => CT_API_COMPANY_ABBR,
            'debug'        => CT_API_DEBUG,
            'logging'      => CT_API_LOGGING
        ];

        $options = array_merge($defaults, $options);

        if (CT_API_MOCK_DATA) {
            return new CircuiTreeApiClientMock($options);
        }
        else {
            return new CircuiTreeApiClient($options);
        }
    }
}