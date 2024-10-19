<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistem Informasi Pendataan Anggota PPI SE KALTENG">
  <meta name="author" content="e-development.tech">

  <title>Daftar Akun Baru</title>

  <!-- gambar title -->
  <link rel="icon" type="image/png" href="assets/img/gunung.png">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- css datepicker -->
  <link href="assets/vendor/datepicker/css/bootstrap-datepicker.css" rel="stylesheet">

  <style>
    .logo-login {
      max-height: 160px;
      margin-bottom: 20px;
    }

    input {
      border-radius: 40px !important;
      padding: 10px 20px !important;
    }

    button {
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
                    <h1 class="h4 text-gray-900 mb-4">Daftar Akun Baru!</h1>
                  </div>
                  <form class="user" action="registrasi_control.php" method="POST">
                    <div class="form-group row">
                      <div class="col-md-12">
                        <input name="nama" type="text" class="form-control" placeholder="Nama Lengkap" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-12">
                        <input name="email" type="email" class="form-control" placeholder="Email" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6">
                        <input name="password" type="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="col-md-6">
                        <input name="ulangi_password" type="password" class="form-control" placeholder="Ulangi Password" required>
                      </div>
                    </div>

                    <button name="btn_registrasi" value="simpan" class="btn btn-primary btn-user btn-block">
                      Daftar
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="login.php">Sudah Punya Akun? Silahkan Login!</a>
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