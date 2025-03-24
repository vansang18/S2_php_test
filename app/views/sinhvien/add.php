<?php require_once __DIR__ . '/../shares/header.php'; ?>
<h2>Thêm Sinh Viên</h2>
<form action="index.php?controller=sinhvien&action=create" method="POST" enctype="multipart/form-data">
    <label>Mã SV:</label>
    <input type="text" name="MaSV" required><br>

    <label>Họ tên:</label>
    <input type="text" name="HoTen" required><br>

    <label>Giới tính:</label>
    <select name="GioiTinh">
        <option value="Nam">Nam</option>
        <option value="Nữ">Nữ</option>
    </select><br>

    <label>Ngày sinh:</label>
    <input type="date" name="NgaySinh" required><br>

    <label>Hình:</label>
    <input type="file" name="Hinh" required><br>

    <label>Ngành học:</label>
    <input type="text" name="MaNganh" required><br>

    <button type="submit">Thêm</button>
</form>
<a href="index.php?controller=sinhvien&action=index">Quay lại</a>
<?php require_once __DIR__ . '/../shares/footer.php'; ?>
