<?php
require_once "app/models/HocPhan.php";

class HocPhanController {
    private $model  ;

    public function __construct() {
        $this->model = new HocPhan();
    }

    public function index() {
        $hocphans = $this->model->getAll();
        include "app/views/hocphan/index.php"; 
    }

    public function dangKy() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $MaHP = $_POST["MaHP"];
            echo "<script>alert('Đăng ký thành công học phần: $MaHP');</script>";
        }
        header("Location: index.php?controller=hocphan&action=index");
        exit();
    }
}
?>
