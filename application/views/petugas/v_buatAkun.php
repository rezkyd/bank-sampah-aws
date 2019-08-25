      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url('akun/berandaPetugas');?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?php echo site_url("akun"); ?>">Data Akun</a></li>
            <li class="breadcrumb-item active">Buat Akun</li>
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
                  <form class="form-horizontal" method="post" action="<?php if($page_title == 'Buat Akun') echo site_url('akun/insertAkun'); else echo site_url("akun/updateNasabah/".$username); ?>">
                    
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Tipe Akun</label>
                      <div class="col-sm-4 select" >
                        <select name="tipeAkun" id="tipeAkun" class="form-control" onchange="" required>
                          <option value="">---- Pilih Tipe Akun ---</option>
                          <optgroup label="Tipe Nasabah">
                              <option value="Nasabah Kelompok" <?php if(isset($tipeAkun) && $tipeAkun=='Nasabah Kelompok') echo 'selected';?>>Nasabah kelompok</option>
                              <option value="Nasabah Instansi" <?php if(isset($tipeAkun) && $tipeAkun=='Nasabah Instansi') echo 'selected';?>>Nasabah Instansi</option>
                              <option value="Nasabah Sekolah" <?php if(isset($tipeAkun) && $tipeAkun=='Nasabah Sekolah') echo 'selected';?>>Nasabah Sekolah</option>
                              <option value="Nasabah Individu" <?php if(isset($tipeAkun) && $tipeAkun=='Nasabah Individu') echo 'selected';?>>Nasabah Individu</option>
                          </optgroup>
                          <optgroup label="Tipe Petugas">
                              <option value="Admin" <?php if(isset($tipeAkun) && $tipeAkun=='Admin') echo 'selected';?>>Admin</option>
                              <option value="Driver" <?php if(isset($tipeAkun) && $tipeAkun=='Driver') echo 'selected';?>>Driver</option>
                          </optgroup>
                        </select>
                      </div>
                    </div>

                    <div id="buatakun"></div>
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
                        <label class="col-sm-2 form-control-label">Email</label>
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
                 
                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-2">
                        <a type="submit" class="btn btn-secondary" href="<?php echo site_url('akun'); ?>">Batal</a>
                        <button type="submit" class="btn btn-primary">Buat Akun</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

<script type="text/javascript">
  $(document).ready(function() {
    $("#tipeAkun").change(function(){
      var tipeAkun = $("#tipeAkun").val();
      $.ajax({
        type: "POST",
        url : "<?php echo site_url('akun/get_detail_form'); ?>",
        data: "tipeAkun="+tipeAkun,
        cache:false,
        success: function(data){
          $('#buatakun').html(data);
        }
      });
    });
  })

</script>