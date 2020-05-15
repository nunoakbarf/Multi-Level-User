<!------- MY ACCOUNT ------->
<div class="card-body">
<div class="row col-md-12">
  <h3 class="card-title bg-warning p-2 rounded"><i class="fas fa-user mr-2"></i><b class="text-dark">K⍜PIKU</b> | My Account</h3>
</div><hr>
  <div class="row col-md-12">
    <div class="row col-md-3">
        <div class="list-group col-md-12 mt-3">
            <a class="list-groupitem list-group-item bg-dark"><strong><h4><b class="bg-dark rounded"><?php echo ucfirst($this->session->userdata('uname')); ?></b></h4></strong></a>
            <a href="<?php echo base_url()?>user_dashboard" class="list-group-item text-dark"><i class="fas fa-usd mr-2"></i>Transaksi</a>
            <?php echo anchor('user_dashboard/akun/'.ucfirst($this->session->userdata('uname')),'<div class="list-group-item text-dark"><i class="fas fa-user mr-2"></i>Informasi Akun</div>')?>
            <a href="" data-toggle="modal" data-target="#logoutModal" class="list-group-item text-dark"><i class="fas fa-key mr-2"></i>Logout</a>
        </div>
    </div>
    <div class="row col-md-9 ml-3 mt-3">
      <div class="col-md-12">
        <h4 class="alert alert-light font-weight-bold"><i class="fas fa-cog fa-spin mr-2"></i>Pengaturan Akun</h4>
        <div class="row col-md-12">
            <h3 class="mx-auto mt-3 mb-4">Edit data akun</h3>
            <table class="table col-md-12">
            <?php foreach($users as $u){ ?>
            <form action="<?php echo base_url(). 'User_Dashboard/update'; ?>" method="post">
              <div class="input-group">
                  <div class="form-group col-md-6">
                  <label class="col-md-12 control-label">Nama Lengkap</label>
                      <div class="col-md-12">
                        <input type="hidden" class="form-control" name="id_user" value="<?php echo $u->id_user ?>"/>
                        <input class="form-control" name="nama" value="<?php echo $u->nama ?>"/>
                      </div>
                  </div>
                  <div class="form-group col-md-6">
                  <label class="col-md-12  control-label">Email</label>
                      <div class="col-md-12">
                          <input type="text" class="form-control" name="email" value="<?php echo $u->email ?>">
                      </div>
                  </div>
              </div>
              <div class="input-group">
                  <div class="form-group col-md-6">
                  <label class="col-md-12 control-label">Alamat</label>
                  <div class="col-md-12">
                      <textarea class="form-control" name="alamat"><?php echo $u->alamat ?></textarea>
                  </div>
                  </div>
                  <div class="form-group col-md-6">
                  <div class="input-group">
                      <div class="form-group col-md-6">
                      <label class="col-md-12 control-label">No HP</label>
                          <div class="col-md-12">
                              <input type="text" class="form-control" name="nohp" value="<?php echo $u->nohp ?>">
                          </div>
                      </div>
                      <div class="form-group col-md-6">
                      <label class="col-md-12  control-label">Username</label>
                          <div class="col-md-12">
                              <input type="text" class="form-control" name="uname" value="<?php echo $u->uname ?>">
                          </div>
                      </div>
                  </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-info" type="submit"> Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
              </div>
            </form>	
            <?php } ?>
            </table>
        </div>
      </div>

    </div>

  </div>
</div>
    
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
<script>
function openPills(cityName) {
  var i;
  var x = document.getElementsByClassName("pills");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";
}
</script>
</body>
</html>