<?php
class user extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user');
		$this->load->model('model_keluhan');
	}
	public function get_alluser()
	{
		$g=$this->db->get('tb_pegawai');
		
		return $g->result_array();
	}
	public function index()
	{
		$idp=$this->session->userdata('id_pegawai');
		$data['kuses']=$this->model_user->get_alluser();
        
		$this->template->load('template','user_view',$data);
	}
	
	public function adduser()
	{
		$idp=$this->session->userdata('id_pegawai');
		$data['kelas']=$this->model_user->get_datakelas();
        
		$this->template->load('template','adduser',$data);
	}
	public function tambahuser()
	{
		$data['id_pegawai']=$_POST['idpegawai'];
		$data['nama_pegawai']=$_POST['namapegawai'];
		$data['alamat']=$_POST['alamat'];
		$data['no_hp']=$_POST['nohape'];
		$data['jabatan']='asleb';
		$data['jurusan']=$_POST['jurusan'];
		$data['password']=$_POST['password'];
		$data['kelas']=$_POST['kelas'];
		
		if($this->model_user->mdl_add($data))
		{
		redirect('user?msg=Add Success');
		}	
	}
	public function edituser()
	{
		$idp=$this->session->userdata('id_pegawai');
		$data['kuses']=$this->model_user->get_user();
        
		$this->template->load('template','edituser',$data);
	}
	public function saveuser()
	{
		$data['id_pegawai']=$_POST['idpegawai'];
		$data['nama_pegawai']=$_POST['namapegawai'];
		$data['alamat']=$_POST['alamat'];
		$data['no_hp']=$_POST['nohape'];
		$data['jabatan']='asleb';
		$data['jurusan']=$_POST['jurusan'];
		$data['password']=$_POST['password'];
		$data['kelas']=$_POST['kelas'];
		
		if($this->model_user->mdl_save($data))
		{
		redirect('user?msg=Save Success');
		}
	}
	
	public function viewuser()
	{
		$idp=$this->session->userdata('id_pegawai');
		$data['kuses']=$this->model_user->get_user();
        
		$this->template->load('template','viewuser',$data);
	}
	
	public function delete()
	{
		$this->model_user->delus();
		redirect('user?msg=Delete Success');
	}
}
?>