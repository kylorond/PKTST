<?php include('../config/auto_load.php'); ?>

<?php include('editprofil_control.php'); ?>

<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">EDIT PROFIL</h1>
    <form class="user" method="POST" action="<?= $base_url ?>/user/editprofil.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="nama">Nama Lengkap</label>
                        <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Lengkap" value="<?= $data_user['nama'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="<?= $data_user['username'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                        <small id="emailHelp" class="form-text text-muted">Kosongkan jika tidak ingin mengganti password</small>
                    </div>
                </div>                
            </div>
            <div class="col-md-4">
                <label for="file">Ganti Foto Profil</label><br>
                <?php
                if(isset($data_user['foto']) && $data_user['foto'] != '') {
                    $foto = '../uploads/' . $data_user['foto'];
                } else {
                    $foto = '../assets/img/avatar.jpg';
                }
                ?>
                <img src="<?= $foto ?>" alt="Foto Profil" class="img-fluid" width="200" height="200">

                <input type="file" name="gambar" class="form-control-file mt-2">
            </div>
            <div class="col-md-12 d-flex justify-content-end mt-5">
                <button type="submit" name="btn_simpan" value="simpan_profil" class="btn btn-primary mb-5">Simpan</button>
            </div>
        </div>
    </form>
  
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>