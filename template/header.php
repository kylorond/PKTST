<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Aplikasi pendaftaran Siswa SMKN DARUL ULUM MUNCAR.">
  <meta name="author" content="STMIK">

  <title>Sistem Informasi Pendaftaran Kepemilikan</title>

  <!-- gambar title -->
  <link rel="icon" type="image/png" href="../assets/img/gunung.png">

  <!-- Custom fonts for this template-->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- css datepicker -->
  <link href="../assets/vendor/datepicker/css/bootstrap-datepicker.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/vendor/datatables/dataTables.bootstrap4.min.css">

  <style>
    .logo-login {
      max-height: 160px;
      margin-bottom: 20px;
    }
    .color-black{
      color: black !important;
    }
    .fs-custom{
      font-size: 2.5rem;
    }
    #overflow-x{
      overflow-x: scroll;
    }
  </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <nav class="sidebar-brand-icon">
          <img src="../assets/img/logogumas.png">
        </nav>
        <div class="sidebar-brand-text mx-3">PKTST</div>
      </a>

      <!-- Heading -->
      <div class="sidebar-heading">
        <?= $_SESSION['level'] ?>
      </div>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

      <?php if ($_SESSION['level'] == 'user') { ?>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <li class="nav-item">
          <a class="nav-link" href="pendaftaran.php">
            <i class="fas fa-fw fa-list"></i>
            <span>Pendaftaran Tanah</span></a>
        </li>
      <?php } ?>

      <!-- jika level admin -->
      <?php if ($_SESSION['level'] == 'admin') { ?>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <li class="nav-item">
          <a class="nav-link" href="pendaftaran.php">
            <i class="fas fa-fw fa-list"></i>
            <span>Data Pendaftar Tanah</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <li class="nav-item">
          <a class="nav-link" href="laporan.php">
            <i class="fas fa-fw fa-list"></i>
            <span>Laporan</span></a>
        </li>
      <?php } ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['nama']; ?></span>
                <?php
                if (isset($_SESSION['foto']) && $_SESSION['foto'] != '') {
                  $foto = '../uploads/' . $_SESSION['foto'];
                } else {
                  $foto = '../assets/img/avatar.jpg';
                }
                ?>
                <img class="img-profile rounded-circle" src="<?= $foto ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php if ($_SESSION['level'] == 'admin') { ?>
                  <a class="dropdown-item" href="<?= $base_url ?>/admin/editprofil.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Edit Profil
                  </a>
                <?php }else{ ?>
                  <a class="dropdown-item" href="<?= $base_url ?>/user/editprofil.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Edit Profil
                  </a>
                <?php } ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->