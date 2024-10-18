<?php
/*
  | Source Code Aplikasi penyewaan elektronik PHP & MySQL
  |  
  | 
  | 
  | 
 */
 require '../../koneksi/koneksi.php';

if($_GET['id'] == 'konfirmasi')
{
    $data2[] = $_POST['status'];
    $data2[] = $_POST['id_elektronik'];
    $sql2 = "UPDATE `elektronik` SET `status`= ? WHERE id_elektronik= ?";
    $row2 = $koneksi->prepare($sql2);
    $row2->execute($data2);

    echo '<script>alert("Status Produk di pinjam");history.go(-1);</script>'; 
}