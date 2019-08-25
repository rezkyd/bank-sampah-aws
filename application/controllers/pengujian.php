
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengujian extends CI_Controller
{   

    function __construct() {
        parent::__construct();
        $this->load->model('modPenarikan');
        $this->load->model('modBukuTabungan');
        $this->load->model('modPetugas');
        $this->load->model('modNasabah');
        $this->load->model('modJemput');
    }
    
    public function insertPenarikan_Error(){
        $cek = $this->modPetugas->cekData('akun','password');
        if ($cek > 0) {
            $username = $this->input->post('username');
            $noNota = $this->input->post('noNota');
            $tanggal = $this->input->post('tanggal');
            $debet = $this->input->post('debet');    
                
            $akun = $this->modNasabah->GetWhere(array('username' => $username));
            $saldo = $akun[0]['saldo'];
            $saldoAkhir = $saldo - $debet;
            $updateSaldo = array('saldo' => $saldoAkhir);
            $where = array('username' => $username);

            $ubahSaldo = $this->modNasabah->UpdateAkun($updateSaldo, $where);

            $dataPenarikan = array(
                'noNota' => $noNota,
                'username' => $username,
                'tanggal' => $tanggal,
                'debet' => $debet
            );
            $insertPenarikan = $this->modPenarikan->Insert($dataPenarikan);

            $dataBuku = array(
                'noNota' => $noNota,
                'username' => $username,
                'tanggal' => $tanggal,
                'debet' => $debet,
                'saldo' => $saldoAkhir
                 );
            $insertBuku = $this->modBukuTabungan->InsertTransaksi($dataBuku);
            
            if ($insertPenarikan >0 ){
                ?>
                <script type="text/javascript">
                    alert("Transaksi Berhasil Disimpan!");
                    window.location = "<?php echo site_url("c_penarikan") ?>"
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript">
                    alert("Transaksi Tidak Tersimpan!");
                    window.location = "<?php echo site_url("c_penarikan/tambahPenarikan") ?>"
                </script>
                <?php
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

     public function cekLokasi($no){
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
            $akun = $this->modJemput->GetWhere(array('idJemput' => $no));
            $tipe = $this->session->userdata('tipe');
            $idDriver = $akun[0]['idDriver'];
            $driver = $this->modPetugas->GetWhere(array('idPetugas' => $idDriver));
            
            $nextStat = '';
            if($akun[0]['status'] == 'Menunggu Konfirmasi'){
                $nextStat = 'Menunggu Penjemputan';
                $tombol = 'Terima Pesanan';
            }else if($akun[0]['status'] == 'Menunggu Penjemputan'){
                $nextStat = 'Menjemput Pesanan';
                $tombol = 'Jemput Pesanan';
            }else if($akun[0]['status'] == 'Menjemput Pesanan'){
                $nextStat = 'Merekap pesanan';
                $tombol = 'Konfirmasi Penjemputan';
            }else if($akun[0]['status'] == 'Merekap pesanan'){
                $nextStat = 'Selesai';
                $tombol = 'Rekap Pesanan';
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
                'driver' => $driver[0]['nama'],
                'nohpDriver' => $driver[0]['noHP'],
                'idDriver' => $idDriver
                );

            if($tipe == 'Admin'){
                $this->load->view('petugas/pages/v_headerAdmin', $data);
                $this->load->view('petugas/v_cekLokasi', $data);
                $this->load->view('petugas/pages/v_footerAdmin');
            }else if ($tipe == 'Driver'){
                $this->load->view('petugas/pages/v_headerDriver',$data);
                $this->load->view('petugas/v_cekLokasi', $data);
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
 }