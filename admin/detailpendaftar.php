<?php include('../config/auto_load.php'); ?>
<?php include('detailpendaftar_control.php'); ?>
<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Detail Pendaftar Kepemilikan Tanah</h1>

  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DATA DIRI</h6>
        </div>
        <div class="card-body">
          <!-- <div class="card-body"> -->
          <ul class="list-group">
            <li class="list-group-item">
              <h6 class="mb-0" style="color: black;">Nama Lengkap </h6>
              <small class="text-muted"><?= $data_warga['nama'] ?></small>
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
          <!-- </div> -->
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DATA KEPEMILIKAN TANAH</h6>
        </div>
        <div class="card-body">
          <!-- <div class="card-body"> -->
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
            <li class="list-group-item">
              <small class="mb-0" style="color: black;">Pas Foto 4x6 (JPG/PNG) </small><br>
              <?php
              if (isset($data_warga['foto']) && $data_warga['foto'] != '') {
                $foto = '../uploads/' . $data_warga['foto'];
              } else {
                $foto = '../assets/img/avatar.jpg';
              }
              ?>
              <img src="<?= $foto ?>" class="img-fluid mt-2" alt="menunggu" style="width: 25%;">
            </li>
          </ul>

          <!-- Modal -->
          <div class="modal fade" id="modalvalidasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form action="<?= $base_url ?>/admin/detailpendaftar.php?id=<?= $id_warga ?>" method="POST">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifikasi data pendaftar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <label for="nilai">Beri Penilaian</label>
                    <select name="nilai" id="nilai" class="form-control" required>
                      <option value="">--Pilih --</option>
                      <option value="Lolos Verifikasi">Lolos</option>
                      <option value="Tidak Lolos Verifikasi">Tidak Lolos</option>
                    </select>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" name="simpan" value="simpan_nilai" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- </div> -->
        </div>
      </div>

      <!-- <a href="pendaftaran.php" class="btn btn-danger">Kembali</a> -->
    </div>

  </div>
  <div class="row justify-content-end text-center">
    <div class="col-md-4">
      <?php
      if ($data_verifikasi['status'] == 'Pengajuan Baru') {
        echo '
        <div class="alert alert-info">
            Data Belum diverifikasi
        </div>';
      } else if ($data_verifikasi['status'] == 'Lolos Verifikasi') {
        echo '
        <div class="alert alert-success">
            Data Dinyatakan <b>LOLOS</b>
        </div>';
      } else if ($data_verifikasi['status'] == 'Tidak Lolos Verifikasi') {
        echo '
        <div class="alert alert-danger">
            Data Dinyatakan <b>TIDAK LOLOS</b>
        </div>';
      }
      ?>
    </div>
    <?php if ($data_verifikasi['status'] == 'Pengajuan Baru') { ?>
      <div class="col-md-4">
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalvalidasi" style="padding: .75rem 1.25rem !important;">
          Verifikasi Data Pendaftar
        </button>
      </div>
    <?php } ?>
  </div>
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>