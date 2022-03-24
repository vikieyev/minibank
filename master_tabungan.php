<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true ");
header("Access-Control-Allow-Methods: OPTIONS, GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Depth, User-Agent, X-File-Size, X-Requested-With, If-Modified-Since, X-File-Name, Cache-Control");
?>
<head>
<link rel="icon" href="bankicon.pngwing.com.png" type="image/icon type">

<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Program</title>
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
                    
                    <h1 class="text-white p-2">MASTER PROGRAM</h1>
                </div>
                <div class="p-1 flex flex-row items-center">
                   
                    <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="bankicon.pngwing.com.png" alt="">
                    
                </div>
            </div>
        </header>
        <!--/Header-->
<!--
<h1>
<p style="text-align:center">MASTER PROGRAM</p>
</h1>
-->
<p>&nbsp;</p>
<form action="" method="post">
<div class="p-3">
	KODE PROGRAM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
	<input name="TextKodeTabungan" class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-1 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light" style="width: 150px" type="text" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<br />
	<br />
	NAMA PROGRAM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; 	<input name="TextNamaTabungan" class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-1 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light" style="height: 30px; width: 311px" type="text" /><br />
	<br />
	MIN. SETORAN AWAL&nbsp; &nbsp;<input name="TextSetoranMinimal" class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-1 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light" style="width: 213px" type="number" /><br />
	<br />
	<input name="ButtonSave" type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" value="SAVE" />
<br />
</div>
</form>

<?php
/*
//load data ke table
 //Including dbconfig file.
include 'koneksi.php';
$result = $koneksi2->query("SELECT * FROM master_tabungan");

//Initialize array variable
  $dbdata = array();

echo '<select name="select_program">';
while( $row = $result->fetch_assoc())
{
	    echo '<option value="' . htmlspecialchars($row['nama_tabungan']) . '">' 
        . htmlspecialchars($row['nama_tabungan']) 
        . '</option>';
}
echo '</select>';
*/
?>



</br>

</body>




<script>
	/*
 //function set_tabel(){

    var data_master_tabungan = <?php echo $json_data; ?>;
 	console.log(data_master_tabungan);
     
    $("#jsGrid").jsGrid({
        width: "100%",
        height: "400px",
 
        inserting: false,
        editing: false,
        sorting: true,
        paging: true,
        filtering: false,
 
        data: data_master_tabungan,
 
        fields: [
            { name: "kode_tabungan", type: "text", width: 10, validate: "required" },
            { name: "nama_tabungan", type: "text", width: 50 },
            { name: "setoran_minimal", type: "number", width: 12 },
            //{ name: "Country", type: "select", items: countries, valueField: "Id", textField: "Name" },
            //{ name: "Married", type: "checkbox", title: "Is Married", sorting: false },
           // { type: "control" }
        ]
    });
  // }
  */
</script>


<?php
//echo '<script> set_tabel(); </script>';
?>

<?php
//cari kode//
if(isset($_POST["button_cari_kode"]))
{
	include 'koneksi.php';
	$kode_tabungan = $_POST["TextKodeTabungan"];
	$kode_tabungan = trim($kode_tabungan);
	$sql_search = mysqli_query($koneksi2,"select * from master_tabungan where kode_tabungan = '$kode_tabungan' ");	
	if(mysqli_num_rows($sql_search)>0){
		//data ditemukan//
		//Initialize array variable
		$dbdata = array();

		//Fetch into associative array
		while ( $row = $sql_search->fetch_assoc())  {
		$dbdata[]=$row;
		}

		//Print array in JSON format
		$json_data = json_encode($dbdata);
		echo $json_data;
		//echo '<script> set_tabel(); </script>';

	}else{
		//data tidak ditemukan//
		echo '<script>alert("maaf,kode tabungan tidak ditemukan!!")</script>';
	}
}
?>

<?php
// save data //
if(isset($_POST["ButtonSave"]))
{
 
 //Including dbconfig file.
include 'koneksi.php';
 
$kode_tabungan = $_POST["TextKodeTabungan"];
$nama_tabungan = $_POST["TextNamaTabungan"];
$setoran_minimal = $_POST["TextSetoranMinimal"];

//mysql_query("INSERT INTO master_tabungan (kode_tabungan,nama_tabungan,setoran_minimal) VALUES ('$kode_tabungan','$nama_tabungan','$setoran_minimal')" or die(mysql_error(); 

//echo " Added master_tabungan Successfully ";
//$querysql = "INSERT INTO master_tabungan (kode_tabungan,nama_tabungan,setoran_minimal) VALUES ('$kode_tabungan','$nama_tabungan','$setoran_minimal')";
//echo "aaa =  " + $querysql;
$sm = (int)$setoran_minimal;
/*
echo $kode_tabungan;
echo $nama_tabungan;
echo $sm;
*/
$kode_tabungan = trim($kode_tabungan);
$sql_search = mysqli_query($koneksi2,"select kode_tabungan from master_tabungan where kode_tabungan = '$kode_tabungan' ");

if(mysqli_num_rows($sql_search) > 0){
	echo '<script>alert("maaf,kode tabungan sudah ada!!")</script>';
}else{

		$input = mysqli_query($koneksi2,"INSERT INTO master_tabungan (kode_tabungan,nama_tabungan,setoran_minimal) VALUES ('$kode_tabungan','$nama_tabungan','$sm')");// or die(mysqli_error());
		
		//jika query input sukses
		if($input){
			
			echo '<script>alert("tambah data berhasil!!")</script>';
			echo '<script>window.location.href="master_tabungan.php"</script>';   //membuat Link untuk kembali ke halaman tambah
			
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
<script type="text/javascript" src="master_tabungan.js"></script>



</html>
