       <div class="breadcrumb-holder">   
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url('c_nasabah/profilNasabah');?>">Beranda</a></li>
            <li class="breadcrumb-item active">Buku Tabungan</li>
          </ul>
        </div>
      </div>

      <section class="charts">
        <div class="container-fluid">
          <header> 
            <h1 class="h1">Buku Tabungan BSM</h1>  
          </header>
          
          <div class="row">
            <div class="col-lg-8 card">
              
                <div class="card-body">
                    <table>
                        <tr>
                          <td style="width: 200px">Nomor Rekening </td>
                           <td style="width: 200px">: <?php echo $username; ?> </td>
                        </tr>
                        <tr>
                          <td >Nama</td>
                          <td >:  <?php echo $nama; ?></td>
                        </tr>
                        <tr>
                          <td>Saldo</td>
                          <td>: <?php echo "Rp.".$saldoAkhir.",00"; ?> </td>
                        </tr>
                    </table>
                  
                </div>
                <div class="card-body ">
                  <table class=" table table-striped table-sm">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>No Nota </th>
                        <th>Tanggal</th>
                        <th>Debet</th>
                        <th>Kredit</th>
                        <th>Saldo</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    <?php 
                      $no = 1;
                      foreach ($dataBuku as $user) {?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $user['noNota']; ?></td>
                            <td><?php echo $user['tanggal']; ?></td>
                            <td><?php echo "Rp.".$user['debet'].",00"; ?></td>
                            <td><?php echo "Rp.".$user['kredit'].",00"; ?></td>
                            <td><?php echo "Rp.".$user['saldo'].",00"; ?></td>
                        </tr>
                        <?php $no++;} ?> 
                    </tbody>
                  </table>    
              </div>
            </div>
          </div>
        </div>
      </section>

             