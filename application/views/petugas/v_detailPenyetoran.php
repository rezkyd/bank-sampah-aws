 


      <div class="breadcrumb-holder">   
        <div class="container-fluid"><?php if(isset($akun) != 'n'){?>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url('akun/berandaPetugas');?>">Beranda</a></li>
             <li class="breadcrumb-item active"><a href="<?php echo site_url('penyetoran');?>">Penyetoran Sampah</a></li>
            <li class="breadcrumb-item active">Detail Penyetoran Sampah</li>
          </ul><?php }?>
        </div>
      </div>
      
      <section class="charts">
        <div class="container-fluid">
          <div> 
            <h1 style="padding-top: 20px">Detail Penyetoran Sampah</h1> <br>
          </div>
          
          <div class="row">
              <div class="col-lg-9 card">
                <div class="card-body" style="font-size: 14px;padding:10px">
                    <div class="form-group row" style="margin-bottom:5px">
                      <label class="col-sm-4">No Nota</label>
                      <label class="col-sm-5"><?php echo ":  ". $noNota; ?></label>
                    </div>
                    <div class="form-group row" style="margin-bottom:5px">
                      <label class="col-sm-4">Nomor Rekening</label>
                      <label class="col-sm-5"><?php echo ":  ". $username; ?></label>
                    </div>
                    <div class="form-group row" style="margin-bottom:5px">
                      <label class="col-sm-4">Tanggal Penyetoran</label>
                      <label class="col-sm-5"><?php echo ":  ". $tanggal; ?></label>
                    </div>
                    <div class="form-group row" style="margin-bottom:5px">
                      <label class="col-sm-4">Status</label>
                      <label class="col-sm-5"><?php echo ":  ". $status; ?></label>
                      <?php if(isset($akun) == 'a' && $status == 'Belum Diverifikasi'){?>
                          <button type="button" href="#" class="btn btn-primary" data-toggle="modal" data-target="#status-modal">Verifikasi</button> 
                      <?php }?>
                    </div>
                    
                        <input type="hidden" name="idJemput" value="<?= $idJemput?>">
                </div>
                <div class="card-body col-sm-12" style="padding:10px">
                  <table class="table table-striped table-sm">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Kode Sampah</th>
                        <th>Jenis Sampah</th>
                        <th>Berat Sampah (KG)</th>
                        <th>Harga Jual</th>
                        <th>Total Harga</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php 
                      $no = 1;
                      foreach ($data as $user) {?>
                        <tr> 
                            <td> <?php echo $no;?>
                            <td><?php echo $user['kodeSampah']; ?></td>
                            <td><?php echo $user['jenisSampah']; ?></td>
                            <td><?php echo $user['berat']; ?></td>
                            <td><?php echo "Rp.".$user['hargaJual'].",00"; ?></td>
                            <td><?php echo "Rp.".$user['subTotal'].",00"; ?></td>
                        </tr>
                        <?php $no++;} ?>
                        <tr>
                            <td colspan="5" style="text-align: right; padding-right: 30px">Total Kredit </td>
                            <td colspan="2"> <?php echo "Rp.".$kredit.",00" ; ?> </td>
                        </tr>
                    </tbody>
                  </table>    
                </div>
                
              </div>
            </div>
          </div>
      </section>
    </div>

 <div class="modal fade" id="status-modal" tabindex="-1" role="dialog"  >
        <div class="modal-dialog modal-sm " >
          <div class="modal-content " style="width: 350px;height: 250px">
            <div class="modal-header">
                <h4 class="modal-title" id="status">Status Penjemputan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body"><center>

                <form method="post" action="<?php echo site_url('penyetoran/verifPenyetoran'); ?>">
                    <div class="form-group">
                        <p> Validasi Transaksi Penyetoran Sampah?</p>
                        <input type="hidden" name="nextStat" id="nextStat" value="Selesai">
                        <input type="hidden" name="idJemput" value="<?= $idJemput?>">
                        <input type="hidden" name="username" value="<?= $username?>">
                        <input type="hidden" name="noNota" value="<?= $noNota?>">
                        <input type="hidden" name="tanggal" value="<?= $tanggal?>">
                        <input type="hidden" name="kredit" value="<?= $kredit?>">
                    </div>
                    <p class="text-center">
                      <a type="submit" class="btn btn-secondary" href="<?php echo site_url('jemput/cekLokasi/'.$idJemput); ?>">Tidak</a>
                      <button class="btn btn-primary" type="submit" name="status">Ya</button> <br><br>
                    </p>
                </form>
            </div>
          </div>
        </div>
    </div>