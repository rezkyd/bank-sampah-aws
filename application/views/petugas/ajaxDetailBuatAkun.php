<?php
if(isset($username)){?>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Nomor Rekening</label>
        <div class="col-sm-4">
            <input type="text" name="username" class="form-control" value="<?php if(isset($username)) echo $username; ?>" readonly>
        </div>
    </div>
     
<?php }?>
