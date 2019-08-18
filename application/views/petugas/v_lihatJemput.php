      <div class="breadcrumb-holder">   
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url('c_akun/berandaPetugas');?>">Beranda</a></li>
            <li class="breadcrumb-item">Jadwal Penjemputan</li>
            <li class="breadcrumb-item active"> <?php if (isset($stat)){ echo $stat ;}else echo "Semua Jadwal";?></li>
          </ul>
        </div>
      </div>
      
      <section class="charts">
        <div class="container-fluid">
          <header> 
            <h1>Jadwal Penjemputan Sampah</h1>
          </header>
          <div class="row">
            <div class="col-lg-12 card">
              <div class="card-body">
                <?php if (isset($stat)){?>
                <h4> Status Pesanan : <?php echo $stat; }else echo "Semua Jadwal Penjemputan"; ?> </h4>
                <div class="card-body row">
                  <table class="table table-striped table-sm">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>No Rekening</th>
                        <th>HP</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th colspan="2">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      
                      foreach ($jadwal as $data) {?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['tanggalJemput']; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['HP']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td><?php echo $data['status']; ?></td>
                        <td><a id="lokasi" class="btn btn-sm btn-primary" href="<?php echo base_url()."index.php/c_jemput/detailPenjemputan/".$data['idJemput']; ?>"> Detail</td>
                        <?php $no++;} ?>
                      </tbody>
                  </table>    
                
              </div>
            </div>
          </div>


        </div>
      </section>
    </div>
