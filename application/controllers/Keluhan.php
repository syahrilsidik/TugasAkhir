<?php

Class Keluhan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_keluhan','',TRUE);
        
    }
    
    public function index()
    {
        $idp=$this->session->userdata('id_pegawai');
        $data['keluhan']=$this->model_keluhan->get_datakeluhan($idp);
		$data['lab']=$this->model_keluhan->get_datalab();
        
        $this->template->load('template','keluhan_view',$data);
    }
	
	function keluhandetail()
    {
        $idk=$this->session->userdata('id_pegawai');
        $dataL['keluhan']=$this->model_keluhan->keluhandetail($idk);
        
        $this->template->load('template','keluhandetail',$dataL);
    }
    
    function keluhanedit()
    {
        $idk=$this->session->userdata('id_pegawai');
        $datE['keluhan']=$this->model_keluhan->keluhandetail($idk);
        
        $this->template->load('template','keluhandetailedit',$datE);
    }
	
	public function edit_keluhan()
	{
		$this->model_keluhan->editkeluhan();
		redirect ('keluhan?msg=Change Success');
	}
    
    public function addkeluhan()
    {
    $pid=$this->session->userdata('id_pegawai');
    $this->model_keluhan->mdl_addkeluhan($pid);
    $this->index();
    }
    
    public function deletekeluhan()
    {
    $this->model_keluhan->mdl_deletekeluhan();
    redirect ('keluhan?msg=delete Success');  
    }
	

	public function mhs()
	{
		$data['lab']=$this->model_keluhan->get_datalab();
		$this->load->view("keluhanmhs",$data);
	}
	
	public function savemhs()
	{	
		$this->model_keluhan->mhsadd();
		redirect('login?msg=Berhasil Tersimpan');
		
	}
	public function mhsview()
	{
		$data['keluhan']=$this->model_keluhan->get_kelmhs();
		$this->template->load('template','keluhan_mhs',$data);
	}
	public function mhsviewdetail()
	{
		$data['keluhan']=$this->model_keluhan->get_kelmhsdetail();
		$this->template->load('template','keluhan_mhsdetail',$data);
	}
	
	public function mhsviewdetailedit()
	{
		$data['keluhan']=$this->model_keluhan->get_kelmhsedit();
		$this->template->load('template','keluhan_mhsdetailedit',$data);
	}
	
	public function mhsviewdetailedits()
	{
		$data['keluhan']=$this->model_keluhan->savekelmhsedit();
		redirect('keluhan/mhsview?msg=Complete Change');
	}
	public function deletekeluhanmhs()
    {
    $this->model_keluhan->mdl_deletekeluhanmhs();
    redirect('keluhan/mhsview?msg=Delete Berhasil'); 
    }
	
	
}

/**
 * @author Lirhays
 * @copyright 2014
 */



?>