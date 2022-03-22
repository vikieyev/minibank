<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="icon" href="bankicon.pngwing.com.png" type="image/icon type">

<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta http-equiv="refresh" content="60" />
<!-- Css -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<!--
<link href="style_master_tabungan.css" rel="stylesheet" />
-->
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />

<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
<title>Dashboard</title>
</head>

<body style="background-color: #999993">
<!--
<h1>
<p style="text-align:center">Dashboard Minibank</p>
</h1>
-->
 <!--Header Section Starts Here-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    
                    <h1 class="text-white p-2">Dashboard Minibank</h1>
                </div>
                <div class="p-1 flex flex-row items-center">
                   


                    <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="bankicon.pngwing.com.png" alt="">
                    
                    
                       
                    </div>
                </div>
            </div>
        </header>
        <!--/Header-->
<p>&nbsp;</p>


	<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
		<div class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
			<h3>
			<p style="text-align:center">JUMLAH NASABAH</p>
			</h3>
			<h1>
				
					<?php
					 //Including dbconfig file.
						include 'koneksi.php';
						$result = $koneksi2->query("select count(kode_nasabah) as 'jumlah_nasabah' from master_nasabah");
						
						//Initialize array variable
						  $dbdata = array();
							$jumlah_nasabah = 0;
						//Fetch into associative array
						  while ( $row = $result->fetch_assoc())  {
								$jumlah_nasabah=$row['jumlah_nasabah'];

							}
						echo '<p style="text-align:center">';
						echo $jumlah_nasabah;
						echo '</p>';
					?>

			</h1>
		</div>
	</div>

</br>

<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
		<div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
			<h3>
			<p style="text-align:center">TOTAL DEBET</p>
			</h3>
			<h1>
			<?php
			 //Including dbconfig file.
				include 'koneksi.php';
				$result = $koneksi2->query("select ifnull(sum(debet),0) as total_debet  from data_transaksi");
				
				//Initialize array variable
				  $dbdata = array();
					$total_debet = 0;
				//Fetch into associative array
				  while ( $row = $result->fetch_assoc())  {
						$total_debet=$row['total_debet'];

					}
				echo '<p style="text-align:center">';
				echo 'Rp. ' .number_format($total_debet);
				echo '</p>';
			?>
			</h1>
		</div>
</div>

</br>

<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
		<div class="shadow bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
			<h3>
			<p style="text-align:center">TOTAL KREDIT</p>
			</h3>
			<h1>
			<?php
			 //Including dbconfig file.
				include 'koneksi.php';
				$result = $koneksi2->query("select ifnull(sum(kredit),0) as total_kredit  from data_transaksi");
				
				//Initialize array variable
				  $dbdata = array();
					$total_kredit = 0;
				//Fetch into associative array
				  while ( $row = $result->fetch_assoc())  {
						$total_kredit=$row['total_kredit'];

					}
				echo '<p style="text-align:center">';
				echo 'Rp. ' .number_format($total_kredit);
				echo '</p>';
			?>
			</h1>
		</div>
</div>

</br>

<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
		<div class="shadow bg-success border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2">
			<h3>
			<p style="text-align:center">TOTAL SALDO</p>
			</h3>
			<h1>
			<?php
			 //Including dbconfig file.
				include 'koneksi.php';
				$result = $koneksi2->query("select (ifnull(sum(kredit) - sum(debet),0)) as 'total_saldo'  from data_transaksi");
				
				//Initialize array variable
				  $dbdata = array();
					$total_saldo = 0;
				//Fetch into associative array
				  while ( $row = $result->fetch_assoc())  {
						$total_saldo=$row['total_saldo'];

					}
				echo '<p style="text-align:center">';
				echo 'Rp. ' .number_format($total_saldo);
				echo '</p>';
			?>
			</h1>
		</div>
</div>

</br>
<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
		<div class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
			<h3>
			<p style="text-align:center">TOTAL TRANSAKSI</p>
			</h3>
			<h1>
			<?php
			 //Including dbconfig file.
				include 'koneksi.php';
				$result = $koneksi2->query("select count(id_transaksi) as 'total_transaksi' from data_transaksi");
				
				//Initialize array variable
				  $dbdata = array();
					$total_transaksi = 0;
				//Fetch into associative array
				  while ( $row = $result->fetch_assoc())  {
						$total_transaksi=$row['total_transaksi'];

					}
				echo '<p style="text-align:center">';
				echo $total_transaksi;
				echo '</p>';
			?>
			</h1>
		</div>
</div>





</body>

<?php
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






</html>
