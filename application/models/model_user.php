<?php
class model_user extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_alluser()
	{
		$g=$this->db->get('tb_pegawai');
		
		return $g->result_array();
		foreach($g as $r){
		echo $r;
		}
	}
	public function get_user()
	{ $id=$_GET['id'];
		$this->db->where(array('id_pegawai'=>$id));
		$g=$this->db->get('tb_pegawai');
		
		return $g->result_array();
	}
	public function get_datakelas()
	{
		$g=$this->db->get('tb_kelas');
		
		return $g->result_array();
	}
	
	public function mdl_add($data)
	{		
	$this->db->insert('tb_pegawai',$data);
	}
	
	public function mdl_save($data)
	{ $id=$data['id_pegawai'];
		$this->db->where(array('id_pegawai'=>$id));
		return $this->db->update('tb_pegawai',$data);
		
		return $g->result_array();
	}
	
	public function delus()
	{
			$id=$_GET['id'];
		 $wery = $this->db->query("
        DELETE FROM tb_pegawai where id_pegawai = '$id'");
	}
}
?>