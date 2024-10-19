<?php include('../config/auto_load.php'); ?>

<?php include('pendaftaran_control.php'); ?>

<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <?php if(!isset($status)){ ?>
    <div class="row">
      <div class="col-md-12 mb-3">
        <div class="row align-items-center">
          <div class="col-md-12">
            <h6 class="mb-3 fs-custom color-black">DATA DIRI</h6>
            <small class="color-black">*Data yang telah diinput tidak dapat diubah kembali, harap isi dengan teliti dan benar</small>
          </div>
        </div>
          <div>
            <form class="user" method="POST" action="<?= $base_url ?>/user/pendaftaran.php" enctype="multipart/form-data">
              <div class="form-group">
                <label class="color-black" for="nama">Nama</label>
                <input name="nama" type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap Anda" required>
              </div>
              <div class="form-group">
              <label class="color-black">Jenis Kelamin</label>
              <?php
              $laki = "";
              $perempuan = "";
              if ($data_warga['jenis_kelamin'] == "Laki-laki") {
                $laki = "checked";
              } elseif ($data_warga['jenis_kelamin'] == "Perempuan") {
                $perempuan = "checked";
              }
              ?>
              <div class="row mt-3">
                <div class="col">
                  <div class="form-check">
                    <input name="jenis_kelamin" class="form-check-input" type="radio" id="lk" value="Laki-laki" <?= $laki ?>>
                    <label class="color-black form-check-label" for="lk">
                      Laki Laki
                    </label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-check">
                    <input name="jenis_kelamin" class="form-check-input" type="radio" id="pr" value="Perempuan" <?= $perempuan ?>>
                    <label class="color-black form-check-label" for="pr">
                      Perempuan
                    </label>
                  </div>
                </div>
              </div>
            </div>
              <div class="form-group">
                <label class="color-black" for="tempat_lahir">Pekerjaan</label>
                <input name="pekerjaan" type="text" class="form-control" id="pekerjaan" placeholder="Masukkan Pekerjaan" required>
              </div>
              <div class="form-group">
                <label class="color-black" for="tempat_lahir">Nomor KTP</label>
                <input name="no_ktp" type="text" class="form-control" id="no_ktp" placeholder="Masukkan Nomor KTP" required>
              </div>
              <div class="form-group">
                <label class="color-black" for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat" required></textarea>
              </div>
          </div>
      </div>

      <div class="col-md-12">
        <div class="row align-items-center">
          <div class="col-md-12">
            <h6 class="my-3 fs-custom color-black">DATA KEPEMILIKAN TANAH</h6>
            <small class="color-black">* Data yang telah diinput tidak dapat diubah kembali, harap isi dengan teliti dan benar</small>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
            <label class="color-black" for="nama_desa">Nama Desa</label>
            <input name="nama_desa" type="text" class="form-control" id="nama_desa" placeholder="Masukkan Nama Desa" required>
          </div>
            <div class="form-group">
            <label class="color-black" for="tanggal_regis">Tanggal Registrasi</label>
            <input name="tanggal_regis" type="date" class="form-control" id="tanggal_regis" required>
          </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
            <label class="color-black" for="nama_pemilik">Nama Pemilik SPT</label>
            <input name="nama_pemilik" type="text" class="form-control" id="nama_pemilik" placeholder="Masukkan Nama Pemilik SPT" required>
            </div>
            <div class="form-group">
            <label class="color-black" for="alamat_tanah">Alamat Tanah</label>
            <textarea name="alamat_tanah" id="alamat_tanah" class="form-control" placeholder="Masukkan Alamat Tanah" required></textarea>
            </div>
              <div class="row">
                <div class="col-md-4">
                <div class="form-group">
              <label class="color-black" for="panjang">Panjang Tanah</label>
              <input name="panjang" type="text" class="form-control" id="panjang" placeholder="Panjang (m)" required>
            </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                <label class="color-black" for="lebar">Lebar Tanah</label>
              <input name="lebar" type="text" class="form-control" id="lebar" placeholder="Lebar (m)" required>
            </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                <label class="color-black" for="us">Luas Tanah</label>
              <input name="luas" type="text" class="form-control" id="luas" placeholder="Luas (m²)" required>
            </div>
                </div>
              </div>
            <div class="form-group">
            <label class="color-black" for="ss">Upload Sertifikat Tanah</label>
            <input name="sertifikat" type="file" class="form-control-file" id="ss" required>
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-md-6">
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-end">
          <div class="mt-5">
            <button type="submit" name="btn_simpan" value="simpan_verifikasi" class="btn btn-primary" id="btn_simpan">Simpan</button>
          </div>
        </div>
      </div>
      </div>
    </div>
  <?php } elseif ($status == 'Pendaftar Baru') { ?>
    <div class="row">
      <div class="col-md-12">
        <?php
        if (isset($_SESSION['pesan_sukses'])) { ?>
          <div class="alert alert-success">
            <?= $_SESSION['pesan_sukses'] ?>
          </div>

        <?php }
        unset($_SESSION['pesan_sukses']);
        ?>
      </div>
      <div class="col-md-6">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DATA DIRI</h6>
          </div>
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Nama Lengkap </h6>
                <small class="text-muted" class="ucfirst"><?= $data_warga['nama'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Jenis Kelamin</h6>
                <small class="text-muted"><?= $data_warga['jenis_kelamin'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Pekerjaan</h6>
                <small class="text-muted"><?= $data_warga['pekerjaan'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Nomor KTP</h6>
                <small class="text-muted"><?= $data_warga['no_ktp'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Alamat</h6>
                <small class="text-muted"><?= $data_warga['alamat'] ?></small>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DATA KEPEMILIKAN TANAH</h6>
          </div>
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Nama Desa</h6>
                <small class="text-muted"><?= $data_verifikasi['nama_desa'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Nama Pemilik SPT</h6>
                <small class="text-muted"><?= $data_verifikasi['nama_pemilik'] ?></small>
              </li>
              <li class="list-group-item">
              <h6 class="mb-0" style="color: black;">Tanggal Registrasi</h6>
              <small class="text-muted">
                <?php
                  $tanggal = $data_verifikasi['tanggal_regis']; 
                  $hari = date('l', strtotime($tanggal));
                  $hari_indo = array(
                    'Sunday' => 'Minggu',
                    'Monday' => 'Senin',
                    'Tuesday' => 'Selasa',
                    'Wednesday' => 'Rabu',
                    'Thursday' => 'Kamis',
                    'Friday' => 'Jumat',
                    'Saturday' => 'Sabtu'
                  );
                  $hari_dalam_bahasa_indo = $hari_indo[$hari];
                  $bulan = date('F', strtotime($tanggal));
                  $bulan_indo = array(
                    'January' => 'Januari',
                    'February' => 'Februari',
                    'March' => 'Maret',
                    'April' => 'April',
                    'May' => 'Mei',
                    'June' => 'Juni',
                    'July' => 'Juli',
                    'August' => 'Agustus',
                    'September' => 'September',
                    'October' => 'Oktober',
                    'November' => 'November',
                    'December' => 'Desember'
                  );
                  $bulan_dalam_bahasa_indo = $bulan_indo[$bulan];

                  echo $hari_dalam_bahasa_indo . ", " . date('d', strtotime($tanggal)) . " " . $bulan_dalam_bahasa_indo . " " . date('Y', strtotime($tanggal));
                ?>
              </small>
            </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Alamat Tanah</h6>
                <small class="text-muted"><?= $data_verifikasi['alamat_tanah'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Panjang (m)</h6>
                <small class="text-muted"><?= $data_verifikasi['panjang'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Lebar (m)</h6>
                <small class="text-muted"><?= $data_verifikasi['lebar'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Luas (m²)</h6>
                <small class="text-muted"><?= $data_verifikasi['luas'] ?></small>
              </li>
              <li class="list-group-item">
                <small class="mb-0" style="color: black;">Scan Sertifikat Tanah (JPG/PNG) maks 1Mb</small><br>
                <?php if (isset($data_verifikasi['sertifikat']) && $data_verifikasi['sertifikat'] != "") { ?>
                  <img src="../uploads/sertifikat/<?= $data_verifikasi['sertifikat'] ?>" class="img-fluid mt-2" alt="menunggu" style="width: 50%;">
                <?php } else { ?>
                  <small class="text-muted">Belum ada</small>
                <?php } ?>
              </li>
              <!-- <li class="list-group-item">
              <small class="mb-0" style="color: black;">Pas Foto 4x6 (JPG/PNG) (Menggunakan Pakaian PDH PPI/Kemeja Putih) maks 1Mb</small><br>
              <?php
              if (isset($data_warga['foto']) && $data_warga['foto'] != '') {
                $foto = '../uploads/' . $data_warga['foto'];
              } else {
                $foto = '../assets/img/avatar.jpg';
              }
              ?>
              <img src="<?= $foto ?>" class="img-fluid mt-2" alt="menunggu" style="width: 25%;">
            </li> -->
            </ul>
          </div>
        </div>
        <div class="row justify-content-end">
          <div class="col-md-6">
            <div class="text-right mt-5">
              <a href="pendaftaran_edit.php" class="btn btn-primary px-4">Edit</a>
              <form class="d-inline-block" action="pendaftaran.php" method="POST">
                <button type="submit" name="btn_kirim" value="kirim_verifikasi" class="btn btn-danger px-4">Kirim</button>
              </form>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  <?php } else { ?>
    <div class="row">
      <div class="col-md-6">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DATA DIRI</h6>
          </div>
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Nama Lengkap </h6>
                <small class="text-muted" class="ucfirst"><?= $data_warga['nama'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Jenis Kalamin</h6>
                <small class="text-muted"><?= $data_warga['jenis_kelamin'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Pekerjaan</h6>
                <small class="text-muted"><?= $data_warga['pekerjaan'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Nomor KTP</h6>
                <small class="text-muted"><?= $data_warga['no_ktp'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Alamat</h6>
                <small class="text-muted"><?= $data_warga['alamat'] ?></small>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DATA KEPEMILIKAN TANAH</h6>
          </div>
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Nama Desa</h6>
                <small class="text-muted"><?= $data_verifikasi['nama_desa'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Nama Pemilik</h6>
                <small class="text-muted"><?= $data_verifikasi['nama_pemilik'] ?></small>
              </li>
              <li class="list-group-item">
              <h6 class="mb-0" style="color: black;">Tanggal Registrasi</h6>
              <small class="text-muted">
                <?php
                  $tanggal = $data_verifikasi['tanggal_regis']; 
                  $hari = date('l', strtotime($tanggal));
                  $hari_indo = array(
                    'Sunday' => 'Minggu',
                    'Monday' => 'Senin',
                    'Tuesday' => 'Selasa',
                    'Wednesday' => 'Rabu',
                    'Thursday' => 'Kamis',
                    'Friday' => 'Jumat',
                    'Saturday' => 'Sabtu'
                  );
                  $hari_dalam_bahasa_indo = $hari_indo[$hari];
                  $bulan = date('F', strtotime($tanggal));
                  $bulan_indo = array(
                    'January' => 'Januari',
                    'February' => 'Februari',
                    'March' => 'Maret',
                    'April' => 'April',
                    'May' => 'Mei',
                    'June' => 'Juni',
                    'July' => 'Juli',
                    'August' => 'Agustus',
                    'September' => 'September',
                    'October' => 'Oktober',
                    'November' => 'November',
                    'December' => 'Desember'
                  );
                  $bulan_dalam_bahasa_indo = $bulan_indo[$bulan];

                  echo $hari_dalam_bahasa_indo . ", " . date('d', strtotime($tanggal)) . " " . $bulan_dalam_bahasa_indo . " " . date('Y', strtotime($tanggal));
                ?>
              </small>
            </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Alamat Tanah</h6>
                <small class="text-muted"><?= $data_verifikasi['alamat_tanah'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Panjang Tanah (m)</h6>
                <small class="text-muted"><?= $data_verifikasi['panjang'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Lebar Tanah (m)</h6>
                <small class="text-muted"><?= $data_verifikasi['lebar'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Luas Tanah (m²)</h6>
                <small class="text-muted"><?= $data_verifikasi['luas'] ?></small>
              </li>
              <li class="list-group-item">
                <small class="mb-0" style="color: black;">Scan Sertifikat Tanah (JPG/PNG) </small><br>
                <?php if (isset($data_verifikasi['sertifikat']) && $data_verifikasi['sertifikat'] != "") { ?>
                  <img src="../uploads/sertifikat/<?= $data_verifikasi['sertifikat'] ?>" class="img-fluid mt-2" alt="menunggu" style="width: 50%;">
                <?php } else { ?>
                  <small class="text-muted">Belum ada</small>
                <?php } ?>
              </li>
              <!-- <li class="list-group-item">
              <small class="mb-0" style="color: black;">Pas Foto 4x6 (JPG/PNG) (Menggunakan Pakaian PDH PPI/Kemeja Putih) maks 1Mb</small><br>
              <?php
              if (isset($data_warga['foto']) && $data_warga['foto'] != '') {
                $foto = '../uploads/' . $data_warga['foto'];
              } else {
                $foto = '../assets/img/avatar.jpg';
              }
              ?>
              <img src="<?= $foto ?>" class="img-fluid mt-2" alt="menunggu" style="width: 25%;">
            </li> -->
            </ul>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>