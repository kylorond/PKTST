<?php

include('../config/koneksi.php');
require '../vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// Fungsi untuk menampilkan tanggal dalam format bahasa Indonesia
function tanggal_indo($tanggal)
{
    $hari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
    $bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    
    $tanggal_hari = $hari[date('w', strtotime($tanggal))];
    $tanggal_tanggal = date('j', strtotime($tanggal));
    $tanggal_bulan = $bulan[date('n', strtotime($tanggal)) - 1];
    $tanggal_tahun = date('Y', strtotime($tanggal));

    return $tanggal_hari . ', ' . $tanggal_tanggal . ' ' . $tanggal_bulan . ' ' . $tanggal_tahun;
}

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$html = '<style>
table, th, td {
    font-size: 12px;
    border: 1px solid black;
    border-collapse: collapse;
    padding: 5px;
}
</style>

<title>Cetak Data Pendaftar</title>


<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div style="margin-left: 20px; text-align: center;">
        <div style="font-size: 26px;">Data Pendaftar Kepemilikan Tanah Sistematis Terpadu</div>
        <div style="font-size:30px">Desa Tumbang Jalemu</div>
        <div style="font-size: 22px">Tahun ' . date("Y") . '</div>
    </div>
</div>

<hr style="border: 0.5px solid black; margin: 10px 5px 10px 5px;">';

// Menggunakan fungsi tanggal_indo untuk menampilkan tanggal cetak
$html .= '<div style="font-size: 12px; margin-left: 10px;">&nbsp; Tanggal Cetak: ' . tanggal_indo(date("Y-m-d")) . '</div>';

$html .= '
<table width="100%"; margin-center>
<tr>
    <th width="5%">No</th>
    <th align="center">Nama Lengkap</th>
    <th align="center">Nama Desa</th>
    <th align="center">Alamat Tanah</th>
    <th align="center">Panjang Tanah (m)</th>
    <th align="center">Lebar Tanah (m)</th>
    <th align="center">Luas Tanah (m²)</th>
    <th>Status</th>
</tr>';

// tabel pendaftar
if(isset($_GET['filter'])){
    $filter = $_GET['filter'];
    $all_warga = mysqli_query($koneksi, "SELECT warga.*, verifikasi.* FROM warga JOIN verifikasi ON warga.id = verifikasi.warga_id WHERE (anggota.jenis_kelamin LIKE '%$filter%' or warga.nama LIKE '%$filter%' or verifikasi.nama_desa LIKE '%$filter%' or verifikasi.nama_pemilik LIKE '%$filter%') AND status<>'Pendaftar Baru' ORDER BY nama");
}else{
    $all_warga = mysqli_query($koneksi, "SELECT warga.*, verifikasi.* FROM warga JOIN verifikasi ON warga.id = verifikasi.warga_id WHERE status<>'Pendaftar Baru' ORDER BY nama");
}

$no = 1;
while ($p = mysqli_fetch_array($all_warga)) {
    $html .= '
        <tr>
            <td align="center">' . $no++ . '</td>
            <td align="center">' . ucwords(strtolower($p['nama'])) . '</td>
            <td align="center">' . $p['nama_desa'] . '</td>
            <td align="center">' . $p['alamat_tanah'] . '</td>
            <td align="center">' . $p['panjang'] . '</td>
            <td align="center">' . $p['lebar'] . '</td>
            <td align="center">' . $p['luas'] . '</td>
            <td align="center">' . $p['status'] . '</td>
        </tr>';
}

$html .= '
</table>
<br><br>
';

$dompdf->loadHtml($html);

// Set paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("data_pendaftar.pdf", array("Attachment" => 0));

?>
