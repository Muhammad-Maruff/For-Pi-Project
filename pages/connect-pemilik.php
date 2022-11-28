<?php
    $pemilik = $_POST['pemilik'];

	// Database connection
	$conn = new mysqli('localhost','root','','kinerjapegawai');
	if($pemilik == null){
		echo '<script>alert("Lengkapi Pemilik terlebih dahulu!")</script>';
        echo '<script>window.location="pemilik.php"</script>';
	}
    else {
		$stmt = $conn->prepare("insert into tb_pemilik(pemilik) values(?)");
		$stmt->bind_param("s", $pemilik);
		$execval = $stmt->execute();
		echo $execval;
		echo '<script>alert("Add Pemilik Successfully...!")</script>';
        echo '<script>window.location="pemilik.php"</script>';
		$stmt->close();
		$conn->close();
	}
?>
