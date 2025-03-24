<?php
require_once "app/config/Database.php";

class SinhVien {
    private $conn;
    private $table = "sinhvien"; // Bảng sinh viên

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($MaSV) {
        $query = "SELECT * FROM sinhvien WHERE MaSV = :MaSV";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":MaSV", $MaSV, PDO::PARAM_STR);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
       
        
        return $result;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table . " (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) VALUES (:MaSV, :HoTen, :GioiTinh, :NgaySinh, :Hinh, :MaNganh)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($data);
    }

    public function update($data) {
        $query = "UPDATE " . $this->table . " SET HoTen = :HoTen, GioiTinh = :GioiTinh, NgaySinh = :NgaySinh, Hinh = :Hinh, MaNganh = :MaNganh WHERE MaSV = :MaSV";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($data);
    }

    public function delete($MaSV) {
        $query = "DELETE FROM " . $this->table . " WHERE MaSV = :MaSV";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":MaSV", $MaSV);
        return $stmt->execute();
    }
}
?>
