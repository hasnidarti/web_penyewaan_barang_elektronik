<?php
/*
  | Source Code Aplikasi penyewaan elektronik PHP & MySQL
  | 
  | 
  | 
  | 
 */
    require '../../koneksi/koneksi.php';
    $title_web = 'Daftar Booking';
    include '../header.php';
    if(empty($_SESSION['USER']))
    {
        session_start();
    }
    if(!empty($_GET['id'])){
        $id = strip_tags($_GET['id']);
        $sql = "SELECT elektronik.merk, booking.* FROM booking JOIN elektronik ON 
                booking.id_elektronik=elektronik.id_elektronik WHERE id_login = '$id' ORDER BY id_booking DESC";
    }else{
        $sql = "SELECT elektronik.merk, booking.* FROM booking JOIN elektronik ON 
                booking.id_elektronik=elektronik.id_elektronik ORDER BY id_booking DESC";
    }
    $hasil = $koneksi->query($sql)->fetchAll();
?>

<div class="container">
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h4 class="card-title">
            Daftar Booking
            </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Kode Booking</th>
                            <th>Merk Produk</th>
                            <th>Penyewa</th>
                            <th>Tanggal Sewa </th>
                            <th>Lama Sewa </th>
                            <th>Total Harga Sewa</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $no=1; foreach($hasil as $isi){?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?= $isi['kode_booking'];?></td>
                            <td><?= $isi['merk'];?></td>
                            <td><?= $isi['nama'];?></td>
                            <td><?= $isi['tanggal'];?></td>
                            <td><?= $isi['lama_sewa'];?> hari</td>
                            <td>Rp. <?= number_format($isi['total_harga']);?></td>
                            <td><?= $isi['konfirmasi_pembayaran'];?></td>
                            <td>
                                <a class="btn btn-primary" href="bayar.php?id=<?= $isi['kode_booking'];?>" 
                                role="button">Detail</a>   
                            </td>
                        </tr>
                        <?php $no++;}?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php  include '../footer.php';?>