<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller{
    function __construct()
    {
        parent::__construct();    
        $this->load->model('model_home','',TRUE); 
		$this->load->model('model_keluhan','',TRUE);  
		$this->load->model('model_booking','',TRUE); 
    }
    
  public function index()
  {
    
        $idp = $this->session->userdata('id_pegawai');
        $data['pegawai'] = $this->model_home->get_datapegawai($idp);
        $data['keluhan'] = $this->model_keluhan->get_datakeluhan($idp);
        $data['booking'] = $this->model_booking->ambil_booking();
        $this->template->load('template','home_view',$data);
  }
    
}

?>
