<?php
  //Koneksi database
  $server = "localhost";
  $user = "root";
  $password = "";
  $database = "kinerjapegawai";

  //buat koneksi
  $koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));

  //jika button simpan diklik
  if(isset($_POST['btn-simpan'])){
    if(isset($_GET['hal']) == "edit"){

      $edit = mysqli_query($koneksi, "UPDATE tb_tipekpi SET

                                              tipe_kpi = '$_POST[ttipe]'

                                              WHERE id_kpi = '$_GET[id]'
          ");

          if($edit){
            echo "<script>
              alert('Data berhasil edit!');
              document.location='tipe-kpi.php'
            </script>";
          }
          else{
            echo "<script>
              alert('Data gagal edit!');
              document.location='tipe-kpi.php'
            </script>";
          }
    }
    //Data akan disimpan

    else{
      $simpan = mysqli_query($koneksi, "INSERT INTO tb_tipekpi (tipe_kpi)
      VALUE ( ]
              '$_POST[ttipe]',

  ");

//uji jika simpan data sukses
if($simpan){
echo "<script>
alert('data berhasil disimpan!');
document.location='tipe-kpi.php';
</script>";
} else{
echo "<script>
alert('Simpan data gagal');
document.location='tipe-kpi.php';
</script>";
}
    }

    $tampil = mysqli_query($koneksi, "SELECT * FROM tb_tipekpi order by id_kpi asc");
            while($data = mysqli_fetch_array($tampil));

  }

  //deklarasi variabel untuk menampung data yang akan diedit
  $vtipekpi = "";


  //jika tombol edit diedit/hapus
  if(isset($_GET['hal'])){
    //jika edit data
    if($_GET['hal'] == "edit"){
      //tampilkan data yang akan diedit


      $tampil=mysqli_query($koneksi, "SELECT * FROM tb_tipekpi WHERE id_kpi = '$_GET[id]'");

      $data = mysqli_fetch_array($tampil);
      if($data){
        //jika data ditemukan, maka data ditampung kedalam variabel

        $vtipekpi = $data['tipe_kpi'];

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
        <link href="../library/bootstrap-5/bootstrap.min.css" rel="stylesheet" />
        <script src="../library/bootstrap-5/bootstrap.bundle.min.js"></script>
        <title>For-Pi | Edit Tipe KPI</title>

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


<!DOCTYPE html>
<html lang="en">

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
              <li class="nav-item menu-open">
                <a href="jabatan-superadmin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jabatan</p>
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
            <i class="nav-icon fas fa-users"></i>              <p>User</p>
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


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header mx-auto">
                <h1>Edit Tipe KPI</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!--Input Data-->
        <form method="POST">


  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Tipe KPI</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="ttipe" value="<?= $vtipekpi ?>">
    </div>
  </div>


  <div class="text-center">
      <hr>
      <button class="btn btn-success" name="btn-simpan" type="submit">Save</button>
      <button class="btn btn-danger" name="btn-clear" type="reset">Clear</button>
     </div>
</form>
        </div>
     <!--Akhir input data-->
        </div>
     <!--Akhir input data-->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
</script>

</body>
</html>
