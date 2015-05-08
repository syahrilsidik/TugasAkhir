<?php
Class model_absensi extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }
	 
	public function get_detailabsensi()
    {
		$idp=$_GET['id'];
        $query=$this->db->query("SELECT
tb_headerabsensi.`no`,
tb_headerabsensi.id_pegawai,
tb_headerabsensi.tgl_masuk,
tb_headerabsensi.jam_datang,
tb_headerabsensi.jam_pulang,
tb_detailabsensi.`no_detailabsensi`,
tb_detailabsensi.jam_mulai,
tb_detailabsensi.jam_selesai,
tb_detailabsensi.kegiatan,
tb_detailabsensi.lab,
tb_detailabsensi.uraian
FROM
tb_detailabsensi
INNER JOIN tb_headerabsensi ON tb_headerabsensi.`no` = tb_detailabsensi.`no` AND tb_headerabsensi.tgl_masuk = tb_detailabsensi.tgl_masuk
WHERE
tb_headerabsensi.no = '$idp'
");
        
        return $query->result_array();
    }
	
	public function record_count($idp) {
         $this->db->from('tb_headerabsensi');
         $this->db->like('id_pegawai',$idp);
         return $this->db->count_all_results(); 
    }
 
    public function fetch_account($limit, $start, $idp) {
        $this->db->like('id_pegawai',$idp);
        $this->db->order_by('tgl_masuk');
        $this->db->limit($limit, $start);
        $query = $this->db->get('tb_headerabsensi');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
   public function get_absensi()
   {
        $this->db->get('tb_headerabsensi');
   }
	
	public function mdl_addabsen($idp)
    {
        
        $detail = $this->input->post('detail');
				$data['no'] 				= $this->input->post('no');
				$data['id_pegawai']          = $idp;
                $data['tgl_masuk']       = $this->input->post('txttanggal');
                $data['jam_datang']        = $this->input->post('jamdatang');
				$data['jam_pulang']        = $this->input->post('jampulang');
        $this->db->insert('tb_headerabsensi',$data);
     
        foreach($detail as $details)
        {	$datad['no'] 				= $this->input->post('no');
            $datad['tgl_masuk'] = $this->input->post('txttanggal');
            $datad['jam_mulai'] = $details['jammulai'];
			$datad['jam_selesai'] = $details['jamselesai'];
			$datad['kegiatan'] = $details['kegiatan'];
			$datad['lab'] = $details['ruang'];
			$datad['uraian'] = $details['uraian'];
        
            $this->db->insert('tb_detailabsensi',$datad);
        }
	}
	
	public function mdl_editabsensi($no,$data)
	{
        $this->db->where(array('no'=>$no));
        return $this->db->update('tb_headerabsensi',$data);
    }
    
    public function mdl_editabsensi_detail($datad,$no_detail)
    {
        $this->db->where(array('no_detailabsensi'=>$no_detail,'no'=>$datad["no"]));
        return $this->db->update('tb_detailabsensi',$datad);
    }
    public function mdl_deleteabsensi()
    {
        $idk = $_GET['id'];
        
        $wery = $this->db->query("
        DELETE FROM tb_headerabsensi, tb_detailabsensi
USING tb_headerabsensi, tb_detailabsensi
WHERE tb_headerabsensi.no = tb_detailabsensi.no  AND
      tb_headerabsensi.no = '$idk'");
    }
}
/**
 * @author Lirhays
 * @copyright 2014
 */ 

?>