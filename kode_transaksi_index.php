<?php

include "kode_transaksi_repo.php";

$config = include("config.php");

$db = new PDO($config["db"], $config["username"], $config["password"],array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	
$clients1 = new kode_transaksi_repo($db);

//echo "tetete";


switch($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        $result = $clients1->getAll(array(
        	"kode_transaksi" => $_GET["kode_transaksi"],
            "ket_transaksi" => $_GET["ket_transaksi"],
            
            ));
            //"country_id" => intval($_GET["country_id"])
        //echo var_dump($result);
        
        //$result = $clients->getAll();
        break;

    case "POST":
        $result = $clients1->insert(array(
            "kode_transaksi" => $_POST["kode_transaksi"],
            "ket_transaksi" => $_POST["ket_transaksi"],
            "jenis_neraca" => $_POST["jenis_neraca"]
        ));
        break;

    case "PUT":
        parse_str(file_get_contents("php://input"), $_PUT);
        $result = $clients1->update(array(
            "ket_transaksi" => $_PUT["ket_transaksi"],
            "jenis_neraca" => $_PUT["jenis_neraca"],
            "kode_transaksi" => $_PUT["kode_transaksi"]
        ));
        break;

    case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);
        $result = $clients1->remove($_DELETE["kode_transaksi"]);
        break;
}


header("Content-Type: application/json");
echo json_encode($result);

?>
