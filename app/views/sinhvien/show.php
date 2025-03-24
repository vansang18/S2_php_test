<?php require_once __DIR__ . '/../shares/header.php'; ?>

<h2>Chi tiết Sinh Viên</h2>

<?php 
echo "<pre>";
print_r($student);
echo "</pre>";
?>

<?php if ($student): ?>
    <p><strong>Mã SV:</strong> <?= htmlspecialchars($student['MaSV']) ?></p>
    <p><strong>Họ tên:</strong> <?= htmlspecialchars($student['HoTen']) ?></p>
    <p><strong>Giới tính:</strong> <?= htmlspecialchars($student['GioiTinh']) ?></p>
    <p><strong>Ngày sinh:</strong> <?= htmlspecialchars($student['NgaySinh']) ?></p>
    <p><strong>Hình:</strong> <img src="/upload/<?= htmlspecialchars($student['Hinh']) ?>" width="100"></p>
    <p><strong>Ngành học:</strong> <?= htmlspecialchars($student['MaNganh']) ?></p>
<?php else: ?>
    <p style="color: red;">Lỗi: Không tìm thấy sinh viên có mã số.</p>
<?php endif; ?>

<a href="index.php?controller=sinhvien&action=index">Quay lại</a>

<?php require_once __DIR__ . '/../shares/footer.php'; ?>
