<?php
require_once "app/config/Database.php";// Đường dẫn đúng

class HocPhan {
    private $conn;

    public function __construct() {
        $database = new Database(); // Tạo đối tượng Database
        $this->conn = $database->getConnection(); // Gọi phương thức getConnection()
    }

    public function getAll() {
        $query = "SELECT * FROM hocphan";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
