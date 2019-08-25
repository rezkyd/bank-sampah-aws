        <section class="charts" >
          <div class="container-fluid" >
            <header style="text-align: center"> 
              <h1 class="h1 ">Selamat Datang, <?php echo $nama ;?></h1>
            </header>
            
              <div class="card" >
                <div class="card-header d-flex align-items-center" >
                    <h2 style="font-size: 18px" >Profil Nasabah</h2>
                </div>
                <div class="row" >
                  <div class="card-body col-lg-6" style="padding-bottom: 0px">
                      <table  class=" table-sm" style="font-size: 15px; margin-left: 50px">
                        <tbody>
                          <tr>
                            <td> Nama </td>
                            <td> : </td>
                            <td> <?php echo $nama ?> </td>
                          </tr>  
                          <tr>
                            <td> Username </td>
                            <td> : </td>
                            <td> <?php echo $username ?> </td>
                          </tr> 
                        </tbody>
                      </table> 
                    </div>
                  </div>
              </div>
        </div>
     </section>
    <section class="updates section-padding">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div id="new-updates" class="wrapper recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display"><a href="<?php echo site_url('jemput/jadwalPenjemputan/Menunggu Konfirmasi');?>" >Menunggu Konfirmasi</a></h2>
                  <?php if($countConfirmPending>0) echo "<div class='badge badge-primary'> $countConfirmPending pesanan</div>";?>
                  <a data-toggle="collapse" data-parent="#new-updates" href="#confirmPending" aria-expanded="true" aria-controls="updates-box"><i class="fa fa-angle-down"></i></a>
                </div>
                <div id="confirmPending" role="tabpanel" class="collapse show">
                  <ul class="news list-unstyled">
                    <!-- Item-->
                     <?php 
                     if($confirmPending == NULL){ ?>
                          <li class="d-flex justify-content-between"> 
                            <div class="left-col d-flex ">
                              <div class="title">
                                <p> Tidak ada Pesanan</p>
                              </div>
                            </div>
                          
                          </li>
                      <?PHP }else{ 
                      foreach ($confirmPending as $data) {
                        $string = $data['tanggalJemput'];
                        $date = DateTime::createFromFormat("Y-m-d", $string);
                       ?>

                        <li class="d-flex justify-content-between"> 
                          <div class="left-col d-flex ">
                            <div class="icon">
                              <a  href="<?php echo base_url()."index.php/jemput/detailPenjemputan/".$data['idJemput']; ?>" >
                                <?php echo '#'.$data['idJemput']?>
                              </a>
                            </div>
                            <div class="title"><strong><?php echo $data['username']?></strong>
                              <p> <?php echo $data['alamat']?></p>
                            </div>
                          </div>
                          <div class="right-col text-right" style="width: 30%">
                            <div class="update-date"><span class="month"><?php echo $date->format("d/m");?></span></div>
                          </div>
                        </li>
                    <?php } }?>
                  </ul>
                </div>
              </div>
            </div>  
           
            <div class="col-lg-6 col-md-12">
              <div id="new-updates" class="wrapper recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display"><a href="<?php echo site_url('jemput/jadwalPenjemputan/Menunggu Verifikasi');?>">Menunggu Verifikasi</a></h2>
                  <?php if($countVerifPending>0) echo "<div class='badge badge-primary'> $countVerifPending pesanan</div>";?>
                  <a data-toggle="collapse" data-parent="#new-updates" href="#bookPending" aria-expanded="true" aria-controls="updates-box"><i class="fa fa-angle-down"></i></a>
                </div>
                <div id="bookPending" role="tabpanel" class="collapse show">
                  <ul class="news list-unstyled">
                    <!-- Item-->
                     <?php 
                      if($verifPending == NULL){ ?>
                          <li class="d-flex justify-content-between"> 
                            <div class="left-col d-flex ">
                              <div class="title">
                                <p> Tidak ada Pesanan</p>
                              </div>
                            </div>
                          
                          </li>
                      <?PHP }else{ 
                      foreach ($verifPending as $data) {
                        $string = $data['tanggalJemput'];
                        $date = DateTime::createFromFormat("Y-m-d", $string);
                      ?>

                         <li class="d-flex justify-content-between"> 
                          <div class="left-col d-flex ">
                            <div class="icon">
                              <a  href="<?php echo base_url()."index.php/jemput/detailPenjemputan/".$data['idJemput'] ; ?>" >
                                <?php echo '#'.$data['idJemput']?>
                              </a>
                            </div>
                            <div class="title"><strong><?php echo $data['username']?></strong>
                              <p> <?php echo $data['alamat']?></p>
                            </div>
                          </div>
                          <div class="right-col text-right" style="width: 30%">
                            <div class="update-date"><span class="month"><?php echo $date->format("d/m");?></span></div>
                          </div>
                        </li>
                    <?php }} ?>
                  </ul>
                </div>
              </div>
            </div>  

          </div>
        </div>
      </section>
    </div>
  </div>


      

    