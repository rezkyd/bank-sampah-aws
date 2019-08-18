<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class modPenyetoran extends CI_Model{
    var $query ;
    var $kode ;
    var $tabel;
   
    public function GetPenyetoran(){
        $this->tabel = 'penyetoran';
        $this->query=$this->db->get($this->tabel); 
        return $this->query->result_array();
    }
 
    public function InsertTransaksi($data){
        $this->tabel = 'penyetoran';
        $this->query = $this->db->insert($this->tabel, $data);
        return $this->query; 
    }
    
    public function InsertDetail($data){
        $this->tabel = 'detailPenyetoran';
        $this->query = $this->db->insert_batch($this->tabel, $data);
        return $this->query; 
    }
 
    public function DeleteTransaksi($noNota){
        $this->tabel = 'penyetoran';
        $this->query = $this->db->delete($this->tabel, $noNota); 
        return $this->query;
    }

    public function DeleteDetail($noNota){
        $this->tabel = 'detailPenyetoran';
        $this->query = $this->db->delete($this->tabel, $noNota); 
        return $this->query;
    }

    public function GetWhere($data){ //mengembalikan satu akun dengan no = data
        $this->tabel = 'penyetoran';
	    $this->query=$this->db->get_where($this->tabel, $data);
	    return $this->query->result_array();
	}

    public function GetWhereDetail($data){ 
        $this->tabel = 'detailPenyetoran';
        $this->query=$this->db->get_where($this->tabel, $data);
        return $this->query->result_array();
    }

    public function getKodePenyetoran()
    {
        $q = $this->db->query("select MAX(RIGHT(noNota,3)) as kode from penyetoran");
        $this->kode = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kode)+1;
                $this->kode = sprintf("%03s", $tmp);
            }
        }else{
            $this->kode = "001";
        }
        return "K".$this->kode;
    }
   
   public function UpdateStatus($data, $where){
      $this->tabel = 'penyetoran';
        $this->query = $this->db->update($this->tabel, $data, $where); 
        return $this->query;
    }
}
?>