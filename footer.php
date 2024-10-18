<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="<?php echo $url;?>assets/css/bootstrap.min.css">
  <!-- Masukkan CSS lainnya di sini -->
  <style>
    /* CSS untuk membuat footer tetap di bagian bawah */
    html {
      position: relative;
      min-height: 100%;
    }
    body {
      margin-bottom: 60px; /* Tinggi footer */
    }
    .footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 40px; /* Sesuaikan tinggi dengan kebutuhan */
      background-color: #343a40; /* Sesuaikan dengan warna latar belakang footer */
      color: white;
      text-align: center;
      line-height: 40px; /* Sesuaikan dengan tinggi footer */
    }
  </style>
</head>
<body>

  <!-- Footer -->
  <div class="footer">
    Copyright <?= date('Y');?> <?= $info_web->nama_sewa;?> All Rights Reserved
  </div>

  <!-- Masukkan script JavaScript di sini -->
  <script src="<?php echo $url;?>assets/js/jquery-3.3.1.min.js"></script>
  <script src="<?php echo $url;?>assets/js/bootstrap.min.js"></script>
</body>
</html>