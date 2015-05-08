<?php

class model_login extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getjabatan($data)
    {
        $this ->db-> select('*');
        $this ->db-> from('tb_pegawai');
        $this ->db-> where(array('id_pegawai'=>$data['id_pegawai']));
        $query = $this -> db -> get();
        
        return $query -> result_array();
    }
    public function nama($data)
    {
        $this ->db-> select('*');
        $this ->db-> from('tb_pegawai');
        $this ->db-> where(array('id_pegawai'=>$data['id_pegawai']));
        $quer = $this -> db -> get();
        
        return $quer -> result_array();
    }
    
    public function ceklogin($data = null)
    {
        if($data != null)
        {
            $where = array('id_pegawai' => $data['id_pegawai'],'password' => $data['password']);
            $query = $this -> db -> where($where);
            $query = $this -> db -> get('tb_pegawai');
            if  ($query -> num_rows() > 0)
            {
                return $query -> result_array();
            }         
        }
    }
} 
/**
 * @author Lirhays
 * @copyright 2014
 */



?>