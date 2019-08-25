      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url('akun/berandaPetugas');?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?php echo site_url("akun"); ?>">Data Akun</a></li>
            <li class="breadcrumb-item active">Edit Akun</li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <header> 
            <h1 class="h3 display"><?php echo $page_title; ?></h1>
          </header>
          <div class="row">
            
            <div class="col-lg-9">
              <div class="card">
                <div class="card-body">
                  <form class="form-horizontal" method="post" action="<?php echo site_url("akun/updateAkun/".$username);?>">
                    <div class="form-group row">
                    <?php if($akun=='n'){ ?>
                        <label class="col-sm-2 form-control-label"> Tipe Nasabah</label>
                        <div class="col-sm-4">
                            <input type="text" name="tipeNasabah" id="tipeNasabah" class="form-control" value="<?php if(isset($tipeNasabah)) echo $tipeNasabah; ?>" readonly>
                        </div>
                    <?php }else{ ?>
                        <label class="col-sm-2 form-control-label"> Tipe Petugas</label>
                        <div class="col-sm-4">
                            <input type="text" name="tipe" id="tipe" class="form-control" value="<?php if(isset($tipe)) echo $tipe;?>" readonly>
                        </div>
                    <?php } ?>                  
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Username</label>
                        <div class="col-sm-4">
                            <input type="text" name="username" class="form-control" value="<?php if(isset($username)) echo $username; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Nama</label>
                        <div class="col-sm-4">
                          <input type="text" name="nama" class="form-control" value="<?php if(isset($nama)) echo $nama; ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Alamat</label>
                        <div class="col-sm-4">
                          <input type="text" name="alamat" class="form-control" value="<?php if(isset($alamat)) echo $alamat; ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">e-mail</label>
                        <div class="col-sm-4">
                          <input type="email" name="email" class="form-control" value="<?php if(isset($email)) echo $email; ?>" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">No HP</label>
                        <div class="col-sm-4">
                          <input type="text" name="noHP" class="form-control" value="<?php if(isset($noHP)) echo $noHP; ?>" required>
                        </div>
                    </div>

                    <input type="hidden" name="akun" value="<?= $akun?>">

                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-2">
                        <a type="submit" class="btn btn-secondary" href="<?php if($akun=='n'){ echo site_url('akun');} else{ echo site_url('akun/lihatPetugas');} ?>">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
