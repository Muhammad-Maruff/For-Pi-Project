<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'config.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from tb_login where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level']=="superadmin"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "superadmin";
		// alihkan ke halaman dashboard admin
		header("location:pages/superadmin.php");

	// cek jika user login sebagai pegawai
	}else if($data['level']=="admin"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard pegawai
		header("location:pages/admin.php");

  }else if($data['level']=="admin pusat"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin pusat";
		// alihkan ke halaman dashboard pengurus
		header("location:pages/admin-pusat.php");

  }else if($data['level']=="admin setper"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin setper";
		// alihkan ke halaman dashboard pengurus
		header("location:pages/admin-setper.php");

  }else if($data['level']=="admin div tco"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin div tco";
		// alihkan ke halaman dashboard pengurus
		header("location:pages/admin-div-tco.php");

  }else if($data['level']=="admin div shb"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin div shb";
		// alihkan ke halaman dashboard pengurus
		header("location:pages/admin-div-shb.php");

	// cek jika user login sebagai pengurus
	}else if($data['level']=="user"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "user";
		// alihkan ke halaman dashboard pengurus
		header("location:pages/guest.php");



	}else{
		// alihkan ke halaman login kembali
		echo "<script>alert('Username atau password salah...!')</script>";
		echo '<script>window.location="login.php"</script>';
	}
}else{
	echo "<script>alert('Username atau password salah...!')</script>";
	echo '<script>window.location="login.php"</script>';
}

?>
