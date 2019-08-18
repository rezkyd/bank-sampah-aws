<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Driver BSM</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
  
    <link rel="stylesheet" href="<?php echo base_url();?>adm/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>adm/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>adm/css/fontastic.css">
    <link rel="stylesheet" href="<?php echo base_url();?>adm/css/robotto.css">
    <link rel="stylesheet" href="<?php echo base_url();?>adm/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>adm/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>adm/css/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>adm/css/custom.css">
    <link rel="shortcut icon" href="<?php echo base_url();?>adm/favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
         <div class="sidenav-header d-flex align-items-center justify-content-center">
            
            <div class="sidenav-header-inner text-center">
                <strong > DRIVER BSM </strong>
            </div>
            <div class="sidenav-header-logo">
               <a href="index.html" class="brand-small text-center"><strong class="text-primary">BSM</strong></a>
            </div>
        </div>

        
       <div class="main-menu">
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li <?php if($tabDriver=='1'){ echo "class='active'";}?>> <a href="<?php echo site_url('c_akun/berandaPetugas');?>"> <i class="fa fa-user"> </i><span>Beranda</span></a></li>
            <li > <a href="#pages-nav-list" data-toggle="collapse" aria-expanded="false"><i class="fa fa-truck"></i><span>Jemput Sampah</span>
                <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
                <ul id="pages-nav-list" class="collapse list-unstyled">
                  <li <?php if($tabDriver=='2'){ echo "class='active'";}?>> <a href="<?php echo site_url('c_jemput/jadwalHarian');?>">Jadwal Hari Ini</a></li>
                  <li <?php if($tabDriver=='3'){ echo "class='active'";}?>> <a href="<?php echo site_url('c_jemput/jadwalPenjemputan/'.'Menunggu Penjemputan');?>">Semua Jadwal</a></li>
                </ul>
            </li>
            <li <?php if($tabDriver=='4'){ echo "class='active'";}?>> <a href="<?php echo site_url('c_akun/ubahPasswordPetugas');?>"> <i class="fa fa-key"></i><span>Ubah Password</span></a></li>
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
                <a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><strong class="text-primary">Bank Sampah Malang</strong></div>
                </a>
              </div>
             
            </div>
          </div>
        </nav>
      </header>
