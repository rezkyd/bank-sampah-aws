<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah extends CI_Controller {   

    function __construct() {
        parent::__construct();
        $this->load->model('modNasabah');
        $this->load->model('modBukuTabungan');
        $this->load->model('modSampah');
        $this->load->model('modJemput');
        $this->load->model('modPenyetoran');
        $this->load->driver('cache');
    }
    
    public function profilNasabah(){
        $cek = $this->modNasabah->cekData($this->session->userdata('username'),$this->session->userdata('password'));
		
        if ($cek > 0) {          
            if (!$data = $this->cache->memcached->get('profil')){
                $akun = $this->modNasabah->GetWhere(array('username' => $this->session->userdata('username')));
                $dataPesanan = $this->modJemput->GetWhere(array('username' => $this->session->userdata('username')));
                $data = array(
                    'nama' => $akun[0]['nama'],
                    'username' => $akun[0]['username'],
                    'alamat' => $akun[0]['alamat'],
                    'tipeNasabah' => $akun[0]['tipeNasabah'],
                    'email' => $akun[0]['email'],
                    'saldo' => $akun[0]['saldo'],
                    'tabNasabah' => 1,
                    'dataPesanan' => $dataPesanan
                );
                $this->cache->memcached->save('profil',$data, 60);
            }	
            $this->load->view('nasabah/v_headerNasabah', $data);
            $this->load->view('nasabah/v_profilNasabah', $data);
            $this->load->view('nasabah/v_footerNasabah');
        }else{
            ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }
    }
    
    public function bukuTabungan() {
        $cek = $this->modNasabah->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
            if (!$data = $this->cache->memcached->get('tabungan')){
                $user = $this->modNasabah->GetWhere(array('username' => $this->session->userdata('username')));            
                $dataBuku = $this->modBukuTabungan->GetWhere(array('username' => $this->session->userdata('username')));
                $data = array('dataBuku' => $dataBuku,
                        'username' => $user[0]['username'],
                        'nama' => $user[0]['nama'],
                        'saldoAkhir' => $user[0]['saldo'],
                        'tabNasabah' => 2
                    );
                $this->cache->memcached->save('tabungan',$data, 60);
            }
            
            $this->load->view('nasabah/v_headerNasabah', $data);
            $this->load->view('nasabah/v_bukuTabungan', $data);
            $this->load->view('nasabah/v_footerNasabah');
        }else{
            ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }
    }

    public function jemputSampah(){
        $cek = $this->modNasabah->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
            $dataPesanan = $this->modJemput->GetWhere(array('username' => $this->session->userdata('username')));            
            $latestOrder ='';
            
            if($dataPesanan != NULL){
                $latestOrder = $this->modJemput->kodePenjemputanTerbaru($this->session->userdata('username'));
                $getLatestOrder = $this->modJemput->GetWhere(array('idJemput' =>$latestOrder));
                $newOrder = '';
                if($getLatestOrder > 0 ){
                    $latestStat = $getLatestOrder[0]['status'];
                    
                    if($latestStat == 'Selesai' || $latestStat == 'Penjemputan Ditolak'){
                        $newOrder = 'y';
                    }else {
                        $newOrder = 'n';
                    }
                }
            }else{
                $newOrder = 'y';
            }
            
            if (!$data = $this->cache->memcached->get('dataJemput')){
                $data = array('tabNasabah' => 3, 
                            'dataPesanan' => $dataPesanan,
                            'newOrder' => $newOrder,
                            'latestOrder' => $latestOrder
                             );
                $this->cache->memcached->save('dataJemput',$data, 60);
            }
            $this->load->view('nasabah/v_headerNasabah', $data);
            $this->load->view('nasabah/v_jemputSampah', $data);
            $this->load->view('nasabah/v_footerNasabah');
        }else {
            ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }     
    }
    public function buatJemput(){
        $cek = $this->modNasabah->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {            
             $data = array( 'tabNasabah' => 3,
                            'idJemput'=> $this->modJemput->getKodePenjemputan()
                           
                        );
            $this->load->view('nasabah/v_headerNasabah', $data);
            $this->load->view('nasabah/v_buatJemputSampah', $data);
            $this->load->view('nasabah/v_footerNasabah');
        }else {
            ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }     
    }

    public function insertJemput(){
        $cek = $this->modNasabah->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
            $data = array(
                'idJemput' => $this->input->post('idJemput'),
                'username' => $this->input->post('username'),
                'HP' => $this->input->post('HP'),
                'alamat' => $this->input->post('alamat'),
                'latitude' => $this->input->post('lati'),
                'longitude' => $this->input->post('longi'),
                'tanggalJemput' => $this->input->post('tanggal'),
                'kloter' => $this->input->post('kloter'),
                'status' => 'Menunggu Konfirmasi'
                
            );
            $insertPenjemputan = $this->modJemput->InsertPenjemputan($data);

            $dataStatus = array(
                'idJemput' => $this->input->post('idJemput'),
                'username' => $this->input->post('username'),
                'status' => 'Menunggu Konfirmasi'
            );
            $insertStatus = $this->modJemput->tambahStatus($dataStatus);
            
            if ($insertPenjemputan >0 ){
                ?>
                <script type="text/javascript">
                    alert("Pesanan Jemput Sampah Berhasil Dibuat!");
                    window.location = "<?php echo site_url("nasabah/profilNasabah") ?>"
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript">
                    alert("Pesana Jemput Sampah Tidak Tersimpan!");
                    window.location = "<?php echo site_url("nasabah/profilNasabah") ?>"
                </script>
                <?php
            }
            redirect(site_url('nasabah/jemputSampah'),'refresh');
        }else {
            ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }
    }

    public function lacakPesanan($idJemput){
        $cek = $this->modNasabah->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if($cek >0){
            if (!$data = $this->cache->memcached->get('lacak')){
                $detail = $this->modJemput->lacakPesanan(array('username' => $this->session->userdata('username'), 'idJemput' =>$idJemput));
                $pesanan = $this->modJemput->GetWhere(array('username' => $this->session->userdata('username'), 'idJemput' =>$idJemput));
                $data = array(
                    'dataDetail' => $detail,
                    'username' => $pesanan[0]['username'],
                    'idJemput' => $idJemput,
                    'tanggalJemput' => $pesanan[0]['tanggalJemput'],
                    'tabNasabah' => 3,
                    'driver' => $pesanan[0]['driver'],
                    'noHPDriver' => $pesanan[0]['nohpDriver'],
                );
                $this->cache->memcached->save('lacak',$data, 60);
            }

            $this->load->view('nasabah/v_headerNasabah', $data);
            $this->load->view('nasabah/v_lacakPesanan', $data); 
            $this->load->view('nasabah/v_footerNasabah');
        }else {
            ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }  
        
    }

    function ubahPassword() {
        $cek = $this->modNasabah->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
            $tipe = $this->session->userdata('tipe');
            $data = array ('title' => 'Ubah Password',
                            'tabNasabah' => 5,
                            'password' => $this->session->userdata('password'),
                            'tipe' => $tipe); 
            
            $this->load->view('nasabah/v_headerNasabah', $data);
            $this->load->view('nasabah/v_ubahPassword', $data);
            $this->load->view('nasabah/v_footerNasabah');
        }else{
            ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }
    }

    public function lihatPenyetoran(){
        $cek = $this->modNasabah->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if($cek >0){
            if (!$data = $this->cache->memcached->get('penyetoran')){
                $dataPenyetoran = $this->modPenyetoran->GetWhere(array('username' => $this->session->userdata('username')));
                $data = array(
                'dataPenyetoran' => $dataPenyetoran,
                'tabNasabah' => 4
            );
                $this->cache->memcached->save('penyetoran',$data, 60);
            }
            $this->load->view('nasabah/v_headerNasabah', $data);
            $this->load->view('nasabah/v_cekPenyetoran', $data);
            $this->load->view('nasabah/v_footerNasabah');
        }else{
            ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }   
    }

     public function cekDetailPenyetoran($no){
        $cek = $this->modNasabah->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if($cek >0){
            $detail = $this->modPenyetoran->GetWhereDetail(array('noNota' => $no));
            $dataPenyetoran = $this->modPenyetoran->GetWhere(array('noNota' => $no));
            
            if($dataPenyetoran[0]['status'] == 1){
                $status = 'Terverifikasi';
            }else{
                $status = 'Belum Diverifikasi';
            }
            $data = array(
                'noNota' => $detail[0]['noNota'],
                'username' => $detail[0]['username'],
                'kredit' => $dataPenyetoran[0]['kredit'],
                'tanggal' => $dataPenyetoran[0]['tanggal'],
                'data' => $detail,
                'tabNasabah' => 4,
                'status' => $status
            );

            $this->load->view('nasabah/v_headerNasabah', $data);
            $this->load->view('petugas/v_detailPenyetoran', $data); 
            $this->load->view('nasabah/v_footerNasabah');
        }else {
           ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }  
        
    }
     
 }