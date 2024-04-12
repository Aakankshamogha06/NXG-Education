<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AutochartistController extends CI_Controller {

    public function index() {
        
        function generateSSOToken($user_name, $expiryDate, $key) {
            return md5($user_name . '|' . '0' . '|' . $expiryDate . $key);
        }

        // Example user data
        $user_name = "NXG-Markets";
        $key = "b767-0407ab8";
        $expiryDate = time() + (3 * 24 * 60 * 60);

        // Generate token and construct Autochartist URL
        $token = generateSSOToken($user_name, $expiryDate, $key);
        $autochartistURL = "https://webapp.autochartist.com/componentcontainer/broker.php";
        $autochartistURL .= "?broker_id=898&user=$user_name&account_type=LIVE";
        $autochartistURL .= "&expire=$expiryDate&logintoken=$token&locale=en_GB";

        $data['autochartist_url'] = $autochartistURL;
        $this->load->view('admin/technical_analysis/view_technical_analysis');
    }
}
?>
