 

      <div class="breadcrumb-holder">   
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url('c_akun/berandaPetugas');?>">Beranda</a></li>
            <li class="breadcrumb-item active">Data Akun</li>
          </ul>
        </div>
      </div>
      
      <section class="charts">
        <div class="container-fluid">
          
          <div class="row">
            <div class="col-lg-12 card">
               <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display">Data Akun Nasabah</h2>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-sm">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>username / No.Rek</th>
                        <th>Alamat</th>
                        <th>Tipe Nasabah</th>
                        <th>email </th>
                        <th>No HP </th>
                        <th>Saldo </th>
                        <th colspan="2">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php 
                      $no = 1;
                      foreach ($dataNasabah as $user) {?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $user['nama']; ?></td>
                            <td><?php echo $user['username']; ?></td>
                            <td><?php echo $user['alamat']; ?></td>
                            <td><?php echo $user['tipeNasabah']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['noHP']; ?></td>
                            <td>Rp. <?php echo $user['saldo']; ?>,00</td>
                            <td><a id="edit" class="btn btn-sm btn-primary" href="<?php echo base_url()."index.php/c_akun/editNasabah/".$user['username']; ?>"><i class="fa fa-pencil"></i></td>
                            <td><a id="hapus" class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#hapus-modal" ><i class="fa fa-trash"></td>
                        </tr>
                        <?php $no++;} ?>
                    </tbody>
                  </table>    
                </div>
              </div>
            </div>
      </section>
  
      <div class="modal fade" id="hapus-modal" tabindex="-1" role="dialog"  >
        <div class="modal-dialog modal-sm " >
          <div class="modal-content " style="width: 350px;height: 250px">
            <div class="modal-header">
                <h4 class="modal-title" id="status">Menghapus Akun</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body"><center>

                <form method="post" action="<?php echo site_url('c_akun/hapusNasabah/'.$user['username']); ?>">
                    <div class="form-group">
                        <p>Apakah anda akan menghapus akun <?php echo $user['username']?>?</p>
                    </div>
                    <p class="text-center">
                      <a type="submit" class="btn btn-secondary" href="<?php echo site_url('c_akun'); ?>">Tidak</a>
                      <button class="btn btn-primary" type="submit" name="status">Ya</button> <br><br>
                    </p>
                </form>
            </div>
          </div>
        </div>
      </div>