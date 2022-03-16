<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title> Master Kode Transaksi</title>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

<link href="style_master_tabungan.css" rel="stylesheet" />

<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />

<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
</head>

<body>

<body style="background-color: #999991">
<h1>
<p style="text-align:center">Master Kode Transaksi</p>
</h1>
<p>&nbsp;</p>
<p>&nbsp;</p>
<form action="" method="post">
	Kode Transaksi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input name="TextKodeTransaksi" style="width: 150px" type="text" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<br />
	<br />
	Ket Transaksi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	<input name="TextKetTransaksi" style="height: 21px; width: 311px" type="text" /><br />
	<br />
	Neraca &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<select name="SelectJenisNeraca" style="width: 114px">
	<option>Debet</option>
	<option>Kredit</option>
	<option>Transfer</option>

	</select><br />
	<br />
	<input name="ButtonSave" type="submit" value="Simpan Data" />
<br />
</form>


</body>


<?php

//load data ke table
 //Including dbconfig file.
include 'koneksi.php';
$result = $koneksi2->query("SELECT * FROM master_tabungan");

//Initialize array variable
  $dbdata = array();

//Fetch into associative array
  while ( $row = $result->fetch_assoc())  {
	$dbdata[]=$row;
  }

//Print array in JSON format
$json_data = json_encode($dbdata);
//echo $json_data
//echo '<script> set_tabel(); </script>';
?>




<?php
// save data //
if(isset($_POST["ButtonSave"]))
{
 
 //Including dbconfig file.
include 'koneksi.php';
 
$kode_transaksi = $_POST["TextKodeTransaksi"];
$ket_transaksi = $_POST["TextKetTransaksi"];
$jenis_neraca = $_POST["SelectJenisNeraca"];

$kode_transaksi = trim($kode_transaksi);
$sql_search = mysqli_query($koneksi2,"select kode_transaksi from data_jenis_trx where kode_transaksi = '$kode_transaksi' ");

if(mysqli_num_rows($sql_search) > 0){
	echo '<script>alert("maaf,kode transaksi sudah ada!!")</script>';
}else{

		$input = mysqli_query($koneksi2,"INSERT INTO data_jenis_trx (kode_transaksi,ket_transaksi,jenis_neraca) VALUES ('$kode_transaksi','$ket_transaksi','$jenis_neraca')");// or die(mysqli_error());
		
		//jika query input sukses
		if($input){
			
			echo '<script>alert("tambah data berhasil!!")</script>';
			echo '<script>window.location.href="kode_transaksi.php"</script>';   //membuat Link untuk kembali ke halaman tambah
			
		}else{
			echo mysqli_error();
			echo '<script>alert("tambah data gagal!!")</script>';
			//echo '<script>window.location.href="register.php"</script>';	//membuat Link untuk kembali ke halaman tambah
			
		}
	}
}

?>

<div id="jsGrid"></div>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://js-grid.com/js/jsgrid.min.js"></script>
<script type="text/javascript" src="kode_transaksi.js"></script>







</html>
