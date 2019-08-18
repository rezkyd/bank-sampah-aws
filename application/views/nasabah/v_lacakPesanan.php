       <div class="breadcrumb-holder">   
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url('c_nasabah/profilNasabah');?>">Beranda</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo site_url('c_nasabah/jemputSampah');?>">Jemput Sampah</a></li>
            <li class="breadcrumb-item active">Lacak Penjemputan Sampah</li>
          </ul>
        </div>
      </div>
      
      <section class="charts">
        <div class="container-fluid">
          <header> 
            <h1 class="h3">Pesanan Jemput Sampah</h1> <br>
            
          <div class="row">
            <div class="col-lg-8 card">
                <div class="card-body d-flex align-items-center row">
                  <TABLE> 
                    <tr>
                      <td style="width: 200px"> Kode Penjemputan </td>
                      <td > : <?php echo "#".$idJemput ;?></td>
                    </tr>
                    <tr>
                      <td > Username </td>
                      <td> : <?php echo $username ;?></td>
                    </tr>
                    <tr>
                      <td> Tanggal Penjemputan </td>
                      <td> : <?php echo $tanggalJemput ;?> </td>
                    </tr>
                    <tr>
                      <td> Petugas Penjemput </td>
                      <td> : <?php echo $driver." (".$noHPDriver.")" ;?> </td>
                    </tr>
                  </TABLE> 
                </div>
                <div class="card-body row col-lg-10">
                  <table class="table  table-striped table-sm ">
                        <thead>
                          <tr>
                            <th>Waktu</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($dataDetail as $data) {?>
                            <tr>
                                <td><?php echo $data['waktu']; ?></td>
                                <td><?php echo $data['status']; ?></td>
                               
                            </tr>
                            <?php } ?>
                        </tbody>
                      </table>  

                </div>
              </div>
            </div>
      </section>
    </div>
