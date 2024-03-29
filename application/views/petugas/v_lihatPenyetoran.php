 


      <div class="breadcrumb-holder">   
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url('c_akun/berandaPetugas');?>">Beranda</a></li>
            <li class="breadcrumb-item active">Penyetoran Sampah</li>
          </ul>
        </div>
      </div>
      
      <section class="charts">
        <div class="container-fluid">
          <header> 
            <h1 class="h3">Penyetoran Sampah</h1> <br>
            <a id="buat" href="<?php echo site_url('c_penyetoran/tambahPenyetoran');?>" class="btn btn-info"><i class="fa fa-plus-circle"> </i> Tambah Transaksi Penyetoran </a>
           </header>
          
          <div class="row">
              <div class="col-lg-8 card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display">Penyetoran Sampah</h2>
                </div>
                <div class=" card-body">
                  <table class="table table-striped table-sm">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th style="width: 100px">No Nota</th>
                        <th style="width: 100px">No. Rek</th>
                        <th style="width: 200px">Tanggal Penyetoran </th>
                        <th style="width: 150px">Total Kredit</th>
                        <th colspan="2" >Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php 
                      $no = 1;
                      foreach ($dataPenyetoran as $data) {?>
                        <tr>
                            <td> <?php echo $no; ?></td>
                            <td><?php echo $data['noNota']; ?></td>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['tanggal']; ?></td>
                            <td><?php echo "Rp. ".$data['kredit'].",00"; ?></td>
                            <td><a id="detail" class="btn btn-sm btn-primary" href="<?php echo site_url('c_penyetoran/detailPenyetoran?noNota='.$data['noNota']); ?>">Detail</td>
                            <td><a id="hapus" class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#hapus-modal"><i class="fa fa-trash"></i></td>
                        </tr>
                        <?php $no++;} ?> 
                    </tbody>
                  </table>    
                </div>
              </div>
            </div>
          </div>
      </section>
    <div class="modal fade" id="hapus-modal" tabindex="-1" role="dialog"  >
        <div class="modal-dialog modal-sm " >
          <div class="modal-content " style="width: 350px;height: 200px">
            <div class="modal-header">
                <h4 class="modal-title" id="status">Menghapus Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body"><center>

                <form method="post" action="<?php echo site_url('c_penyetoran/hapusPenyetoran?id='.$data['noNota']."&kredit=".$data['kredit']."&user=".$data['username']);?>">
                    <div class="form-group">
                        <p>Apakah anda akan menghapus transaksi?</p>
                    </div>
                    <p class="text-center">
                      <a type="submit" class="btn btn-secondary" href="<?php echo site_url('c_penyetoran'); ?>">Tidak</a>
                      <button class="btn btn-primary" type="submit" name="status">Ya</button> <br><br>
                    </p>
                </form>
            </div>
          </div>
        </div>
      </div>
