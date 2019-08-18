<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class modDetailPenyetoran extends CI_Model{
    public function Insert($data){
        $res = $this->db->insert_batch('detailPenyetoran', $data);
        return $res; 
    }
 
    public function Update($data, $where){
        $res = $this->db->update('detailPenyetoran', $data, $where); 
        return $res;
    }
 
    public function Delete($where){
        $res = $this->db->delete('detailPenyetoran', $where); 
        return $res;
    }
    public function GetWhere($data){ //mengembalikan satu akun dengan no = data
        $res=$this->db->get_where('detailPenyetoran', $data);
        return $res->result_array();
    }
}
?>