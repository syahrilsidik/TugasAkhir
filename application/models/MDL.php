<?php

class MDL extends CI_Model
{
    function addPegawai()
    {
        $this->load->database();
        $data = array (
            'id_pegawai' => $this->input->post('txt_idPegawai'),
            'nama_pegawai' => $this->input->post('txt_namaPegawai'),
            'tgl_masuk' => $this->input->post('txt_tglMasuk'),
            'jurusan' => $this->input->post('txt_Jurusan')
            );
        $this->db->insert('pegawai',$data);
    }
    
    function getLab()
    {
        $this->load->database();
        $sql=$this->db->query("select * from tb_lab");
        return $sql->result();
    }
    function getPegawai()
    {
        $this->load->database();
        $sql=$this->db->query("select * from tb_pegawai");
        return $sql->result();
    }
    
    function login($username, $password)
    {
        $this -> db -> select('username, password','id_pegawai');
        $this -> db -> from('tb_user');
        $this -> db -> where('username', $username);
        $this -> db -> where('password', $password);
        $this -> db -> limit(1);

        $query = $this -> db -> get();

         if($query -> num_rows() == 1)
         {
            return $query->result();
            }
            else
            {
                return false;
                }
         }
   
}
/**
 * @author Lirhays
 * @copyright 2014
 */



?>