<?php

include "mas_nasabah_repo.php";

$config = include("config.php");
//try{
$db = new PDO($config["db"], $config["username"], $config["password"],array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	//die(json_encode(array('outcome' => true)));
	//echo "si=ukses";
//}catch(PDOException $ex){
    //die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
    //echo $ex;
//}
$clients1 = new mas_nasabah_repo($db);

//echo "tetete";


switch($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        $result = $clients1->getAll(array(
        	"kode_nasabah" => $_GET["kode_nasabah"],
            "nama_nasabah" => $_GET["nama_nasabah"],
            
            ));
        break;

    case "POST":
        $result = $clients1->insert(array(
            "kode_nasabah" => $_POST["kode_nasabah"],
            "nama_nasabah" => $_POST["nama_nasabah"],
            "alamat_nasabah" => $_POST["alamat_nasabah"],
            "tgl_lahir_nasabah" => $_POST["tgl_lahir_nasabah"],
            "nama_ibu_kandung" => $_POST["nama_ibu_kandung"],
            "no_tlp_nasabah" => intval($_POST["no_tlp_nasabah"])
            
        ));
        break;

    case "PUT":
        parse_str(file_get_contents("php://input"), $_PUT);
        $result = $clients1->update(array(
            "nama_nasabah" => $_PUT["nama_nasabah"],
            "alamat_nasabah" => $_PUT["alamat_nasabah"],
            "tgl_lahir_nasabah" => $_PUT["tgl_lahir_nasabah"],
            "nama_ibu_kandung" => $_PUT["nama_ibu_kandung"],
            "no_tlp_nasabah" => intval($_PUT["no_tlp_nasabah"]),
            "kode_nasabah" => $_PUT["kode_nasabah"]
        ));
        break;

    case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);
        $result = $clients1->remove($_DELETE["kode_nasabah"]);
        break;
}


header("Content-Type: application/json");
echo json_encode($result);

?>
