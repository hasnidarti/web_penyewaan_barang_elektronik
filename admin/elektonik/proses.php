<?php
/*
  | Source Code Aplikasi penyewaan elektronik PHP & MySQL
  |
 */

// Aktifkan error reporting untuk debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Koneksi ke database
require '../../koneksi/koneksi.php';

// Mulai session jika belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Menangani aksi berdasarkan parameter 'aksi'
try {
    // Tambah Data
    if ($_GET['aksi'] == 'tambah') {
        $allowedImageTypes = ['image/png', 'image/jpeg', 'image/gif', 'image/jpg', 'image/webp'];
        
        // Validasi upload file gambar
        $filepath = $_FILES['gambar']['tmp_name'];
        $filetype = mime_content_type($filepath);
        
        if (!in_array($filetype, $allowedImageTypes)) {
            echo '<script>alert("File tidak valid. Hanya JPG, PNG, GIF, dan WEBP yang diizinkan.");window.location="tambah.php";</script>';
            exit();
        } else if ($_FILES['gambar']['error'] > 0) {
            echo '<script>alert("Terjadi kesalahan pada file gambar.");window.location="tambah.php";</script>';
            exit();
        } else if ($_FILES['gambar']['size'] > 4096 * 1024) {
            echo '<script>alert("Ukuran file terlalu besar. Maksimum 4MB.");window.location="tambah.php";</script>';
            exit();
        } else {
            $dir = '../../assets/image/';
            $temp = explode(".", $_FILES["gambar"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $target_path = $dir . basename($newfilename);

            if (move_uploaded_file($filepath, $target_path)) {
                $data = [
                    $_POST['no_plat'],
                    $_POST['merk'],
                    $_POST['harga'],
                    $_POST['deskripsi'],
                    $_POST['status'],
                    $newfilename
                ];

                $sql = "INSERT INTO elektronik (no_plat, merk, harga, deskripsi, status, gambar) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $koneksi->prepare($sql);
                $stmt->execute($data);

                echo '<script>alert("Data berhasil ditambahkan.");window.location="elektronik.php";</script>';
            } else {
                echo '<script>alert("Gagal mengunggah file gambar.");window.location="tambah.php";</script>';
            }
        }
    }

    // Edit Data
    if ($_GET['aksi'] == 'edit') {
        $id = $_GET['id'];
        $gambar = $_POST['gambar_cek']; // Nama file gambar saat ini

        $data = [
            $_POST['no_plat'],
            $_POST['merk'],
            $_POST['harga'],
            $_POST['deskripsi'],
            $_POST['status']
        ];

        // Validasi jika ada file gambar baru yang diunggah
        if ($_FILES['gambar']['size'] > 0) {
            $allowedImageTypes = ['image/png', 'image/jpeg', 'image/gif', 'image/jpg', 'image/webp'];
            $filepath = $_FILES['gambar']['tmp_name'];
            $filetype = mime_content_type($filepath);

            if (!in_array($filetype, $allowedImageTypes)) {
                echo '<script>alert("File tidak valid. Hanya JPG, PNG, GIF, dan WEBP yang diizinkan.");history.go(-1);</script>';
                exit();
            } else if ($_FILES['gambar']['error'] > 0) {
                echo '<script>alert("Terjadi kesalahan pada file gambar.");history.go(-1);</script>';
                exit();
            } else if ($_FILES['gambar']['size'] > 4096 * 1024) {
                echo '<script>alert("Ukuran file terlalu besar. Maksimum 4MB.");history.go(-1);</script>';
                exit();
            } else {
                $dir = '../../assets/image/';
                $temp = explode(".", $_FILES["gambar"]["name"]);
                $newfilename = round(microtime(true)) . '.' . end($temp);
                $target_path = $dir . basename($newfilename);

                if (move_uploaded_file($filepath, $target_path)) {
                    // Hapus gambar lama jika ada
                    if (file_exists($dir . $gambar)) {
                        unlink($dir . $gambar);
                    }
                    $gambar = $newfilename; // Gunakan nama file baru
                } else {
                    echo '<script>alert("Gagal mengunggah file gambar.");history.go(-1);</script>';
                    exit();
                }
            }
        }
        
        $data[] = $gambar; // Tambahkan nama file gambar ke data
        $data[] = $id; // Tambahkan ID elektronik ke data

        $sql = "UPDATE elektronik SET no_plat = ?, merk = ?, harga = ?, deskripsi = ?, status = ?, gambar = ? WHERE id_elektronik = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->execute($data);

        echo '<script>alert("Data berhasil diperbarui.");window.location="elektronik.php";</script>';
    }

    // Hapus Data
    if ($_GET['aksi'] == 'hapus') {
        $id = $_GET['id'];
        $gambar = $_GET['gambar'];

        // Hapus file gambar dari server
        if (file_exists('../../assets/image/' . $gambar)) {
            unlink('../../assets/image/' . $gambar);
        }

        $sql = "DELETE FROM elektronik WHERE id_elektronik = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->execute([$id]);

        echo '<script>alert("Data berhasil dihapus.");window.location="elektronik.php";</script>';
    }

} catch (Exception $e) {
    echo '<script>alert("Terjadi kesalahan: ' . $e->getMessage() . '");history.go(-1);</script>';
}
?>