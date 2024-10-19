<?php
include('../config/auto_load.php');
include('pendaftaran_edit_control.php');
include('../template/header.php');

$list_kab_kota = array("Kabupaten Barito Selatan","Kabupaten Barito Timur","Kabupaten Barito Utara","Kabupaten Gunung Mas","Kabupaten Kapuas","Kabupaten Katingan","Kabupaten Kotawaringin Barat","Kabupaten Kotawaringin Timur","Kabupaten Lamandau","Kabupaten Murung Raya","Kabupaten Pulang Pisau","Kabupaten Seruyan","Kabupaten Sukamara","Kota Palangka Raya");
?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="row">
  <div class="col-md-12 mb-3">
        <div class="row align-items-center">
          <div class="col-md-12">
            <h6 class="mb-3 fs-custom color-black">DATA DIRI</h6>
            <small class="color-black">*Data yang telah diinput tidak dapat diubah kembali, harap isi dengan teliti dan benar</small>
          </div>
        </div>
          <div>
            <form class="user" method="POST" action="<?= $base_url ?>/user/pendaftaran_edit.php" enctype="multipart/form-data">
              <div class="form-group">
                <label class="color-black" for="nama">Nama</label>
                <input name="nama" type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap Anda" value="<?= $data_warga['nama'] ?>" required>
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
                <input name="pekerjaan" type="text" class="form-control" id="pekerjaan" placeholder="Masukkan Pekerjaan" value="<?= $data_warga['pekerjaan'] ?>" required>
              </div>
              <div class="form-group">
                <label class="color-black" for="tempat_lahir">Nomor KTP</label>
                <input name="no_ktp" type="text" class="form-control" id="no_ktp" placeholder="Masukkan Nomor KTP" value="<?= $data_warga['no_ktp'] ?>" required>
              </div>
              <div class="form-group">
                <label class="color-black" for="alamat">Alamat</label>
                <input name="alamat" type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat Anda" value="<?= $data_warga['alamat'] ?>" required>
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
            <input name="nama_desa" type="text" class="form-control" id="nama_desa" placeholder="Masukkan Nama Desa" value="<?= $data_verifikasi['nama_desa'] ?>" required>
          </div>
            <div class="form-group">
            <label class="color-black" for="tanggal_regis">Tanggal Registrasi</label>
            <input name="tanggal_regis" type="date" class="form-control" id="tanggal_regis" value="<?= $data_verifikasi['tanggal_regis'] ?>" required>
          </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
            <label class="color-black" for="nama_pemilik">Nama Pemilik SPT</label>
            <input name="nama_pemilik" type="text" class="form-control" id="nama_pemilik" placeholder="Masukkan Nama Pemilik SPT" value="<?= $data_verifikasi['nama_pemilik'] ?>" required>
            </div>
            <div class="form-group">
            <label class="color-black" for="alamat_tanah">Alamat Tanah</label>
            <input name="alamat_tanah" type="text" class="form-control" id="alamat_tanah" placeholder="Alamat Tanah" value="<?= $data_verifikasi['alamat_tanah'] ?>" required>
            </div>
              <div class="row">
                <div class="col-md-4">
                <div class="form-group">
              <label class="color-black" for="panjang">Panjang Tanah</label>
              <input name="panjang" type="text" class="form-control" id="panjang" placeholder="Panjang (m)" value="<?= $data_verifikasi['panjang'] ?>" required>
            </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                <label class="color-black" for="lebar">Lebar Tanah</label>
              <input name="lebar" type="text" class="form-control" id="lebar" placeholder="Lebar (m)" value="<?= $data_verifikasi['lebar'] ?>" required>
            </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                <label class="color-black" for="us">Luas Tanah</label>
              <input name="luas" type="text" class="form-control" id="luas" placeholder="Luas (m²)" value="<?= $data_verifikasi['luas'] ?>" required>
            </div>
                </div>
              </div>
              <div class="form-group">
            <label class="color-black" for="ss">Scan sertifikat Tanah</label>
            <div>
            <?php if(isset($data_verifikasi['sertifikat']) && $data_verifikasi['sertifikat'] != ""){ ?>
            <img src="../uploads/sertifikat/<?= $data_verifikasi['sertifikat'] ?>" class="img-fluid mt-2" alt="menunggu" style="width: 50%;">
            <?php }else{ ?>
            <small class="text-muted">Belum ada</small>
            <?php } ?>
            </div>
            <input name="sertifikat" type="file" class="form-control-file mt-3" id="ss">
          </div>
          </div>
        </div>
      <div class="row">
        <div class="col-md-6">
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-end">
          <div class="mt-5">
            <a href="pendaftaran.php" class="btn btn-secondary">Kembali</a>
            <button type="submit" name="btn_simpan_edit" value="simpan_edit_verifikasi" class="btn btn-primary">Simpan</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>