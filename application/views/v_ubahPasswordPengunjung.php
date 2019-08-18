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
                                      <a href="<?php echo site_url('c_pengunjung/profilBSM');?>">profil</a>
                                  </li>
                                <li >
                                    <a href="<?php echo site_url('c_pengunjung/cekHarga');?>">Harga Sampah BSM</a>
                                </li>
                                <li>
                                    <a href="style="margin-bottom: 0px"">Info Nasabah</a>
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
                        <h1>Lupa Password</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo site_url('');?>">Home</a>
                            </li>
                            <li>Lupa Password</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div class="bar background-gray no-mb" style="height: 400px">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 clearfix">
                        <section>
                            <form action="<?php echo site_url('c_akun/lupaPassword');?>" method="post">
                                <div class="row">
                                    <div class="col-sm-5"> </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" style="width: 370px">
                                        </div>
                                    </div>

                                    <div class="col-sm-6"> </div>
                                    <div class="col-sm-5 text-center">
                                        <a type="submit" class="btn btn-secondary" href="<?php echo site_url(''); ?>">Batal</a>
                                        <button type="submit" class="btn btn-template-main"><i class="fa fa-envelope-o"></i> Kirim Password</button>

                                    </div>
                                </div>
                                <!-- /.row -->
                            </form>
                               
                        </section>
                    </div>
                </div>
            </div>
        </div>