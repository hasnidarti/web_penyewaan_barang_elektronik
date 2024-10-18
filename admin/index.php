<?php
/*
  | Source Code Aplikasi penyewaan elektronik PHP & MySQL
  | 
  | 
  | 
 */
    require '../koneksi/koneksi.php';
    $title_web = 'Dashboard';
    include 'header.php';
    if(empty($_SESSION['USER']))
    {
        session_start();
    }
    if(!empty($_POST['nama_rental']))
    {
        $data[] =  htmlspecialchars($_POST["nama_rental"]);
        $data[] =  htmlspecialchars($_POST["telp"]);
        $data[] =  htmlspecialchars($_POST["alamat"]);
        $data[] =  htmlspecialchars($_POST["email"]);
        $data[] =  htmlspecialchars($_POST["no_rek"]);
        $data[] =  1;
        $sql = "UPDATE infoweb SET nama_rental = ?, telp = ?, alamat = ?, email = ?, no_rek = ?  WHERE id = ? ";
        $row = $koneksi->prepare($sql);
        $row->execute($data);
        echo '<script>alert("Update Data Info Website Berhasil !");window.location="index.php"</script>';
        exit;
    }

    if(!empty($_POST['nama_pengguna']))
    {
        $data[] =  htmlspecialchars($_POST["nama_pengguna"]);
        $data[] =  htmlspecialchars($_POST["username"]);
        $data[] =  md5($_POST["password"]);
        $data[] =  $_SESSION['USER']['id_login'];
        $sql = "UPDATE login SET nama_pengguna = ?, username = ?, password = ? WHERE id_login = ? ";
        $row = $koneksi->prepare($sql);
        $row->execute($data);
        echo '<script>alert("Update Data Profil Berhasil !");window.location="index.php"</script>';
        exit;
    }
?>
<div class="container mt-4">
    <div class= "row justify-content-center"> 
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header text-white bg-primary" >
                    <h4>Info Website</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <?php
                            $sql = "SELECT * FROM infoweb WHERE id = 1";
                            $row = $koneksi->prepare($sql);
                            $row->execute();
                            $edit = $row->fetch(PDO::FETCH_OBJ);
                        ?>
                        <div class="form-group">
                            <label for="">Nama Website</label>
                            <input type="text" class="form-control" value="<?= $edit->nama_rental;?>" name="nama_rental" id="nama_rental" placeholder=""/>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" value="<?= $edit->email;?>" name="email" id="email" placeholder=""/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Telp</label>
                                    <input type="text" class="form-control" value="<?= $edit->telp;?>" name="telp" id="telp" placeholder=""/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" placeholder=""><?= $edit->alamat;?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">No. Rekening</label>
                            <textarea class="form-control" name="no_rek" id="no_rek" placeholder=""><?= $edit->no_rek;?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>