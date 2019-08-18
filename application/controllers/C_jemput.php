    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_jemput extends CI_Controller {   

    function __construct() {
        parent::__construct();
        $this->load->model('modJemput');
        $this->load->model('modNasabah');
        $this->load->model('modPetugas');
        $this->load->model('modPenyetoran');
    }

    public function semuaJadwalPenjemputan() {
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
            $jadwal = $this->modJemput->GetSemuaJemput();
            $date = date('Y-m-d');
            
            $tipe = $this->session->userdata('tipe');
            $dataAdmin = array(
                    'jadwal' => $jadwal,
                    'tabAdmin' => 8,
                    'tipe' => $tipe);
                $this->load->view('petugas/pages/v_headerAdmin', $dataAdmin);
                $this->load->view('petugas/v_lihatJemput', $dataAdmin);
                $this->load->view('petugas/pages/v_footerAdmin');
        }else{
            ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }
    }

    //Jadwal berdasarkan status
     public function jadwalPenjemputan($status) {
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
            $stat = str_replace("%20"," ",$status);
            $dataJadwal = $this->modJemput->GetWhere(array('status' => $stat));
            $jadwalMenunggu = $this->modJemput->GetWhere(array('status' => 'Menunggu Penjemputan'));
            $jadwalMenjemput = $this->modJemput->GetWhere(array('status' => 'Menjemput Pesanan'));
            
            $tipe = $this->session->userdata('tipe');
            $date = date('Y-m-d');
                
            $dataAdmin = array(
                    'jadwal' => $dataJadwal,
                    'tabAdmin' => 8,
                    'tipe' => $tipe,
                    'stat' => $stat
                );

            $dataDriver = array(
                    'jadwalMenunggu' => $jadwalMenunggu,
                    'jadwalMenjemput' => $jadwalMenjemput,
                    'tabDriver' =>3,
                    'tipe' => $tipe,
                    'date' => $date,
                    'stat' => $stat,
                    'jadwal' => ''
                    );

            if($tipe == 'Admin'){
                $this->load->view('petugas/pages/v_headerAdmin', $dataAdmin);
                $this->load->view('petugas/v_lihatJemput', $dataAdmin);
                $this->load->view('petugas/pages/v_footerAdmin');
            }else if ($tipe == 'Driver'){
                $this->load->view('petugas/pages/v_headerDriver',$dataDriver);
                $this->load->view('petugas/v_jadwalPenjemputanDriver', $dataDriver);
                $this->load->view('petugas/pages/v_footerAdmin'); 
            }           
        }else{
            ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }
    }


    //Jadwal Harian Driver
    public function jadwalHarian() {
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
            $date = date('Y-m-d');
            $tipe = $this->session->userdata('tipe');
            $pesan ='';
            $jadwalHari = $this->modJemput->GetWhere(array('tanggalJemput' => $date, 'status' => 'Menunggu Penjemputan'));
            $jadwalHari2 = $this->modJemput->GetWhere(array('tanggalJemput' => $date, 'status' => 'Menjemput Pesanan'));
            if($jadwalHari < 0){
                $pesan = 't';
            }else{
                $pesan = 'y';
            }    
            $dataDriver = array(
                    'jadwalMenunggu' => $jadwalHari,
                    'jadwalMenjemput' => $jadwalHari2,
                    'tabDriver' =>2,
                    'tipe' => $tipe,
                    'date' => $date,
                    'pesan' => $pesan,
                    'jadwal' => 'Harian'
                    );

            $this->load->view('petugas/pages/v_headerDriver',$dataDriver);
            $this->load->view('petugas/v_jadwalPenjemputanDriver', $dataDriver);
            $this->load->view('petugas/pages/v_footerAdmin'); 
            
        }else{
            ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }
    }

    public function detailPenjemputan($no){
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
            $akun = $this->modJemput->GetWhere(array('idJemput' => $no));
            $tipe = $this->session->userdata('tipe');

            $nextStat = '';
            if($akun[0]['status'] == 'Menunggu Konfirmasi'){
                $nextStat = 'Menunggu Penjemputan';
                $tombol = 'Terima Pesanan';
            }else if($akun[0]['status'] == 'Menunggu Penjemputan'){
                $nextStat = 'Menjemput Pesanan';
                $tombol = 'Jemput Pesanan';
            }else if($akun[0]['status'] == 'Menjemput Pesanan'){
                $tombol = 'Rekap Pesanan';
            }else if($akun[0]['status'] == 'Menunggu Verifikasi'){
                $nextStat = 'Selesai';
                $tombol = 'Verifikasi Pesanan';
            }else if($akun[0]['status'] == 'Selesai' || $akun[0]['status'] == 'Penjemputan Ditolak'){
               $tombol = 'Selesai';
            }   

            $data = array(  
                'idJemput' => $akun[0]['idJemput'],
                'username' => $akun[0]['username'],
                'HP' => $akun[0]['HP'],
                'alamat' => $akun[0]['alamat'],
                'tanggal'  => $akun[0]['tanggalJemput'],
                'latitude' => $akun[0]['latitude'],
                'longitude' => $akun[0]['longitude'],
                'waktu' => $akun[0]['waktu'],
                'kloter' => $akun[0]['kloter'],
                'status' => $akun[0]['status'],
                'nextStat' => $nextStat ,   
                'tabDriver' => 2,
                'tabAdmin' =>8,
                'tipe' => $tipe,
                'tombol' => $tombol,
                'driver' => $akun[0]['driver'],
                'nohpDriver' => $akun[0]['nohpDriver'],
                'noNota' => $akun[0]['noNota']
                );

            if($tipe == 'Admin'){
                $this->load->view('petugas/pages/v_headerAdmin', $data);
                $this->load->view('petugas/v_detailPenjemputan', $data);
                $this->load->view('petugas/pages/v_footerAdmin');
            }else if ($tipe == 'Driver'){
                $this->load->view('petugas/pages/v_headerDriver',$data);
                $this->load->view('petugas/v_detailPenjemputan', $data);
                $this->load->view('petugas/pages/v_footerAdmin'); 
            }   

        }else{
            ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }
    }

    public function updateStatus(){
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
            $status = $this->input->post('statusPengiriman');
            $idJemput  = $this->input->post('idJemput');
            $nextStat = $this->input->post('nextStat');
            $username = $this->input->post('username');
            $tipe = $this->session->userdata('tipe');
            $driver  = $this->input->post('driver');
            $noNota  = $this->input->post('noNota');
             
            $petugas = $this->modPetugas->GetWhere(array('nama' => $driver));
            if($tipe == 'Admin'){
                $updateStatus = array(
                        'status' => $nextStat,
                );
            }else if ($tipe =='Driver'){
                $updateStatus = array(
                        'status' => $nextStat,
                        'driver' => $petugas[0]['nama'],
                        'nohpDriver' => $petugas[0]['noHP'],
                );
            }  
            
            $where = array('idJemput' => $idJemput);
            //update status di penjemputan
            $res = $this->modJemput->UpdatePenjemputan($updateStatus, $where);
            
            if($nextStat == 'Selesai'){
                $statusPenyetoran = array('status' => 1);
                $where = array('noNota' => $noNota);
                $query = $this->modPenyetoran->UpdateStatus($statusPenyetoran, $where);
            }
            //insert detail status
            if($status == 'Menunggu Konfirmasi'){
                $insertStatus = $this->modJemput->tambahStatus(array(
                                                            'idJemput' => $idJemput,
                                                            'username' => $username,
                                                            'status' => 'Pesanan Diterima'));
            }
            $insertStatus = $this->modJemput->tambahStatus(array(
                                                            'idJemput' => $idJemput,
                                                            'username' => $username,
                                                            'status' => $nextStat ));
            
            if ($updateStatus >0 ){
                if($tipe == 'Admin'){
                    ?>
                    <script type="text/javascript">
                        alert("Status berhasil diubah!");
                        window.location = "<?php echo site_url('c_jemput/detailPenjemputan/'.$idJemput) ?>"
                    </script>
                    <?php
                }else if ($tipe =='Driver'){
                    ?>
                    <script type="text/javascript">
                        alert("Status berhasil diubah!");
                        window.location = "<?php echo site_url('c_jemput/detailPenjemputan/'.$idJemput) ?>"
                    </script>
                    <?php
                }
            }else{
                    ?>
                    <script type="text/javascript">
                        alert("Status Gagal diubah!");
                        window.location = "<?php echo site_url("c_jemput/detailPenjemputan") ?>"
                    </script>
                    <?php
            }
        }else{
            ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }
    }

    public function tolakPenjemputan(){
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
            $idJemput  = $this->input->post('idJemput');
            $username = $this->input->post('username');
            $alasan = $this->input->post('alasan');
              
            $data = array('status' => 'Penjemputan Ditolak',
                          'alasan' => $alasan);
            $where = array('idJemput' => $idJemput);

            
            $insertStatus = $this->modJemput->tambahStatus(array(
                                                            'idJemput' => $idJemput,
                                                            'username' => $username,
                                                            'status' => 'Penjemputan Ditolak'));
            $updateStatus = $this->modJemput->UpdatePenjemputan($data, $where);
            if ($updateStatus >0 ){
                ?>
                <script type="text/javascript">
                    alert("Status berhasil diubah!");
                    window.location = "<?php echo site_url('c_jemput/detailPenjemputan/'.$idJemput) ?>"
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript">
                    alert("Status Gagal diubah!");
                    window.location = "<?php echo site_url("c_jemput/detailPenjemputan") ?>"
                </script>
                <?php
            }
        }else{
            ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }
    }
 }