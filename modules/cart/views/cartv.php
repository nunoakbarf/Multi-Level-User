<div class="row col-lg-8 mx-auto m-3">

  <?php
    if (!$cart->result() ) { ?>
      <div class="col-12 mt-5 mb-5">
      <center>
        <div class="alert alert-light alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong class="text-danger">Keranjang belanja kosong!</strong> silahkan memilih produk terlebih dahulu.
        </div>
        <div class="row col-md-12">
          <img class="mx-auto" alt="foto" src="<?php echo base_url('gambar/box-null.png')?>" style="width:250px;">
        </div>
        <a class="mt-5" href="<?php echo base_url('produk')?>"><div class="btn btn-warning btn-lg">
          <i class="fas fa-cart-plus"></i> Belanja Sekarang
        </div></a>
      </center>
      </div>
    <?php } else { ?>
      <table class="table table-bordered mt-4">
        <thead class="bg-warning">
          <tr>
            <th class="text-center" width="1px">NO</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Harga</th>
            <th class="text-center" width="150px">Qty</th>
            <th class="text-center">Sub-Total</th>
            <th class="text-center" width="120px">Delete Item</th>
          </tr>
        </thead>
      <?php
      $no=1;
      $total_bayar = 0;
      foreach ($cart->result() as $row){ ?>
        <tbody>
          <tr>
            <td class="text-center"><?php echo $no++; ?></td>
            <td><?php echo $row->prod_name; ?></td>
            <td align="right">Rp. <?php echo number_format($row->price, 0,',','.') ?>,-</td>
            <td class="text-center">
              <?php echo anchor('cart/min_qty/'.$row->prod_id,'<div class="btn btn-sm btn-warning mx-auto"><i class="fas fa-minus"></i></div>')?>
              <div id="demo" class="btn btn-sm btn-light mx-auto"><?php echo $row->qty; ?></div>
              <?php echo anchor('cart/add_cart/'.$row->prod_id,'<div class="btn btn-sm btn-warning mx-auto"><i class="fas fa-plus"></i></div>')?>
            </td>
            <td align="right">Rp. <?php echo number_format($row->total_harga, 0,',','.') ?>,-</td>
            <td align="center"><?php echo anchor('cart/delete_cart/'.$row->prod_id,'<div class="text-dark mx-auto" style="border-radius: 50%;"><i class="fas fa-trash"></i></div>')?></td>
          </tr>

        <?php $total_bayar+=$row->total_harga; }?>
          <tr>
            <td class="bg-light text-center font-weight-bold" colspan="3">TOTAL</td>
            <td class="bg-light text-center font-weight-bold"><?php echo $sum_jumlah->jumlah; ?></td>
            <td class="bg-light font-weight-bold" align="right">Rp. <?php echo number_format($total_bayar, 0,',','.') ?>,-</td>
          </tr>
        </tbody>
      </table>

    <div class="col-md-12 text-right mb-5">
      <a href="<?php echo base_url('cart/delete_all_cart')?>"><div class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Kosongkan Keranjang</div></a>
      <a href="<?php echo base_url('produk')?>"><div class="btn btn-warning btn-sm"><i class="fas fa-cart-plus"></i> Lanjutkan Belanja</div></a>
      <a href="<?php echo base_url('cart/transaction')?>"><div class="btn btn-sm btn-success"><i class="fas fa-money"></i> Transaksi</div></a>
    </div>
  <?php } ?>

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
var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.2em solid #343a40}";
        document.body.appendChild(css);
    };
</script>
</body>
</html>