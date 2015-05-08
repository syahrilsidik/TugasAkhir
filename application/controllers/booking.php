<?php
Class booking extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('model_booking');
        $this->load->model('model_keluhan');
    }
    
    public function index()
    {
        $this->session->userdata('id_pegawai');
        
        $query=$this->db->query("select * from tb_detailbooking");
		$jsonevents=array();
		foreach($query->result()as $entry){
			$jsonevents[]=array(
				"title" => $entry->title,
				"start" => $entry->start,
				"end" => $entry->end,
				"lab" => $entry->id_lab,
				"kelas" => $entry->id_lab,
				"matakul" => $entry->id_lab,
				"dosen" => $entry->id_lab,
				
			);
		}
		$data['json']=json_encode($jsonevents);
		
        $this->template->load('template','cal',$data);
      //  $this->load->view('cal');
    }
	
	public function showdata()
	{
		//$data['dte']=$_POST['day'];
		//$data['booking'] = $this->model_booking->ambil_booking();
		//$this->load->view('showbooking',$data);
		$query=mysql_query("select * from jadwalku");
		$arr=array();
		while($row = mysql_fetch_assoc($query)){
			$temp=array(
				"id" => $row["id"],
				"title" => $row["title"],
				"start" => $row["start"],
				"end" => $row["end"],
			);
			array_push($arr, $temp);
		}
		echo json_encode($arr);
	}
	
	public function addbook()
	{	
		$idp=$this->session->userdata('id_pegawai');
		$data['lab']=$this->model_booking->get_datalab();
		$data['kelas']=$this->model_booking->get_datakelas();
		$this->template->load('template','add_book',$data);
	}
	public function getdosen()
    {	
    	$kelas=$_POST['kelas'];
		$query=$this->db->query("SELECT tb_kelasdetail.id_dosen,tb_dosen.NamaDosen FROM tb_kelasdetail INNER JOIN tb_dosen ON tb_kelasdetail.id_dosen = tb_dosen.idDosen WHERE tb_kelasdetail.id_kelas  = '$kelas' GROUP BY tb_dosen.idDosen");
        echo "<option value='default'>-Choose-</option>" ;
        foreach ($query->result_array() as $row){
			echo "<option value=".$row['id_dosen'].">".$row['NamaDosen']."</option>" ;
		}
    }
    public function getmatkul()
    {	
    	$kelas=$_POST['kelas'];
    	$dosen=$_POST['dosen'];
		$query=$this->db->query("SELECT tb_matakuliah.Matakuliah, tb_matakuliah.idMatkul FROM tb_kelasdetail INNER JOIN tb_matakuliah ON tb_kelasdetail.id_matkul = tb_matakuliah.idMatkul WHERE tb_kelasdetail.id_kelas = '$kelas' AND tb_kelasdetail.id_dosen = '$dosen'");
        echo "<option value='default'>-Choose-</option>" ;
        foreach ($query->result_array() as $row){
			echo "<option value=".$row['idMatkul'].">".$row['Matakuliah']."</option>" ;
		}
    }
    public function getsesi()
    {	$hari =$_POST['hari'];
    	$lab=$_POST['labi'];
		$query=$this->db->query("SELECT * FROM tb_session WHERE NOT EXISTS (SELECT * FROM tb_detailperm WHERE tb_session.idsession = tb_detailperm.idsession and tb_detailperm.id_lab='$lab' 
and tb_detailperm.idPermanent = '$hari')");
        echo "<option value='default'>-Choose-</option>" ;
        foreach ($query->result_array() as $row){
			echo "<option>".$row['session']."</option>" ;
		}
    }
	public function addbooking()
	{	
		$idp=$this->session->userdata('id_pegawai');
		$this->model_booking->addbooking($idp);
		redirect('booking?msg=Data Berhasil di Tambah');
	}
    
    public function bookingdetail()
    {
        $this->session->userdata('id_pegawai');
        $data['booking'] = $this->model_booking->ambildetail();
        $data['lab']= $this->model_keluhan->get_datalab();
        $this->template->load('template','viewdetail_booking',$data); 
    }
    
    public function editbooking()
    {
        $idp=$this->session->userdata('id_pegawai');
        $no=$_POST['txtid_booking'];
		$data['id_pegawai']=$idp;
		$data['tgl_pesan']=date('Y-m-d');
		$data['nama_pemesan']=$_POST['nama_pemesan'];
		
		if($this->model_booking->mdl_editbooking($no,$data)){
            $datad['id_booking']=$_POST['txtid_booking'];
			$datad['tgl_pakai']=$_POST['tgl_pakai'];
			$datad['nama_matakuliah']=$_POST['nama_matakuliah'];
			$datad['nama_kelas']=$_POST['nama_kelas'];
			$datad['nama_lab']=$_POST['nama_lab'];
			$datad['jam_mulai']=$_POST['jam_mulai'];
			$datad['jam_selesai']=$_POST['jam_selesai'];
			
			$this->model_booking->mdl_editbooking_detail($datad);
			
            redirect('booking?msg=Completely changed');
        }
        else
        {
            redirect('booking?msg=Update failed');
        }
    }
    
    public function viewdetail()
    {
        $this->session->userdata('id_pegawai');
        $data['booking'] = $this->model_booking->ambildetail();
        $this->template->load('template','viewdetail',$data);
    }
    public function deletebooking()
    {
    $this->model_booking->mdl_deletebooking();
    redirect('booking?msg=Data Berhasil Dihapus');  
    }
    
    public function listbook()
    {
		$idp=$this->session->userdata('id_pegawai');
		$data['list']=$this->model_booking->ambildata($idp);
		$this->template->load('template','listbook',$data);
	}
}
/**
 * @author Lirhays
 * @copyright 2014
 */ 

?>