<?php

include "mas_nasabah_var.php";

class mas_nasabah_repo {

    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    private function read($row) {
        $result = new mas_nasabah_var();
        $result->kode_nasabah = $row["kode_nasabah"];
        $result->nama_nasabah = $row["nama_nasabah"];
        $result->alamat_nasabah = $row["alamat_nasabah"];
        $result->tgl_lahir_nasabah = $row["tgl_lahir_nasabah"];
        $result->nama_ibu_kandung = $row["nama_ibu_kandung"];
        $result->no_tlp_nasabah = $row["no_tlp_nasabah"];
        //echo "gggg";
        //echo var_dump($result);
        return $result;
    }

    public function getById($kode_nasabah) {
        $sql = "SELECT * FROM master_nasabah WHERE kode_nasabah = :kode_nasabah";
        $q = $this->db->prepare($sql);
        $q->bindParam(":kode_tabungan", $kode_nasabah, PDO::PARAM_STR);
        $q->execute();
        $rows = $q->fetchAll();
        return $this->read($rows[0]);
    }

    public function getAll($filter) {
    	
        $kode_nasabah = "%" . $filter["kode_nasabah"] . "%";
        $nama_nasabah = "%" . $filter["nama_nasabah"] . "%";
        //$setoran_minimal = "%" . $filter["setoran_minimal"] . "%";
        //$country_id = $filter["country_id"];

        $sql = "SELECT * FROM master_nasabah WHERE nama_nasabah LIKE :nama_nasabah and kode_nasabah LIKE :kode_nasabah";
        //$sql = "SELECT * FROM master_nasabah WHERE nama_nasabah LIKE :nama_nasabah";
        $q = $this->db->prepare($sql);
        $q->bindParam(":nama_nasabah", $nama_nasabah);
        $q->bindParam(":kode_nasabah", $kode_nasabah);
        
        //$q->bindParam(":setoran_minimal", $setoran_minimal);
        //$q->bindParam(":country_id", $country_id);
        $q->execute();
        $rows = $q->fetchAll();

        $result = array();
        foreach($rows as $row) {
            array_push($result, $this->read($row));
        }
        return $result;
        
    }

    public function insert($data) {
        $sql = "INSERT INTO master_nasabah (kode_nasabah,nama_nasabah,alamat_nasabah,tgl_lahir_nasabah,nama_ibu_kandung,no_tlp_nasabah) VALUES (:kode_nasabah,:nama_nasabah,:alamat_nasabah,:tgl_lahir_nasabah,:nama_ibu_kandung,:no_tlp_nasabah)";
        $q = $this->db->prepare($sql);
        $q->bindParam(":kode_nasabah", $data["kode_nasabah"]);
        $q->bindParam(":nama_nasabah", $data["nama_nasabah"]);
        $q->bindParam(":alamat_nasabah", $data["alamat_nasabah"]);
        $q->bindParam(":tgl_lahir_nasabah", $data["tgl_lahir_nasabah"],PDO::PARAM_STR);
        $q->bindParam(":nama_ibu_kandung", $data["nama_ibu_kandung"]);
        $q->bindParam(":no_tlp_nasabah", $data["no_tlp_nasabah"],PDO::PARAM_INT);
        $q->execute();
        return $this->getById($this->db->lastInsertId());
    }

    public function update($data) {
        $sql = "UPDATE master_nasabah SET nama_nasabah = :nama_nasabah, alamat_nasabah = :alamat_nasabah,tgl_lahir_nasabah = :tgl_lahir_nasabah, nama_ibu_kandung = :nama_ibu_kandung,no_tlp_nasabah = :no_tlp_nasabah  WHERE kode_nasabah = :kode_nasabah";
        $q = $this->db->prepare($sql);
        $q->bindParam(":nama_nasabah", $data["nama_nasabah"]);
        $q->bindParam(":alamat_nasabah", $data["alamat_nasabah"]);
        $q->bindParam(":tgl_lahir_nasabah", $data["tgl_lahir_nasabah"]);
        $q->bindParam(":nama_ibu_kandung", $data["nama_ibu_kandung"]);
        $q->bindParam(":no_tlp_nasabah", $data["no_tlp_nasabah"],PDO::PARAM_INT);
        $q->bindParam(":kode_nasabah", $data["kode_nasabah"]);
        $q->execute();
    }

    public function remove($kode_nasabah) {
        $sql = "DELETE FROM master_nasabah WHERE kode_nasabah = :kode_nasabah";
        $q = $this->db->prepare($sql);
        $q->bindParam(":kode_nasabah", $kode_nasabah, PDO::PARAM_STR);
        $q->execute();
    }

}

?>