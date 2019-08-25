
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penarikan extends CI_Controller
{   

    function __construct() {
        parent::__construct();
        $this->load->model('modPenarikan');
        $this->load->model('modBukuTabungan');
        $this->load->model('modPetugas');
        $this->load->model('modNasabah');
    }
    
    //Untuk menampilkan halaman data penarikan
    public function index(){    
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
            $this->load->driver('cache');
            if (!$data = $this->cache->memcached->get('penarikan')){
                $dataPenarikan = $this->modPenarikan->GetSemuaPenarikan();
                $data = array(
                    'dataPenarikan' => $dataPenarikan,
                    'tabAdmin' => 6
                );
                $this->cache->memcached->save('penarikan',$data, 60);
            }
            $this->load->view('petugas/pages/v_headerAdmin', $data);
            $this->load->view('petugas/v_lihatPenarikan', $data);
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

    // Fungsi untuk menampilkan halaman penarikan
    public function tambahPenarikan(){
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
            $data= array(
                'page_title' => 'Buat Penarikan',
                'noNota'=> $this->modPenarikan->getKodePenarikan(),
                'usernam' => $this->modNasabah->GetUsername(),
                'tabAdmin' => 6
            );
            $this->load->view('petugas/pages/v_headerAdmin', $data);
            $this->load->view('petugas/v_buatPenarikan', $data);
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
    
    //Fungsi untuk menambahkan transaksi penarikan pada database
    public function insertPenarikan(){
        $username = $this->input->post('username');
        $noNota = $this->input->post('noNota');
        $tanggal = $this->input->post('tanggal');
        $debet = $this->input->post('debet');    
            
        $akun = $this->modNasabah->GetWhere(array('username' => $username));
        $saldo = $akun[0]['saldo'];

        //Mengubah saldo pada tabel nasabah
        $saldoAkhir = $saldo - $debet;
        $updateSaldo = array('saldo' => $saldoAkhir);
        $where = array('username' => $username);
        $ubahSaldo = $this->modNasabah->UpdateAkun($updateSaldo, $where);

        //Menambahkan data pada tabel penarikan
        $dataPenarikan = array('noNota' => $noNota,
                            'username' => $username,
                            'tanggal' => $tanggal,
                            'debet' => $debet
        );
        $insertPenarikan = $this->modPenarikan->Insert($dataPenarikan);

        //Menambahkan data pada tabel bukuTabungan
        $dataBuku = array(
            'noNota' => $noNota,
            'username' => $username,
            'tanggal' => $tanggal,
            'debet' => $debet,
            'saldo' => $saldoAkhir
             );
        $insertBuku = $this->modBukuTabungan->InsertTransaksi($dataBuku);
        
        if ($insertBuku == TRUE){
            ?>
            <script type="text/javascript">
                alert("Transaksi Berhasil Disimpan!");
                window.location = "<?php echo site_url("penarikan") ?>"
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript">
                alert("Transaksi Tidak Tersimpan!");
                window.location = "<?php echo site_url("penarikan/tambahPenarikan") ?>"
            </script>
            <?php
        }
    }

    //Untuk menghapus transaksi penarikan
    public function hapusPenarikan(){
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
            $noNota =  $_GET['id'];
            $debet =  $_GET['debet'];
            $username = $_GET['user'];
            
            $akun = $this->modNasabah->GetWhere(array('username' => $username));
            $saldo = $akun[0]['saldo'];
            $sisaSaldo = $saldo + $debet ;

            //update Saldo
            $updateSaldo = array('saldo' => $sisaSaldo);
            $where = array('username' => $username);
            $ubahSaldo = $this->modNasabah->UpdateAkun($updateSaldo, $where);

            //Hapus transaksi
            $this->modPenarikan->Delete(array('noNota' => $noNota));
            $this->modBukuTabungan->DeleteTransaksi(array('noNota' => $noNota));
            
            ?>
            <script type="text/javascript">
                alert("Data Berhasil Dihapus!");
                window.location = "<?php echo site_url("penarikan") ?>"
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

    //Mengambil data saldo nasabah
     function getSaldo(){
        $username=$this->input->post('username');
        $saldo=$this->modNasabah->getSaldo($username);
        echo json_encode($saldo);
    }
 }