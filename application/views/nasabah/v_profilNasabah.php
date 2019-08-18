

      <section class="charts" >
        <div class="container-fluid" >
          <header style="text-align: center"> 
            <h1 class="h1 ">Selamat Datang, <?php echo $nama ;?>!</h1>
          </header>
          
            <div class="card col-lg-11" >
              <div class="card-header d-flex align-items-center">
                <h2 style="font-size: 18px">Profil Nasabah</h2>
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
                          <td> Nomor Rekening </td>
                          <td> : </td>
                          <td> <?php echo $username ?> </td>
                        </tr> 
                        <tr>
                          <td> Alamat </td>
                          <td> : </td>
                          <td> <?php echo $alamat ?> </td>
                        </tr> 
                        <tr>
                          <td> e-mail </td>
                          <td> : </td>
                          <td> <?php echo $email ?> </td>
                        </tr> 
                        <tr>
                          <td> Tipe Nasabah </td>
                          <td> : </td>
                          <td> <?php echo $tipeNasabah ?> </td>
                        </tr> 
                      </tbody>
                    </table> 
                  </div>
                  <div class="col-lg-3" style="text-align: center; padding-right: 50px">

                    <h2> Saldo Tabungan</h2>
                    <h2> <?php echo "Rp. " .$saldo.",00" ; ?> </h2>
                  </div> 
                </div>
            </div>
      </div>

    </section>
    