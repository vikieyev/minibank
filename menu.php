<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<!-- Css -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
<link rel="icon" href="bankicon.pngwing.com.png" type="image/icon type">


<title>menu minibank</title>
</head>

<body>
<!--Header Section Starts Here-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">MASTER DATA</h1>
                </div>
                <div class="p-1 flex flex-row items-center">
                   
                    <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="bankicon.pngwing.com.png" alt="">
                    
                </div>
            </div>
        </header>
        <!--/Header-->

<body style="background-color: #999991">
<!--
<h1>
<p style="text-align:center">MASTER DATA</p>
</h1>
<p>&nbsp;</p>
-->

<div class="flex flex-1">
	<aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
		<ul class="list-reset flex flex-col">

			<li class="w-full h-full py-3 px-2 border-b border-light-border">
			                <i class="fab fa-wpforms float-left mx-2"></i>
								<p style="text-align:center"><a href="master_nasabah.php" class="font-sans font-normal hover:font-bold text-sm text-nav-item no-underline" target="_blank">NASABAH</a></p>
			 </li>

			<li class="w-full h-full py-3 px-2 border-b border-light-border">
			                <i class="fab fa-wpforms float-left mx-2"></i>		
								<p style="text-align:center"><a href="master_tabungan.php" class="font-sans font-normal hover:font-bold text-sm text-nav-item no-underline" target="_blank">JENIS PROGRAM</a></p>
			</li>

			<li class="w-full h-full py-3 px-2 border-b border-light-border">
			                <i class="fab fa-wpforms float-left mx-2"></i>
								<p style="text-align:center"><a href="kode_transaksi.php" class="font-sans font-normal hover:font-bold text-sm text-nav-item no-underline" target="_blank">KODE TRANSAKSI</a></p>
			</li>

		</ul>
    </aside>
</div>


</body>
<script src="main.js"></script>
</html>
