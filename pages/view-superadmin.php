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
    if($_GET['hal'] == "view"){
      //tampilkan data yang akan diedit


      $tampil=mysqli_query($koneksi, "SELECT * FROM tb_data2 WHERE id_data2 = '$_GET[id]'");

      $data = mysqli_fetch_array($tampil);
      if($data){
        //jika data ditemukan, maka data ditampung kedalam variabel
        $vid = $data['id_data2'];
        $vdeskripsi = $data['deskripsi2'];
        $vusulan_deskripsi = $data['usulan_deskripsi2'];
        $vdefinisi = $data['definisi2'];
        $vtujuan = $data['tujuan2'];
        $vsatuan = $data['satuan2'];
        $vkategori_satuan = $data['kategori_satuan2'];
        $vformula = $data['formula2'];
        $vsumber_target = $data['sumber_target2'];
        $vtipe_kpi = $data['tipe_kpi2'];
        $vtipe_target = $data['tipe_target2'];
        $vfrekuensi = $data['frekuensi2'];
        $vpolaritas = $data['polaritas2'];
        $vdivisi = $data['divisi2'];
        $vpemilik = $data['pemilik2'];
        $veviden = $data['eviden2'];
        $vsyarat_ketentuan = $data['syarat_ketentuan2'];
        $vkpi_parent = $data['kpi_parent2'];
      }
    }
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>For-Pi | View Data</title>

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
	if($_SESSION['level'] != "superadmin"){
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
        <a href="superadmin.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">

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


      <!-- Notifications Dropdown Menu -->
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
    <a href="index3.html" class="brand-link">
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
            <a href="superadmin.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="jabatan-superadmin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jabatan</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="pemilik.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pemilik</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="kategori-satuan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Satuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tipe-kpi.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipe Kpi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tipe-target.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipe Target</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="frekuensi.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Frekuensi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="polaritas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Polaritas</p>
                </a>
              </li>

            </ul>
          </li>

           <li class="nav-item menu-open">
            <a href="juknis-superadmin.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Juknis</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="user-superadmin.php" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>User</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="calendar.php" class="nav-link">
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
              <li class="breadcrumb-item"><a href="juknis-superadmin.php">Juknis</a></li>
              <li class="breadcrumb-item active">Data Karyawan</li>
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
              <table id="example1" class="table table-striped table:hover table-bordered">
              <thead>
            <tr>
              <th align="left">Deskripsi KPI</th>
              <td><?= $data['deskripsi2'] ?></td>
            </tr>
</thead>
            <tr>
              <th align="left">Usulan Deskripsi</th>
              <td><?= $data['usulan_deskripsi2'] ?></td>
            </tr>

            <tr>
              <th align="left">Definisi KPI</th>
              <td><?= $data['definisi2'] ?></td>
            </tr>

            <tr>
              <th align="left">Tujuan KPI</th>
              <td><?= $data['tujuan2'] ?></td>
            </tr>

            <tr>
              <th align="left">Satuan</th>
              <td><?= $data['satuan2'] ?></td>
            </tr>

            <tr>
              <th align="left">Kategori Satuan</th>
              <td><?= $data['kategori_satuan2'] ?></td>
            </tr>

            <tr>
              <th align="left">Formula</th>
              <td><?= $data['formula2'] ?></td>
            </tr>

            <tr>
              <th align="left">Sumber Target</th>
              <td><?= $data['sumber_target2'] ?></td>
            </tr>

            <tr>
              <th align="left">Tipe KPI</th>
              <td><?= $data['tipe_kpi2'] ?></td>
            </tr>

            <tr>
              <th align="left">Tipe Target</th>
              <td><?= $data['tipe_target2'] ?></td>
            </tr>

            <tr>
              <th align="left">Frekuensi</th>
              <td><?= $data['frekuensi2'] ?></td>
            </tr>

            <tr>
              <th align="left">Polaritas</th>
              <td><?= $data['polaritas2'] ?></td>
            </tr>

            <tr>
              <th align="left">Jabatan Pemilik KPI</th>
              <td><?= $data['divisi2'] ?></td>
            </tr>

            <tr>
              <th align="left">Pemilik KPI</th>
              <td><?= $data['pemilik2'] ?></td>
            </tr>

            <tr>
              <th align="left">Eviden</th>
              <td><?= $data['eviden2'] ?></td>
            </tr>

            <tr>
              <th align="left">Syarat & Ketentuan</th>
              <td><?= $data['syarat_ketentuan2'] ?></td>
            </tr>

            <tr>
              <th align="left">KPI Parent</th>
              <td><?= $data['kpi_parent2'] ?></td>
            </tr>



            <?php

              //persiapan menampilkan data
              $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM tb_data2 order by id_data2 asc");
            while($data = mysqli_fetch_array($tampil)) :
            ?>
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

</body>
</html>
