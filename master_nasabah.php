<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

<link href="style_master_tabungan.css" rel="stylesheet" />

<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />

<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
<title>Data Nasabah</title>
</head>

<body style="background-color: #999991">
<h1>
<p style="text-align:center">Buka Rekening Nasabah</p>
</h1>

<form method="post" action="">
	Rek nasabah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  	<input name="kode_nasabah" type="text" />
	<br />
	<br />
	Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="nama_nasabah" type="text" style="width: 220px" />
	<br />
	<br />
	Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	<input name="alamat_nasabah" type="text" style="width: 420px"/><br />
	<br />
	Tgl lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="date" id="tgl_lahir" name="tgl_lahir_nasabah" value='<?php echo date('Y-m-d');?>' />
	<br />
	<br />
	Nama ibu kandung&nbsp;&nbsp;&nbsp; &nbsp;<input name="nama_ibu_kandung" type="text" style="width: 219px" /><br />
	<br />
	No telepon&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="no_tlp_nasabah" type="number" /><br />
	<br />
	Jenis Rek&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<?php

		//load data ke select
		 //Including dbconfig file.
		include 'koneksi.php';
		$result = $koneksi2->query("SELECT * FROM master_tabungan");
		
		//Initialize array variable
		  $dbdata = array();
		
		echo '<select name="jenis_program">';
		while( $row = $result->fetch_assoc())
		{
			    echo '<option value="' . htmlspecialchars($row['kode_tabungan']) . '">' 
		        . htmlspecialchars($row['nama_tabungan']) 
		        . '</option>';
		}
		echo '</select>';
		echo '</br>';

	?>

	
	
	
	<br />
	<input name="ButtonSave" type="submit" value="SAVE" /> </form>
	<br />

</body>

<?php
// save data //
if(isset($_POST["ButtonSave"]))
{
 
 //Including dbconfig file.
include 'koneksi.php';
 
$kode_nasabah = $_POST["kode_nasabah"];
$nama_nasabah = $_POST["nama_nasabah"];
$alamat_nasabah = $_POST["alamat_nasabah"];
$tgl_lahir_nasabah = $_POST["tgl_lahir_nasabah"];
$nama_ibu_kandung = $_POST["nama_ibu_kandung"];
$no_tlp_nasabah = $_POST["no_tlp_nasabah"];
$jenis_program = $_POST["jenis_program"];


$kode_nasabah = trim($kode_nasabah);

$kode_nasabah_int = (int)$kode_nasabah;

$no_tlp_nasabah_int = (int)$no_tlp_nasabah;

$sql_search = mysqli_query($koneksi2,"select kode_nasabah from master_nasabah where kode_nasabah = '$kode_nasabah' ");

if(mysqli_num_rows($sql_search) > 0){
	echo '<script>alert("maaf,kode nasabah sudah ada!!")</script>';
}else{

		$input = mysqli_query($koneksi2,"INSERT INTO master_nasabah (kode_nasabah,nama_nasabah,alamat_nasabah,tgl_lahir_nasabah,nama_ibu_kandung,no_tlp_nasabah,jenis_program) VALUES ('$kode_nasabah','$nama_nasabah','$alamat_nasabah','$tgl_lahir_nasabah','$nama_ibu_kandung','$no_tlp_nasabah_int','$jenis_program')");  
		
		//jika query input sukses
		if($input){
			
			echo '<script>alert("tambah data berhasil!!")</script>';
			echo '<script>window.location.href="master_nasabah.php"</script>';   //membuat Link untuk kembali ke halaman tambah
			
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
<script type="text/javascript" src="master_nasabah.js"></script>


</html>
