<?php
  //Koneksi database
  $server = "localhost";
  $user = "root";
  $password = "";
  $database = "kinerjapegawai";

  //buat koneksi
  $koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>For-Pi | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../dist/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<?php
session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level'] != "admin tco"){
		header("location:../login.php?pesan=gagal");
	}
?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

 <!-- Preloader -->
 <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/Logo_PLNN.png" alt="PLNLOGO" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="admin-div-tco.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <?php
           echo $_SESSION['username'];
          ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="keluar.php" class="dropdown-item">
          <i class="fa-solid fa-right-from-bracket"></i>
          logout
          </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="admin-div-tco.php" class="brand-link">
      <img src="../dist/img/Logo_PLNN.png" alt="PLNLOGO" class="brand-image img-rectangle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">For-Pi</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> <?php
         echo $_SESSION['username'];
          ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
            <a href="admin-div-tco.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="dashboard-admintco.php" class="nav-link">
              <i class="nav-icon fas fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="jabatan-admin-tco.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Jabatan</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="juknis-admintco.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Juknis</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="user-admintco.php" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="calendar-admintco.php" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
              <p>Calendar</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard Periode Perencanaan</h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin-div-tco.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">

              <!-- /.card-header -->
              <div class="card-body text-center">
            <form action="connect-dashboard-admintco.php" method="post">
                  <div class="row mb-3">
                  <label for="password" class="col-sm-2 col-form-label">Divisi</label>
                  <div class="col-sm-10">
                  <select class="form-control" aria-label="Default select example" name="divisi">
                  <option selected disabled>Divisi</option>
                  <?php
                  $records = mysqli_query($koneksi, "SELECT * FROM tb_pemilik WHERE pemilik='DIV TCO'");
                  while($data = mysqli_fetch_array($records)){
                    echo "<option value='".$data['pemilik']."'>".$data['pemilik']."</option>";
                  }
                  ?>
                </select>
                    </div>
                  </div>

                    <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Upload Data</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="upload_data">
                    </div>
                  </div>

                    <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Upload KPI</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="upload_kpi">
                    </div>
                  </div>

                    <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Inspirasi KPI</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="inspirasi_kpi">
                    </div>
                  </div>

                    <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Approval</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="approval">
                    </div>
                  </div>
                  <input type="submit" class="btn btn-primary btn-register">
              </div>
              </form>


              <div class="card-body text-center">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Unit/Divisi</th>
                  <th>Upload Data</th>
                  <th>Upload KPI</th>
                  <th>Inspirasi KPI</th>
                  <th>Approval</th>
                  <th>Status</th>
                  <th>Aksi</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                    <?php 
                       $user = mysqli_query($koneksi, "SELECT * FROM tb_dashboard WHERE divisi='DIV TCO'");
                       while($data = mysqli_fetch_array($user)) :
                    ?>
                  <tr>
                    <td><?= $data['divisi'] ?></td>
                    <td><?= $data['upload_data'] ?></td>
                    <td><?= $data['upload_kpi'] ?></td>
                    <td><?= $data['inspirasi_kpi'] ?></td>
                    <td><?= $data['approval'] ?></td>
                    <?php
                    $hitung = ($data['upload_data'] + $data['upload_kpi'] + $data['inspirasi_kpi'] + $data['approval']) / 4;
                    $total = $hitung;
                    if($total == 100){
                      echo '<td>'. '<button class="btn btn-success">' . 'Selesai' .'</button>' .'</td>';
                    }
                    else if($total >= 50 && $total <= 100){
                      echo '<td>'. '<button class="btn btn-warning">' . 'Segera Selesai' . '</button>' . '</td>';
                    }

                    else if($total <= 50){
                      echo '<td>'. '<button class="btn btn-danger">' . 'Belum Selesai' . '</button>' . '</td>';
                    }
                  
                    else{
                      echo '<td>'.'</td>';
                    }
                    ?>
                    <td>
                      <a href="editdashboard-admintco.php?hal=edit&id=<?=$data['id']?>" class="btn btn-info">Edit</a>
                    </td>
                  <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>PLN Kantor Pusat</b>
    </div>
    <strong>Copyright &copy; 2022 <a href="#">PT PLN (PERSERO)</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
