<!------- MY ACCOUNT ------->
<div class="card-body">
<div class="row col-md-12">
  <h3 class="card-title bg-warning p-2 rounded"><i class="fas fa-user mr-2"></i><b class="text-dark">K⍜PIKU</b> | My Account</h3>
</div><hr>
  <div class="row col-md-12 mb-5">
    <div class="row col-md-3">
        <div class="list-group col-md-12 mt-3">
            <a class="list-groupitem list-group-item bg-dark"><strong><h4><b class="bg-dark rounded"><?php echo $users['nama']; ?></b></h4></strong></a>
            <a href="<?php echo base_url()?>user_dashboard" class="list-group-item text-dark"><i class="fas fa-usd mr-2"></i>Transaksi</a>
            <?php echo anchor('user_dashboard/akun/'.ucfirst($this->session->userdata('uname')),'<div class="list-group-item text-dark"><i class="fas fa-user mr-2"></i>Informasi Akun</div>')?>
            <a href="" data-toggle="modal" data-target="#logoutModal" class="list-group-item text-dark"><i class="fas fa-key mr-2"></i>Logout</a>
        </div>
    </div>
    <div class="row col-md-9 ml-3 mt-3">
      <div class="col-md-12">
        <h4 class="alert alert-light font-weight-bold"><i class="fas fa-usd mr-2"></i>Transaksi</h4>
        <div class="row col-md-12">
          <div class="row col-md-6">
            <table class="table table-bordered">
            <thead class="bg-warning">
              <tr>
                <th class="text-center" width="1px">NO</th>
                <th class="text-center">Pesanan Anda</th>
                <th class="text-center" width="120px">Delete Item</th>
              </tr>
            </thead>
            <?php 
            $no=1;
            $total_bayar = 0;
            foreach ($cart->result() as $row){ ?>
              <tr>
                <td class="text-center"><?php echo $no++; ?></td>
                <td><?php echo $row->prod_name; ?></td>
                <td align="center"><?php echo anchor('cart/delete_cart_transaction/'.$row->prod_id,'<div class="btn btn-sm btn-danger mx-auto"><i class="fas fa-trash"></i></div>')?></td>
              </tr>
            <?php $total_bayar+=$row->total_harga; }?>
            </table>
          </div>
          <div class="row col-md-1">
          </div>
          <div class="row col-md-5">
            <table class="table">
              <tr>
                <td class="p-1">Jumlah Produk</td>
                <td class="p-1">:</td>
                <td class="p-1"><?php echo $sum_jumlah->jumlah; ?></td>
              </tr>
              <tr>
                <td class="p-1">Total Bayar</td>
                <td class="p-1">:</td>
                <td class="font-weight-bold text-success p-1">Rp. <?php echo number_format($total_bayar, 0,',','.') ?>,-</td>
              </tr>
            </table>
            <div class="text-right">
              <a href="<?php echo base_url('produk')?>"><div class="btn btn-warning btn-sm"><i class="fas fa-cart-plus"></i> Lanjutkan Belanja</div></a>
              <a href="<?php echo base_url('cart/order_now')?>"><div class="btn btn-success btn-sm"><i class="fas fa-money"></i> Bayar</div></a>
            </div>
            <div class="alert alert-light mt-2" role="alert">
              <b class="text-danger">Peringatan!</b> total bayar, belum termasuk dengan <b class="text-dark">Ongkos Kirim</b>
            </div>
          </div>
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