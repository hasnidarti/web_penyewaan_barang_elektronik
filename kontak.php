<?php
/*
  | Source Code Aplikasi penyewaan elektronik PHP & MySQL
  | 
  | 
  | 
  | 
 */
    session_start();
    require 'koneksi/koneksi.php';
    include 'header.php';
?>

<!-- Tambahkan CSS Kustom -->
<style>
    .d-flex {
        display: flex;
        align-items: flex-start;
    }
    .card {
        flex: 0 1 auto;
        margin-right: 200px; /* Spasi antara card dan gambar */
    }

</style>

<br>
<br>
<div class="container mt-2">
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h4 class="card-title">
                Kontak Kami
            </h4>
        </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">Nama Website</div>
                            <div class="col-sm-8"><?= $info_web->nama_rental;?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4">Telp</div>
                            <div class="col-sm-8"><?= $info_web->telp;?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4">Alamat</div>
                            <div class="col-sm-8"><?= $info_web->alamat;?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4">Email</div>
                            <div class="col-sm-8"><?= $info_web->email;?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4">No. Rekening</div>
                            <div class="col-sm-8"><?= $info_web->no_rek;?></div>
                        </div>
                    </div>
</div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<?php include 'footer.php';?>

