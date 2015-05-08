<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CTRL extends CI_Controller {

	public function index()
	{
		//$this->load->view('view_inputPegawai');
        $this->addKeluhan();
	}
    function addPegawai()
    {
        $this->load->model('MDL');
        $this->MDL->addPegawai();
        $this->index();
    }
    function addKeluhan()
    {
        $this->load->model('MDL');
        $data['lab'] = $this->MDL->getLab();
        $data['peg'] = $this->MDL->getPegawai();
        $this->load->view('view_inputKeluhan',$data);
    }
}
?>