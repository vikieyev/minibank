<?php

include "kode_transaksi_var.php";

class kode_transaksi_repo {

    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    private function read($row) {
        $result = new kode_transaksi_var();
        $result->kode_transaksi = $row["kode_transaksi"];
        $result->ket_transaksi = $row["ket_transaksi"];
        $result->jenis_neraca = $row["jenis_neraca"];
        //echo "gggg";
        //echo var_dump($result);
        return $result;
    }

    public function getById($kode_transaksi) {
        $sql = "SELECT * FROM data_jenis_trx WHERE kode_transaksi = :kode_transaksi";
        $q = $this->db->prepare($sql);
        $q->bindParam(":kode_transaksi", $kode_transaksi, PDO::PARAM_STR);
        $q->execute();
        $rows = $q->fetchAll();
        return $this->read($rows[0]);
    }

    public function getAll($filter) {
    	
        $kode_transaksi = "%" . $filter["kode_transaksi"] . "%";
        $ket_transaksi = "%" . $filter["ket_transaksi"] . "%";
        
        $sql = "SELECT * FROM data_jenis_trx WHERE ket_transaksi LIKE :ket_transaksi and kode_transaksi LIKE :kode_transaksi";
        $q = $this->db->prepare($sql);
        $q->bindParam(":ket_transaksi", $ket_transaksi);
        $q->bindParam(":kode_transaksi", $kode_transaksi);
        $q->execute();
        $rows = $q->fetchAll();

        $result = array();
        foreach($rows as $row) {
            array_push($result, $this->read($row));
        }
        return $result;
        
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
        $sql = "UPDATE data_jenis_trx SET ket_transaksi = :ket_transaksi, jenis_neraca = :jenis_neraca WHERE kode_transaksi = :kode_transaksi";
        $q = $this->db->prepare($sql);
        $q->bindParam(":ket_transaksi", $data["ket_transaksi"]);
        $q->bindParam(":jenis_neraca", $data["jenis_neraca"]);
        $q->bindParam(":kode_transaksi", $data["kode_transaksi"]);
        $q->execute();
    }

    public function remove($kode_transaksi) {
        $sql = "DELETE FROM data_jenis_trx WHERE kode_transaksi = :kode_transaksi";
        $q = $this->db->prepare($sql);
        $q->bindParam(":kode_transaksi", $kode_transaksi, PDO::PARAM_STR);
        $q->execute();
    }

}

?>