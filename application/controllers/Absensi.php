<?php
Class Absensi extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('model_absensi');
        $this->load->model('model_user');
    }
    
    public function index()
    {
		if(!empty($_GET['name'])){
         $idp = $_GET['name'];
    }
    else{
		$id_pegawai=$this->session->userdata('id_pegawai');
		if($this->session->userdata('jabatan')=="administrator"){
        $idp = 'p' ;} else
		{
		$idp = $id_pegawai ;}
    }
    
    
     $config = array();
        $config['base_url'] = base_url().'index.php/Absensi/index';
        $config["total_rows"] = $this->model_absensi->record_count($idp);
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        
        $config['first_link']   = 'First';
	    $config['last_link']    = 'Last';
        $config['next_link']    = 'Next';
	    $config['prev_link']    = 'Prev';
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['kuses']=$this->model_user->get_alluser();
        $data["uery"] = $this->model_absensi->fetch_account($config["per_page"], $page , $idp);
        $data["links"] = $this->pagination->create_links();
 
        $this->template->load('template','absensi_view',$data);
}
    public function add_absensi()
    {
        $idp=$this->session->userdata('id_pegawai');
        
        $this->template->load('template','add_lapabsen',$idp);
    }
    
    public function save_absensi()
    {
        $idp=$this->session->userdata('id_pegawai');
        $this->model_absensi->mdl_addabsen($idp);
    }
	
	public function absensidetail()
    {
        $idp=$this->session->userdata('id_pegawai');
        $dataL['wery1']= $this->model_absensi->get_absensi();
        $dataL['wery2'] = $this->model_absensi->get_detailabsensi($idp);
        
        $this->template->load('template','absensidetail_view',$dataL);
    }
	
	public function editabsensi()
    {
        $idp=$this->session->userdata('id_pegawai');
        $dataL['wery1']= $this->model_absensi->get_absensi();
        $dataL['wery2'] = $this->model_absensi->get_detailabsensi($idp);
        
        $this->template->load('template','editdetailabsensi',$dataL);
    }

	public function saveedit()
	{
		$id=$this->session->userdata('id_pegawai');
		$no = $_POST['no'];
        $detail = $this->input->post('detail');
				$data['id_pegawai']      = $id;
                $data['tgl_masuk']       = $_POST['txttanggal'];
                $data['jam_datang']      = $_POST['jamdatang'];
				$data['jam_pulang']      = $_POST['jampulang'];
				
		if($this->model_absensi->mdl_editabsensi($no,$data)){
        foreach($detail as $details)
        {
			$datad['no'] = $no;
			$no_detail = $details['no_detailabsensi'];
            $datad['tgl_masuk'] = $_POST['txttanggal'];
            $datad['jam_mulai'] = $details['jammulai'];
			$datad['jam_selesai'] = $details['jamselesai'];
			$datad['kegiatan'] = $details['kegiatan'];
			$datad['lab'] = $details['lab'];
			$datad['uraian'] = $details['uraian'];
        
            $this->model_absensi->mdl_editabsensi_detail($datad,$no_detail);
        }
            redirect('absensi?msg=Completely changed');
        }
        else
        {
            redirect('absensi?msg=Update failed');
        }
    }
    public function deleteabsensi()
    {
    $this->model_absensi->mdl_deleteabsensi();
    redirect('absensi?msg=Delete Success'); 
    }
}
/**
 * @author Lirhays
 * @copyright 2014
 */ 

?>