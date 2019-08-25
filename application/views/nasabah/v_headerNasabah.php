<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nasabah BSM</title>
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
    <link rel="shortcut icon" href="https://projectakhir.s3.amazonaws.com/adm/favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
         <div class="sidenav-header d-flex align-items-center justify-content-center">
            
            <div class="sidenav-header-inner text-center">
                <strong > NASABAH BSM </strong>
            </div>
            <div class="sidenav-header-logo">
               <a href="index.html" class="brand-small text-center"><strong class="text-primary">BSM</strong></a>
            </div>
        </div>

        <div class="main-menu">
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li <?php if($tabNasabah=='1'){ echo "class='active'";}?>> <a href="<?php echo site_url('nasabah/profilNasabah');?>"><i class="icon-user"></i><span>Profil Nasabah</span></a></li>
            <li <?php if($tabNasabah=='2'){ echo "class='active'";}?>> <a href="<?php echo site_url('nasabah/bukuTabungan');?>"><i class="fa fa-credit-card"></i><span>Buku Tabungan </span></a></li>
            <li <?php if($tabNasabah=='3'){ echo "class='active'";}?>> <a href="<?php echo site_url('nasabah/jemputSampah');?>"> <i class="fa fa-truck"> </i><span>Jemput Sampah</span></a></li>
<!--             <li <?php if($tabNasabah=='4'){ echo "class='active'";}?>> <a href="<?php echo site_url('nasabah/cekHargaNasabah');?>"> <i class="fa fa-money"></i><span>Cek Harga</span></a></li> -->
            <li <?php if($tabNasabah=='4'){ echo "class='active'";}?>> <a href="<?php echo site_url('nasabah/lihatPenyetoran');?>"> <i class="fa fa-balance-scale"></i><span>Penyetoran Sampah</span></a></li>
            <li <?php if($tabNasabah=='5'){ echo "class='active'";}?>> <a href="<?php echo site_url('nasabah/ubahPassword');?>"> <i class="fa fa-key"></i><span>Ubah Password</span></a></li>
            <li> <a href="<?php echo site_url('pengunjung/logout');?>"> <i class="fa fa-sign-out"></i><span>Logout</span></a></li>
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
