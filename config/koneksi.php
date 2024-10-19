<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "pktst";

$koneksi = mysqli_connect($host, $username, $password, $database);

if($koneksi->connect_error){
    echo "Koneksi database gagal: ". mysqli_connect_error();
    die;
} else {
    // echo "Koneksi database berhasil";

    function arahkan_ulang($tujuan){
        echo "<script>window.location.replace('$tujuan')</script>";
    }

    function hitung_umur($tanggal_lahir){
        $tanggal_lahir = new DateTime($tanggal_lahir);
        $hari_ini = new DateTime("today");
        if ($tanggal_lahir > $hari_ini) { 
            return 0;
        }
        $umur = $hari_ini->diff($tanggal_lahir)->y;
        return $umur;
    }

    function kirim_email($penerima, $pass_backup){
        $tujuan = $penerima;
        $dari = "email anda";
        $subjek = "Lupa Password";
        $pesan = "Anda telah menggunakan fitur Lupa Password" . "\r\n";
        $pesan .= "Password anda: ". $pass_backup . "\r\n";
        $pesan .= "Jika ini bukan anda, silakan diabaikan. Terimakasih. " . "\r\n";
        $headers = "From: " . $dari;

        if(mail($tujuan, $subjek, $pesan, $headers)){
            $berhasil = array("sukses"=>"Password telah dikirim ke email Anda");
        }else{
            $berhasil = array("gagal"=>"Gagal mengirim email");
        }
        return $berhasil;
    }
}
