<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrator BSM</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
  
    <link rel="stylesheet" href="https://projectakhir.s3.amazonaws.com/adm/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://projectakhir.s3.amazonaws.com/adm/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://projectakhir.s3.amazonaws.com/adm/css/fontastic.css">
    <link rel="stylesheet" href="https://projectakhir.s3.amazonaws.com/adm/css/robotto.css">
    <link rel="stylesheet" href="https://projectakhir.s3.amazonaws.com/adm/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <link rel="stylesheet" href="https://projectakhir.s3.amazonaws.com/adm/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="https://projectakhir.s3.amazonaws.com/adm/css/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="https://projectakhir.s3.amazonaws.com/adm/css/custom.css">
    <!-- <link rel="shortcut icon" href="https://projectakhir.s3.amazonaws.com/adm/favicon.ico"> -->
    <link rel="shortcut icon" href="https://projectakhir.s3.amazonaws.com/adm/vendor/jquery/jquery.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
         <div class="sidenav-header d-flex align-items-center justify-content-center">
            
            <div class="sidenav-header-inner text-center">
                <strong > ADMIN BSM </strong>
            </div>
            <div class="sidenav-header-logo">
               <a href="index.html" class="brand-small text-center"><strong class="text-primary">BSM</strong></a>
            </div>
        </div>
        <div class="main-menu">
          <ul id="side-main-menu" class="side-menu list-unstyled">          

            <li <?php if($tabAdmin=='1'){ echo "class='active'";}?>> <a href="<?php echo site_url('c_akun/berandaPetugas');?>"><i class="icon-home"></i><span>Beranda</span></a></li>
            
            <li> <a href="#pages-nav-list" data-toggle="collapse" aria-expanded="false"><i class="icon-user"></i><span> Data Akun</span>
                <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
                <ul id="pages-nav-list" class="collapse list-unstyled">
                  <li <?php if($tabAdmin=='2'){ echo "class='active'";}?>> <a href="<?php echo site_url('c_akun/tambahAkun');?>">Buat Akun</a></li>
                  <li <?php if($tabAdmin=='3'){ echo "class='active'";}?>> <a href="<?php echo site_url('c_akun');?>">Akun Nasabah</a></li>
                  <li <?php if($tabAdmin=='4'){ echo "class='active'";}?>> <a href="<?php echo site_url('c_akun/lihatPetugas');?>">Akun Petugas</a></li>
                </ul>
            </li>
            <li <?php if($tabAdmin=='6'){ echo "class='active'";}?> > <a href="<?php echo site_url('c_penarikan');?>"> <i class="fa fa-money"> </i><span>Penarikan Saldo</span></a></li>
            <li <?php if($tabAdmin=='7'){ echo "class='active'";}?>> <a href="<?php echo site_url('c_penyetoran');?>"> <i class="fa fa-paper-plane"></i><span>Penyetoran Sampah</span></a></li>
            <li> 
              <a href="#jemputSampah" data-toggle="collapse" aria-expanded="false"><i class="fa fa-truck"></i><span>Jemput Sampah</span>
              <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
                <ul id="jemputSampah" class="collapse list-unstyled">
                  <li <?php if($tabAdmin==''){ echo "class='active'";}?>> <a href="<?php echo site_url('c_jemput/semuaJadwalPenjemputan');?>">Semua Pesanan</a></li>
                  <li <?php if($tabAdmin==''){ echo "class='active'";}?>> <a href="<?php echo site_url('c_jemput/jadwalPenjemputan/Menunggu Konfirmasi');?>">Menunggu Konfirmasi</a></li>
                  <li <?php if($tabAdmin==''){ echo "class='active'";}?>> <a href="<?php echo site_url('c_jemput/jadwalPenjemputan/Pesanan Diterima');?>">Pesanan Diterima</a></li>
                  <li <?php if($tabAdmin==''){ echo "class='active'";}?>> <a href="<?php echo site_url('c_jemput/jadwalPenjemputan/Menunggu Penjemputan');?>">Menunggu Penjemputan</a></li>
                  <li <?php if($tabAdmin==''){ echo "class='active'";}?>> <a href="<?php echo site_url('c_jemput/jadwalPenjemputan/Menjemput Pesanan');?>">Menjemput Pesanan</a></li>
                  <li <?php if($tabAdmin==''){ echo "class='active'";}?>> <a href="<?php echo site_url('c_jemput/jadwalPenjemputan/Merekap pesanan');?>">Menunggu Verifikasi</a></li>
                  <li <?php if($tabAdmin==''){ echo "class='active'";}?>> <a href="<?php echo site_url('c_jemput/jadwalPenjemputan/Selesai');?>">Selesai</a></li>
                </ul>
            </li>
            <li <?php if($tabAdmin=='10'){ echo "class='active'";}?>> <a href="<?php echo site_url('c_akun/ubahPasswordPetugas');?>"> <i class="fa fa-key"></i><span>Ubah Password</span></a></li>
            <li> <a href="<?php echo site_url('c_pengunjung/logout');?>"> <i class="fa fa-sign-out"></i><span>Logout</span></a></li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="page home-page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header">
                  <a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a>
                  <a href="berandaAdmin.php" class="navbar-brand">
                    <div class="brand-text d-none d-md-inline-block">
                        <strong class="text-primary"> Bank Sampah Malang </strong>
                    </div>
                  </a>
              </div>
            </div>
          </div>
        </nav>
      </header>
