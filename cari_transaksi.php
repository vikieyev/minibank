<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="icon" href="bankicon.pngwing.com.png" type="image/icon type">

<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
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
<title>Cari Transaksi</title>
</head>

<body style="background-color: #999991">

<!--Header Section Starts Here-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    
                    <h1 class="text-white p-2">CARI TRANSAKSI</h1>
                </div>
                <div class="p-1 flex flex-row items-center">
                   
                    <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="bankicon.pngwing.com.png" alt="">
                    
                </div>
            </div>
        </header>
        <!--/Header-->


<!--
<h1>
<p style="text-align:center">CARI TRANSAKSI</p>
</h1>
<p>&nbsp;</p>
-->
</br>
<form method="post" class="w-full" action="">
<div class="p-3">

<div class="md:flex md:items-center mb-6">
	<div class="md:w-1/8">
	    <label class="block text-black-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
	           for="inline-full-name">
	        MASUKAN ID TRANSAKSI
	    </label>
	</div>

		<input name="id_transaksi" id="inline-full-name" class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light" type="text" style="width: 260px" />

<!--
	Rek nasabah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	<?php

		//load data ke select
		 //Including dbconfig file.
		include 'koneksi.php';
		$result = $koneksi2->query("SELECT * FROM master_nasabah");
		
		//Initialize array variable
		  $dbdata = array();
		
		echo '<select name="select_nasabah">';
		while( $row = $result->fetch_assoc())
		{
			    echo '<option value="' . htmlspecialchars($row['kode_nasabah']) . '">' 
		        . htmlspecialchars($row['kode_nasabah']) 
		        . '</option>';
		}
		echo '</select>';
		//echo '<input name="nama_nasabah" type="text">';
		//echo '</input>';
	?>
	<input name="ButtonCeksaldoAsal" type="submit" value="Cek Saldo" />
	<?php
	if(isset($_POST["ButtonCeksaldoAsal"]))
	{
		include 'koneksi.php';
	 
		$no_rek = $_POST["select_nasabah"];
				
		$saldo_nasabah = 0;
		$cek_saldo = mysqli_query($koneksi2,"select (ifnull(sum(kredit) - sum(debet),0)) as saldo  from data_transaksi dt where no_rek = '$no_rek' ");  
		while( $row = $cek_saldo->fetch_assoc())
		{
			$saldo_nasabah = (int)$row['saldo'];
			//echo $row;
		}
			//echo '<h1>';
			echo " saldo rek : " ;
			echo $no_rek;
			echo " Rp."; 
			echo $saldo_nasabah;
			//echo '</h1>';

	}	
	?>
	<br />
	<br />
	Kode Transaksi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php

		//load data ke select
		 //Including dbconfig file.
		include 'koneksi.php';
		$result = $koneksi2->query("SELECT * FROM data_jenis_trx where jenis_neraca = 'transfer' ");
		
		//Initialize array variable
		  $dbdata = array();
		
		echo '<select name="select_kode_transaksi">';
		while( $row = $result->fetch_assoc())
		{
			    echo '<option value="' . htmlspecialchars($row['kode_transaksi']) . '">' 
		        . htmlspecialchars($row['ket_transaksi']) 
		        . '</option>';
		}
		echo '</select>';
	?>

	<br />
	<br />
	Nominal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	
	<input name="nominal" type="number" style="width: 216px"/><br />
	<br />
	Tgl Transaksi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" id="tgl_transaksi" name="tgl_transaksi" value='<?php echo date('Y-m-d');?>' />
	<br />
	<br />
	
	Rek Tujuan&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
	
	<?php

		//load data ke select
		 //Including dbconfig file.
		include 'koneksi.php';
		$result = $koneksi2->query("SELECT * FROM master_nasabah");
		
		//Initialize array variable
		  $dbdata = array();
		
		echo '<select name="select_nasabah_tujuan">';
		while( $row = $result->fetch_assoc())
		{
			    echo '<option value="' . htmlspecialchars($row['kode_nasabah']) . '">' 
		        . htmlspecialchars($row['kode_nasabah']) 
		        . '</option>';
		}
		echo '</select>';
		//echo '<input name="nama_nasabah" type="text">';
		//echo '</input>';
	?>
	
	<input name="ButtonCeksaldoTujuan" type="submit" value="Cek Saldo" />
	<?php
	if(isset($_POST["ButtonCeksaldoTujuan"]))
	{
		include 'koneksi.php';
	 
		$no_rek = $_POST["select_nasabah_tujuan"];
				
		$saldo_nasabah = 0;
		$cek_saldo = mysqli_query($koneksi2,"select (ifnull(sum(kredit) - sum(debet),0)) as saldo  from data_transaksi dt where no_rek = '$no_rek' ");  
		while( $row = $cek_saldo->fetch_assoc())
		{
			$saldo_nasabah = (int)$row['saldo'];
			//echo $row;
		}
			//echo '<h1>';
			echo " saldo rek : " ;
			echo $no_rek;
			echo " Rp."; 
			echo $saldo_nasabah;
			//echo '</h1>';

	}	
	?>


	<br/>
-->
		
	&nbsp;&nbsp;&nbsp;
	</div>
	<input name="ButtonSave" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="CARI" /> </form>
</div>
	<br />

</body>

<script>
/*
function saldo_kurang(){
	var saldo = <?php echo $saldo_nasabah; ?>;
	alert("maaf saldo anda kurang, saldo saat ini Rp. ");
}
*/
</script>
<?php

