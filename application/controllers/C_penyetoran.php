<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_penyetoran extends CI_Controller
{   
    function __construct() {
        parent::__construct();
        $this->load->model('modSampah');
        $this->load->model('modPenyetoran');
        $this->load->model('modPetugas');
        $this->load->model('modBukuTabungan');
        $this->load->model('modNasabah');
        $this->load->model('modJemput');
        
    }
    public function index(){
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if($cek >0){
            $dataPenyetoran = $this->modPenyetoran->GetWhere(array('status' => 1));
            $data = array(
                'dataPenyetoran' => $dataPenyetoran,
                'tabAdmin' => 7
            );

            $this->load->view('petugas/pages/v_headerAdmin', $data);
            $this->load->view('petugas/v_lihatPenyetoran', $data);
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

    public function tambahPenyetoran(){
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if($cek >0){
            $username ='';
            $jemputSampah = '';
            $idJemput = '';
            $tipe = $this->session->userdata('tipe');
            if(isset($_GET['user'])){
                $username = $_GET['user'];
                $idJemput = $_GET['id'];
                $jemputSampah = 'y';
            }
            $data = array (
                    'page_title' => 'Buat Penyetoran',
                    'kode' => $this->modSampah->GetKodeSampah(),
                    'noNota'=>$this->modPenyetoran->getKodePenyetoran(),
                    'tabDriver' => 3,
                    'tabAdmin' =>4,
                    'username' => $username,
                    'listUser' => $this->modNasabah->GetUsername(),
                    'jemputSampah' =>$jemputSampah,
                    'idJemput' => $idJemput,
                    'tipe' => $tipe
                    );    

            if($tipe == 'Admin'){
                $this->load->view('petugas/pages/v_headerAdmin', $data);
                $this->load->view('petugas/v_buatPenyetoran', $data);
                $this->load->view('petugas/pages/v_footerAdmin');
            }else if ($tipe == 'Driver'){
                $this->load->view('petugas/pages/v_headerDriver',$data);
                $this->load->view('petugas/v_buatPenyetoran', $data);
                $this->load->view('petugas/pages/v_footerAdmin'); 
            }      

            
        }else {
            ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }     
    }

    public function rekapPenyetoranDriver(){
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
            $jemputSampah = $this->input->post('jemputSampah');
            $idJemput = $this->input->post('idJemput');
            $noNota = $this->input->post('noNota');
            $username = $this->input->post('username');
            $tanggal = $this->input->post('tanggal');
            $kredit = $this->input->post('kredit');
            $kodeSampah =  $_POST['kodeSampah'];
            $jenisSampah =  $_POST['jenisSampah'];
            $berat =  $_POST['berat'];
            $hargaJual =  $_POST['hargaJual'];
            $subTotal =  $_POST['subTotal'];
            $count = $this->input->post('count');
            $dataDetail =array();
             
            $akun = $this->modNasabah->GetWhere(array('username' => $username));
            
            $dataPenyetoran = array(
                'noNota' => $noNota,
                'username' => $username,
                'tanggal' => $tanggal,
                'kredit' => $kredit,
                'status' => 0
                 );
            //insert tabel Penyetoran
            $insertPenyetoran = $this->modPenyetoran->InsertTransaksi($dataPenyetoran);
   
            for($i=0; $i<$count; $i++) {
                $dataDetail[$i] = array(
                    'noNota' => $noNota,
                    'username' => $username,
                    'kodeSampah' => $kodeSampah[$i], 
                    'jenisSampah' => $jenisSampah[$i],
                    'berat' => $berat[$i],
                    'hargaJual' => $hargaJual[$i],
                    'subTotal' => $subTotal[$i],

                );
            }
            //insert detail penyetoran 
            $dataDetail = $this->modPenyetoran->InsertDetail($dataDetail);

            //ganti status penjemputan
            if($jemputSampah == 'y'){
                $insertStatus = $this->modJemput->tambahStatus(array(
                                                            'idJemput' => $idJemput,
                                                            'username' => $username,
                                                            'status' => 'Menunggu Verifikasi'));
                $dataPenjemputan = array('status' => 'Menunggu Verifikasi', 
                                        'noNota' => $noNota);
                $res = $this->modJemput->UpdatePenjemputan($dataPenjemputan,  array('idJemput' => $idJemput));
            }

            ?>
            <script type="text/javascript">
                alert("Transaksi Berhasil Disimpan!");
                window.location = "<?php echo site_url("c_jemput/detailPenjemputan/$idJemput") ?>"
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }
    }

    public function insertPenyetoran(){
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
            $noNota = $this->input->post('noNota');
            $username = $this->input->post('username');
            $tanggal = $this->input->post('tanggal');
            $kredit = $this->input->post('kredit');
            $kodeSampah =  $_POST['kodeSampah'];
            $jenisSampah =  $_POST['jenisSampah'];
            $berat =  $_POST['berat'];
            $hargaJual =  $_POST['hargaJual'];
            $subTotal =  $_POST['subTotal'];
            $count = $this->input->post('count');
            $dataDetail =array();
             
            $akun = $this->modNasabah->GetWhere(array('username' => $username));
            
            //update Saldo
            $saldo = $akun[0]['saldo'];
            $saldoAkhir = $saldo + $kredit;
            $where = array('username' => $username);
            $updateSaldo = $this->modNasabah->UpdateAkun(array('saldo' => $saldoAkhir), $where);    

            $dataPenyetoran = array(
                'noNota' => $noNota,
                'username' => $username,
                'tanggal' => $tanggal,
                'kredit' => $kredit,
                'status' => 1
                 );
            //insert tabel Penyetoran
            $insertPenyetoran = $this->modPenyetoran->InsertTransaksi($dataPenyetoran);
            
            $dataBukuTabungan = array(
                'noNota' => $noNota,
                'username' => $username,
                'tanggal' => $tanggal,
                'kredit' => $kredit,
                'saldo' => $saldoAkhir
                 );
            //insert buku tabungan
            $insertBukuTabungan = $this->modBukuTabungan->InsertTransaksi($dataBukuTabungan);

            
            for($i=0; $i<$count; $i++) {
                $dataDetail[$i] = array(
                    'noNota' => $noNota,
                    'username' => $username,
                    'kodeSampah' => $kodeSampah[$i], 
                    'jenisSampah' => $jenisSampah[$i],
                    'berat' => $berat[$i],
                    'hargaJual' => $hargaJual[$i],
                    'subTotal' => $subTotal[$i],

                );
            }
            //insert detail penyetoran 
            $dataDetail = $this->modPenyetoran->InsertDetail($dataDetail);


            ?>
            <script type="text/javascript">
                alert("Transaksi Berhasil Disimpan!");
                window.location = "<?php echo site_url("c_penyetoran") ?>"
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }
    }

    public function verifPenyetoran(){
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {

            $status = $this->input->post('statusPengiriman');

            $idJemput = $this->input->post('idJemput');
            $noNota = $this->input->post('noNota');
            $username = $this->input->post('username');
            $tanggal = $this->input->post('tanggal');
            $kredit = $this->input->post('kredit');
            
             
            $akun = $this->modNasabah->GetWhere(array('username' => $username));
            
            //update Saldo
            $saldo = $akun[0]['saldo'];
            $saldoAkhir = $saldo + $kredit;
            $where = array('username' => $username);
            $updateSaldo = $this->modNasabah->UpdateAkun(array('saldo' => $saldoAkhir), $where);    
            
            $dataBukuTabungan = array(
                'noNota' => $noNota,
                'username' => $username,
                'tanggal' => $tanggal,
                'kredit' => $kredit,
                'saldo' => $saldoAkhir
                 );
            //insert buku tabungan
            $insertBukuTabungan = $this->modBukuTabungan->InsertTransaksi($dataBukuTabungan);

            $updateStatus = array('status' => 'Selesai');
            $id = array('idJemput' => $idJemput);
            //update status di penjemputan
            $res = $this->modJemput->UpdatePenjemputan($updateStatus, $id);

            //update Status Penyetoran
            $statusPenyetoran = array('status' => 1);
            $no = array('noNota' => $noNota);
            $query = $this->modPenyetoran->UpdateStatus($statusPenyetoran, $no);

            //insert detail status
            $insertStatus = $this->modJemput->tambahStatus(array(
                                                            'idJemput' => $idJemput,
                                                            'username' => $username,
                                                            'status' => 'Selesai' ));

            ?>
            <script type="text/javascript">
                alert("Transaksi Berhasil Disimpan!");
                window.location = "<?php echo site_url('c_jemput/detailPenjemputan/'.$idJemput) ?>"
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }
    }

    public function hapusPenyetoran(){
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if($cek >0){    
            $noNota =  $_GET['id'];
            $kredit =  $_GET['kredit'];
            $username = $_GET['user'];
            
            $akun = $this->modNasabah->GetWhere(array('username' => $username));
            $saldo = $akun[0]['saldo'];
            $sisaSaldo = $saldo - $kredit ;

            //update Saldo
            $updateSaldo = array('saldo' => $sisaSaldo);
            $where = array('username' => $username);
            $ubahSaldo = $this->modNasabah->UpdateAkun($updateSaldo, $where);

            //hapus penyetoran
            $this->modBukuTabungan->DeleteTransaksi(array('noNota' => $noNota));
            $this->modPenyetoran->DeleteTransaksi(array('noNota' => $noNota));
            $this->modPenyetoran->DeleteDetail(array('noNota' => $noNota));
            
            ?>
            <script type="text/javascript">
                alert("Data Berhasil Dihapus!");
                window.location = "<?php echo site_url("c_penyetoran") ?>"
            </script>
            <?php
        }else {
            ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }  
    }

    public function detailPenyetoran(){
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if($cek >0){
            $idJemput = '';
            if(isset($_GET['noNota'])){
                $no = $_GET['noNota'];
            }
            if(isset($_GET['id'])){
                $idJemput = $_GET['id'];
            }
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
                'tabAdmin' => 7,
                'status' => $status,
                'akun' => 'a',
                'idJemput' => $idJemput
            );

            $this->load->view('petugas/pages/v_headerAdmin', $data);
            $this->load->view('petugas/v_detailPenyetoran', $data); 
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

    public function tambahDetail(){
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if($cek >0){
             $data = array(
                'noNota' => $this->input->post('noNota'),
                'username' => $this->input->post('username'),
                'kodeSampah' => $this->input->post('kodeSampah'),
                'berat' => $this->input->post('berat'),
                'hargaJual' => $this->input->post('hargaJual'),
                'subTotal' => $this->input->post('subTotal')

                 );
            $data = $this->modPenyetoran->InsertDetail($data);
            redirect(site_url('c_penyetoran/tambahPenyetoran'.$data['noNota']),'refresh');
        }else {
            ?>
            <script type="text/javascript">
                alert("Anda harus Login terlebih dahulu!");
                window.location = "<?php echo site_url("") ?>"
            </script>
            <?php
        }  
        
    }

    function getHarga(){
        $kode=$this->input->post('kodeSampah');
        $data=$this->modSampah->GetHargaSampah($kode);

        echo json_encode($data);
    }

    function getJenis(){
        $kode=$this->input->post('kodeSampah');
        $data=$this->modSampah->GetJenisSampah($kode);

        echo json_encode($data);
    }
 }