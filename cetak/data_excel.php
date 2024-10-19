<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data pendaftaran.xls");

include('../config/koneksi.php');

// tabel pendaftar
if(isset($_GET['filter'])){
    $filter = $_GET['filter'];
    $all_pendaftar = mysqli_query($koneksi, "SELECT warga.*, verifikasi.* FROM warga JOIN verifikasi ON warga.id = verifikasi.warga_id WHERE (anggota.jenis_kelamin LIKE '%$filter%' or warga.nama LIKE '%$filter%' or verifikasi.nama_desa LIKE '%$filter%' or verifikasi.nama_pemilik LIKE '%$filter%') AND status<>'Pendaftar Baru' ORDER BY nama");
}else{
    $all_pendaftar = mysqli_query($koneksi, "SELECT warga.*, verifikasi.* FROM warga JOIN verifikasi ON warga.id = verifikasi.warga_id WHERE status<>'Pendaftar Baru' ORDER BY nama");
}

$html = '
<table width="100%" border="1">
<tr>
    <th width="5%">No</th>
    <th align="center">Nama</th>
    <th align="center">Jenis Kelamin</th>
    <th align="center">Pekerjaan</th>
    <th align="center">Nomor KTP</th>
    <th align="center">Alamat</th>
    <th align="center">Nama Desa</th>
    <th align="center">Alamat Tanah</th>
    <th align="center">Panjang Tanah (m)</th>
    <th align="center">Lebar Tanah (m)</th>
    <th align="center">Luas Tanah (m²)</th>
    <th width="10%">Status</th>
</tr>';

$no = 1;
while ($p = mysqli_fetch_array($all_pendaftar)) {
    $html .= '
        <tr>
            <td align="center">' . $no++ . '</td>
            <td align="left">' . $p['nama'] . '</td>
            <td align="center">' . $p['jenis_kelamin'] . '</td>
            <td align="center">' . $p['pekerjaan'] . '</td>
            <td align="center">' . $p['no_ktp'] . '</td>
            <td align="left">' . $p['alamat'] . '</td>
            <td align="center">' . $p['nama_desa'] . '</td>
            <td align="left">' . $p['alamat_tanah'] . '</td>
            <td align="center">' . $p['panjang'] . '</td>
            <td align="center">' . $p['lebar'] . '</td>
            <td align="center">' . $p['luas'] . ' </td>
            <td align="center">' . $p['status'] . '</td>
        </tr>';
}

$html .= '
</table>';

echo $html;
