<?php

//index.php


$connect = new PDO("mysql:host=localhost; dbname=kinerjapegawai", "root", "");

$query = "
SELECT divisi FROM tb_divisi
ORDER BY divisi ASC
";

$result = $connect->query($query);

$data = array();

foreach($result as $row)
{
    $data[] = array(
        'label'     =>  $row['divisi'],
        'value'     =>  $row['divisi']
    );
}


?>


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
      $hash = md5(time());
      $tujuan2 = htmlspecialchars($_POST['ttujuan']);
      $edit = mysqli_query($koneksi, "UPDATE tb_data2 SET
                                              deskripsi2 = '$_POST[tdeskripsi]',
                                              usulan_deskripsi2 = '$_POST[tusulan_deskripsi]',
                                              definisi2 = '$_POST[tdefinisi]',
                                              tujuan2 = '$tujuan2',
                                              satuan2 = '$_POST[tsatuan]',
                                              kategori_satuan2 = '$_POST[tkategori]',
                                              formula2 = '$_POST[tformula]',
                                              sumber_target2 = '$_POST[tsumber]',
                                              tipe_kpi2 = '$_POST[ttipe]',
                                              tipe_target2 = '$_POST[ttarget]',
                                              frekuensi2 = '$_POST[tfrekuensi]',
                                              polaritas2 = '$_POST[tpolaritas]',
                                              divisi2 = '$_POST[tdivisi]',
                                              pemilik2 = '$_POST[tpemilik]',
                                              eviden2 = '$_POST[teviden]',
                                              syarat_ketentuan2 = '$_POST[tsyarat]',
                                              kpi_parent2 = '$_POST[tparent]',
                                              is_updated = '$hash'
                                              WHERE id_data2 = '$_GET[id]'
          ");
          $edit2 = mysqli_query($koneksi, "UPDATE tb_data SET is_updated = '$hash' WHERE id_data = $_GET[id] ");

          if($edit){
            echo "<script>
              alert('Data berhasil edit!');
              document.location='juknis-adminpusat.php'
            </script>";
          }
          else{
            echo "<script>
              alert('Data gagal edit!');
              document.location='juknis-adminpusat.php'
            </script>";
          }
    }
    //Data akan disimpan

    else{
      $simpan = mysqli_query($koneksi, "INSERT INTO tb_data2 (id_data2,deskripsi2,usulan_deskripsi2,definisi2,tujuan2,satuan2,kategori_satuan2,formula2,sumber_target2,tipe_kpi2,tipe_target2,frekuensi2,polaritas2,divisi2,pemilik2,eviden2,syarat_ketentuan2,kpi_parent2)
      VALUE ( '$_POST[tid]',
              '$_POST[tdeskripsi]',
              '$_POST[tusulan_deskripsi]',
              '$_POST[tdefinisi]',
              '$_POST[ttujuan]',
              '$_POST[tsatuan]',
              '$_POST[tkategori]',
              '$_POST[tformula]',
              '$_POST[tsumber]',
              '$_POST[ttipe]',
              '$_POST[ttarget]',
              '$_POST[tfrekuensi]',
              '$_POST[tpolaritas]',
              '$_POST[tdivisi]',
              '$_POST[tpemilik]',
              '$_POST[teviden]',
              '$_POST[tsyarat]',
              '$_POST[tparent]')
  ");

//uji jika simpan data sukses
if($simpan){
echo "<script>
alert('data berhasil disimpan!');
document.location='juknis-adminpusat.php';
</script>";
} else{
echo "<script>
alert('Simpan data gagal');
document.location='juknis-adminpusat.php'
</script>";
}
    }

    $tampil = mysqli_query($koneksi, "SELECT * FROM tb_data2 order by id_data2 asc");
            while($data = mysqli_fetch_array($tampil));
    $tampill = mysqli_query($koneksi, "SELECT * FROM tb_data order by id_data asc");
            while($data = mysqli_fetch_array($tampil));

  }

  //deklarasi variabel untuk menampung data yang akan diedit
  $vid = "";
  $vdeskripsi = "";
  $vusulan_deskripsi = "";
  $vdefinisi = "";
  $vtujuan = "";
  $vsatuan = "";
  $vkategori_satuan = "";
  $vformula = "";
  $vsumber_target = "";
  $vtipe_kpi = "";
  $vtipe_target="";
  $vfrekuensi = "";
  $vpolaritas ="";
  $vdivisi = "";
  $vpemilik = "";
  $veviden = "";
  $vsyarat_ketentuan = "";
  $vkpi_parent = "";

  $vid2 = "";
  $vdeskripsi2 = "";
  $vusulan_deskripsi2 = "";
  $vdefinisi2 = "";
  $vtujuan2 = "";
  $vsatuan2 = "";
  $vkategori_satuan2 = "";
  $vformula2 = "";
  $vsumber_target2 = "";
  $vtipe_kpi2 = "";
  $vtipe_target2="";
  $vfrekuensi2 = "";
  $vpolaritas2 ="";
  $vdivisi2 = "";
  $vpemilik2 = "";
  $veviden = "";
  $vsyarat_ketentuan2 = "";
  $vkpi_parent2 = "";



  //jika tombol edit diedit/hapus
  if(isset($_GET['hal'])){
    //jika edit data
    if($_GET['hal'] == "edit"){
      //tampilkan data yang akan diedit


      $tampil=mysqli_query($koneksi, "SELECT * FROM tb_data2 WHERE id_data2 = '$_GET[id]'");
      $tampill=mysqli_query($koneksi, "SELECT * FROM tb_data WHERE id_data = '$_GET[id]'");

      $data = mysqli_fetch_array($tampil);
      $dataa = mysqli_fetch_array($tampill);
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

      if($dataa){
        //jika data ditemukan, maka data ditampung kedalam variabel
        $vid2 = $dataa['id_data'];
        $vdeskripsi2 = $dataa['deskripsi'];
        $vusulan_deskripsi2 = $dataa['usulan_deskripsi'];
        $vdefinisi2 = $dataa['definisi'];
        $vtujuan2 = $dataa['tujuan'];
        $vsatuan2 = $dataa['satuan'];
        $vkategori_satuan2 = $dataa['kategori_satuan'];
        $vformula2 = $dataa['formula'];
        $vsumber_target2 = $dataa['sumber_target'];
        $vtipe_kpi2 = $dataa['tipe_kpi'];
        $vtipe_target2 = $dataa['tipe_target'];
        $vfrekuensi2 = $dataa['frekuensi'];
        $vpolaritas2 = $dataa['polaritas'];
        $vdivisi2 = $dataa['divisi'];
        $vpemilik2 = $dataa['pemilik'];
        $veviden2 = $dataa['eviden'];
        $vsyarat_ketentuan2 = $dataa['syarat_ketentuan'];
        $vkpi_parent2 = $dataa['kpi_parent'];
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
        <script src="../library/autocomplete.js"></script>
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
                <title>For-Pi | Edit Data Juknis</title>
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
            <a href="admin-pusat.php" class="nav-link">
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
                <a href="jabatan-adminpusat.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jabatan</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="pemilik-adminpusat.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pemilik</p>
                </a>
              </li>
              
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
          </li>

           <li class="nav-item menu-open">
            <a href="juknis-adminpusat.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Juknis</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="user-adminpusat.php" class="nav-link">
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


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header mx-auto">
                <h1>Edit Data Karyawan</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!--Input Data-->
        <form method="POST">
  <div class="row mb-3">
  <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi KPI</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tdeskripsi"><?= $vdeskripsi ?></textarea>
    </div>
  </div>


  <div class="row mb-3">
  <label for="inputEmail3" class="col-sm-2 col-form-label">Usulan Deskripsi KPI</label>
    <div class="col-sm-10">

    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tusulan_deskripsi"><?= $vusulan_deskripsi ?></textarea>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Definisi KPI</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tdefinisi"><?= $vdefinisi ?></textarea>
    </div>
  </div>


        <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Tujuan KPI</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ttujuan"><?= $vtujuan ?></textarea>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Satuan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tsatuan" value="<?= $vsatuan ?>">
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Kategori Satuan</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="tkategori">
  <option selected value="<?= $vkategori_satuan ?>"><?= $vkategori_satuan ?></option>
  <option value="Jumlah">Jumlah</option>
  <option value="Persentase">Persentase</option>
  <option value="Rupiah">Rupiah</option>
</select>
</div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Formula</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tformula"><?= $vformula ?></textarea>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Sumber Target</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tsumber" value="<?= $vsumber_target ?>">
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Tipe KPI</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="ttipe">
  <option selected value="<?= $vtipe_kpi ?>"><?= $vtipe_kpi ?></option>
  <option value="EXACT">EXACT</option>
  <option value="PROXY">PROXY</option>
  <option value="ACTIVITY">ACTIVITY</option>
</select>
</div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Tipe Target</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="ttarget">
  <option selected value="<?= $vtipe_target ?>"><?= $vtipe_target ?></option>
  <option value="Akumulatif">Akumulatif</option>
  <option value="Non Akumulatif">Non Akumulatif</option>
</select>
</div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Frekuensi</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="tfrekuensi">
  <option selected value="<?= $vfrekuensi ?>"><?= $vfrekuensi ?></option>
  <option value="Bulanan">Bulanan</option>
  <option value="Triwulan">Triwulan</option>
  <option value="Semesteran">Semesteran</option>
</select>
</div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Polaritas</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="tpolaritas">
  <option selected value="<?= $vpolaritas ?>"><?= $vpolaritas ?></option>
  <option value="POSITIF">POSITIF</option>
  <option value="NEGATIF">NEGATIF</option>
  <option value="RANGE">RANGE</option>
</select>
</div>
  </div>

  <div class="row mb-3">
      <label for="" class="col-sm-2 col-form-label">Jabatan Pemilik KPI</label>
      <div class="col-md-10">
          <input type="text" name="tdivisi" id="divisi" class="form-control" value="<?= $vdivisi ?>">
      </div>
  <br>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Pemilik KPI</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tpemilik" value="<?= $vpemilik ?>">
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Eviden</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="teviden"><?= $veviden ?></textarea>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Syarat & Ketentuan</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tsyarat"><?= $vsyarat_ketentuan ?></textarea>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">KPI Parent</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tparent"><?= $vkpi_parent ?></textarea>
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
      </div>
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
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
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
<script>
var auto_complete = new Autocomplete(document.getElementById('divisi'), {
    data:<?php echo json_encode($data); ?>,
    maximumItems:10,
    highlightTyped:true,
    highlightClass : 'fw-bold text-primary'
});

var auto_pemilik = new Autocomplete(document.getElementById('pemilik'), {
    data:<?php echo json_encode($data); ?>,
    maximumItems:10,
    highlightTyped:true,
    highlightClass : 'fw-bold text-primary'
});

</script>
<script src="../library/autocomplete.js"></script>
<script src="../ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace('tdefinisi');
  CKEDITOR.replace('ttujuan');
  CKEDITOR.replace('tformula');
  CKEDITOR.replace('teviden');
  CKEDITOR.replace('tsyarat');
  CKEDITOR.replace('tparent');
</script>

<script type="text/javascript">
$(function() {
    $('#your_textarea').ckeditor({
        toolbar: 'Full',
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
    });
});
CKEDITOR.config.autoParagraph = false;
</script>
</body>
</html>
