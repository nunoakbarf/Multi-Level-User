<!------- MY ACCOUNT ------->
<div class="card-body">
<div class="row col-md-12">
  <h3 class="card-title bg-warning p-2 rounded"><i class="fas fa-user mr-2"></i><b class="text-dark">K⍜PIKU</b> | My Account</h3>
</div><hr>
  <div class="row col-md-12 mb-5">
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
        <h4 class="alert alert-light font-weight-bold"><i class="fas fa-user mr-2"></i>Informasi Akun</h4>
        <div class="row col-md-12">
            <h3 class="mx-auto mt-3 mb-4">Pastikan data anda benar</h3>
            <table class="table col-md-12">
            <?php foreach ($users as $u){ ?>
                <tr>
                <td width="15%">Nama</td>
                <td width="1px">:</td>
                <td><?php echo $u->nama ?></td>
                </tr>
                <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $u->alamat ?></td>
                </tr>
                <tr>
                <td>Email</td>
                <td>:</td>
                <td><?php echo $u->email ?></td>
                </tr>
                <tr>
                <td>No HP</td>
                <td>:</td>
                <td><?php echo $u->nohp ?></td>
                </tr>
            <?php } ?>
                <tr>
                <td>Jasa Kirim</td>
                <td class="mr-1">:</td>
                <td>
                    <select class="col-md-5 form-control" name="jasakirim" id="jasakirim">
                        <option value="JNE">JNE</option>
                        <option value="JNT">JNT</option>
                        <option value="POS">POS INDONESIA</option>
                    </select>
                </td>
                </tr>
            </table>
            <?php echo anchor('User_Dashboard/edit/'.$u->uname,'<div class="btn btn-info btn-sm"><i class="fas fa-edit mr-1"></i> Edit Data</div>')?>
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