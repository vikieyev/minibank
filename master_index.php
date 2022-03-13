<?php

include "Mas_tabungan_repo.php";

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
$clients1 = new Mas_tabungan_repo($db);

//echo "tetete";


switch($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        $result = $clients1->getAll(array(
        	"kode_tabungan" => $_GET["kode_tabungan"],
            "nama_tabungan" => $_GET["nama_tabungan"],
            
            ));
            //"country_id" => intval($_GET["country_id"])
        //echo var_dump($result);
        
        //$result = $clients->getAll();
        break;

    case "POST":
        $result = $clients1->insert(array(
            "kode_tabungan" => $_POST["kode_tabungan"],
            "nama_tabungan" => $_POST["nama_tabungan"],
            "setoran_minimal" => intval($_POST["setoran_minimal"])
        ));
        break;

    case "PUT":
        parse_str(file_get_contents("php://input"), $_PUT);

        $result = $clients1->update(array(
           
            "nama_tabungan" => $_PUT["nama_tabungan"],
            "setoran_minimal" => intval($_PUT["setoran_minimal"]),
            "kode_tabungan" => $_PUT["kode_tabungan"]
        ));
        break;

    case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);
        $result = $clients1->remove($_DELETE["kode_tabungan"]);
        break;
}


header("Content-Type: application/json");
echo json_encode($result);

?>
