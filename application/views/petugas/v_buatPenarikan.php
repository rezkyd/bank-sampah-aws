 
    <div class="breadcrumb-holder">
      <div class="container-fluid">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo site_url('c_akun/berandaPetugas');?>">Beranda</a></li>
          <li class="breadcrumb-item"><a href="v_lihatPenyetoran.php"> Penarikan Saldo</a></li>
          <li class="breadcrumb-item active">Buat Penarikan Saldo</li>
        </ul>
      </div>
    </div>
    <section class="forms">
      <div class="container-fluid">
        <header> 
          <h1 class="h3 display"><?php echo $page_title; ?></h1>
        </header>
        <div class="row">

          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <form class="form-horizontal" method="post" action="<?php if($page_title == 'Buat Penarikan') echo site_url('c_penarikan/insertPenarikan'); else echo site_url('c_penarikan/updatePenarikan'); ?>">
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">No Nota</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="noNota" value="<?php if(isset($noNota)) echo $noNota; ?>" required readonly>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Nomor Rekening</label>
                    <div class="col-sm-4">
                      <select name="username" id="username" class="form-control"  onchange="">
                        <option value="0">Pilih Nasabah</option>
                        <?php foreach ($usernam as $user) {
                          echo "<option value='$user[username]'>$user[username]</option>";
                        } ?>
                      </select> 
                    </div>
                  </div> 

                  <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Saldo</label>
                      <div class="col-sm-4">
                       <div class="input-group"><span class="input-group-addon">Rp</span>
                          <input type="text" class="form-control" id="saldo" name="saldo" value="<?php if(isset($saldo)) echo  $saldo; ?>" readonly>
                          <span class="input-group-addon">.00</span>
                        </div>
                       </div>
                  </div>

                  <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Tanggal</label>
                  <div class="col-sm-4">
                    <input type="date" name="tanggal" class="form-control" value="<?php if(isset($tanggal)) echo $tanggal; ?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Debet</label>
                  <div class="col-sm-4">
                    <div class="input-group"><span class="input-group-addon">Rp</span>
                      <input type="number" class="form-control" id="debet" name="debet" value="<?php if(isset($debet)) echo $debet; ?>" onkeyup="cekSaldo(); return false;" pattern="<?php if(isset($saldo)) echo  $saldo; ?>" title="Total Debet harus" required>
                      <span class="input-group-addon">.00</span>
                    </div>
                   
                 </div>
                 <div id="error-saldo"></div>
               </div>
             </div>
             <div class="form-group row">
              <div class="col-sm-4 offset-sm-2">
                <a type="submit" class="btn btn-secondary" href="<?php echo site_url('c_penarikan'); ?>">Batal</a>
                <button type="submit" name="simpan" class="btn btn-primary" id="simpan">Simpan</button>
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
  function cekSaldo(){
    var saldo = document.getElementById("saldo").value;
    var debet = document.getElementById("debet").value;
    var simpan = document.getElementById("simpan");
    var badColor = "#ff6666";
    var goodColor = "#66cc66";
    var message = document.getElementById('error-saldo');
    var minim = saldo*10/100 ;
    var X = saldo-minim;
    if(debet > X){
      message.style.color = badColor;
      message.innerHTML = "Saldo Tidak Mencukupi!"
      simpan.disabled = true;
    }else{
      message.style.color = goodColor;
      message.innerHTML = "ok!"    ;
      simpan.disabled = false

    }
                                  
  }
 
  $(document).ready(function() {
    // Fungsi untuk mengambil nilai saldo nasabah
    $("#username").change(function(){
      var username=$(this).val();
      $.ajax({
          type : "POST",
          url  : "<?php echo site_url('c_penarikan/getSaldo')?>", //Memanggil method getSaldo
          dataType : "JSON",
          data : {username: username},
          cache:false,
          success: function(data){
              $.each(saldo,function(saldo){
                  document.getElementById("saldo").value = data.saldo;
              });
          }
        });
      return false;
    });

    
  })
</script>