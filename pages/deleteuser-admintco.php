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


      $tampil=mysqli_query($koneksi, "SELECT * FROM tb_login WHERE id = '$_GET[id]'");

      $data = mysqli_fetch_array($tampil);
      $hapus = mysqli_query($koneksi, "DELETE FROM tb_login WHERE id = '$_GET[id]'");
      //jika hapus sukses
      if($hapus){
        echo "<script>
        alert('data berhasil dihapus!');
        document.location='user-admintco.php';
        </script>";
        } else{
        echo "<script>
        alert('Hapus data gagal');
        document.location='user-admintco.php'
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

        <title>For-Pi | Delete</title>
    </head>

    <?php
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level'] != "admin tco"){
		header("location:../login.php?pesan=gagal");
	}

	?>
</html>

