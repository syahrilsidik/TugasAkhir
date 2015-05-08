<?php
Class model_keluhan extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }
    
    public function get_datakeluhan($idp)
    {	
        $query=$this->db->query('SELECT tb_headerkeluhan.id_keluhan, tb_headerkeluhan.id_pegawai, tb_headerkeluhan.tgl_keluhan, tb_headerkeluhan.`status`, tb_headerkeluhan.pengerjaan, tb_pegawai.id_lab, tb_lab.nama_lab FROM tb_headerkeluhan INNER JOIN tb_pegawai ON tb_headerkeluhan.id_lab = tb_pegawai.id_lab INNER JOIN tb_lab ON tb_pegawai.id_lab = tb_lab.id_lab ');
        return $query->result_array();
    }
	
	public function keluhandetail()
	{
		$idk = $_GET['id'];
		
		$qur=$this->db->query("SELECT tb_headerkeluhan.id_keluhan, tb_headerkeluhan.id_pegawai, tb_headerkeluhan.tgl_keluhan, tb_headerkeluhan.`status`, tb_headerkeluhan.pengerjaan, tb_detailkeluhan.keluhan, tb_pegawai.id_lab, tb_pegawai.nama_pegawai, tb_lab.nama_lab FROM tb_headerkeluhan INNER JOIN tb_detailkeluhan ON tb_headerkeluhan.id_keluhan = tb_detailkeluhan.id_keluhan INNER JOIN tb_pegawai ON tb_headerkeluhan.id_lab = tb_pegawai.id_lab INNER JOIN tb_lab ON tb_pegawai.id_lab = tb_lab.id_lab where tb_headerkeluhan.id_keluhan = '$idk'");
		
		return $qur->result_array();
	}
	
	public function get_datalab()
    {
        $qr=$this->db->get('tb_lab');
        
        return $qr->result();
    }
    
 	public function mdl_addkeluhan($pid)
    {
        
        $detail = $this->input->post('detail');
                 $data['id_keluhan']        = $this->input->post('txtid_keluhan');
                 $data['id_lab']            = $this->input->post('txtlab');
				 $data['id_pegawai']        = $pid;
                 $data['tgl_keluhan']   = date('Y-m-d');
  				 $data['Status']            = $this->input->post('txtstatus');
				 $data['pengerjaan'] = 'Belum Dikerjakan';
        $this->db->insert('tb_headerkeluhan',$data);
        
        $idkeluh = $data['id_keluhan'];
     
        foreach($detail as $details)
        {
            $datad['id_keluhan'] = $idkeluh;
            $datad['keluhan'] = $details['keluhan'];
        
            $this->db->insert('tb_detailkeluhan',$datad);
        }
    
    }
    
    public function mdl_deletekeluhan()
    {
        $idk = $_GET['id'];
        
        $wery = $this->db->query("
        DELETE FROM tb_headerkeluhan, tb_detailkeluhan
USING tb_headerkeluhan, tb_detailkeluhan
WHERE tb_headerkeluhan.id_keluhan = tb_detailkeluhan.id_keluhan  AND
      tb_headerkeluhan.id_keluhan = '$idk'");
    }
	
	public function editkeluhan()
	{
		$idk = $this->input->post('id');
		$pengerjaan = $this->input->post('selPrior');
		
		$wq= $this->db->query("UPDATE tb_headerkeluhan SET pengerjaan = '$pengerjaan' WHERE id_keluhan = '$idk' ");
	}
	
	public function mhsadd()
	{
                 $data['id_keluhanmhs']    = $this->input->post('idkeluh');
				 $data['nama_mhs']     = $this->input->post('nama_mhs');
                 $data['kelas']         = $this->input->post('kelas');
				 $data['lab']        	= $this->input->post('lab');
                 $data['tgl_keluhan']   = date('Y-m-d');
  				 $data['status']        = $this->input->post('txtstatus');
				 $data['keluhan']       = $this->input->post('keluhan');
				 $data['pengerjaan'] 	= 'Belum Dikerjakan';
        $this->db->insert('tb_keluhanmhs',$data);
   	}
	public function get_kelmhs()
	{
		$query=$this->db->query("select * from tb_keluhanmhs");
		
		return $query->result_array();
	}
	public function get_kelmhsdetail()
	{
		$id=$_GET['id'];
		$query=$this->db->query("select * from tb_keluhanmhs where id_keluhanmhs = '$id'");
		
		return $query->result_array();
	}
	public function get_kelmhsedit()
	{
		$id=$_GET['id'];
		$query=$this->db->query("select * from tb_keluhanmhs where id_keluhanmhs = '$id'");
		
		return $query->result_array();
	}
	public function savekelmhsedit()
	{
		$id = $this->input->post('id');
		$pengerjaan = $this->input->post('selPrior');
		
		$wq= $this->db->query("UPDATE tb_keluhanmhs SET pengerjaan = '$pengerjaan' WHERE id_keluhanmhs = '$id' ");
	}
	public function mdl_deletekeluhanmhs()
    {
        $idk = $_GET['id'];
        
        $wery = $this->db->query("
        DELETE FROM tb_keluhanmhs where id_keluhanmhs = '$idk'");
    }
}
/**
 * @author Lirhays
 * @copyright 2014
 */ 

?>