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
        $brokerid = "898";
        $userid = "NXG-Markets";
        $accountType = "0";
        $secretKey = "b767-0407ab8";
        $token = md5("${userid}|${accountType}|${expiryDate}${secretKey}");
        $autochartistURL = "https://webapp.autochartist.com/componentcontainer/broker.php?";
        $autochartistURL .= "broker_id=$brokerid&user=$userid&logintoken=$token";
        $autochartistURL .= "&expire=$expiryDate&account_type=LIVE&locale=en_GB";

        $this->response(['url' => $autochartistURL], REST_Controller::HTTP_OK);
    }
}
?>
