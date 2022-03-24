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
<title>Transfer</title>
</head>

<body style="background-color: #999993">
<!--Header Section Starts Here-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    
                    <h1 class="text-white p-2">TRANSFER</h1>
                </div>
                <div class="p-1 flex flex-row items-center">
                   
                    <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="bankicon.pngwing.com.png" alt="">
                    
                </div>
            </div>
        </header>
        <!--/Header-->
 <!--
<h1>

<p style="text-align:center">TRANSFER</p>
</h1>
-->
<p>&nbsp;</p>

<form method="post" class="w-full" action="">
<div class="p-3">
	<div class="md:flex md:items-center mb-6">
		<div class="md:w-1/8">
			<label class="block text-black-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
	               for="grid-state">
	            REK NASABAH
	        </label>
		</div>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<div class="md:w-1/4">
			<?php

				//load data ke select
				 //Including dbconfig file.
				include 'koneksi.php';
				$result = $koneksi2->query("SELECT * FROM master_nasabah");
				
				//Initialize array variable
				  $dbdata = array();
				
				echo '<select  name="select_nasabah" id="grid-state" class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-1 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">';
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
		</div>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<div class="md:w-1/2">
		<input name="ButtonCeksaldoAsal" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="Cek Saldo" />
		

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
			echo number_format($saldo_nasabah);
			//echo '</h1>';

	}	
	?>
	</div>
	</div>

	<div class="md:flex md:items-center mb-6">
		<div class="md:w-1/8">
			<label class="block text-black-500 font-regular md:text-left mb-1 md:mb-0 pr-4"
		               for="grid-state1">
		            KODE TRANSAKSI
		        </label>
		 </div>
	 	<div class="md:w-1/4">
			<?php

				//load data ke select
				 //Including dbconfig file.
				include 'koneksi.php';
				$result = $koneksi2->query("SELECT * FROM data_jenis_trx where jenis_neraca = 'transfer' ");
				
				//Initialize array variable
				  $dbdata = array();
				
				echo '<select name="select_kode_transaksi" id="grid-state1" class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-1 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">';
				while( $row = $result->fetch_assoc())
				{
					    echo '<option value="' . htmlspecialchars($row['kode_transaksi']) . '">' 
				        . htmlspecialchars($row['ket_transaksi']) 
				        . '</option>';
				}
				echo '</select>';
			?>
		</div>
	</div>
	
	<div class="md:flex md:items-center mb-6">
		<div class="md:w-1/8">
			<label class="block text-black-500 font-regular md:text-left mb-1 md:mb-0 pr-4"
		               for="grid-state2">
		            NOMINAL
		        </label>
		 </div>
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input name="nominal" type="number" class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-1 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light" style="width: 216px"/><br />
	</div>

	TGL TRANSAKSI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" id="tgl_transaksi" name="tgl_transaksi" class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-1 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light" style="width: 200px" value='<?php echo date('Y-m-d');?>' />
	<br />
	
	&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
	<div class="md:flex md:items-center mb-6">
		<div class="md:w-1/8">
			<label class="block text-black-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
	               for="grid-state">
	            REK TUJUAN
	        </label>
		</div>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<div class="md:w-1/4">
			<?php

				//load data ke select
				 //Including dbconfig file.
				include 'koneksi.php';
				$result = $koneksi2->query("SELECT * FROM master_nasabah");
				
				//Initialize array variable
				  $dbdata = array();
				
				echo '<select  name="select_nasabah_tujuan" id="grid-state" class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-1 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">';
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
		</div>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<div class="md:w-1/2">
		<input name="ButtonCeksaldoTujuan" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="Cek Saldo" />
	
	
	
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
			echo number_format($saldo_nasabah);
			//echo '</h1>';

	}	
	?>
</div>
</div>

	
	<input name="ButtonSave" type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" value="SAVE" /> 
</div>
</form>
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
// save data //
if(isset($_POST["ButtonSave"]))
{
 
	 //Including dbconfig file.
	include 'koneksi.php';
	 
	$no_rek = $_POST["select_nasabah"];
	$jenis_transaksi = $_POST["select_kode_transaksi"];
	$nominal = $_POST["nominal"];
	$tgl_transaksi = $_POST["tgl_transaksi"];
	$rek_tujuan = $_POST["select_nasabah_tujuan"];
	
	$saldo_nasabah = 0;
	$cek_saldo = mysqli_query($koneksi2,"select (ifnull(sum(kredit) - sum(debet),0)) as saldo  from data_transaksi dt where no_rek = '$no_rek' ");  
	while( $row = $cek_saldo->fetch_assoc())
	{
		$saldo_nasabah = (int)$row['saldo'];
		//echo $row;
	}
	
	$nominal_int = (int)$nominal;
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
}

?>

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
