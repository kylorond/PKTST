<?php include('../config/auto_load.php'); ?>

<?php include('dashboard_control.php'); ?>

<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
  <div class="row">
    <div class="col-md-12">
      <?php if (isset($_SESSION['pesan_sukses'])) { ?>

        <div class="alert alert-success">
          <?= $_SESSION['pesan_sukses'] ?>
        </div>

      <?php }
      unset($_SESSION['pesan_sukses']);

      ?>
    </div>

    <?php if (isset($status) && $status == 'Pengajuan Baru') { ?>
      <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengumuman Hasil Verifikasi Data Kepemilikan Tanah</h6>
          </div>
          <div class="card-body">
            <div class="card text-center">
              <div class="card-body">
                <h5 class="card-title mb-3">Verifikasi Data</h5>
                <div class="col-auto">
                  <i class="fas fa-spinner text-warning mb-3" style="font-size: 90px;"></i>
                </div>
                <p class="card-text">Terima kasih telah melakukan pendaftaran data kepemilikan tanah pada Sistem Informasi Pendaftaran Kepemilikan Tanah Sistematis Terpadu Desa Tumbang Jalemu </p>
                <?php
                function tanggal_indonesia($tanggal) {
                    // Daftar nama bulan dalam bahasa Indonesia
                    $bulan = array(
                        1 => 'Januari',
                        2 => 'Februari',
                        3 => 'Maret',
                        4 => 'April',
                        5 => 'Mei',
                        6 => 'Juni',
                        7 => 'Juli',
                        8 => 'Agustus',
                        9 => 'September',
                        10 => 'Oktober',
                        11 => 'November',
                        12 => 'Desember'
                    );

                    // Mengubah tanggal menjadi format tanggal PHP
                    $tanggal_terformat = date_create($tanggal);

                    // Mendapatkan bagian tanggal dan bulan
                    $tanggal_hari = date_format($tanggal_terformat, 'd');
                    $tanggal_bulan = $bulan[(int)date_format($tanggal_terformat, 'm')];
                    $tanggal_tahun = date_format($tanggal_terformat, 'Y');

                    // Mengembalikan tanggal dalam format d F Y
                    return $tanggal_hari . ' ' . $tanggal_bulan . ' ' . $tanggal_tahun;
                }
                ?>

                <span class="badge badge-danger" style="font-size: 20px;">
                    <?= tanggal_indonesia($data_verifikasi['tanggal_submit']) ?>
                </span>
              </div>
              <div class="card-footer text-muted">
                <marquee style="margin-bottom: -5px;">Sistem Informasi Pendaftaran Kepemilikan Terpadu Sistematis Desa Tumbang Jalemu</marquee>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php } elseif (isset($status) && $status == 'Lolos Verifikasi') { ?>
      <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengumuman Hasil Verifikasi Data Kepemilikan Tanah</h6>
          </div>
          <div class="card-body">
            <div class="card text-center">
              <div class="card-body">
                <h5 class="card-title mb-3">Data Anda Telah Lolos Verifikasi</h5>
                <div class="col-auto">
                  <i class="far fa-check-circle text-success mb-3" style="font-size: 90px;"></i>
                </div>
                <p class="card-text">Selamat data kepemilikan tanah anda telah lolos verifikasi</p>
                <?php
                function tanggal_indonesia($tanggal) {
                    // Daftar nama bulan dalam bahasa Indonesia
                    $bulan = array(
                        1 => 'Januari',
                        2 => 'Februari',
                        3 => 'Maret',
                        4 => 'April',
                        5 => 'Mei',
                        6 => 'Juni',
                        7 => 'Juli',
                        8 => 'Agustus',
                        9 => 'September',
                        10 => 'Oktober',
                        11 => 'November',
                        12 => 'Desember'
                    );

                    // Mengubah tanggal menjadi format tanggal PHP
                    $tanggal_terformat = date_create($tanggal);

                    // Mendapatkan bagian tanggal dan bulan
                    $tanggal_hari = date_format($tanggal_terformat, 'd');
                    $tanggal_bulan = $bulan[(int)date_format($tanggal_terformat, 'm')];
                    $tanggal_tahun = date_format($tanggal_terformat, 'Y');

                    // Mengembalikan tanggal dalam format d F Y
                    return $tanggal_hari . ' ' . $tanggal_bulan . ' ' . $tanggal_tahun;
                }
                ?>

                <span class="badge badge-danger" style="font-size: 20px;">
                    <?= tanggal_indonesia($data_verifikasi['tanggal_verifikasi']) ?>
                </span>

              </div>
              <div class="card-footer text-muted">
                <marquee style="margin-bottom: -5px;">Sistem Informasi Pendattaran Kepemilikan Tanah Terpadu Sistematis Desa Tumbang Jalemu</marquee>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php } elseif (isset($status) && $status == 'Tidak Lolos Verifikasi') { ?>
      <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengumuman Hasil Verifikasi Data Kepemilikan Tanah</h6>
          </div>
          <div class="card-body">
            <div class="card text-center">
              <div class="card-body">
                <h5 class="card-title mb-3">ANDA TIDAK LOLOS</h5>
                <div class="col-auto">
                  <i class="fa fa-times text-danger mb-3" style="font-size: 90px;"></i>
                </div>
                <p class="card-text">Anda Belum lolos verifikasi data. Terima kasih telah mengikuti pendataan dengan baik. </p>
              </div>
              <div class="card-footer text-muted">
                <marquee style="margin-bottom: -5px;">PKTST</marquee>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php } else { ?>
      <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="card-body color-black">
            <div>
              <p>Selamat datang di Sistem Informasi Pendaftaran Kepemilikan Tanah Sistematis Terpadu Desa Tumbang Jalemu.</p>
              <p>Website ini merupakan aplikasi untuk mendaftarkan kepemilikan tanah yang ada pada desa Tumbang Jalemu.</p>
            </div>

            <div style="margin-top: 4rem;">
              <p>Panduan Pendaftaran</p>
              <!-- dari bootstrap -->
              <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  1. Pada bagian menu, klik 'Pendaftaran Tanah'.
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  2. Isi seluruh formulir yang ditampilkan kemudian periksa kembali, pastikan tidak ada data yang salah.
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  3. Klik simpan dan data masih bisa di edit.
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  4. Jika pengisian data sudah benar, klik tombol kirim untuk segera diverifikasi oleh admin
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>