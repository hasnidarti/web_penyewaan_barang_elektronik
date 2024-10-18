<?php
/*
  | Source Code Aplikasi penyewaan elektronik PHP & MySQL
  | 
  | 
  | 
 */
    session_start();
    if(!empty($_SESSION['USER']['level'] == 'admin')){ 

    }else{ 
        echo '<script>alert("Login Khusus Admin !");window.location="../index.php";</script>';
    }
 
    // select untuk panggil nama admin
    $id_login = $_SESSION['USER']['id_login'];
    
    $row = $koneksi->prepare("SELECT * FROM login WHERE id_login=?");
    $row->execute(array($id_login));
    $hasil_login = $row->fetch();
?>

<!doctype html>
<html lang="en">
  <head>
    <title><?php echo $title_web;?> | ElectraFlex</title>
    <link rel="icon" href="../assets/image/bola.png" type="x-icon">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $url;?>assets/css/bootstrap.css" >
    <link rel="stylesheet" href="<?php echo $url;?>assets/css/font-awesome.css" >
   
    <style>
    /* Border dan styling untuk link di dalam tombol */
    .button {
      background-color: #f8f9fa; /* Warna latar belakang tombol */
      border: 2px solid red; /* Border warna merah */
      border-radius: 10px; /* Mengatur sudut rounded */
      width: 100px; /* Lebar tombol */
      height: 40px; /* Tinggi tombol */
      display: flex; /* Menggunakan Flexbox untuk penataan */
      align-items: center; /* Posisikan konten di tengah vertikal */
      justify-content: center; /* Posisikan konten di tengah horizontal */
      transition: background-color 0.3s, color 0.3s; /* Efek transisi saat hover */
    }

    .button .nav-link {
      text-decoration: none; /* Menghilangkan underline pada link */
      color: inherit; /* Warna teks mewarisi dari induk */
      font-size: 16px; /* Ukuran font untuk teks dalam tombol */
      display: block; /* Menjadikan elemen blok */
      width: 100%; /* Mengisi penuh lebar tombol */
      text-align: center; /* Teks berada di tengah horizontal */
      line-height: 40px;
    }

    .button:hover {
      color: white; /* Warna teks putih saat hover */
      background-color: red; /* Warna latar belakang merah saat hover */
    }
</style>


  </head>
  <body>
    <div class="jumbotron pt-4 pb-4">
        <div class="row">
            <div class="col-sm-8">
                <h2><b style="text-transform:uppercase;"><?= $info_web->nama_rental;?> </b></h2>
            </div>
        </div>
    </div>
    <div style="margin-top:-2pc"></div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#"></a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-link <?php if($title_web == 'Dashboard'){ echo 'active';}?>">
                    <a class="nav-link" href="<?php echo $url;?>admin/index.php">Halaman Admin</a>  
                </li>
                <li class="nav-link <?php if($title_web == 'User'){ echo 'active';}?>">
                    <a class="nav-link" href="<?php echo $url;?>admin/user/index.php">Data User</a>  
                </li>
                <li class="nav-link <?php if($title_web == 'Daftar elektronik'){ echo 'active';}?>">
                    <a class="nav-link" href="<?php echo $url;?>admin/elektronik/elektronik.php">Daftar Produk</a>
                    <?php if($title_web == 'Tambah Produk')
                    if($title_web == 'Edit Produk'){ echo 'active';}?>
                </li>
                <li class="nav-link <?php if($title_web == 'Daftar Booking'){ echo 'active';}?>
                <?php if($title_web == 'Konfirmasi'){ echo 'active';}?>">
                    <a class="nav-link" href="<?php echo $url;?>admin/booking/booking.php">Daftar Booking</a>
                </li>
                <li class="nav-link <?php if($title_web == 'Peminjaman'){ echo 'active';}?>">
                    <a class="nav-link" href="<?php echo $url;?>admin/peminjaman/peminjaman.php">Peminjaman/Pengembalian</a>
                </li>
            </ul>
            <ul class="navbar-nav my-2 my-lg-0">
                <li class="nav-link" <?php if($title_web == 'Edit Admin'){ echo 'active';}?>">
                    <a class="nav-link" href="<?php echo $url;?>admin/profil.php">
                        <i class="fa fa-user"> </i> Hallo, <?php echo $hasil_login['nama_pengguna'];?>
                    </a>
                </li>
                <li class="nav-link">
                <button class="button">
            <a class="nav-link" onclick="return confirm('Apakah anda ingin logout ?');" href="<?php echo $url;?>admin/logout.php">Logout</a>
          </button>
                </li>
            </ul>
        </div>
    </nav>