<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logout extends CI_Controller{
    function __construct(){
        parent::__construct();
        
        backButtonHandle();
    }
    
    public function index()
    {
        $this->session->sess_destroy();
        redirect(site_url('login','refresh'));
    }
}