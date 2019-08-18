<?php
if(isset($saldo)){?>
            <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Saldo</label>
                  <div class="col-sm-3">
                   <input type="text" class="form-control" id="saldo" name="saldo" value="<?php if(isset($saldo)) echo $saldo; ?>" readonly>
                 </div>
            </div>


            
    <?php
}
?>
