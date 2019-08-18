

            <!-- *** NAVBAR *** -->
            <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">
                <div class="navbar navbar-default yamm" role="navigation" id="navbar">
                    <div class="container">
                        <div class="navbar-collapse collapse" id="navigation">
                            <ul class="nav navbar-nav navbar-right">
                               <li class="dropdown active">
                                    <a href="<?php echo site_url('');?>">Beranda </a>
                                </li>
                                <li >
                                      <a href="<?php echo site_url('c_pengunjung/profilBSM');?>">profil</a>
                                </li>
                                <li >
                                    <a href="<?php echo site_url('c_pengunjung/cekHarga');?>">Harga Sampah BSM</a>
                                </li>
                                <li >
                                    <a href="<?php echo site_url('c_pengunjung/infonasabah');?>">Info Nasabah</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section style="margin-bottom: 0px">
            <!-- *** HOMEPAGE CAROUSEL *** -->
            <div class="home-carousel" >
                <div class="dark-mask"></div>
                <div class="container">
                    <div class="homepage owl-carousel">
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-4 right">
                                    <img src="img/logobsm.png" alt="">
                                </div>
                                <div class="col-sm-8">
                                    <h2 class="text-uppercase">Bank Sampah Malang</h2>
                                    <p class="mb-small">Bank Sampah Malang (BSM) merupakan Bank Sampah Induk yang ada di Kota Malang berbadan hukum Koperasi yang pendiriannya difasilitasi oleh Pemerintah Kota Malang bersama dengan Kader Lingkungan Kota Malang yang disahkan oleh Walikota Malang tanggal 16 Agustus 2011. </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- JUMLAH NASABAH -->
         <section class="bar background-pentagon no-mb">
            <div class="container">
                <div class="row showcase">
                    <div class="col-md-3 col-sm-6">
                        <div class="item">
                            <div class="icon"><i class="fa fa-user"></i>
                            </div>
                            <h4><span class="counter"><?php echo $NasabahIndividu ;?></span><br> Nasabah Individu</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="item">
                            <div class="icon"><i class="fa fa-users"></i>
                            </div>
                            <h4><span class="counter"><?php echo $NasabahKelompok ;?></span><br> Nasabah Kelompok </h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="item">
                            <div class="icon"><i class="fa fa-users"></i>
                            </div>
                            <h4><span class="counter"><?php echo $NasabahSekolah ;?></span><br> Nasabah Sekolah </h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="item">
                            <div class="icon"><i class="fa fa-users"></i>
                            </div>
                            <h4><span class="counter"><?php echo $NasabahInstansi ;?></span><br> Nasabah Instansi </h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bar background-image-fixed-2 no-mb color-white text-center">
            <div class="dark-mask"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="icon icon-lg"><i class="fa fa-file-code-o"></i>
                        </div>
                        <h3 class="text-uppercase">Ingin Bergabung dengan kami?</h3>
                        <p class="text-center">
                            <a href="<?php echo site_url('c_pengunjung/infonasabah');?>" class="btn btn-template-transparent-black btn-lg">Daftar Nasabah BSM</a>
                        </p>
                    </div>

                </div>
            </div>
        </section>

