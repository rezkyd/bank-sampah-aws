<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class modPenarikan extends CI_Model{
    var  $tabel = "penarikan";
    var $query;
    var $kode ;
   
    public function GetSemuaPenarikan(){
        $this->query=$this->db->get($this->tabel); 
        return $this->query->result_array(); 
    }
 
    public function Insert($data){
        $this->query = $this->db->insert($this->tabel, $data);
        if($this->query > 0 ){
            return $status = TRUE;
        }else {
            return $status = FALSE;
        }
    }
 
    public function Update( $data, $noNota){
        $this->query = $this->db->update($this->tabel, $data, $noNota); 
        return $this->query;
    }
 
    public function Delete($noNota){
        $this->query = $this->db->delete($this->tabel, $noNota); 
        return $this->query;
    }

    public function GetWhere($data){ //mengembalikan satu akun dengan no = data
	    $this->query=$this->db->get_where($this->tabel, $data);
	    return $this->query->result_array();
	}

    public function getKodePenarikan()
    {
        $q = $this->db->query("select MAX(RIGHT(noNota,3)) as kode from penarikan");
        $this->kode = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kode)+1;
                $this->kode = sprintf("%03s", $tmp);
            }
        }else{
            $this->kode = "001";
        }
        return "D".$this->kode;
    }
}
?>