//load data ke table
 //Including dbconfig file.
include 'koneksi.php';
$result = $koneksi2->query("SELECT * FROM data_transaksi");

//Initialize array variable
  $dbdata = array();

//Fetch into associative array
  while ( $row = $result->fetch_assoc())  {
		$dbdata[]=$row;
	}

	//Print array in JSON format
	$json_data = json_encode($dbdata);
	//echo $json_data;
	


?>


<?php
// save data //
if(isset($_POST["ButtonSave"]))
{
 
	 //Including dbconfig file.
	//include 'koneksi.php';
	$id_transaksi = $_POST["id_transaksi"];
	
	//$input = mysqli_query($koneksi2,"INSERT INTO data_transaksi (no_rek,jenis_transaksi,debet,tgl_transaksi,rek_tujuan) VALUES ('$no_rek','$jenis_transaksi','$nominal','$tgl_transaksi','$rek_tujuan')");
	include 'koneksi.php';
	$result = $koneksi2->query("SELECT * FROM data_transaksi where id_transaksi = '$id_transaksi'");
	
	//Initialize array variable
	  $dbdata = array();
	
	//Fetch into associative array
	  while ( $row = $result->fetch_assoc())  {
			$dbdata[]=$row;
		}

	//Print array in JSON format
	$json_data = json_encode($dbdata);
	if(count($dbdata) > 0){
				
		echo '<script>alert("transaksi ditemukan!!")</script>';
		//echo '<script>window.location.href="mutasi_transfer.php"</script>';   //membuat Link untuk kembali ke halaman tambah
		
	}else{
		//echo mysqli_error();
		echo '<script>alert("transaksi tidak ditemukan!!!!")</script>';
		//echo '<script>window.location.href="cari_transaksi.php"</script>';	//membuat Link untuk kembali ke halaman tambah
		
	}
	//echo $json_data;

	/*
	$no_rek = $_POST["select_nasabah"];
	$jenis_transaksi = $_POST["select_kode_transaksi"];
	$nominal = $_POST["nominal"];
	$tgl_transaksi = $_POST["tgl_transaksi"];
	$rek_tujuan = $_POST["select_nasabah_tujuan"];
	
	$id_transaksi = $_POST["id_transaksi"];
	
	$saldo_nasabah = 0;
	//$cek_saldo = mysqli_query($koneksi2,"select (ifnull(sum(kredit) - sum(debet),0)) as saldo  from data_transaksi dt where no_rek = '$no_rek' ");  
	//while( $row = $cek_saldo->fetch_assoc())
	//{
	//	$saldo_nasabah = (int)$row['saldo'];
		//echo $row;
	//}
	
	//$nominal_int = (int)$nominal;
	//echo htmlspecialchars($saldo_nasabah);
	
	if($saldo_nasabah <= $nominal_int){
			
			echo '<script> alert("maaf saldo anda tidak cukup");</script>';
			echo '<h1>';
			echo "saldo rek : " ;
			echo $no_rek;
			echo " Rp."; 
			echo $saldo_nasabah;
			echo '</h1>';
			
			//echo '<script> saldo_kurang(); </script>';
	}else{
	
			//kurangi saldo//
			$input = mysqli_query($koneksi2,"INSERT INTO data_transaksi (no_rek,jenis_transaksi,debet,tgl_transaksi,rek_tujuan) VALUES ('$no_rek','$jenis_transaksi','$nominal','$tgl_transaksi','$rek_tujuan')");
			
			$tambah_saldo_rek_tujuan = mysqli_query($koneksi2,"INSERT INTO data_transaksi (no_rek,jenis_transaksi,kredit,tgl_transaksi) VALUES ('$rek_tujuan','$jenis_transaksi','$nominal','$tgl_transaksi')");    
			
			//$input = mysqli_query($koneksi2,"INSERT INTO data_transaksi (no_rek,jenis_transaksi,debet,tgl_transaksi) VALUES ('$no_rek','$jenis_transaksi','$nominal','$tgl_transaksi')");  
			
			//jika query input sukses
			if($tambah_saldo_rek_tujuan){
				
				echo '<script>alert("transfer berhasil!!")</script>';
				echo '<script>window.location.href="mutasi_transfer.php"</script>';   //membuat Link untuk kembali ke halaman tambah
				
			}else{
				echo mysqli_error();
				echo '<script>alert("transfer gagal!!")</script>';
				//echo '<script>window.location.href="register.php"</script>';	//membuat Link untuk kembali ke halaman tambah
				
			}
	}
	*/
}

?>




<div id="jsGrid"></div>

<script>
	
 //function set_tabel(){

    var data_tabel = <?php echo $json_data; ?>;
 	//console.log(data);
     
    $("#jsGrid").jsGrid({
        height: "70%",
        width: "100%",
 
        inserting: false,
        editing: false,
        sorting: true,
        paging: true,
        filtering: false,
 
        data: data_tabel,
 
        fields: [
            { name: "no_rek", title: "No Rek Asal",type: "text", width: 15, validate: "required" },
            { name: "rek_tujuan", title: "No Rek Tujuan", type: "text", width: 12 },
            { name: "jenis_transaksi", type: "text", width: 15 },
            { name: "debet", type: "number", width: 12 },
            { name: "kredit", type: "number", width: 12 },
            { name: "tgl_transaksi", type: "text", width: 12 },
            { name: "id_transaksi", type: "text", width: 12 }
            

           // { type: "control" }
        ]
    });
  // }
  
</script>


</html>
