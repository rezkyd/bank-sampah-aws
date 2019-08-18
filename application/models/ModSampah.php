<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class modSampah extends CI_Model{
    var $tabel = "sampah";
    var $query;

    public function GetSemuaSampah(){
        $this->query=$this->db->get($this->tabel); 
        return $this->query->result_array(); 
    }
 
    public function GetWhere($data){ //mengembalikan satu akun dengan no = data
	    $this->query=$this->db->get_where($this->tabel, $data);
	    return $this->query->result_array();
	}

    //mengambil kode sampah yang ada
	public function GetKodeSampah(){
        $this->db->order_by('kodeSampah','ASC');
        $kode= $this->db->get($this->tabel);
        return $kode->result_array();
    }

    //mengambil harga jual
    function GetHargaSampah($kode){
        $this->query=$this->db->query("SELECT hargaJual FROM sampah WHERE kodeSampah='$kode'");
        return $this->query->row_array();
    }

    function GetJenisSampah($kode){
        $this->query=$this->db->query("SELECT jenisSampah FROM sampah WHERE kodeSampah='$kode'");
        return $this->query->row_array();
    }
}
?>