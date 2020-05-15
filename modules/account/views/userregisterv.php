<div class="col-md-6 mx-auto m-3 mb-5">
  <div class="card">
    <div class="card-body register-card-body bg-light">
      <p class="login-box-msg">Register a new membership</p>
      <?php echo form_open('user_login/register');?>
        <div class="input-group mb-3">
          <input type="text" class="col-md-6 form-control" placeholder="Nama Lengkap" name="nama" value="<?php echo set_value('nama'); ?>" required/>
          <?php echo form_error('nama'); ?>
          <div class="input-group-append">
            <div class="input-group-text bg-white mr-2">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <input type="text" class="col-md-6 form-control" placeholder="No HP" name="nohp" value="<?php echo set_value('nohp'); ?>" required/>
          <?php echo form_error('nohp'); ?>
          <div class="input-group-append">
            <div class="input-group-text bg-white">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <textarea type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat" value="<?php echo set_value('alamat'); ?>" required></textarea>
          <?php echo form_error('address'); ?>
          <div class="input-group-append">
            <div class="input-group-text bg-white">
              <span class="fas fa-home"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" id="customRadio1" name="j_kel" value="Laki - Laki" checked>
            <?php echo form_error('j_kel'); ?>
            <label for="customRadio1" class="custom-control-label">Laki - laki</label>
          </div>
          <div class="ml-3 custom-control custom-radio">
            <input class="custom-control-input" type="radio" id="customRadio2" name="j_kel" value="Perempuan">
            <?php echo form_error('j_kel'); ?>
            <label for="customRadio2" class="custom-control-label">Perempuan</label>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="col-md-6 form-control" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>" required/>
          <?php echo form_error('email'); ?>
          <div class="input-group-append">
            <div class="input-group-text bg-white mr-2">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <input type="text" class="col-md-6 form-control" placeholder="Username" name="username" value="<?php echo set_value('username'); ?>" required/>
          <?php echo form_error('username'); ?>
          <div class="input-group-append">
            <div class="input-group-text bg-white">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="password" class="col-md-6 form-control" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>" required/>
          <?php echo form_error('password'); ?>
          <div class="input-group-append">
            <div class="input-group-text bg-white mr-2">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <input type="password" class="col-md-6 form-control" placeholder="Retype password" name="password_conf" value="<?php echo set_value('password_conf'); ?>" required/>
          <?php echo form_error('password_conf'); ?>
          <div class="input-group-append">
            <div class="input-group-text bg-white">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the terms
              </label>
            </div>
          </div>
          <div class="col-4">
            <input type="submit" class="btn btn-warning btn-block" name="btnSubmit" value="Daftar" />
            <?php echo form_close();?>
          </div>
        </div>

        
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
