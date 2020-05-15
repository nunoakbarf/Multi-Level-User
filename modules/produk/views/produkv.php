<div class="row col-md-12 mx-auto p-5">
    <div class="row col-md-12 mx-auto">
        <h1 class="mx-auto text-black font-weight-bold">PRODUK KITA</h1>
    </div>
    <div class="row col-md-12 mx-auto">
        <hr class="mx-auto" style="width:5%;height:5px;margin-top:0;background:black;">
    </div>

    <div class="row col-md-12">

        <div class="row col-md-3">
            <div class="list-group col-md-12 mt-3">
                <a class="list-groupitem list-group-item bg-dark"><strong>KATEGORI</strong></a>
                <a href="<?php echo base_url()?>produk" class="text-dark list-group-item">Semua Produk</a>
                <?php foreach($category as $p){ ?>
                    <a href="<?= base_url('produk/daftar/'), $p['cat_id']; ?>" class="text-dark list-group-item"><?php echo $p['cat_name']; ?></a>
                <?php } ?>
            </div>
        </div>

        <div class="row col-md-9 ml-3">
            <?php foreach($products as $p){ ?>
            <div class="col-list-3">
            <div class="recent-car-list rounded">
                <div class="col-lg text-dark d-flex justify-content-center">
                <div class="card m-0 shadow">
                    <div class="card-header bg-dark">
                    <h5 class="card-title m-0 text-white"><?php echo $p['prod_name']; ?></h5>
                    </div>
                    <img src="<?= base_url()?>gambar/<?php echo $p['prod_img']; ?>" class="card-img-top mt-4" style="width:50%;margin:auto;" alt="image">
                    <div class="card-body mx-auto" style="margin-bottom:-30px;">
                    <td><h4 class="font-weight-light">Rp. <?php echo number_format($p['prod_price']) ?></h4></td>
                    </div><hr>
                    <div class="row col-md-12 mb-3 mx-auto">
                    <div class="row col-md-4 mx-auto">
                        <?php echo anchor('beranda/detail/'.$p['prod_id'],'<div class="btn btn-outline-dark btn-md">Detail</div>')?>
                    </div>
                    <div class="row col-md-8 mx-auto">
                        <?php echo anchor('cart/add_cart/'.$p['prod_id'],'<div class="btn btn-warning mx-auto"><i class="fas fa-cart-plus"></i> Beli Sekarang</div>')?>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <?php } ?>
            <div class="row col-md-12">
                <?php echo $this->pagination->create_links();?>
            </div>
        </div>

    </div>
    
</div>