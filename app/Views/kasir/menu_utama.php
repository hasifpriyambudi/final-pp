<?= $this->extend('kasir/main/bodyContent') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top ">
        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-1 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="search" onkeyup="pencarian()" class="form-control bg-light border-1 small" id="search" placeholder="Search ..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-dark" style="background: #00CC88;" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Messages -->
            <?php
            $keranjang = $cart->contents();
            $jml_item = 0;
            foreach ($keranjang as $key => $value) {
                $jml_item = $jml_item + $value['qty'];
            }
            ?>
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" id="messagesDropdown" role="button" 
                aria-haspopup="true" aria-expanded="false" href="#" data-toggle="dropdown">
                    <i class="fa-sharp fa-solid fa-cart-shopping fa-xl"></i>
                    <!-- Counter - Messages -->
                    <span class="badge badge-danger badge-counter"><?= $jml_item ?></span>
                </a>
                <!-- Dropdown - Messages -->

                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">
                        Keranjang
                    </h6>
                    
                    <?php if (empty($keranjang)) { ?>
                        <a href="#" class="dropdown-item">
                            <p>Keranjang Kosong</p>
                        </a>
                    <?php } else { ?>
                        <a class="d-flex" href="#">
                            <?php foreach ($keranjang as $key => $value) { ?>
                                <a class="dropdown-item d-flex align-items-center">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle img-size-50" src="<?= base_url('public/gambar/produk/' . $value['options']['gambar']) ?>"
                                            alt="...">
                                        <!-- <div class="status-indicator bg-success"></div> -->
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate"><?= $value['name'] ?></div>
                                        <div class="small text-gray-500"><?= $value['qty'] ?>*<?= number_to_currency($value['price'], 'IDR') ?>=<?= number_to_currency($value['subtotal'], 'IDR')?></div>
                                    </div>
                                </a>
                            <?php } ?>
                        </a>
                        
                        <a class="dropdown-item text-center" href="#">Total : <?= number_to_currency($cart->total(), 'IDR') ?></a>
                        <a class="dropdown-item text-center" href="<?= base_url('kasir/checkout'); ?>">Checkout</a>
                        <a href="<?= base_url('kasir/keranjang/clear'); ?>"  class="dropdown-item text-center small text-gray-500">Clear</a>
                    <?php } ?>
                </div>
            </li>
        </ul>
    </nav>
    <div class="row">
        <?php foreach ($produk as $value) { ?>
            <div class="d-grid col-sm-3 justify-content-center haha">
                <?php
                echo form_open('kasir/keranjang/tambah');
                echo form_hidden('id', $value['id_produk']);
                echo form_hidden('price', $value['harga']);
                echo form_hidden('name', $value['nama']);
                //option 
                echo form_hidden('gambar', $value['gambar']);
                // echo form_hidden('kuantitas', $value['kuantitas']); 

                $idToFind = $value['id_produk'];
                $foundQty = 0;
                $qty = 0;

                foreach ($keranjangCart as $ker) {
                    if ($ker['id'] === $idToFind) {
                        $qty = $ker['qty'];
                        break;
                    }
                }

                ?>
                <div class="card mt-2" style="width:15rem; float: left;">
                    <img src="<?= base_url('public/gambar/produk/' . $value['gambar']) ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title" id="namaProduk" style="margin-bottom:5px;"><?= $value['nama'] ?></h5>
                        <p class="card-text" style="margin-bottom:5px;"><?= number_to_currency($value['harga'], 'Rp. '); ?></p>
                        <input type="number" class="mb-2 border border-0" onkeypress="validasiAngka(event)" max="<?= $value['kuantitas']; ?>" name="kuantitas" min="1" value="<?= $qty;?>" required></input><br>
                        <!-- ra ruh carane gae perbedaan antara gram / ikat -->
                        <button class="btn btn-outline-primary" type="submit">
                            Tambah Keranjang
                        </button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        <?php } ?>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#linkMenuUtama').addClass("active");
    });

    function pencarian() {
        let filter = document.getElementById('search').value.toLowerCase();
        let item = document.querySelectorAll('.haha');
        let cari = document.getElementsByTagName('h5');
        
        for (var i = 0; i < cari.length; i++) {
            let a = item[i].getElementsByTagName('h5')[0];

            let value = a.innerHTML || a.innerText || a.textContent;
            if (value.toLowerCase().indexOf(filter) > -1) {
                item[i].style.display = "";
            } else {
                item[i].style.display = "none ";
            }
        }
    }
//     $("#filter").on("keyup", function() {
//     var value = $(this).val().toLowerCase();
//     $("#cardContainer > div").filter(function() {
//       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
//     });
//   });
</script>
<?= $this->endSection() ?>