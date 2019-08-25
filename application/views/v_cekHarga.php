            <!-- *** NAVBAR *** -->
            <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">
                <div class="navbar navbar-default yamm" role="navigation" id="navbar">
                   <div class="container">
                        <div class="navbar-collapse collapse" id="navigation">
                            <ul class="nav navbar-nav navbar-right">
                                <li >
                                    <a href="<?php echo site_url('');?>">Beranda </a>
                                </li>
                                <li >
                                      <a href="<?php echo site_url('pengunjung/profilBSM');?>">profil</a>
                                  </li>
                                <li class="dropdown active">
                                    <a href="<?php echo site_url('pengunjung/cekHarga');?>">Harga Sampah BSM</a>
                                </li>
                                <li >
                                    <a href="<?php echo site_url('pengunjung/infonasabah');?>">Info Nasabah</a>
                                </li>
                            </ul>
                        </div>
                  </div>
                </div>
            </div>
            <!-- *** NAVBAR END *** -->
        </header>

        <div id="heading-breadcrumbs" style="margin-bottom: 0px">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>Harga Penjualan Sampah</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo site_url('');?>">Beranda</a>
                            </li>
                            <li>Cek Harga Sampah</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div id="content" style="margin-top: 40px">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-9 clearfix">
                        <section>
                            <div id="text-page">
                                <table class="table table-striped table-sm">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Kode Sampah</th>
                                        <th>Jenis Sampah</th>
                                        <th>Harga Jual</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      
                                      <?php 
                                      $no = 1;
                                      foreach ($data as $user) {?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $user['kodeSampah']; ?></td>
                                            <td><?php echo $user['jenisSampah']; ?></td>
                                            <td><?php echo $user['hargaJual']; ?></td>
                                        </tr>
                                        <?php $no++ ;} ?>
                                    </tbody>
                                  </table>    
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>