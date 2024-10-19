<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistem Informasi Pendataan Anggota PPI SE KALTENG">


  <title>Login PKTST</title>

  <!-- gambar title -->
  <link rel="icon" type="image/png" href="assets/img/gunung.png">

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

  <style>
    .logo-login {
      max-height: 160px;
      margin-bottom: 20px;
    }

    input,
    button {
      padding: 10px 20px !important;
      font-size: 1rem !important;
    }
  </style>

</head>

<body class="bg-gradient-primary">
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-md-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-md-12">
                <div class="p-5">
                  <div class="text-center">
                    <img src="assets/img/gunung.png" alt="Logo ppi" class="logo-login">

                    <h1 class="h4 text-gray-900">SISTEM INFORMASI PENDATAAN KEPEMILIKAN TANAH SISTEMATIS TERPADU</h1>
                    <h1 class="h4 text-gray-900 mb-4"><b>DESA TUMBANG JALEMU</b></h1>

                    <?php
                    session_start();

                    if (isset($_SESSION['pesan_registrasi'])) { ?>

                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['pesan_registrasi'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                    <?php }
                    unset($_SESSION['pesan_registrasi']);

                    if (isset($_SESSION['login_error'])) { ?>

                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $_SESSION['login_error'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <?php }
                    unset($_SESSION['login_error']);
                    ?>

                  </div>
                  <form class="user" action="login_control.php" method="POST">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" id="username" placeholder="Masukkan Email Anda" required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                    </div>
                    <button type="submit" name="btn_login" value="login" href="" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <div>
                      <a class="small" href="registrasi.php">Belum punya akun? Silahkan Daftar Akun!</a>
                    </div>
                    <div>
                      <a class="small" href="lupa_password.php">Lupa Password?</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>