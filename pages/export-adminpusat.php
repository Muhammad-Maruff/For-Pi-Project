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
  <title>For-Pi | Export</title>

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
	if($_SESSION['level'] != "admin pusat"){
		header("location:../login.php?pesan=gagal");
	}
?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="admin.php" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="admin-pusat.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="juknis-adminpusat.php" class="nav-link">Juknis</a>
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
          <i class="fa-solid fa-door-open">logout</i>

          </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="adminpusat.php" class="brand-link">
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
            <a href="admin-pusat.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="dashboard-adminpusat.php" class="nav-link">
              <i class="nav-icon fas fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pemilik-adminpusat.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pemilik</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="jabatan-adminpusat.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jabatan</p>
                </a>
              </li>

              <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Atribut
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">5</span>
              </p>
            </a>

            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="kategori-satuan-adminpusat.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Satuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tipe-kpi-adminpusat.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipe Kpi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tipe-target-adminpusat.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipe Target</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="frekuensi-adminpusat.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Frekuensi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="polaritas-adminpusat.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Polaritas</p>
                </a>
              </li>
            </ul>
            </ul>
          </li>

           <li class="nav-item menu-open">
            <a href="juknis-adminpusat.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Juknis</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="user-adminpusat.php" class="nav-link">
            <i class="nav-icon fas fa-users"></i>              <p>User</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="calendar-adminpusat.php" class="nav-link">
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
            <h1>Data Karyawan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="juknis-adminpusat.php">Juknis</a></li>
              <li class="breadcrumb-item active">Export</li>
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>ID</th>
                  <th>Deskripsi KPI</th>
                  <th>Satuan KPI</th>
                  <th>Kategori Satuan</th>
                  <th>Tipe KPI</th>
                  <th>Tipe Target</th>
                  <th>Polaritas</th>
                  <th>Jabatan Pemilik KPI</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php

            //persiapan menampilkan data
            $no = 1;
          $tampil = mysqli_query($koneksi, "SELECT * FROM tb_data order by id_data asc");
          while($data = mysqli_fetch_array($tampil)) :
          ?>
                  <tr>
                  <td><?= $data['id_data'] ?></td>
                  <?php
                    if ($data['usulan_deskripsi'] == '') {
                        echo '<td>'. $data['deskripsi']. '</td>';
                    }else{
                        echo '<td>'. $data['usulan_deskripsi']. '</td>';
                    }
                    ?>
                  <td><?= $data['satuan'] ?></td>
                  <td><?= $data['kategori_satuan'] ?></td>
                  <td><?= $data['tipe_kpi'] ?></td>
                  <td><?= $data['tipe_target'] ?></td>
                  <td><?= $data['polaritas'] ?></td>
                  <td><?= $data['divisi'] ?></td>
                  <?php endwhile; ?>
                  </tbody>
                </table>

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
