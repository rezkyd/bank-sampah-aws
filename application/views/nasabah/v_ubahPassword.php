 

      <section class="charts">
        <div class="container-fluid">
          <header> 
            <h1 class="h1">Buku Tabungan BSM</h1>  
          </header>
          
          <div class="row">
            <div class="col-lg-11 card">
              <div class="card-body">
                <form class="form-horizontal" method="post" action="<?php echo site_url('c_akun/updatePassword');?>">
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Password Lama</label>
                        <div class="col-sm-4">
                          <input type="Password" name="lama" id="lama" class="form-control" title="Masukkan Password Lama" onkeyup="cekPassLama(); return false;" title="Masukkan Password Lama" pattern=".{6,6}" required>
                        </div>
                         <div id="error-passLama"></div>

                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Password Baru</label>
                        <div class="col-sm-4">
                          <input type="Password" name="baru" class="form-control" required id="baru" onkeyup="checkPass(); return false;" title="Password harus terdiri dari 6 huruf/bilangan!" pattern=".{6,6}">
                          
                        </div>
                        <div id="error-passBaru"></div>
                    </div>

                    <input type="hidden" class="form-control" id="password" name="password" value="<?php if(isset($password)) echo $password; ?>" required>
                    
                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-2">
                        <a type="submit" class="btn btn-secondary" href="<?php if($tipe == 'nasabah'){ echo site_url('c_akun/profilNasabah'); }else{ echo site_url('c_akun/berandaPetugas');}  ?>">Batal</a>
                        <button type="submit" class="btn btn-primary" id="simpan">Simpan Perubahan</button>
                      </div>
                    </div>
                  </form>        
              </div>  
            </div>
          </div>
        </div>
      </section>

<script type="text/javascript">

  var simpan = document.getElementById("simpan");
  var badColor = "#ff6666";
  var goodColor = "#66cc66";
  
  function checkPass(){
    var passBaru = document.getElementById('baru');

    var message = document.getElementById('error-passBaru');
    
    if(passBaru.value.length != 6){
      message.style.color = badColor;
      message.innerHTML = "Password harus terdiri dari 6 huruf/bilangan!";
      simpan.disabled = true;
    }else if(passBaru.value.length == 6) {
      message.style.color = goodColor;
      message.innerHTML = "ok!";
      simpan.disabled = false;    
    }
}  

  function cekPassLama(){
    var passLama = document.getElementById('lama');
    var password = document.getElementById('password');
    var message = document.getElementById('error-passLama');
    
    if(passLama.value == password.value){
      message.style.color = goodColor;
      message.innerHTML = "ok!";
      simpan.disabled= false;
    }else if(passLama.value != password.value) {
     // alert(passLama);
      message.style.color = badColor;
      message.innerHTML = "Password Salah!";
      simpan.disabled = true;
    }
}  
</script>
