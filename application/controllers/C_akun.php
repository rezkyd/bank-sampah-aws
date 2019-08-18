<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_akun extends CI_Controller
{   
	function __construct() {
        parent::__construct();
        $this->load->model('modNasabah');
        $this->load->model('modPetugas'); 
        $this->load->model('modJemput');
    }

    public function index(){
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
			$dataNasabah = $this->modNasabah->GetSemuaNasabah();
	         $data = array(
        		'tabAdmin' => 3,
        		'dataNasabah' => $dataNasabah,
        	);
			
			$this->load->view('petugas/pages/v_headerAdmin', $data);
	        $this->load->view('petugas/v_lihatAkunNasabah', $data);
			$this->load->view('petugas/pages/v_footerAdmin');
		}else{
			redirect();
		}	
	}

    public function lihatPetugas(){
    	$cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
	        $dataPetugas = $this->modPetugas->GetSemuaPetugas();
	        $data = array(
        		'tabAdmin' => 4,
        		'dataPetugas' => $dataPetugas
        	);
			
			$this->load->view('petugas/pages/v_headerAdmin', $data);
	        $this->load->view('petugas/v_lihatAkunPetugas', $data);
			$this->load->view('petugas/pages/v_footerAdmin');
		}else{
			redirect();
		}
	}
    public function tambahAkun(){
    	$cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) { 
        	$data = array(
        		'page_title' => 'Buat Akun',
        		'tabAdmin' => 2,
        	);

			$this->load->view('petugas/pages/v_headerAdmin', $data);
	    	$this->load->view('petugas/v_buatAkun', $data);
	    	$this->load->view('petugas/pages/v_footerAdmin');
		}else{
			redirect();	
		}
	}

	public function insertAkun(){
		$cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
			$password = $this->random_password(6); 
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$tipeAkun= $this->input->post('tipeAkun');
			$alamat = $this->input->post('alamat');
			$email = $this->input->post('email');
			$noHP = $this->input->post('noHP');

		    if($tipeAkun == 'Admin' || $tipeAkun =='Driver'){
				$dataPetugas = array(
					        'nama' => $nama,
					        'username' => $username,
					        'password' => $password,
					        'alamat' => $alamat,
					        'tipe' => $tipeAkun,
					        'email' => $email,
					        'noHP' => $noHP
					    );
				$insertAkun = $this->modPetugas->insertAkun($dataPetugas);

				if($insertAkun>0){
					?>
				    	<script type="text/javascript">
				    		alert("Data Berhasil Disimpan!");
				    		window.location = "<?php echo site_url("c_akun/lihatPetugas") ?>"
				    	</script>
			    	<?php
		       	}else{
					redirect(site_url('c_akun/tambahAkun'),'refresh');
				}
			}else{
	        	$dataNasabah = array(
					        'nama' => $nama,
					        'username' => $username,
					        'password' => $password,
					        'alamat' => $alamat,
					        'tipeNasabah' => $tipeAkun,
					        'email' => $email,
					        'noHP' => $noHP
					    );
	        	$insertAkun = $this->modNasabah->InsertAkun($dataNasabah);
				
				if($insertAkun >0){
					?>
			    	<script type="text/javascript">
			    		alert("Data Berhasil Disimpan!");
			    		window.location = "<?php echo site_url("c_akun") ?>"
			    	</script>
			    	<?php
		       	}else{
					redirect(site_url('c_akun/tambahAkun'),'refresh');
				}
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

	public function hapusNasabah($username){
		$cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
		    $no = array('username' => $username);
		    $this->modNasabah->DeleteAkun($no);

		    ?>
	    	<script type="text/javascript">
	    		alert("Data Berhasil Dihapus!");
	    		window.location = "<?php echo site_url("c_akun") ?>"
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

	public function hapusPetugas($username){
		$cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
		    $no = array('username' => $username);
		    $this->modPetugas->DeleteAkun($no);
		    ?>
	    	<script type="text/javascript">
	    		alert("Data Berhasil Dihapus!");
	    		window.location = "<?php echo site_url("c_akun/lihatPetugas") ?>"
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

	public function editNasabah($username){
		$cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
			$akun = $this->modNasabah->GetWhere(array('username' => $username));
		    $data = array(
		    	'page_title' => 'Edit Akun',
		        'nama' => $akun[0]['nama'],
				'username' => $akun[0]['username'],
		        'alamat' => $akun[0]['alamat'],
		        'email' => $akun[0]['email'],
	        	'noHP' => $akun[0]['noHP'],
		        'tipeNasabah' => $akun[0]['tipeNasabah'],
		        'tabAdmin' => 3,
		        'akun' => 'n'
		        );
			$this->load->view('petugas/pages/v_headerAdmin', $data);
		    $this->load->view('petugas/v_editAkun', $data); 
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

	public function editPetugas($username){
		$cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
			$akun = $this->modPetugas->GetWhere(array('username' => $username));
		    $data = array(
		    	'page_title' => 'Edit Akun',
		        'nama' => $akun[0]['nama'],
				'username' => $akun[0]['username'],
		        'alamat' => $akun[0]['alamat'],
		        'email' => $akun[0]['email'],
		        'tipe' => $akun[0]['tipe'],
	        	'noHP' => $akun[0]['noHP'],
		        'tabAdmin' => 4,
		        'akun' => 'p'
		        );
			$this->load->view('petugas/pages/v_headerAdmin', $data);
		    $this->load->view('petugas/v_editAkun', $data); 
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

	public function updateAkun($username){
		$cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
		    $nama = $_POST['nama'];
		    $username = $_POST['username'];
		    $alamat = $_POST['alamat'];
		    $email = $_POST['email'];
		    $noHP = $_POST['noHP'];
		    $akun = $_POST['akun'];

		    $data = array(
		        'nama' => $nama,
		        'alamat' => $alamat,
		        'email' => $email,
		        'noHP' => $noHP
		    );
		    $where = array('username' => $username);

		    if($akun == 'n'){
		    	$res = $this->modNasabah->UpdateAkun($data, $where);
		    	$link = "c_akun";
		    }else if($akun == 'p'){
			    $res = $this->modPetugas->UpdateAkun($data, $where);
			    $link = "c_akun/lihatPetugas";
		    }

		    if ($res>0) { 
		    	?><script type="text/javascript">
		    		alert("Data Berhasil Diubah!");
		    		window.location = "<?php echo site_url($link) ?>"
		    	</script><?php
		    }else{
		    	?><script type="text/javascript">
		    		alert("Data Tidak Tersimpan!");
		    		window.location = "<?php echo site_url($link) ?>"
		    	</script><?php
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

	public function random_password() {
	    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	    $password = substr( str_shuffle( $chars ), 0, 6 );
	    return md5($password);
	}

	function getPassword(){
        $passLama=$this->input->post('lama');
         if($tipe == 'nasabah'){
			$data=$this->modNasabah->getPassword($passLama);
        }else if($tipe == 'Admin'){
            $data=$this->modPetugas->getPassword($passLama);
        }else if ($tipe == 'Driver'){
        	$data=$this->modPetugas->getPassword($passLama);
        }
        
        echo json_encode($data);
    }

	public function updatePassword(){
        $passLama = $_POST['lama'];
        $passBaru = $_POST['baru'];
        $username  = $this->session->userdata('username');
        $tipe = $this->session->userdata('tipe');

        $data = array('password' => $passBaru);
        $where = array('username' => $username, 'password' => $passLama);

        if($tipe == 'nasabah'){
			$akun = $this->modNasabah->GetWhere(array('username' => $username));
	    	$res = $this->modNasabah->UpdateAkun($data, $where);
        }else{
            $akun = $this->modPetugas->GetWhere(array('username' => $username));
	    	$res = $this->modPetugas->UpdateAkun($data, $where);
        }

        if ($res >0 ){
        	$email = $akun[0]['email'];  
	        $this->session->set_userdata('password', $passBaru);
	        $this->kirimPassword($email, $passBaru);
	        ?>
	    	<script type="text/javascript">
	    		alert("Password Berhasil Diubah!");
	    		<?php if($tipe == 'nasabah'){?>
		    		window.location = "<?php echo site_url("c_nasabah/profilNasabah") ?>";
		        <?php }else{ ?>
	    			window.location = "<?php echo site_url("c_akun/berandaPetugas") ?>";
		        <?php }?>
		    </script>
	    	<?php
        } else{
        	?>
	    	<script type="text/javascript">
	    		alert("Password Gagal Diubah!");
	    		if($tipe == 'nasabah'){
		    		window.location = "<?php echo site_url("c_nasabah/profilNasabah") ?>";
		        }else{
	    			window.location = "<?php echo site_url("c_akun/berandaPetugas") ?>";
		        }
	    	</script>
	    	<?php
        }
	    
    }

     function get_detail_form(){
        $tipeAkun=$this->input->post('tipeAkun');
        
        if($tipeAkun == 'Admin' || $tipeAkun =='Driver'){
        	$username = $this->modPetugas->getKodeUsername($tipeAkun);
        }else{
        	$username = $this->modNasabah->getKodeUsername($tipeAkun);
        
        }
        $data=array(
            'username' => $username
        );

        $this->load->view('petugas/ajaxDetailBuatAkun',$data);
    }

    function lupaPassword(){
    	$username = $_POST['username'];
    	$akun = $this->modNasabah->GetWhere(array('username' => $username));
    	if($akun){
	        $email = $akun[0]['email'];    
	    	$password = $akun[0]['password'];
	    	$this->kirimPassword($email, $password);

	    	?>
		    	<script type="text/javascript">
		    		alert("Pesan Terikirm!");
		    		window.location = "<?php echo site_url("c_pengunjung/ubahPassword") ?>"
		    	</script>
		    	<?php
	    }else{
            ?>
	    	<script type="text/javascript">
	    		alert("Username tidak ditemukan!");
	    		window.location = "<?php echo site_url("c_pengunjung/ubahPassword") ?>"
	    	</script>
	    	<?php
	    }
	}

    function kirimPassword($email, $pass){
	    //Kirim Email
        ini_set( 'display_errors', 1 );   
        error_reporting( E_ALL );    
        $from = "meylmarali@bsmalang.xyz";    
        $emailTujuan = $email;
        $to = $emailTujuan;    
        $subject = "Password Akun";    
        $message = "Password akun anda adalah ". $pass;   
        $headers = "From:" . $from;    
        @mail($to,$subject,$message,$headers);
        	
    }

     function berandaPetugas(){
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
            $akun = $this->modPetugas->GetWhere(array('username' => $this->session->userdata('username')));
            $tipe = $this->session->userdata('tipe');
            
            $confirmPending = $this->modJemput->GetWhere(array('status' => 'Menunggu Konfirmasi'));
            $pickupPending = $this->modJemput->GetWhere(array('status' => 'Menunggu Penjemputan'));
            $verifPending = $this->modJemput->GetWhere(array('status' => 'Menunggu Verifikasi'));
            $pickupOrder = $this->modJemput->GetWhere(array('status' => 'Menjemput Pesanan'));
            

            $countConfirmPending = $this->modJemput->countData(array('status' => 'Menunggu Konfirmasi'));
            $countPickupPending = $this->modJemput->countData(array('status' => 'Menunggu Penjemputan'));
            $countPickupOrder = $this->modJemput->countData(array('status' => 'Menjemput Pesanan'));
            $countVerifPending = $this->modJemput->countData(array('status' => 'Menunggu Verifikasi'));
            
            $data = array(
                    'nama' => $akun[0]['nama'],
                    'username' => $akun[0]['username'],
                    'tabAdmin' => 1,
                    'tabDriver' =>1,
                    'confirmPending' => $confirmPending,
                    'pickupPending' => $pickupPending,
                    'verifPending' => $verifPending,
                    'pickupOrder' => $pickupOrder,
                    'countPickupPending' => $countPickupPending,
                    'countPickupOrder' => $countPickupOrder,
                    'countConfirmPending' => $countConfirmPending,
                    'countVerifPending'=> $countVerifPending
                );
            
            if($tipe == 'Admin'){
                $this->load->view('petugas/pages/v_headerAdmin',$data);
                $this->load->view('petugas/v_berandaAdmin', $data);
                $this->load->view('petugas/pages/v_footerAdmin');
            }else if ($tipe == 'Driver'){
                $this->load->view('petugas/pages/v_headerDriver',$data);
                $this->load->view('petugas/v_berandaDriver', $data);
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
    
    function ubahPasswordPetugas() {
        $cek = $this->modPetugas->cekData($this->session->userdata('username'),$this->session->userdata('password'));
        if ($cek > 0) {
            $tipe = $this->session->userdata('tipe');
            $data = array ('title' => 'Ubah Password',
                            'tabDriver' => 4,
                            'tabAdmin' =>10,
                            'password' => $this->session->userdata('password'),
                            'tipe' => $tipe
                        ); 
            
            if($tipe == 'Admin'){
                $this->load->view('petugas/pages/v_headerAdmin',$data);
                $this->load->view('nasabah/v_ubahPassword', $data);
                $this->load->view('petugas/pages/v_footerAdmin');
            }else if ($tipe == 'Driver'){
                $this->load->view('petugas/pages/v_headerDriver',$data);
                $this->load->view('nasabah/v_ubahPassword', $data);
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