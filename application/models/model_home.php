<?php

Class model_home extends CI_model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_datapegawai($idp)
    {
		$this->db->where(array('id_pegawai'=>$idp));
		$query = $this->db->get('tb_pegawai');
        return $query->result_array();
    }
}
/**
 * @author Lirhays
 * @copyright 2014
 */



?>