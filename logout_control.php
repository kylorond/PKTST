<?php
session_start();

session_destroy();

include('config/koneksi.php');
// header('location:login.php');
arahkan_ulang('login.php');
?>