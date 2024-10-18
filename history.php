<?php
session_start();
require 'koneksi/koneksi.php';
include 'header.php';

// Pastikan pengguna telah login
if (empty($_SESSION['USER'])) {
    echo '<script>alert("Harap Login");window.location="index.php"</script>';
    exit;
}

// Ambil id_login dari sesi dan gunakan sebagai id_login untuk query
$id_login = $_SESSION['USER']['id_login']; // Gunakan id_login sebagai filter

try {
    // Query untuk mengambil data transaksi berdasarkan id_login
    $query = "SELECT elektronik.merk, booking.* 
              FROM booking 
              JOIN elektronik ON booking.id_elektronik = elektronik.id_elektronik 
              WHERE booking.id_login = :id_login 
              ORDER BY booking.id_booking DESC";
    $stmt = $koneksi->prepare($query);
    $stmt->bindParam(':id_login', $id_login, PDO::PARAM_INT);

    $stmt->execute();
    $hasil = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
<br>
<br>
<div class="container mt-2">
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h4 class="card-title">
                Daftar Transaksi
            </h4>
        </div>
            <div class="card-body">
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
                        <?php $no = 1; foreach($hasil as $isi) { ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?= $isi['kode_booking']; ?></td>
                            <td><?= $isi['merk']; ?></td>
                            <td><?= $isi['nama']; ?></td>
                            <td><?= $isi['tanggal']; ?></td>
                            <td><?= $isi['lama_sewa']; ?> hari</td>
                            <td>Rp. <?= number_format($isi['total_harga']); ?></td>
                            <td><?= $isi['konfirmasi_pembayaran']; ?></td>
                            <td>
                                <a class="btn btn-primary" href="bayar.php?id=<?= $isi['kode_booking']; ?>" 
                                role="button">Detail</a>   
                            </td>
                        </tr>
                        <?php $no++; } ?>
                    </tbody>
                </table>
           </div>
         </div> 
    </div>
</div>
</div>

<br>
<br>
<br>

<?php include 'footer.php'; ?>
