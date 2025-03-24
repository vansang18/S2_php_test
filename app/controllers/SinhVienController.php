<?php
require_once "app/models/SinhVien.php";

class SinhVienController {
    private $model;

    public function __construct() {
        $this->model = new SinhVien();
    }

    public function index() {
        $students = $this->model->getAll();
        include "app/views/sinhvien/index.php";
    }

    public function show($MaSV) {
        $student = $this->model->getById($MaSV);
        include "app/views/sinhvien/show.php";
    }
    

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                "MaSV" => $_POST["MaSV"],
                "HoTen" => $_POST["HoTen"],
                "GioiTinh" => $_POST["GioiTinh"],
                "NgaySinh" => $_POST["NgaySinh"],
                "Hinh" => $_FILES["Hinh"]["name"],
                "MaNganh" => $_POST["MaNganh"]
            ];
            if (!empty($_FILES["Hinh"]["name"])) {
            move_uploaded_file($_FILES["Hinh"]["tmp_name"], "upload/" . $_FILES["Hinh"]["name"]);
        }
            $this->model->create($data);
            header("Location: index.php?controller=sinhvien&action=index");
        } else {
            include "app/views/sinhvien/add.php";
        }
    }

    public function update($MaSV = null) {
        // Lấy MaSV từ URL nếu chưa có
        if (!$MaSV) {
            $MaSV = $_GET["MaSV"] ?? null;
        }
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                "MaSV" => $MaSV,
                "HoTen" => $_POST["HoTen"],
                "GioiTinh" => $_POST["GioiTinh"],
                "NgaySinh" => $_POST["NgaySinh"],
                "Hinh" => $_FILES["Hinh"]["name"] ? $_FILES["Hinh"]["name"] : $_POST["old_image"],
                "MaNganh" => $_POST["MaNganh"]
            ];
            move_uploaded_file($_FILES["Hinh"]["tmp_name"], "upload/" . $_FILES["Hinh"]["name"]);
            $this->model->update($data);
            header("Location: index.php?controller=sinhvien&action=index");
            exit();
        } else {
            $student = $this->model->getById($MaSV);
            if (!$student) {
                die(" Không tìm thấy sinh viên với MaSV = " . htmlspecialchars($MaSV));
            }
            include "app/views/sinhvien/update.php";
        }
    }
    

    public function delete($MaSV) {
        $this->model->delete($MaSV);
        header("Location: index.php?controller=sinhvien&action=index");
    }
}
?>
