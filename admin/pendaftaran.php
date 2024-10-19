<?php include('../config/auto_load.php'); ?>

<?php include('pendaftaran_control.php'); ?>


<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Data Pendaftar</h1>

  <div class="row" id="overflow-x">
    <div class="col-12">
      <?php if (isset($_SESSION['pesan_sukses'])) { ?>
        <div class="alert alert-info"><?= $_SESSION['pesan_sukses'] ?></div>
      <?php }

      unset($_SESSION['pesan_sukses']);
      ?>
    </div>
    <div class="col-md-12">
      <table id="data-tabel" class="table table-bordered table-hover" style="width:100%">
        <thead>
          <tr>
            <th align="center">No</th>
            <th align="center">Nama Pemilik</th>
            <td align="center">Alamat Tanah</td>
            <td align="center">Panjang</td>
            <td align="center">Lebar</td>
            <td align="center">Luas</td>
            <th align="center">Status</th>
            <th align="center" style="width: 15%;">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          while ($p = mysqli_fetch_array($all_warga)) { ?>

            <tr>
              <td align="center"><?= $no++ ?></td>
              <td align="center"><?= $p['nama_pemilik'] ?></td>
              <td align="center"><?= $p['alamat_tanah'] ?></td>
              <td align="center"><?= $p['panjang'] ?></td>
              <td align="center"><?= $p['lebar'] ?></td>
              <td align="center"><?= $p['luas'] ?></td>
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
                <a href="detailpendaftar.php?id=<?= $p['id'] ?>" class="btn btn-primary btn-sm mb-1">Cek</a>
                <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#modalHapus_<?= $p['id'] ?>">Hapus</a>
              </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="modalHapus_<?= $p['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Anda akan menghapus data pendaftar atas nama "<?= $p['nama'] ?>". <br>

                      <b> DATA AKAN DIHAPUS PERMANEN.<b>
                    </p>
                  </div>
                  <div class="modal-footer">
                    <a href="<?= $base_url ?>/admin/pendaftaran.php?action=hapus&id=<?= $p['id'] ?>" class="btn btn-danger">Hapus</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>

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