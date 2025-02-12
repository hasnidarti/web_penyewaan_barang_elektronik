<?php
/*
  | Source Code Aplikasi penyewaan elektronik PHP & MySQL
  | 
  | 
  | 
  | 
 */
    require '../../koneksi/koneksi.php';
    $title_web = 'Tambah Produk';
    include '../header.php';
    if(empty($_SESSION['USER']))
    {
        session_start();
    }
?>


<br>
<div class="container">
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h4 class="card-title">
                Tambah Produk
                <div class="float-right">
                    <a class="btn btn-warning" href="elektronik.php" role="button">Kembali</a>
                </div>
            </h4>
        </div>
        <div class="card-body">
            <div class="container">
                <form method="post" action="proses.php?aksi=tambah" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-sm-6">

                            <div class="form-group row">
                                <label class="col-sm-3">Seri Produk</label>
                                <input type="text" class="form-control col-sm-9" name="no_plat" placeholder="Isi Seri Produk">
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3">Merk Produk</label>
                                <input type="text" class="form-control col-sm-9" name="merk" placeholder="Isi Merk Produk">
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3">Harga Sewa</label>
                                <input type="text" class="form-control col-sm-9" name="harga" placeholder="Isi Harga Sewa">
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <div class="form-group row">
                                <label class="col-sm-3">Deskripsi</label>
                                <input type="text" class="form-control col-sm-9" name="deskripsi" placeholder="Isi Deskripsi">
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3">Status</label>
                                <select class="form-control col-sm-9" name="status">
                                    <option value="" disabled selected>Pilih Status</option>
                                    <option>Tersedia</option>
                                    <option>Tidak Tersedia</option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3">Gambar</label>
                                <input type="file" accept="image/*" class="form-control col-sm-9" name="gambar" placeholder="Isi Gambar">
                                
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="float-right">
                        <button class="btn btn-primary" role="button" type="submit">
                            Simpan
                        </button>
                    </div>
                </form>       
            </div>
        </div>
    </div>
</div>
<?php  include '../footer.php';?>