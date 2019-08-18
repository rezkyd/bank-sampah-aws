<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bank Sampah Malang</title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link href="<?php echo base_url();?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/style.default.css" rel="stylesheet" id="theme-stylesheet">
    <link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png" />
    <link href="<?php echo base_url();?>css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/owl.theme.css" rel="stylesheet">

</head>

<body>
    <div id="all">
        <header>
            <!-- *** TOP *** -->
            <div id="top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-5 contact">
                            <p class="hidden-sm hidden-xs">Telp/Fax (0341) 341618 atau banksampahmalang@yahoo.com</p>
                        </div>
                        <div class="col-xs-7">
                            <div class="login">
                                <a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Login</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
            <!-- *** LOGIN MODAL *** -->
            <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="Login">login nasabah BSM</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="<?php echo site_url('c_pengunjung/login'); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" id="email_modal" placeholder="username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="password_modal" placeholder="password">
                                </div>

                                <p class="text-center">
                                    <button class="btn btn-template-main" type="submit" name="login"><i class="fa fa-sign-in"></i> Log in</button> <br><br>
                                    <a href="<?php echo site_url('c_pengunjung/ubahPassword'); ?>" type="submit" name="lupa">Lupa Password?</a>
                                </p>
                            </form>
                            <p class="text-center text-muted">Belum Terdaftar? <br> Daftarkan akun anda pada kantor Bank Sampah Malang</p>
                        </div>
                    </div>
                </div>
            </div>

    