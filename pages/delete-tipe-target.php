<?php
  //Koneksi database
  $server = "localhost";
  $user = "root";
  $password = "";
  $database = "kinerjapegawai";

  //buat koneksi
  $koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));

  //jika button simpan diklik
    //Data akan disimpan



  //jika tombol edit diedit/hapus
  if(isset($_GET['hal'])){
    //jika edit data
    if($_GET['hal'] == "delete"){
      //tampilkan data yang akan diedit


      $tampil=mysqli_query($koneksi, "SELECT * FROM tb_tipetarget WHERE id_tipetarget = '$_GET[id]'");

      $data = mysqli_fetch_array($tampil);
      $hapus = mysqli_query($koneksi, "DELETE FROM tb_tipetarget WHERE id_tipetarget = '$_GET[id]'");
      //jika hapus sukses
      if($hapus){
        echo "<script>
        alert('data berhasil dihapus!');
        document.location='tipe-target.php';
        </script>";
        } else{
        echo "<script>
        alert('Hapus data gagal');
        document.location='tipe-target.php'
        </script>";
        }
    }
  }


?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="library/bootstrap-5/bootstrap.min.css" rel="stylesheet" />
        <script src="library/bootstrap-5/bootstrap.bundle.min.js"></script>
        <script src="library/autocomplete.js"></script>
        <link rel="stylesheet" href="style2.css">

        <title>Delete Tipe Target</title>
    </head>

    <?php
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:../login.php?pesan=gagal");
	}

	?>

    <body>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info shadow-sm">
      <div class="container">
        <a href=""> <img src="https://www.patinews.com/wp-content/uploads/2015/03/logo-pln-pati.jpg" width="30" height="30" class="d-inline-block align-top logo" alt="" ></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="superadmin.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="juknis-superadmin.php">Juknis</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="keluar.php">Keluar</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

            <!--Akhir input data-->
    </body>
</html>
