<?php
/*
  | Source Code Aplikasi penyewaan elektronik PHP & MySQL
  | 
  | 
  | 
 */
    require '../../koneksi/koneksi.php';
    $title_web = 'Peminjaman';
    include '../header.php';
    if(empty($_SESSION['USER']))
    {
        session_start();
    }
    if(!empty($_GET['id'])){
        $kode_booking = $_GET['id'];
        
        $hasil = $koneksi->query("SELECT * FROM booking WHERE kode_booking = '$kode_booking'")->fetch();

        $id_booking = $hasil['id_booking'];
        if(!isset($id_booking))
        {
            echo '<script>alert("Tidak Ada Data !");window.location="peminjaman.php"</script>';
        }
        $hsl = $koneksi->query("SELECT * FROM pembayaran WHERE id_booking = '$id_booking'")->fetch();


        $id = $hasil['id_elektronik'];
        $isi = $koneksi->query("SELECT * FROM elektronik WHERE id_elektronik = '$id'")->fetch();
    }
    
?>

<div class="container mt-2">
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h4 class="card-title">
                Cari Booking
            </h4>
        </div>
            <div class="card-body">
                <form method="get" action="peminjaman.php">
                    <input type="text" class="form-control" 
                    value="<?php if(!empty($_GET['id'])){ echo $_GET['id']; }?>" name="id" placeholder="Tulis Kode Booking [ ENTER ]">
                </form>
            </div>
        </div>
        <br>
    </div>
    <?php if(!empty($_GET['id'])){?>
    
        <div class="container mt-2">
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h4 class="card-title">
                Detail Booking & Status Produk</h5>
            </div>
           <div class="card-body">
               <form method="post" action="proses.php?id=konfirmasi">
                    <table class="table">
                        <tr>
                            <td>Kode Booking  </td>
                            <td> :</td>
                            <td><?php echo $hasil['kode_booking'];?></td>
                        </tr>
                        <tr>
                            <td>KTP  </td>
                            <td> :</td>
                            <td><?php echo $hasil['ktp'];?></td>
                        </tr>
                        <tr>
                            <td>Penyewa  </td>
                            <td> :</td>
                            <td><?php echo $hasil['nama'];?></td>
                        </tr>
                        <tr>
                            <td>Telepon  </td>
                            <td> :</td>
                            <td><?php echo $hasil['no_tlp'];?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Sewa </td>
                            <td> :</td>
                            <td><?php echo $hasil['tanggal'];?></td>
                        </tr>
                        <tr>
                            <td>Lama Sewa </td>
                            <td> :</td>
                            <td><?php echo $hasil['lama_sewa'];?> hari</td>
                        </tr>
                        <tr>
                            <td>Total Harga </td>
                            <td> :</td>
                            <td>Rp. <?php echo number_format($hasil['total_harga']);?></td>
                        </tr>
                        <tr>
                            <td>Status Produk</td>
                            <td> :</td>
                            <td>
                                <select class="form-control" name="status">
                                    <option <?php if($isi['status'] == 'Tersedia'){echo 'selected';}?> value="Tersedia">
                                        Tersedia ( Kembali )
                                    </option>
                                    <option <?php if($isi['status'] == 'Tidak Tersedia'){echo 'selected';}?> value="Tidak Tersedia">
                                        Tidak Tersedia ( Pinjam )
                                    </option>
                                </select>    
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" name="id_elektronik" value="<?php echo $isi['id_elektronik'];?>">
                    <button type="submit" class="btn btn-primary float-right">
                        Ubah Status
                    </button>
            </form>
               
           </div>
         </div> 
    </div>
    <?php }?>
</div>
</div>
<br>
<br>
<br>
<?php  include '../footer.php';?>