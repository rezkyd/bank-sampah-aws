<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sampah extends CI_Controller
{   
	function __construct() {
        parent::__construct();
        $this->load->model('modSampah');
        $this->load->model('modPetugas');
    }
    public function index(){
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
            $this->load->driver('cache');
            if (!$data = $this->cache->memcached->get('sampah')){
                $dataSampah = $this->modSampah->GetSemuaSampah();
                $data = array('dataSampah' => $dataSampah,
                            'tabAdmin' => 5);
                $this->cache->memcached->save('sampah',$data, 60);
            }
            
            $this->load->view('petugas/pages/v_headerAdmin', $data);
            $this->load->view('petugas/v_lihatSampah', $data);
            $this->load->view('petugas/pages/v_footerAdmin');
        }else {
            ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }   
    }  
        
	public function getKode() {
        $data=array('select_option'=> $this->modSampah->getKode());  
        $this->load->view('my_view', $data);
	}

    function getHarga(){
        $kodeSampah=$this->input->post('kodeSampah');
        $sampah = $this->modSampah->GetWhere(array('kodeSampah' => $kodeSampah));
        $data=array(
            'hargaJual'=> $akun[0]['hargaJual'],
        );
        $this->load->view('petugas/ajaxDetailPenarikan',$data);
    }
}