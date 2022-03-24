<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true ");
header("Access-Control-Allow-Methods: OPTIONS, GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Depth, User-Agent, X-File-Size, X-Requested-With, If-Modified-Since, X-File-Name, Cache-Control");  
include "Mas_tabungan.php";

class Mas_tabungan_repo {

    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    private function read($row) {
        $result = new Mas_tabungan();
        $result->kode_tabungan = $row["kode_tabungan"];
        $result->nama_tabungan = $row["nama_tabungan"];
        $result->setoran_minimal = $row["setoran_minimal"];
        //echo "gggg";
        //echo var_dump($result);
        return $result;
    }

    public function getById($kode_tabungan) {
        $sql = "SELECT * FROM master_tabungan WHERE kode_tabungan = :kode_tabungan";
        $q = $this->db->prepare($sql);
        $q->bindParam(":kode_tabungan", $kode_tabungan, PDO::PARAM_STR);
        $q->execute();
        $rows = $q->fetchAll();
        return $this->read($rows[0]);
    }

    public function getAll($filter) {
    	
        $kode_tabungan = "%" . $filter["kode_tabungan"] . "%";
        $nama_tabungan = "%" . $filter["nama_tabungan"] . "%";
        //$setoran_minimal = "%" . $filter["setoran_minimal"] . "%";
        //$country_id = $filter["country_id"];

        $sql = "SELECT * FROM master_tabungan WHERE nama_tabungan LIKE :nama_tabungan and kode_tabungan LIKE :kode_tabungan";
        $q = $this->db->prepare($sql);
        $q->bindParam(":nama_tabungan", $nama_tabungan);
        $q->bindParam(":kode_tabungan", $kode_tabungan);
        
        //$q->bindParam(":setoran_minimal", $setoran_minimal);
        //$q->bindParam(":country_id", $country_id);
        $q->execute();
        $rows = $q->fetchAll();

        $result = array();
        foreach($rows as $row) {
            array_push($result, $this->read($row));
        }
        return $result;
        
        
        /*
        $sql = "SELECT * FROM master_tabungan";
        $q = $this->db->prepare($sql);
        $q->bindParam(":kode_tabungan", $kode_tabungan);
        $q->bindParam(":nama_tabungan", $nama_tabungan);
        $q->bindParam(":setoran_minimal", $setoran_minimal);
        $q->execute();
        $rows = $q->fetchAll();

        $result = array();
        foreach($rows as $row) {
            array_push($result, $this->read($row));
        }
        return $result;
        */
    }

    public function insert($data) {
        $sql = "INSERT INTO master_tabungan (kode_tabungan,nama_tabungan,setoran_minimal) VALUES (:kode_tabungan, :nama_tabungan, :setoran_minimal)";
        $q = $this->db->prepare($sql);
        $q->bindParam(":kode_tabungan", $data["kode_tabungan"]);
        $q->bindParam(":nama_tabungan", $data["nama_tabungan"]);
        $q->bindParam(":setoran_minimal", $data["setoran_minimal"],PDO::PARAM_INT);
        $q->execute();
        return $this->getById($this->db->lastInsertId());
    }

    public function update($data) {
        $sql = "UPDATE master_tabungan SET nama_tabungan = :nama_tabungan, setoran_minimal = :setoran_minimal WHERE kode_tabungan = :kode_tabungan";
        $q = $this->db->prepare($sql);
        $q->bindParam(":nama_tabungan", $data["nama_tabungan"]);
        $q->bindParam(":setoran_minimal", $data["setoran_minimal"],PDO::PARAM_INT);
        $q->bindParam(":kode_tabungan", $data["kode_tabungan"]);
        $q->execute();
    }

    public function remove($kode_tabungan) {
        $sql = "DELETE FROM master_tabungan WHERE kode_tabungan = :kode_tabungan";
        $q = $this->db->prepare($sql);
        $q->bindParam(":kode_tabungan", $kode_tabungan, PDO::PARAM_STR);
        $q->execute();
    }

}

?>