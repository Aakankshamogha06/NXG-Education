<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Market_report extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('autochartist_api');
    }

    public function index() {
        $this->load->view('admin/include/navbar');
        $this->load->view('admin/include/sidebar');       
        $this->load->view('admin/market_report/view_market_report');
        
        
    
    }
}
