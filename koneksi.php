<?php

//dev



$host = "localhost";	//nama host

$user = "root";	//username phpMyAdmin

$pass = "";	//password phpMyAdmin

$name = "minibank";	//nama database



//hosting


/*
$host = "sql306.epizy.com";	//nama host

$user = "epiz_20666992";	//username phpMyAdmin

$pass = "wngU8J7Tnl";	//password phpMyAdmin

$name = "epiz_20666992_app";	//nama database
*/

//$koneksi = mysql_connect($host, $user, $pass) or die("Koneksi ke database gagal!");

$koneksi2 = mysqli_connect($host, $user, $pass, $name) or die("Koneksi ke database gagal!");

mysqli_select_db($koneksi2,$name) or die("Tidak ada database yang dipilih!");

// Check connection
if ($koneksi2->connect_error) {
  die("Connection failed: " . $koneksi2->connect_error);
}
//echo "koneksi minibank sukses";


?>