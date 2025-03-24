<?php
require_once "app/controllers/SinhVienController.php";
require_once "app/controllers/HocPhanController.php";
require_once "app/controllers/AuthController.php";

$controllerName = $_GET["controller"] ?? "sinhvien"; // Controller mặc định
$action = $_GET["action"] ?? "index";
$MaSV = $_GET["MaSV"] ?? null;

// Khởi tạo controller dựa trên tham số "controller"
switch ($controllerName) {
    case "sinhvien":
        $controller = new SinhVienController();
        break;
    case "hocphan":
        $controller = new HocPhanController();
        break;
    case "auth":
        $controller = new AuthController();
        break;
    default:
        die("404 Not Found: Controller không hợp lệ.");
}

// Xử lý action
if (method_exists($controller, $action)) {
    $controller->$action($MaSV);
} else {
    die("404 Not Found: Action không hợp lệ.");
}
?>


