<?php
  //Koneksi database
  $server = "localhost";
  $user = "root";
  $password = "";
  $database = "kinerjapegawai";

  //buat koneksi
  $koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));

  //jika tombol edit diedit/hapus
  if(isset($_GET['hal'])){
    //jika edit data
    if($_GET['hal'] == "delete"){
      //tampilkan data yang akan diedit


      $tampil=mysqli_query($koneksi, "SELECT * FROM tb_data2 WHERE id_data2 = '$_GET[id]'");

      $data = mysqli_fetch_array($tampil);
      $hapus = mysqli_query($koneksi, "DELETE FROM tb_data2 WHERE id_data2 = '$_GET[id]'");
      $hapus2 = mysqli_query($koneksi, "DELETE FROM tb_data WHERE id_data = '$_GET[id]'");
      //jika hapus sukses
      if($hapus && $hapus2){
        echo "<script>
        alert('data berhasil dihapus!');
        document.location='juknis-admintco.php';
        </script>";
        } else{
        echo "<script>
        alert('Hapus data gagal');
        document.location='juknis-admintco.php'
        </script>";
        }
    }
  }


?>