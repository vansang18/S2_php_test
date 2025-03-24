<?php require_once __DIR__ . '/../shares/header.php'; ?>

<h2>Cập nhật Sinh Viên</h2>

<?php if (!$student): ?>
    <p style="color: red;">Không tìm thấy sinh viên!</p>
    <a href="index.php?controller=sinhvien&action=index">Quay lại</a>
<?php else: ?>
    <form action="index.php?controller=sinhvien&action=update&MaSV=<?= $student['MaSV'] ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="old_image" value="<?= isset($student['Hinh']) ? $student['Hinh'] : '' ?>">

        <label>Mã SV:</label>
        <input type="text" name="MaSV" value="<?= isset($student['MaSV']) ? $student['MaSV'] : '' ?>" readonly><br>

        <label>Họ tên:</label>
        <input type="text" name="HoTen" value="<?= isset($student['HoTen']) ? $student['HoTen'] : '' ?>" required><br>

        <label>Giới tính:</label>
        <select name="GioiTinh">
            <option value="Nam" <?= isset($student['GioiTinh']) && $student['GioiTinh'] == "Nam" ? "selected" : "" ?>>Nam</option>
            <option value="Nữ" <?= isset($student['GioiTinh']) && $student['GioiTinh'] == "Nữ" ? "selected" : "" ?>>Nữ</option>
        </select><br>

        <label>Ngày sinh:</label>
        <input type="date" name="NgaySinh" value="<?= isset($student['NgaySinh']) ? $student['NgaySinh'] : '' ?>" required><br>

        <label>Hình:</label>
        <input type="file" name="Hinh"><br>
        <?php if (!empty($student['Hinh'])): ?>
            <img src="/upload/<?= $student['Hinh'] ?>" width="100"><br>
        <?php endif; ?>

        <label>Ngành học:</label>
        <input type="text" name="MaNganh" value="<?= isset($student['MaNganh']) ? $student['MaNganh'] : '' ?>" required><br>

        <button type="submit">Cập nhật</button>
    </form>
<?php endif; ?>

<a href="index.php?controller=sinhvien&action=index">Quay lại</a>

<?php require_once __DIR__ . '/../shares/footer.php'; ?>
