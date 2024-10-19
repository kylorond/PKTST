<?php

include('../config/koneksi.php');
require '../vendor/autoload.php';

// // // reference the Dompdf namespace
use Dompdf\Dompdf;

// // // instantiate and use the dompdf class
$dompdf = new Dompdf();


$html = '<style>
table, th, td {
    padding: 5px;
    vertical-align: top;
}

.judul {
    margin-bottom: 0px;
    font-size:16px;
    font-weight: bold;
}
</style>

<title>Cetak Detail Pendaftar</title>

<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div style="margin-left: 20px; text-align: center;">
        <div style="font-size: 26px;">Data Pendaftar Kepemilikan Tanah Sistematis Terpadu</div>
        <div style="font-size:30px">Desa Tumbang Jalemu</div>
        <div style="font-size: 22px">Tahun ' . date("Y") . '</div>
    </div>
</div>


<hr style="border: 0.5px solid black; margin: 10px 5px 10px 5px;">';

$id_pendaftar = $_GET['id'];

$sql_warga = "SELECT * FROM warga where id = '$id_pendaftar'";
$result_warga = mysqli_query($koneksi, $sql_warga);
$data_warga = mysqli_fetch_array($result_warga);

// cek hasil
if (!$result_warga) {
    die('Query Error : ' . mysqli_error($koneksi));
}

$sql_verifikasi = "SELECT * FROM verifikasi where warga_id = '$id_pendaftar'";
$result_verifikasi = mysqli_query($koneksi, $sql_verifikasi);
$data_verifikasi = mysqli_fetch_array($result_verifikasi);

// cek hasil
if (!$result_verifikasi) {
    die('Query Error : ' . mysqli_error($koneksi));
}


// if ($data_verifikasi['sertifikat'] != '') {
//     $sertifikat = '../uploads/sertifikat/' . $data_verifikasi['sertifikat'];
// } else {
//     $sertifikat = '';
// }

// if ($data_warga['foto'] != '') {
//     $gambar = '../uploads/' . $data_warga['foto'];
// } else {
//     $gambar = '../assets/img/avatar.jpg';
// }

// $telepon_length = strlen($data_warga['telepon']);
// $start_replace = 12;
// $replacer_length = $telepon_length - $start_replace;
// $replacer = "";
// for ($i = 0; $i < $replacer_length; $i++) {
//     $replacer .= "x";
// }

// $tgl_lhr = date_format(date_create($data_warga['tanggal_lahir']), "d-m-Y");

$html .= '
<h3 class="judul">A. DETAIL PENDAFTAR</h3>
<table width="100%">
    <tr>
        <td width="29%">Nama</td>
        <td width="1%">:</td>
        <td width="60%">' . $data_warga['nama'] . '</td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>' . $data_warga['jenis_kelamin'] . '</td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td>' . $data_warga['pekerjaan'] . '</td>
    </tr>
    <tr>
        <td>Nomor KTP</td>
        <td>:</td>
        <td>' . $data_warga['no_ktp'] . '</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>' . $data_warga['alamat'] . '</td>
    </tr>
</table>

<h3 class="judul">B. DATA KEPEMILIKAN TANAH</h3>

<table width="100%">
    <tr>
        <td width="29%">Nama Desa</td>
        <td width="1%">:</td>
        <td width="60%">' . $data_verifikasi['nama_desa'] . '</td>
    </tr>
    <tr>
        <td>Nama Pemilik</td>
        <td>:</td>
        <td>' . $data_verifikasi['nama_pemilik'] . '</td>
    </tr>
    <tr>
        <td>Tanggal Registrasi</td>
        <td>:</td>
        <td>' . $data_verifikasi['tanggal_regis'] . '</td>
    </tr>
    <tr>
        <td>Alamat Tanah</td>
        <td>:</td>
        <td>' . $data_verifikasi['alamat_tanah'] . '</td>
    </tr>
    <tr>
        <td>Panjang Tanah (m)</td>
        <td>:</td>
        <td>' . $data_verifikasi['panjang'] . '</td>
    </tr>
    <tr>
        <td>Lebar Tanah (m)</td>
        <td>:</td>
        <td>' . $data_verifikasi['lebar'] . '</td>
    </tr>
    <tr>
        <td>Luas Tanah (m²)</td>
        <td>:</td>
        <td>' . $data_verifikasi['luas'] . '</td>
    </tr>
    <tr>
        <td>HASIL</td>
        <td>:</td>
        <td><b>' . $data_verifikasi['status'] . '</b></td>
    </tr>
</table>
<br><br>
';

$dompdf->loadHtml($html);

// // // (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'potrait');

// // // Render the HTML as PDF
$dompdf->render();

// // // Output the generated PDF to Browser
$dompdf->stream("data pendaftar.pdf", array("Attachment" => 0));
