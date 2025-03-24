<?php
require_once __DIR__ . "/../config/Database.php";
session_start();

class AuthController {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $MaSV = $_POST["MaSV"];

            $query = "SELECT MaSV FROM sinhvien WHERE MaSV = :MaSV";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":MaSV", $MaSV, PDO::PARAM_STR);
            $stmt->execute();
            $student = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($student) {
                $_SESSION["MaSV"] = $MaSV;
                header("Location: index.php"); // Chuyển hướng sau khi đăng nhập
                exit();
            } else {
                $error = "MSSV không tồn tại!";
            }
        }

        include "app/views/auth/login.php";
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?controller=auth&action=login");
        exit();
    }
}
?>
