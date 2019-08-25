       <div class="breadcrumb-holder">   
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url('nasabah/profilNasabah');?>">Beranda</a></li>
            <li class="breadcrumb-item active">Jemput Sampah</li>
          </ul>
        </div>
      </div>
      
      <section class="charts">
        <div class="container-fluid">
          <header> 
            <h1 class="h3">Data Akun BSM</h1> <br>

            <?php if($newOrder == 'y') {?>
              <a id="buat" href="<?php echo site_url('nasabah/buatJemput');?>" class="btn btn-info" ><i class="fa fa-plus-circle"> </i> Pesan Jemput Sampah </a>
            <?php }else if($newOrder == 'n'){ ?>
              <button type="button" class="btn btn-info" id="order" onclick="newOrder()"> Pesan Jemput Sampah</button>
              
              <?php }?>
           </header>
          
          <div class="row">
            <div class="col-lg-12 card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display">Penjemputan Sampah </h2>
                </div>
                <div class="card-body col-sm-88vu">
                  <table class="table table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>ID Penjemputan</th>
                            <th>Tanggal</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th >Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $no = 1;
                          foreach ($dataPesanan as $data) {?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data['idJemput']; ?></td>
                                <td><?php echo $data['tanggalJemput']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td style="color: #40bf40"><?php echo $data['status']; ?></td>
                                <input type="hidden" name="username" value="<?= $data['username']; ?>" > 
                                <td><a class="btn btn-success" id="lokasi"  href="<?php echo base_url()."index.php/nasabah/lacakPesanan/".$data['idJemput']; ?>" style="font-size: 12px;font-color:black"> Lihat Penjemputan </a></td>
                            </tr>
                            <?php $no++;} ?>
                        </tbody>
                      </table>  
                </div>
              </div>
            </div>
      </section>
      <script type="text/javascript">
          function newOrder(){
            alert ("Maaf anda tidak dapat memesan! Anda sedang memiliki pesanan yang sedang diproses!");
          }
      </script>
    </div>
