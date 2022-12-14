<?php
    $divisi = $_POST['divisi'];
    $pemilik = $_POST['pemilik'];
	// Database connection
	$conn = new mysqli('localhost','root','','kinerjapegawai');
	if($divisi == null){
		echo '<script>alert("Lengkapi jabatan terlebih dahulu!")</script>';
        echo '<script>window.location="jabatan-admin-tco.php"</script>';
	}
	else if($pemilik == null){
		echo '<script>alert("Lengkapi jabatan terlebih dahulu!")</script>';
        echo '<script>window.location="jabatan-admin-tco.php"</script>';
	}
    else {
		$stmt = $conn->prepare("insert into tb_divisi(divisi,pemilik) values(?,?)");
		$stmt->bind_param("ss", $divisi, $pemilik);
		$execval = $stmt->execute();
		echo $execval;
		echo '<script>alert("Add Jabatan Successfully...!")</script>';
        echo '<script>window.location="jabatan-admin-tco.php"</script>';
		$stmt->close();
		$conn->close();
	}
?>
