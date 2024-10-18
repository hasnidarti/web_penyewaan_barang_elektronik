<?php
session_start();
require 'koneksi/koneksi.php';
include 'header.php';

if($_GET['cari']) {
    $cari = strip_tags($_GET['cari']);
    $query =  $koneksi -> query('SELECT * FROM elektronik WHERE merk LIKE "%'.$cari.'%" ORDER BY id_elektronik DESC')->fetchAll();
} else {
    $query =  $koneksi -> query('SELECT * FROM elektronik ORDER BY id_elektronik DESC')->fetchAll();
}
?>

<br><br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <?php 
                if($_GET['cari']) {
                    echo '<h4> Keyword Pencarian : '.$cari.'</h4>';
                } else {
                    echo '<h4> Semua Produk</h4>';
                }
            ?>
            <div class="row mt-3">
            <?php 
                $no = 1;
                foreach($query as $isi) {
            ?>
                <div class="col-sm-4">
                    <div class="card custom-card" style="border-radius: 20px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <img src="assets/image/<?php echo $isi['gambar'];?>" class="card-img-top" style="height:200px;object-fit:cover;">
                        <div class="card-body" style="background:#ddd">
                            <h5 class="card-title"><?php echo $isi['merk'];?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <?php if($isi['status'] == 'Tersedia'){ ?>
                                <li class="list-group-item bg-primary text-white">
                                    <i class="fa fa-check"></i> Available
                                </li>
                            <?php } else { ?>
                                <li class="list-group-item bg-danger text-white">
                                    <i class="fa fa-close"></i> Not Available
                                </li>
                            <?php } ?>
                            <li style="display: flex; justify-content: flex-start; align-items: center;">
                        <i class="" style="margin-left: 10px; margin-right: 160px;"></i> 
                        <span style="font-size: 20px; margin-top: 15px; color: red; font-weight: bold;">Rp. <?php echo number_format($isi['harga']);?>/day</span>
                        </li>
                
                        </ul>
                        <div class="card-body">
                            <center>
                                <a href="booking.php?id=<?php echo $isi['id_elektronik'];?>" class="btn btn-success">Booking now!</a>
                                <a href="detail.php?id=<?php echo $isi['id_elektronik'];?>" class="btn btn-info">Detail</a>
                            </center>
                        </div>
                    </div>
                </div>
            <?php $no++; } ?>
            </div>
        </div>
    </div>
</div>

<br><br><br>

<?php include 'footer.php'; ?>

<style>
.custom-card {
    margin-bottom: 25px; /* Mengatur jarak bawah */
}
</style>
