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
<script type="text/javascript" src="export_table.js"></script>

<title>Laporan Kas Masuk</title>
</head>

<body style="background-color: #999991">
	<!--Header Section Starts Here-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    
                    <h1 class="text-white p-2">LAPORAN KAS MASUK</h1>
                </div>
                <div class="p-1 flex flex-row items-center">
                   
                    <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="bankicon.pngwing.com.png" alt="">
                    
                </div>
            </div>
        </header>
        <!--/Header-->
<!--
<h1>
<p style="text-align:center">LAPORAN KAS MASUK</p>
</h1>
-->

<div class="no-print">

<form method="post" action="">
	<div class="p-3">
	REK NASABAH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	<?php

		//load data ke select
		 //Including dbconfig file.
		include 'koneksi.php';
		$result = $koneksi2->query("SELECT * FROM master_nasabah");
		
		//Initialize array variable
		  $dbdata = array();
		
		echo '<select name="select_nasabah" class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-1 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light" style="width: 200px">';
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

	
	<!--
	<input name="ButtonCeksaldoAsal" type="submit" value="Cek Saldo" />
-->
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


			


			TGL AWAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" id="tgl_awal" name="tgl_awal" class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-1 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light" style="width: 200px" value='<?php echo date('Y-m-d');?>' />&nbsp;&nbsp;&nbsp;&nbsp;
			
			TGL AKHIR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" id="tgl_akhir" name="tgl_akhir" class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-1 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light" style="width: 200px" value='<?php echo date('Y-m-d');?>' />
	
	<!--
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

	
	-->
	
			&nbsp;&nbsp;&nbsp;
	
			<input name="ButtonSave" type="submit" value="PROSES" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" /> 
		</div>
</form>
</div>
	
</body>
<div class="p-3">
<?php

// save data //
if(isset($_POST["ButtonSave"]))
{
 
	 //Including dbconfig file.
	include 'koneksi.php';
	 
	$no_rek = $_POST["select_nasabah"];
	$tgl_awal = $_POST["tgl_awal"];
	$tgl_akhir = $_POST["tgl_akhir"];
	
	
		
			$total_query = mysqli_query($koneksi2,"select sum(a.kredit) as 'kas_masuk' from data_transaksi a join data_jenis_trx b on a.jenis_transaksi = b.kode_transaksi join master_nasabah c on c.kode_nasabah = a.no_rek where a.no_rek  = '$no_rek' and (b.jenis_neraca = 'kredit' or b.jenis_neraca = 'transfer') and (a.tgl_transaksi between '$tgl_awal' and '$tgl_akhir');");
			$input = mysqli_query($koneksi2,"select a.no_rek,c.nama_nasabah,c.alamat_nasabah ,c.no_tlp_nasabah,c.jenis_program ,b.kode_transaksi ,a.kredit,a.tgl_transaksi,a.id_transaksi,b.ket_transaksi from data_transaksi a join data_jenis_trx b on a.jenis_transaksi = b.kode_transaksi join master_nasabah c on c.kode_nasabah = a.no_rek where a.no_rek  = '$no_rek' and kredit > 0 and (b.jenis_neraca = 'kredit' or b.jenis_neraca = 'transfer') and (a.tgl_transaksi between '$tgl_awal' and '$tgl_akhir') order by a.id_transaksi asc;");    
			
			//jika query input sukses
			$nama_nasabah = "";
			$jenis_program="";
			$alamat_nasabah="";
			$no_tlp_nasabah="";

			if($input){
				//Initialize array variable
  				$dbdata = array();
  				//Fetch into associative array
			  	while ( $row = $input->fetch_assoc())  {
					$dbdata[]=$row;
					
					$nama_nasabah=$row['nama_nasabah'];
					$jenis_program=$row['jenis_program'];
					$alamat_nasabah=$row['alamat_nasabah'];
					$no_tlp_nasabah=$row['no_tlp_nasabah'];
					
				}
				//get nama program//
				if($jenis_program){
					$get_nama_program = mysqli_query($koneksi2,"select * from master_tabungan where kode_tabungan = '$jenis_program'");
					if(count($get_nama_program)>0){
						while ($row1 = $get_nama_program ->fetch_assoc())  {
							$jenis_program = $row1['nama_tabungan'];		
						}

					}
				}
				//get nama program end//

				while ( $row2 = $total_query->fetch_assoc())  {
					$total=$row2['kas_masuk'];
				}
					echo '<h4>';
					echo "No Rekening 	: ". $no_rek ;
					echo '<br/>';
					echo "Nama 			: ". $nama_nasabah ;
					echo '<br/>';
					echo "Alamat 		: ". $alamat_nasabah ;
					echo '<br/>';
					echo "Telepon 		: ". $no_tlp_nasabah ;
					echo '<br/>';
					echo "Program 		: ". $jenis_program ;
					echo '<br/>';
					echo "Periode 		: ". $tgl_awal . " - " . $tgl_akhir;
					echo '<br/>';
					echo '<br/>';
					echo '</h4>';

					//Print array in JSON format
					$json_data2 = json_encode($dbdata);
					//echo '<br/>';
					echo '<button onclick="window.print();">';
					//echo '<form method="post" action=""> <input name="ButtonPrint" type="submit" value="print" />  </form> ';
					//echo '<button onclick="JSONToCSVConvertor(' + $json_data2 +' ,Label, ShowLabel)">PRINTEXCEL</button>';
					
					echo '<div id="jsGrid"></div>';
					//echo $json_data2;
					//echo '<br/>';
					echo '<h1>';
					echo '<p style="text-align:center">';
					echo "Total Kas Masuk No Rek.". $no_rek ." = Rp. ";
					echo number_format($total);
					echo '</h1>';
					

				//echo '<script>alert("tambah data berhasil!!")</script>';
				//echo '<script>window.location.href="mutasi_masuk.php"</script>';   //membuat Link untuk kembali ke halaman tambah
				
			}else{
				echo mysqli_error();
				echo '<script>alert("proses data gagal!!")</script>';
				//echo '<script>window.location.href="register.php"</script>';	//membuat Link untuk kembali ke halaman tambah
				
			}
			


}

?>
</div>

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



<script>
	
 //function set_tabel(){

    var data_tabel = <?php echo $json_data2; ?>;
 	//console.log(data);
 	
 	function formatNumberForDisplay(numberToFormat) {
    var formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'IDR',
        digits: 0,
      });

      return formatter.format(numberToFormat);
	}
     
    $("#jsGrid").jsGrid({
        height: "70%",
        width: "100%",
 
        inserting: false,
        editing: false,
        sorting: true,
        paging: false,
        filtering: false,
 
        data: data_tabel,
 
        fields: [
           // { name: "no_rek", title: "No Rek",type: "text", width: 15, validate: "required" },
           // { name: "nama_nasabah", type: "text", width: 15 },
           // { name: "jenis_program", type: "text", width: 12 },
            { name: "kode_transaksi", type: "text", width: 12 },
            { name: "kredit", type: "number", width: 12,
            	itemTemplate: function(value) {
        			return formatNumberForDisplay(value) ;
    			}, 
            },
            { name: "tgl_transaksi", type: "text", width: 12 },
            { name: "id_transaksi", type: "text", width: 12 },
            { name: "ket_transaksi", type: "text", width: 12 },
           // { type: "control" }
        ]
    });
  // }
  
  
</script>


</html>
