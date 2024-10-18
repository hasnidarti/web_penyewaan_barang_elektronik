<!doctype html>
<html lang="en">
<head>
  <title>ElectraFlex</title>
  <link rel="icon" href="assets/image/bola.png" type="x-icon">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/font-awesome.css">
</head>
<body>
  <div class="jumbotron pt-4 pb-4">
    <div class="row">
      <div class="col-sm-8">
        <h2><b style="text-transform:uppercase;"><?= $info_web->nama_rental;?> </b></h2>
      </div>
      <div class="col-sm-4">
        <form class="form-inline" method="get" action="blog.php">
          <input class="form-control mr-sm-2" type="search" name="cari" placeholder="Cari Nama elektronik" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
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
        <li class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/index.php') ? 'active' : ''; ?>">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/blog.php') ? 'active' : ''; ?>">
          <a class="nav-link" href="blog.php">Daftar Produk</a>
        </li>
        <?php if(!empty($_SESSION['USER'])){ ?>
        <li class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/history.php') ? 'active' : ''; ?>">
          <a class="nav-link" href="history.php">History</a>
        </li>
        <li class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/kontak.php') ? 'active' : ''; ?>">
          <a class="nav-link" href="kontak.php">Kontak Kami</a>
        </li>
        <?php } ?>
      </ul>
      <?php if(!empty($_SESSION['USER'])){ ?>
      <ul class="navbar-nav my-2 my-lg-0">
        <li class="nav-link">
          <a class="nav-link" href="profil.php">
            <i class="fa fa-user"> </i> Hallo, <?php echo $_SESSION['USER']['nama_pengguna'];?>
          </a>
        </li>
        <li class="nav-link">
          <button class="button">
            <a class="nav-link" onclick="return confirm('Apakah anda ingin logout ?');" href="<?php echo $url;?>admin/logout.php">Logout</a>
          </button>
        </li>
      </ul>
      <?php } ?>
    </div>
  </nav>

  <style>
    /* CSS untuk mengatur ukuran font pada navbar */
    .navbar .nav-link {
      font-size: 16px; /* Ukuran font default untuk link navbar */
    }
    .navbar .navbar-brand {
      font-size: 20px; /* Ukuran font untuk brand */
    }
    .navbar-collapse .nav-item .nav-link {
      font-size: 20px; /* Ukuran font untuk item dalam navbar-collapse */
    }
    /* Menggunakan flexbox untuk mendistribusikan item dalam navbar */
    .navbar-nav {
      display: flex;
      align-items: center;
      justify-content: space-between; /* Memberi jarak seimbang antar item */
    }
    /* Menambah jarak lebih spesifik antar item */
    .navbar-nav .nav-item {
      margin: 0 30px; /* Jarak kiri dan kanan 25px */
    }

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
</body>
</html>