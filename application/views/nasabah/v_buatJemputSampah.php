       <div class="breadcrumb-holder">   
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url('akun/berandaPetugas');?>">Beranda</a></li>
            <li class="breadcrumb-item active">Jemput Sampah</li>
          </ul>
        </div>
      </div>

      <section class="charts">
        <div class="container-fluid">
          <header> 
            <h1 class="h1">Jemput Sampah BSM</h1>
            
          </header>
          
          <div class="row">
            <div class="col-lg-11 card">
                <div class="card-body">
                  <form class="form-horizontal" method="post" action="<?php echo site_url('nasabah/insertJemput');?>">
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">ID Penjemputan</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" name="idJemput" value="<?php if(isset($idJemput)) echo $idJemput; ?>" required readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Nomor Rekening</label>
                        <div class="col-sm-3">
                          <input type="text" name="username" class="form-control" value="<?php echo $this->session->userdata( 'username' ); ?>" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">HP</label>
                        <div class="col-sm-3">
                          <input type="text" name="HP" class="form-control" value="<?php if(isset($noHP)) echo $noHP; ?>" required >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Tanggal</label>
                        <div class="col-sm-3">
                          <input type="date" name="tanggal" class="form-control"  required>
                        </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Kloter Penjemputan</label>
                      <div class="col-sm-3 select">
                        <select name="kloter" class="form-control" required>
                          <option value="pagi">Pagi</option>
                          <option value="siang">Siang</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Alamat Lengkap</label>
                        <div class="col-sm-4">
                          <textarea rows="2" cols="100"name="alamat" class="form-control" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2" >Lokasi Penjemputan</label>
                        <div class="col-sm-6">
                          <div class="input-group">
                            <input type="text"  class="form-control" placeholder="Masukkan Alamat..." id="alamat" ><span class="input-group-btn">
                            <button type="button" onclick="geocodeLokasi()" class="btn btn-primary">Cari Alamat</button></span> <br>
                            
                          </div><br>

                          <input type="hidden" name="lati" id="lat" class="form-control" >
                          <input type="hidden" name="longi" id="lng" class="form-control" >
                            
                          <div id="googleMap"  style="background-color: grey ;width: 600px; height: 400px;"> </div>
                        </div>
                    </div>
              
                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-2">
                        <a  class="btn btn-secondary" href="<?php echo site_url('nasabah/profilNasabah'); ?>">Batal</a>
                        <button type="submit" class="btn btn-primary">Buat Pesanan</button>
                      </div>
                    </div>
                  </form>    
                </div>
            </div>
          </div>
        </div>
      </section>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoL_MC0xTETDBStgitfKhJwRBuoyIhBfc&callback&callback=initMap"></script>

<script type="text/javascript">
    var geocoder;
    var map;
    var marker, infowindow;

     function initialize() {  
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-7.9666, 112.6326);
        var mapOptions = {
            zoom: 15,
            center: latlng
          }
          map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
          var infowindow = new google.maps.InfoWindow({content: "contentString"});
          // even listner ketika peta diklik
          google.maps.event.addListener(map, 'click', function(event) {
            taruhMarker(map, event.latLng);
          });
        }
        
        //Klik Cari
      function geocodeLokasi() {
          var address = document.getElementById('alamat').value;

          geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              map.setCenter(results[0].geometry.location);
              var lat = results[0].geometry.location.lat();
              var lng = results[0].geometry.location.lng();
              var latlng = results[0].geometry.location;
console.log("Status : "+status+" Lat : "+lat+", Lng : "+lng, "LatLng : "+latlng);
              taruhMarker(map, latlng );

            } else {
              alert('Alamat tidak ditemukan!');
            }
              document.getElementById("lat").value = lat;      
              document.getElementById('lng').value=lng;    
          });
      }

      function taruhMarker(peta, posisiTitik){
        if( marker ){
            // pindahkan marker
            marker.setPosition(posisiTitik);
            
          } else {
            // buat marker baru
            marker = new google.maps.Marker({
              position: posisiTitik,
              map: peta
            });
          }

       // isi nilai koordinat ke form
       document.getElementById("lat").value = posisiTitik.lat();
       document.getElementById("lng").value = posisiTitik.lng();

     }

      google.maps.event.addDomListener(window, 'load', initialize);
    
  </script>