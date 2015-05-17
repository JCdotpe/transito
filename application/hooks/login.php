<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login {

    private $ci;

    public function __construct() {
        $this->ci = & get_instance();
        !$this->ci->load->library('session') ? $this->ci->load->library('session') : false;
        !$this->ci->load->helper('url') ? $this->ci->load->helper('url') : false;
    }

    public function check_login() {
        if (!$this->ci->session->userdata('idUserLogin') && $this->ci->uri->segment(1) != 'login' && $this->ci->uri->segment(1) != 'logout') {
//            if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
//                // nothing to do
//            }else{
//                redirect('/login');
//            }
            redirect('/login');
        }
    }

}
