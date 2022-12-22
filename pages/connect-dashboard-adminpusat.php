<?php
    $divisi = $_POST['divisi'];
	$upload_data = $_POST['upload_data'];
	$upload_kpi = $_POST['upload_kpi'];
	$inspirasi_kpi = $_POST['inspirasi_kpi'];
	$approval = $_POST['approval'];

	// Database connection
	$conn = new mysqli('localhost','root','','kinerjapegawai');
	if($divisi == null){
		echo '<script>alert("Lengkapi divisi terlebih dahulu!")</script>';
        echo '<script>window.location="dashboard-adminpusat.php"</script>';
	}
    else if($upload_data == null){
		echo '<script>alert("Lengkapi upload_data terlebih dahulu!")</script>';
        echo '<script>window.location="dashboard-adminpusat.php"</script>';
	}
    else if($upload_kpi == null){
		echo '<script>alert("Lengkapi upload_kpi Terlebih Dahulu !")</script>';
        echo '<script>window.location="dashboard-adminpusat.php"</script>';
	}
	else if($inspirasi_kpi == null){
		echo '<script>alert("Lengkapi inspirasi_kpi Terlebih Dahulu !")</script>';
        echo '<script>window.location="dashboard-adminpusat.php"</script>';
	}
	else if($approval == null){
		echo '<script>alert("Lengkapi approval Terlebih Dahulu !")</script>';
        echo '<script>window.location="dashboard-adminpusat.php"</script>';
	}
    else {
		$stmt = $conn->prepare("insert into tb_dashboard(divisi,upload_data,upload_kpi,inspirasi_kpi,approval) values(?, ?, ?, ?,?)");
		$stmt->bind_param("siiii", $divisi,$upload_data,$upload_kpi,$inspirasi_kpi,$approval);
		$execval = $stmt->execute();
		echo $execval;
		echo '<script>alert("Save successfully...")</script>';
        echo '<script>window.location="dashboard-adminpusat.php"</script>';
		$stmt->close();
		$conn->close();
	}
?>
