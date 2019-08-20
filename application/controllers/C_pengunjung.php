<?php
class C_pengunjung extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('modNasabah');
        $this->load->model('modPetugas');
        $this->load->model('modSampah');
    }

    public function index(){
        $NasabahKelompok = $this->modNasabah->countNasabah('Nasabah Kelompok');
        $NasabahIndividu = $this->modNasabah->countNasabah('Nasabah Individu');
        $NasabahSekolah = $this->modNasabah->countNasabah('Nasabah Sekolah');
        $NasabahInstansi = $this->modNasabah->countNasabah('Nasabah Instansi');
        $data = array('NasabahKelompok' => $NasabahKelompok,
                      'NasabahIndividu' => $NasabahIndividu,
                      'NasabahSekolah' => $NasabahSekolah,
                      'NasabahInstansi' => $NasabahInstansi
                    );

        $this->load->view('v_header');
        $this->load->driver('cache', array('adapter' => 'memcached', 'backup' => 'v_header'));
        $this->load->view('v_beranda', $data);
        $this->load->view('v_footer');
    }

    public function login() {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $cekNasabah = $this->modNasabah->cekData($username, $password);
            $cekPetugas = $this->modPetugas->cekData($username, $password);

            if ($cekNasabah > 0) {
                $user = $this->modNasabah->GetWhere(array('username' => $username, 'password' => $password));
                
                $data_session = array(
                    'username' => $username,
                    'password' => $password,
                    'tipe' => 'nasabah'
                );
                $this->session->set_userdata($data_session);
                ?>
                <script type="text/javascript">
                    alert("Login Berhasil!");
                    window.location = "<?php echo site_url('c_nasabah/profilNasabah') ?>";
                </script>
                <?php 
            }else if ($cekPetugas > 0) {
                $user = $this->modPetugas->GetWhere(array('username' => $username, 'password' => $password));
                $tipe = $user[0]['tipe'];
                $nama = $user[0]['nama'];

                $data_session = array(
                    'username' => $username,
                    'nama' => $nama,
                    'password' => $password,
                    'tipe' => $tipe
                );
                $this->session->set_userdata($data_session);
                ?>
                <script type="text/javascript">
                    alert("Login Berhasil!");
                    window.location = "<?php echo site_url('c_akun/berandaPetugas') ?>";
                </script>
                <?php
            }else {
                ?>
                <script type="text/javascript">
                    alert("Login Gagal!");
                    window.location = "<?php echo site_url("") ?>";
                </script>
                <?php
            }
        }

    public function logout() {
        $this->session->sess_destroy();
        redirect('');
    }

    public function cekHarga()
    {
        $data = $this->modSampah->GetSemuaSampah();
        $data = array('data' => $data);
        $this->load->view('v_header');
        $this->load->view('v_cekHarga', $data);
        $this->load->view('v_footer');
    }

    public function profilBSM()
    {
        $this->load->view('v_header');
        $this->load->view('v_profilBSM');
        $this->load->view('v_footer');
    }

    public function infoNasabah()
    {
        $this->load->view('v_header');
        $this->load->view('v_infoNasabah');
        $this->load->view('v_footer');
    }

    public function ubahPassword()
    {
        $this->load->view('v_header');
        $this->load->view('v_ubahPasswordPengunjung');
        $this->load->view('v_footer');
    }
   
}