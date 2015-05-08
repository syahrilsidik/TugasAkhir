<?php

class Login extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('model_login','',TRUE);
    }
    
    function index ()
    {
        $this->load->view('requistion/login');
    }
    
    function ceklogin()
    {
        $data['id_pegawai'] = $this -> input -> post('txtidpegawai');
        $data['password']   = $this -> input -> post('txtpassword');
        $data['jabatan']    = $this -> model_login -> getjabatan($data);
        if ($this -> model_login -> ceklogin($data)) 
        {
            $this->session->set_userdata(array('id_pegawai'=>$data['id_pegawai'],'nama_pegawai'=>$data['jabatan'][0]['nama_pegawai'],'jabatan'=>$data['jabatan'][0]['jabatan']));
            redirect('home');
        }
        else
        {
            redirect('login?msg=Wrong username or password !!');
        }
    }
}
/**
 * @author Lirhays
 * @copyright 2014
 */



?>