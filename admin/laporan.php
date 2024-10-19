<?php include('../config/auto_load.php'); ?>

<?php include('laporan_control.php'); ?>


<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Laporan Pendaftaran Kepemilikan Tanah</h1>

  <a href="<?= $base_url ?>/cetak/data_pendaftar.php" class="btn btn-warning btn-sm mb-3" id="cetak_pendaftar" target="_blank">Cetak Data Pendaftar PDF</a>
  <a href="<?= $base_url ?>/cetak/data_excel.php" class="btn btn-success btn-sm mb-3" id="export_pendaftar" target="_blank">Cetak Data Pendaftar EXCEL</a>

  <div class="row" id="overflow-x">
    <div class="col-md-12">
      <table class="table table-bordered table-hover" id="data-tabel">
        <thead>
          <tr>
            <td>No</td>
            <td>Nama Pemilik</td>
            <td>Alamat Tanah</td>
            <td>Panjang</td>
            <td>Lebar</td>
            <td>Luas</td>
            <td>Status</td>
            <td>Actions</td>
          </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        while ($p = mysqli_fetch_array($all_warga)) { ?>

          <tr>
            <td><?= $no++ ?></td>
            <td><?= $p['nama_pemilik'] ?></td>
            <td><?= $p['alamat_tanah'] ?></td>
            <td><?= $p['panjang'] ?></td>
            <td><?= $p['lebar'] ?></td>
            <td><?= $p['luas'] ?></td>
            <?php

            if ($p['status'] == 'Pengajuan Baru') {
                $status = '<span class="badge badge-info">PENGAJUAN BARU</span>';
              } else if ($p['status'] == 'Lolos Verifikasi') {
                $status = '<span class="badge badge-success">LOLOS VERIFIKASI DATA</span>';
              } else if ($p['status'] == 'Tidak Lolos Verifikasi') {
                $status = '<span class="badge badge-danger">TIDAK LOLOS VERIFIKASI DATA</span>';
              }

            ?>
            <td><?= $status ?></td>
            <td>
              <a href="<?= $base_url ?>/cetak/detail_cetak.php?id=<?= $p['id'] ?>" class="btn btn-warning btn-sm" target="_blank">Cetak</a>
            </td>
          </tr>

        <?php }


        if (mysqli_num_rows($all_warga) == 0) {
          echo "<tr><td colspan='8' align='center'><b>Belum Ada pendaftar baru</b></td></tr>";
        }

        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>