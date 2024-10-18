<?php
/*
  | Source Code Aplikasi penyewaan elektronik PHP & MySQL
  | 
  | @package   : penyewaan_elektronik
  | @file	   : index.php 
  | @author    : fauzan1892 / Fauzan Falah
  | @copyright : Copyright (c) 2017-2021 Codekop.com (https://www.codekop.com)
  | @blog      : https://www.codekop.com/products/source-code-aplikasi-rental-mobil-php-mysql-7.html 
  | 
  | 
  | 
  | 
 */
    require '../../koneksi/koneksi.php';
    $title_web = 'User';
    include '../header.php';
    if(empty($_SESSION['USER']))
    {
        session_start();
    }
?>

<br>
<div class="container mt-2">
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h4 class="card-title">
                Data User
            </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengguna</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no =1;
                            $sql = "SELECT * FROM login WHERE level = 'Pengguna' ORDER BY id_login DESC";
                            $row = $koneksi->prepare($sql);
                            $row->execute();
                            $hasil = $row->fetchAll(PDO::FETCH_OBJ);
                            foreach($hasil as $r){
                        ?>
                        <tr>
                            <td><?= $no;?></td>   
                            <td><?=$r->nama_pengguna;?></td>      
                            <td><?=$r->username;?></td>      
                            <td>
                                <a href="<?php echo $url;?>admin/booking/booking.php?id=<?= $r->id_login;?>" 
                                    class="btn btn-primary btn-sm">Detail Transaksi</a>    
                            </td>   
                        </tr>
                        <?php $no++; }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php  include '../footer.php';?>