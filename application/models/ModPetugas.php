<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class modPetugas extends CI_Model{
    var $tabel = "petugas";
    var $query;
    var $kode ;

    public function GetSemuaPetugas(){
        $this->query=$this->db->get($this->tabel); // Kode ini berfungsi untuk memilih tabel yang akan ditampilkan
        return $this->query->result_array(); // Kode ini digunakan untuk mengembalikan hasil operasi $res menjadi sebuah array
    }
 
    public function InsertAkun($data){
        $this->query = $this->db->insert($this->tabel, $data);
        return $this->query; 
    }
 
    public function DeleteAkun($username){
        $this->query = $this->db->delete($this->tabel, $username); 
        return $this->query;
    }
    public function UpdateAkun($data, $where){
        $this->query = $this->db->update($this->tabel, $data, $where); 
        return $this->query;
    }

    public function GetWhere($data){ //mengembalikan satu akun dengan no = data
        $this->query=$this->db->get_where($this->tabel, $data);
        return $this->query->result_array();
    }

    public function cekData($user, $pass) {
        $cekAdmin = $this->db->get_where($this->tabel, array('username' => $user, 'password' => $pass));
        if ($cekAdmin->num_rows() > 0) {
            return $cek = 1;
        } else {
            return $cek = 0; 
        }
    }

    function getKodeUsername($tipe){
        $q = $this->db->query("select MAX(RIGHT(username,3)) as kode from petugas ");
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kode)+1;
                $this->kode = sprintf("%03s", $tmp);
            }
        }else{
            $this->kode = "001";
        }
        
        return "P".$this->kode;    
    }
}
?>