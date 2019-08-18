<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class modJemput extends CI_Model{
    var $query ;
    var $tabel;

    public function GetSemuaJemput(){
        $this->tabel = 'jemputsampah';
        $this->query=$this->db->get( $this->tabel);
        return $this->query->result_array(); 
    }
    
    public function InsertPenjemputan($data){
        $this->tabel = 'jemputsampah';
        $this->query = $this->db->insert( $this->tabel, $data);
        return $this->query;
    }
    public function tambahStatus($data){
        $this->tabel = 'detailstatus';
        $this->query = $this->db->insert( $this->tabel, $data);
        return $this->query; 
    }

    public function UpdatePenjemputan($data, $where){
        $this->tabel = 'jemputsampah';
        $this->query = $this->db->update( $this->tabel, $data, $where); 
        return $this->query;
    }

    public function GetWhere($data){ //mengembalikan satu akun dengan no = data
        $this->tabel = 'jemputsampah';
	    $this->query=$this->db->get_where( $this->tabel, $data);
	    return $this->query->result_array();
	}

    public function countData($data){ //mengembalikan satu akun dengan no = data
        $this->tabel = 'jemputsampah';
        $this->query=$this->db->get_where( $this->tabel, $data);
        $result = $this->query->num_rows();
        return (int)$result;
    }

    public function lacakPesanan($data){ //mengembalikan satu akun dengan no = data
        $this->tabel = 'detailstatus';
        $this->query=$this->db->get_where( $this->tabel, $data);
        return $this->query->result_array();
    }

    public function getKodePenjemputan()
    {
        $q = $this->db->query("select MAX(RIGHT(idJemput,3)) as kode from jemputsampah");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "J".$kd;
    }

    public function kodePenjemputanTerbaru($username)
    {
        $q = $this->db->query("select MAX(RIGHT(idJemput,3)) as kode from jemputsampah where username LIKE '". $username."'");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kode);
                $kd = sprintf("%03s", $tmp);
            }
        }
        return "J".$kd;
    }
}
?>