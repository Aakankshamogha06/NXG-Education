<?php

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Technical_analysis_api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('autochartist_api');
    }

    public function generate_url_get() {
        $expiryDate = time() + (3 * 24 * 60 * 60);
        $userid = "NXG-Markets";
        $brokerid = "898";
        $accountType = "0";
        $secretKey = "b767-0407ab8";
        $token = md5("${userid}|${accountType}|${expiryDate}${secretKey}");
        $autochartistURL = "https://component.autochartist.com/performancestats-v2/?";
        $autochartistURL .= "broker_id=$brokerid";
        
        $this->response(['url' => $autochartistURL], REST_Controller::HTTP_OK);
    }
}
?>
