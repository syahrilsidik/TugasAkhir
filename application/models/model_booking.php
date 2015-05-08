<?php
Class model_booking extends CI_Model
{
    public function __constuct()
    {
        parent::__construct();
    }
    
    public function ambil_booking()
    {
    	$query=$this->db->query("select * from jadwalku");
        
        return $query->result_array();
    }
    
    public function ambildata($idp)
    {	
    	//$vari
    	//if($idp!="HHS")
		$query=$this->db->query("
		SELECT
		tb_pegawai.nama_pegawai,
		tb_detailbooking.tgl_pakai,
		tb_lab.nama_lab,
		tb_kelas.nama_kelas,
		tb_dosen.NamaDosen,
		tb_detailbooking.idMatkul,
		tb_detailbooking.`start`,
		tb_detailbooking.`end`,
		tb_detailbooking.title,
		tb_detailbooking.status
		FROM
		tb_headerbooking
		INNER JOIN tb_detailbooking ON tb_headerbooking.id_booking = tb_detailbooking.id_booking
		INNER JOIN tb_pegawai ON tb_headerbooking.id_user = tb_pegawai.id_pegawai
		INNER JOIN tb_lab ON tb_lab.id_lab = tb_detailbooking.id_lab
		INNER JOIN tb_kelas ON tb_detailbooking.id_kelas = tb_kelas.id_kelas
		INNER JOIN tb_dosen ON tb_detailbooking.id_dosen = tb_dosen.idDosen
		WHERE
		tb_headerbooking.id_user = '$idp'
		");
		
		
        return $query->result_array();
	}
        
	public function addbooking($idp)
	{
		$detail = $this->input->post('detail');
				$data['id_booking'] 		= $this->input->post('idb');
				$data['id_user']         = $idp;
				$data['tgl_pesan']			= date('Y-m-d');
				
        $this->db->insert('tb_headerbooking',$data);
     
        foreach($detail as $details)
        {	$datad['id_booking'] 				= $this->input->post('idb');
            $datad['tgl_pakai'] = $details['tgl'];
			$datad['id_lab'] = $details['lab'];
			$datad['id_kelas'] = $details['kelas'];
			$datad['id_dosen'] = $details['dosen'];
			$datad['idMatkul'] = $details['matkul'];
			$datad['start'] = $details['start'];
			$datad['end'] = $details['end'];
			$datad['title'] = $details['ket'];
        
            $this->db->insert('tb_detailbooking',$datad);
        }
	}
    public function get_datalab()
    {
        $qr=$this->db->get('tb_lab');
        
        return $qr->result_array();
    }
    public function get_datakelas()
    {
        $qr=$this->db->get('tb_kelas');
        
        return $qr->result_array();
    }
    public function ambildetail ()
    {
        $idk = $_GET['id'];
		
		$qur=$this->db->query("select a.id_booking, a.tgl_pesan,a.nama_pemesan, b.tgl_pakai, b.nama_matakuliah,b.nama_kelas,b.jam_mulai,b.jam_selesai,b.nama_lab from  tb_headerbooking a INNER JOIN tb_detailbooking b on b.id_booking = a.id_booking where a.id_booking = '$idk'");
		
		return $qur->result_array();
    }
    
    public function mdl_editbooking($no,$data)
    {
        $this->db->where(array('id_booking'=>$no));
        return $this->db->update('tb_headerbooking',$data);
    }
    
    public function mdl_editbooking_detail($datad,$no_detail)
    {
        $this->db->where(array('id_booking'=>$datad["id_booking"]));
        return $this->db->update('tb_detailbooking',$datad);
    }
    
    public function mdl_deletebooking()
    {
        $idk = $_GET['id'];
        
        $wery = $this->db->query("
        DELETE FROM tb_headerbooking, tb_detailbooking
USING tb_headerbooking, tb_detailbooking
WHERE tb_headerbooking.id_booking = tb_detailbooking.id_booking  AND
      tb_headerbooking.id_booking = '$idk'");
    }
}
/**
 * @author Lirhays
 * @copyright 2014
 */ 

?>