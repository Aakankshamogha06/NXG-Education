<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autochartist_api {
    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        // Load any necessary CI models, libraries, helpers, etc.
    }

    public function get_autochartist_data($params) {
        // Construct the API URL
        $api_url = "https://component.autochartist.com/to/?broker_id={$params['broker_id']}&account_type={$params['account_type']}&token={$params['token']}&expire={$params['expire']}&locale={$params['locale']}&user={$params['user']}&trade_now={$params['trade_now']}&layout={$params['layout']}";

        // Make a request to the Autochartist API
        $response = file_get_contents($api_url);

        // Process the response as needed
        // For example, you can return the response to the client
        return $response;
    }
}
