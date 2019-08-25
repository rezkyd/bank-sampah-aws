
    <section class="forms">
      <div class="container-fluid">
        <header> 
          <h1 class="h3 display"><?php echo $page_title; ?></h1>
        </header>
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body row">
                <form class="form-horizontal row" method="post" action="<?php if($tipe == 'Driver') echo site_url('penyetoran/rekapPenyetoranDriver'); else echo site_url('penyetoran/insertPenyetoran'); ?>">   
                    <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-4 form-control-label">No Nota</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" name="noNota" value="<?php if(isset($noNota)) echo $noNota; ?>" required readonly>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 form-control-label">Nomor Rekening</label>
                           <div class="col-sm-5">
                            <?php if($username != NULL){?>
                              <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" required readonly>
                            <?php }else{?>
                               <select name="username" id="username" class="form-control"  value="" onchange="">
                                <option value="">Pilih Nasabah</option>
                                <?php foreach ($listUser as $user) {
                                  echo "<option value='$user[username]'>$user[username]</option>";
                                } ?>
                              </select> 
                            <?php }?>
                            </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 form-control-label">Tanggal</label>
                          <div class="col-sm-5">
                            <input type="date" name="tanggal" class="form-control" value="" required>
                          </div>
                        </div>
                        <input type="hidden" class="form-control" id="count" name="count" value="">
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-4 form-control-label">Kode Sampah</label>
                          <div class="col-sm-5 select">
                            <select name="kodeSampah[]"  id="kodeSampah" class="form-control" >
                              <option value="">Pilih Kode</option>
                              <?php 
                              if(isset($kode)){
                                foreach ($kode as $kode) {
                                  echo "<option value='$kode[kodeSampah]'>$kode[kodeSampah]</option>";
                                }
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 form-control-label">Jenis Sampah</label>
                          <div class="col-sm-5">
                            <div class="input-group">
                              <input type="text" class="form-control" id="jenisSampah" name="jenisSampah[]" required readonly>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 form-control-label">Harga Jual</label>
                          <div class="col-sm-5">
                              <div class="input-group"><span class="input-group-addon">Rp</span>
                                <input type="text" class="form-control" id="hargaJual" name="hargaJual[]" required readonly><span class="input-group-addon">.00</span>
                              </div>
                            
                          </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 form-control-label">Berat Sampah</label>
                            <div class="col-sm-5">
                                <input type="number" name="berat[]" id="berat" class="form-control" required="" pattern="[0-9]" onchange="hitungSubTotal();">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 form-control-label">Total Harga</label>
                            <div class="col-sm-5">
                              <div class="input-group"><span class="input-group-addon">Rp</span>
                                <input type="text" class="form-control" id="subTotal" name="subTotal[]" required readonly><span class="input-group-addon">.00</span>
                              </div>
                            </div>
                        </div>
                        
                        <button type="button" id="btn-tambah" class="btn btn-primary" onclick="countSampah()">Tambah Barang</button>
                    </div>
                                       
                    <div class="card-body col-sm-11">
                      <table id="table2" class="table table-striped table-sm">
                        <thead style="text-align: center">
                            <tr>
                              <th style="width: 20px">Pilih</th>
                              <th style="width: 20px">No</th>
                              <th style="width: 100px">Kode Sampah</th>
                              <th style="width: 200px">Jenis Sampah</th>
                              <th style="width: 200px">Harga Jual</th>
                              <th style="width: 100px">Berat Sampah (KG)</th>
                              <th style="width: 200px">Total Harga</th>
                            </tr> 
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                          <tr>
                              <td colspan="6" style="text-align: right; padding-right: 30px">Total Penyetoran </td>
                              <td colspan="1"> 
                                <div class="input-group"><span class="input-group-addon">Rp</span>
                                  <input type="text" class="form-control" id="kredit" name="kredit" required readonly><span class="input-group-addon">.00</span>
                                </div>
                              </td>
                          </tr>
                        </tfoot>
                      </table>  
                      
                      
                          <div id="insert-form"></div>
                          
                          <input type="hidden" id="jemputSampah" name="jemputSampah" value="<?php if(isset($jemputSampah)) echo $jemputSampah ?>">
                          <input type="hidden" id="idJemput" name="idJemput" value="<?php if(isset($idJemput)) echo $idJemput ?>">

                          <div class="form-group row">
                            <div class="col-sm-4 offset-sm-2">  
                              <button type="button" class="delete-row btn btn-secondary">Hapus</button>

                              <?php  if ($tipe == 'Driver'){ ?>
                                <a type="submit" class="btn btn-secondary" href="<?php echo site_url('jemput/detailPenjemputan/'.$idJemput); ?>">Batal</a>
                              <?php }else if($tipe == 'Admin'){?> 
                                <a type="submit" class="btn btn-secondary" href="<?php echo site_url('penyetoran'); ?>">Batal</a>
                              <?php }?>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                          </div>    
                    </div>
                  </form>
                  <input type="hidden" id="jumlah-form" value="1">
                </div>
              </div>
          </div>
        </div>
      </div>
    
    </section>
    
<script type="text/javascript">
  var counter=0;
  var total =  parseInt('0');
    function hitungSubTotal() {
      var x = document.getElementById("berat").value;
      var y = document.getElementById("hargaJual").value;
      var z = x*y;
      document.getElementById("subTotal").value = z;
    }

    function getKodeSampah(){
      var kodeSampah = $("#kodeSampah").val();
      return kodeSampah;
    }

    function getBerat(){
      var berat = $("#berat").val();
      return berat;
    }

    function getHargaJual(){
      var hargaJual = $("#hargaJual").val();
      return hargaJual;
    }

    function getSubTotal(){
      var subTotal = $("#subTotal").val();
      return subTotal;
    }

    function getJenisSampah(){
      var jenisSampah = $("#jenisSampah").val();
      return jenisSampah;
    }

    function setTable(){
      var kodeSampah = getKodeSampah();
      var berat = getBerat();
      var hargaJual = getHargaJual();
      var subTotal = getSubTotal();
      var jenisSampah = getJenisSampah();

    }

    var temp  = null;

    $(document).ready(function(){
        $("#btn-tambah").click(function(){
            var countSampah = $("#countSampah").val();
            var kodeSampah2 = document.getElementById("kodeSampah").value;
            var berat = getBerat();
            var hargaJual = getHargaJual();
            var subTotal = getSubTotal();
            var jenisSampah = getJenisSampah();
            var obj = {};
            var statuInput = false;
            var index = 0;
            if(temp === null){
                counter+=1;
               obj = {
                  "kodeSampah" : kodeSampah2,
                  "subTotal" : subTotal,
                  "berat" :berat,
                  "hargaJual" : hargaJual,
                  "jenisSampah" : jenisSampah
                  }
                ;
                temp = [
                  {
                    "kodeSampah" : obj
                  }
                ];

              }else{
            
                var count = 0;
                temp.forEach( data => {

                  console.log("kodeSampah :" + data.kodeSampah.kodeSampah);
                  console.log("data input  :" + kodeSampah2);
                  if(data.kodeSampah.kodeSampah === kodeSampah2){
                    index = count;
                    statuInput = false;
                  }else{
                    statuInput = true;                    
                  }

                  count++;
                });

                if(statuInput == true){
                  obj = {
                        "kodeSampah" : {
                          "kodeSampah" : kodeSampah2,
                          "subTotal" : subTotal,
                          "berat" :berat,
                          "hargaJual" : hargaJual,
                          "jenisSampah" : jenisSampah
                        }
                      }
                    ;
                  temp.push(obj);
                }else{
                  temp[index].kodeSampah.subTotal = parseInt(temp[index].kodeSampah.subTotal) + parseInt(subTotal);
                  temp[index].kodeSampah.berat = parseInt(temp[index].kodeSampah.berat) + parseInt(berat);
                }

              }
            
            $("#table2 tbody").empty();

            temp.forEach( data =>  {

              var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + counter + "</td><td><input type='text' class='form-control' id='kodeSampah' name='kodeSampah[]' readonly value="+ data.kodeSampah.kodeSampah +"></td><td><input type='text' class='form-control'  id='jenisSampah' name='jenisSampah[]' readonly value=\""+ data.kodeSampah.jenisSampah +"\"></td><td><div class='input-group'><span class='input-group-addon'>Rp</span><input type='text' class='form-control'  id='hargaJual' name='hargaJual[]' readonly value="+ data.kodeSampah.hargaJual+"><span class='input-group-addon'>.00</span></div></td><td><input type='text' name='berat[]' id='berat' class='form-control' readonly value="+ data.kodeSampah.berat+"></td><td><div class='input-group'><span class='input-group-addon'>Rp</span><input type='text' class='form-control' id='subTotal' name='subTotal[]' readonly value="+ data.kodeSampah.subTotal+"><span class='input-group-addon'>.00</span></div></td></tr>";

              $("table tbody").append(markup);

              console.log(data.kodeSampah.kodeSampah);
            });



        
        });

        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
              if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });     

        $("#kodeSampah").change(function(){
          var kodeSampah=$(this).val();
          $.ajax({
              type : "POST",
              url  : "<?php echo site_url('penyetoran/getHarga')?>",
              dataType : "JSON",
              data : {kodeSampah: kodeSampah},
              cache:false,
              success: function(data){
                  $.each(data,function(kodeSampah,hargaJual){
                      $('[name="hargaJual"]').val(data.hargaJual);
                      
                      document.getElementById("hargaJual").value = data.hargaJual;
                  });
                  
              }
          });

           $.ajax({
              type : "POST",
              url  : "<?php echo site_url('penyetoran/getJenis')?>",
              dataType : "JSON",
              data : {kodeSampah: kodeSampah},
              cache:false,
              success: function(data){
                  $.each(data,function(kodeSampah,jenisSampah){
                      $('[name="jenisSampah"]').val(data.jenisSampah);
                      
                      document.getElementById("jenisSampah").value = data.jenisSampah;
                  });
                  
              }
          });
          return false;
     });

    });  


  </script>
