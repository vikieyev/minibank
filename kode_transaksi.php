<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="icon" href="bankicon.pngwing.com.png" type="image/icon type">

<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title> Master Kode Transaksi</title>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

<link href="style_master_tabungan.css" rel="stylesheet" />
<!-- Css -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">

<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />

<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
</head>

<body>

<body style="background-color: #999991">
	<!--Header Section Starts Here-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    
                    <h1 class="text-white p-2">MASTER KODE TRANSAKSI</h1>
                </div>
                <div class="p-1 flex flex-row items-center">
                   
                    <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="bankicon.pngwing.com.png" alt="">
                    
                </div>
            </div>
        </header>
        <!--/Header-->
<!--
<h1>
<p style="text-align:center">MASTER KODE TRANSAKSI</p>
</h1>
-->

<p>&nbsp;</p>

<form action="" method="post">
	<div class="p-3">
	KODE TRANSAKSI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input name="TextKodeTransaksi" class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-1 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light" style="width: 150px" type="text" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<br />
	<br />
	KET TRANSAKSI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	
	<input name="TextKetTransaksi" class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-1 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light" style="height: 30px; width: 415px" type="text" /><br />
	<br />
	NERACA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
	<select name="SelectJenisNeraca" class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-1 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light" style="width: 114px">
	<option>Debet</option>
	<option>Kredit</option>
	<option>Transfer</option>

	</select><br />
	<br />
	<input name="ButtonSave" type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" value="SAVE" />
<br />
</div>
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
