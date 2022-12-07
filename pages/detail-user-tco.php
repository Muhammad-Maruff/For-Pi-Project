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
  <title>For-Pi | Details</title>

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<?php
session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level'] != "user tco"){
		header("location:../login.php?pesan=gagal");
	}


if (empty($_GET['hash'])){
  header("location:juknis-user-tco.php");
}

?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="user-div-tco.php" class="nav-link">Home</a>
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
          <i class="fa-solid fa-door-open"></i>
          Logout
          </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="user-div-tco" class="brand-link">
      <img src="../dist/img/Logo_PLNN.png" alt="PLNLOGO" class="brand-image img-rectangle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">For-Pi</span>
    </a>

      <!-- Sidebar -->
      <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
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
            <a href="user-div-tco.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>

           <li class="nav-item menu-open">
            <a href="juknis-user-tco.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Juknis</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="calendar-usertco.php" class="nav-link">
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
            <h1>Details</h1>
          </div>
          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="user-div-tco.php">Home</a></li>
              <li class="breadcrumb-item"><a href="juknis-user-tco.php">Juknis</a></li>
              <?php

          $tampil = mysqli_query($koneksi, "SELECT * FROM tb_data2  order by id_data2 asc");
          $data = mysqli_fetch_array($tampil);
          ?>
              <?php
              echo '<li class="breadcrumb-item">'. '<a href="log-data-usertco.php?hash='.$data['is_updated'].'" >' . 'Perubahan Data' . '</a>' .'</li>';
              ?>

              <li class="breadcrumb-item active">Details</li>
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
              <div class="card-body">
              <table class="table table-striped table:hover table-bordered">
              <?php

            //persiapan menampilkan data
            $no = 1;
          // $tampil = mysqli_query($koneksi, "SELECT tb_data2.*,tb_data.* FROM tb_data2,tb_data LIMIT 10");

          $hash = $_GET['hash'];

          $tampil = mysqli_query($koneksi, "SELECT tb_data.*,tb_data2.* FROM tb_data INNER JOIN tb_data2 ON tb_data.is_updated = tb_data2.is_updated WHERE tb_data.is_updated= '$hash' AND tb_data.is_updated != ''");
          // Percepatan pemenuhan FTK Struktural SPV Dasar yang kosong pada UI kewenangan
          // Percepatan pemenuhan FTK Struktural SPV Dasar yang kosong pada UI kewenangan
          // var_dump($tampil);
          // die;

          // $tampill = mysqli_query($koneksi, "SELECT * FROM tb_data order by id_data asc");

          while( $data = mysqli_fetch_array($tampil)):?>
            <tr>

              <?php
                    if ($data['definisi'] != $data['definisi2']) {
                      echo '<th align="left">'.'Definisi'.'</th>';
                      echo '<td>'. $data['definisi']. '</td>';
                      echo '<td>'.'<p class="btn text-success">'  . 'Sudah diubah menjadi'  .'</p>'.'</td>';
                      echo '<td>'. $data['definisi2'] .'</td>';
                    }
                    ?>
            </tr>

            <tr>
              <?php
                    if ($data['tujuan'] != $data['tujuan2']) {
                      echo '<th align="left">'.'Tujuan'.'</th>';
                      echo '<td>'. $data['tujuan']. '</td>';
                      echo '<td>'.'<p class="btn text-success">'  . 'Sudah diubah menjadi'  .'</p>'.'</td>';
                      echo '<td>'. $data['tujuan2'] .'</td>';
                    }
                    ?>
            </tr>

            <tr>
            <?php
                    if ($data['satuan'] != $data['satuan2']) {
                      echo '<th align="left">'.'Satuan'.'</th>';
                      echo '<td>'. $data['satuan']. '</td>';
                      echo '<td>'.'<p class="btn text-success">'  . 'Sudah diubah menjadi'  .'</p>'.'</td>';
                      echo '<td>'. $data['satuan2'] .'</td>';

                    }
                    ?>
            </tr>

            <tr>
            <?php
                    if ($data['kategori_satuan'] != $data['kategori_satuan2']) {
                      echo '<th align="left">'.'Kategori Satuan'.'</th>';
                      echo '<td>'. $data['kategori_satuan']. '</td>';
                      echo '<td>'.'<p class="btn text-success">'  . 'Sudah diubah menjadi'  .'</p>'.'</td>';
                      echo '<td>'. $data['kategori_satuan2'] .'</td>';
                    }
                    ?>
            </tr>

            <tr>
            <?php
                    if ($data['formula'] != $data['formula2']) {
                      echo '<th align="left">'.'Formula'.'</th>';
                      echo '<td>'. $data['formula']. '</td>';
                      echo '<td>'.'<p class="btn text-success">'  . 'Sudah diubah menjadi'  .'</p>'.'</td>';
                      echo '<td>'. $data['formula2'] .'</td>';
                    }
                    ?>
            </tr>

            <tr>
            <?php
                    if ($data['sumber_target'] != $data['sumber_target2']) {
                      echo '<th align="left">'.'Sumber Target'.'</th>';
                      echo '<td>'. $data['sumber_target']. '</td>';
                      echo '<td>'.'<p class="btn text-success">'  . 'Sudah diubah menjadi'  .'</p>'.'</td>';
                      echo '<td>'. $data['sumber_target2'] .'</td>';
                    }
                    ?>
            </tr>

            <tr>
            <?php
                    if ($data['tipe_kpi'] != $data['tipe_kpi2']) {
                      echo '<th align="left">'.'Tipe KPI'.'</th>';
                      echo '<td>'. $data['tipe_kpi']. '</td>';
                      echo '<td>'.'<p class="btn text-success">'  . 'Sudah diubah menjadi'  .'</p>'.'</td>';
                      echo '<td>'. $data['tipe_kpi2'] .'</td>';
                    }
                    ?>
            </tr>

            <tr>
            <?php
                    if ($data['tipe_target'] != $data['tipe_target2']) {
                      echo '<th align="left">'.'Tipe Target'.'</th>';
                      echo '<td>'. $data['tipe_target']. '</td>';
                      echo '<td>'.'<p class="btn text-success">'  . 'Sudah diubah menjadi'  .'</p>'.'</td>';
                      echo '<td>'. $data['tipe_target2'] .'</td>';
                    }
                    ?>
            </tr>

            <tr>
            <?php
                    if ($data['frekuensi'] != $data['frekuensi2']) {
                      echo '<th align="left">'.'Frekuensi'.'</th>';
                      echo '<td>'. $data['frekuensi']. '</td>';
                      echo '<td>'.'<p class="btn text-success">'  . 'Sudah diubah menjadi'  .'</p>'.'</td>';
                      echo '<td>'. $data['frekuensi2'] .'</td>';

                    }
                    ?>
            </tr>

            <tr>
            <?php
                    if ($data['polaritas'] != $data['polaritas2']) {
                      echo '<th align="left">'.'Polaritas'.'</th>';
                      echo '<td>'. $data['polaritas']. '</td>';
                      echo '<td>'.'<p class="btn text-success">'  . 'Sudah diubah menjadi'  .'</p>'.'</td>';
                      echo '<td>'. $data['polaritas2'] .'</td>';
                    }
                    ?>
            </tr>

            <tr>
            <?php
                    if ($data['divisi'] != $data['divisi2']) {
                      echo '<th align="left">'.'Jabatan'.'</th>';
                      echo '<td>'. $data['divisi']. '</td>';
                      echo '<td>'.'<p class="btn text-success">'  . 'Sudah diubah menjadi'  .'</p>'.'</td>';
                      echo '<td>'. $data['divisi2'] .'</td>';
                    }
                    ?>
            </tr>

            <tr>
            <?php
                    if ($data['pemilik'] != $data['pemilik2']) {
                      echo '<th align="left">'.'Pemilik'.'</th>';
                      echo '<td>'. $data['pemilik']. '</td>';
                      echo '<td>'.'<p class="btn text-success">'  . 'Sudah diubah menjadi'  .'</p>'.'</td>';
                      echo '<td>'. $data['pemilik2'] .'</td>';
                    }
                    ?>
            </tr>

            <tr>
            <?php
                    if ($data['eviden'] != $data['eviden2']) {
                      echo '<th align="left">'.'Eviden'.'</th>';
                      echo '<td>'. $data['eviden']. '</td>';
                      echo '<td>'.'<p class="btn text-success">'  . 'Sudah diubah menjadi'  .'</p>'.'</td>';
                      echo '<td>'. $data['eviden2'] .'</td>';
                    }
                    ?>
            </tr>

            <tr>
            <?php
                    if ($data['syarat_ketentuan'] != $data['syarat_ketentuan2']) {
                      echo '<th align="left">'.'Syarat & Ketentuan'.'</th>';
                      echo '<td>'. $data['syarat_ketentuan']. '</td>';
                      echo '<td>'.'<p class="btn text-success">'  . 'Sudah diubah menjadi'  .'</p>'.'</td>';
                      echo '<td>'. $data['syarat_ketentuan2'] .'</td>';
                    }
                    ?>
            </tr>

            <tr>
            <?php
                    if ($data['kpi_parent'] != $data['kpi_parent2']) {
                      echo '<th align="left">'.'KPI Parent'.'</th>';
                      echo '<td>'. $data['kpi_parent']. '</td>';
                      echo '<td>'.'<p class="btn text-success">'  . 'Sudah diubah menjadi'  .'</p>'.'</td>';
                      echo '<td>'. $data['kpi_parent2'] .'</td>';
                    }
                    ?>
            </tr>

           <?php endwhile; ?>

            </table>

     <!--Akhir input data-->
              </div>
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
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
<!-- AdminLTE for demo purposes -->
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
