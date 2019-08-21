<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class modBukuTabungan extends CI_Model{
    private $database = "bukutabungan";
    private $query = "";

    public function InsertTransaksi($data){
        $this->query = $this->db->insert($this->database, $data);
        if($this->query > 0 ){
            return $status = TRUE;
        }else {
            return $status = FALSE;
        }
    }
 
    public function UpdateBuku($data, $where){
        $this->query = $this->db->update($this->database, $data, $where); 
        return $this->query;
    }
 
    public function DeleteTransaksi($noNota){
         $this->query = $this->db->delete($this->database, $noNota); 
        return $this->query;
    }

    public function GetWhere($data){ //mengembalikan satu akun dengan no = data
        $this->query=$this->db->get_where($this->database, $data);
	    return $this->query->result_array();
	}
 
}
?>