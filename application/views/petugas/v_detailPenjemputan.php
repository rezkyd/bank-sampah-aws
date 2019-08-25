       <div class="breadcrumb-holder">   
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url('c_akun/berandaPetugas');?>">Beranda</a></li>
            <li class="breadcrumb-item active">Penjemputan sampah</li>
          </ul>
        </div>
      </div>
      
      <section class="charts">
        <div class="container-fluid">
          <div class="row">
              <div class="col-lg-10 card" style="margin-top: 20px">
                <div class="card-header d-flex justify-content-between" >
                  <div class="left-col d-flex ">
                    <h1>Penjemputan Sampah</h1>
                  </div>
                  <div class="right-col text-right" >
                    <h3> #<?php echo $idJemput ; ?></h3>
                  </div>
                </div>
                <div class="card-body" style="font-size: 18px">
                    <table class=" table-sm">
                      <tbody >
                        <tr>
                          <td style="width: 200px">Nomor Rekening </td>
                          <td> : </td>
                          <td style="width: 300px"><?php echo $username ; ?> </td>
                        </tr>
                        <tr>
                          <td>HP</td>
                          <td> : </td>
                          <td> <?php echo $HP ; ?> </td>
                        </tr>
                        
                        <tr>
                          <td>Tanggal Penjemputan</td>
                          <td> : </td>
                          <td> <?php echo $tanggal ; ?> </td>
                        </tr>
                        <tr>
                          <td>Kloter Penjemputan</td>
                          <td> : </td>
                          <td> <?php echo $kloter ; ?> </td>
                        </tr>
                        <tr>
                          <td>Driver</td>
                          <td> : </td>
                          <td> <?php if(isset($driver)) echo $driver ; ?> </td>
                        </tr>
                        <tr>
                          <td>No HP Driver</td>
                          <td> : </td>
                          <td> <?php if(isset($nohpDriver)) echo $nohpDriver ; ?> </td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td> : </td>
                          <td><?php echo $alamat ; ?> </td>
                        </tr>
                        <tr>
                          <td>Status</td>
                          <td> : </td>
                          <td style="color: #66cc66"> <b><?php echo $status ; ?> </b></td>
                          <td> 
                            <?php 
                            if($tombol != 'Selesai' ) {
                                if ($tipe == 'Driver'){
                                  if($status == 'Menjemput Pesanan'){?>
                                    <!--Rekap Pesanan Driver-->
                                      <a class="btn btn-primary" href="<?php echo site_url('c_penyetoran/tambahPenyetoran?user='.$username.'&id='.$idJemput);?>"  > <?php  echo $tombol; ?> </a> 
                                  <?php } else if($status != 'Menunggu Verifikasi') {?> 
                                       <!-- tombol driver  -->
                                       <button type="button" href="#" class="btn btn-primary" data-toggle="modal" data-target="#status-modal"  > <?php  echo $tombol; ?> </button> 
                                  <?php }}
                                if($tipe =='Admin'){
                                  if($status == 'Menunggu Konfirmasi') {?> 
                                      <!-- tombol admin selain menunggu verifikasi -->
                                      <button type="button" href="#" class="btn btn-primary" data-toggle="modal" data-target="#status-modal"  > <?php  echo $tombol; ?> </button> 
                                  <?php }else if ($status == 'Menunggu Verifikasi'){?>
                                      <!-- verifikasi admin -->
                                      <a class="btn btn-primary" href="<?php echo site_url('c_penyetoran/detailPenyetoran?noNota='.$noNota.'&id='.$idJemput);?>"  > <?php  echo $tombol; ?> </a>  
                            <?php }}}?>
                          </td>
                          
                          <td > 
                            <?php if($tipe =='Admin' && $status == 'Menunggu Konfirmasi'){ ?>
                            <button type="button" href="#" class="btn btn-primary" data-toggle="modal" data-target="#tolak-modal" style="200px"> Tolak Penjemputan</button>
                            <?php }?> 
                          </td>
                        </tr>
                        
                      </tbody>
                    </table>

                    <div id="embedMap" onload="showPosition()" style="width: 600px; height: 400px;">  </div>
                </div>
              </div>
            </div>
            
          </div>
      </section>
    </div>
    <input type="hidden" name="nextStat" id="nextStat" value="<?php echo $nextStat;?>">
    <input type="hidden" name="lat" id="lati" value="<?php echo $latitude; ?> ">
    <input type="hidden" name="long" id="longi" value="<?php echo $longitude; ?> ">

    <div class="modal fade" id="status-modal" tabindex="-1" role="dialog"  >
        <div class="modal-dialog modal-sm " >
          <div class="modal-content " style="width: 350px;height: 250px">
            <div class="modal-header">
                <h4 class="modal-title" id="status">Status Penjemputan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body"><center>

                <form method="post" action="<?php echo site_url('c_jemput/updateStatus'); ?>">
                    <div class="form-group">
                        <p> Status penjemputan sampah akan diubah menjadi <?php echo $nextStat;?> ?</p>
                        <input type="hidden" name="nextStat" id="nextStat" value="<?= $nextStat?>">
                        <input type="hidden" name="idJemput" value="<?= $idJemput?>">
                        <input type="hidden" name="username" value="<?= $username?>">
                        <?php if($tipe == 'Driver'){ ?>
                        <input type="hidden" name="driver" value="<?= $this->session->userdata('nama')?>"><?php }?>
                    </div>
                    <p class="text-center">
                      <a type="submit" class="btn btn-secondary" href="<?php echo site_url('c_jemput/detailPenjemputan/'.$idJemput); ?>">Tidak</a>
                      <button class="btn btn-primary" type="submit" name="status">Ya</button> <br><br>
                    </p>
                </form>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="tolak-modal" tabindex="-1" role="dialog"  >
        <div class="modal-dialog modal-sm " >
          <div class="modal-content " style="width: 400px;height: 300px">
            <div class="modal-header">
                <h4 class="modal-title" id="status">Menolak Penjemputan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body"><center>

                <form method="post" action="<?php echo site_url('c_jemput/tolakPenjemputan'); ?>">
                    <div class="form-group">
                        <p>Masukkan alasan penjemputan sampah ditolak?</p>
                        <input type="textArea" class="form-control" name="alasan" style="width: 300px" required=""></textarea>
                        <input type="hidden" name="idJemput" value="<?= $idJemput?>">
                        <input type="hidden" name="username" value="<?= $username?>">
                    </div>
                    <p class="text-center">
                      <a type="submit" class="btn btn-secondary" href="<?php echo site_url('c_jemput/detailPenjemputan/'.$idJemput); ?>">Tidak</a>
                      <button class="btn btn-primary" type="submit" name="status">Kirim</button> <br><br>
                    </p>
                </form>
            </div>
          </div>
        </div>
    </div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoL_MC0xTETDBStgitfKhJwRBuoyIhBfc&callback&callback=initMap"></script>

<script type="text/javascript">

    google.maps.event.addDomListener(window, 'load', showPosition);
    function showPosition(){
        var lat, long;
        lat = $("#lati").val();
        long = $("#longi").val();
        showMap(lat,long);
    }
        function showMap(lat,long){
            lat = lat;
            long = long;
            var latlong = new google.maps.LatLng(lat, long);

                      
            var myOptions = {
                center: latlong,    
                zoom: 16,
                mapTypeControl: true,
                navigationControlOptions: {style:google.maps.NavigationControlStyle.SMALL}
            }
            
            var map = new google.maps.Map(document.getElementById("embedMap"), myOptions);
            var marker = new google.maps.Marker({position:latlong, map:map, title:"You are here!"});
            var pos = getPosisi(lat,long);
        }
         
        // Define callback function for failed attempt
        function showError(error){
            if(error.code == 1){
                result.innerHTML = "You've decided not to share your position, but it's OK. We won't ask you again.";
            } else if(error.code == 2){
                result.innerHTML = "The network is down or the positioning service can't be reached.";
            } else if(error.code == 3){
                result.innerHTML = "The attempt timed out before it could get the location data.";
            } else{
                result.innerHTML = "Geolocation failed due to unknown error.";
            }
        }


</script>

                       