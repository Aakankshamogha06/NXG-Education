<?php

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Market_report_api extends REST_Controller {

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
        $reportid = "926";
        $token = md5("${userid}|${accountType}|${expiryDate}${secretKey}");

        $autochartistURL = "https://reports.autochartist.com/mr/?";
        $autochartistURL .= "broker_id=$brokerid&rid=$reportid&demo=$accountType&token=$token";
        $autochartistURL .= "&expire=$expiryDate&locale=en_GB&user=$userid";

        $this->response(['url' => $autochartistURL], REST_Controller::HTTP_OK);
    }
}
?>
