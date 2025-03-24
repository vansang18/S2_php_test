<?php require_once __DIR__ . '/../shares/header.php'; ?>
<h2>Danh sách Sinh Viên</h2>
<a href="index.php?controller=sinhvien&action=create">Thêm mới</a>
<table border="1">
    <tr>
        <th>Mã SV</th>
        <th>Họ tên</th>
        <th>Giới tính</th>
        <th>Ngày sinh</th>
        <th>Hình</th>
        <th>Ngành học</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($students as $sv) : ?>
    <tr>
        <td><?= $sv['MaSV'] ?></td>
        <td><?= $sv['HoTen'] ?></td>
        <td><?= $sv['GioiTinh'] ?></td>
        <td><?= $sv['NgaySinh'] ?></td>
        <td><img src="upload/<?= $sv['Hinh'] ?>" width="50"></td>
        <td><?= $sv['MaNganh'] ?></td>
        <td>
            <a href="index.php?controller=sinhvien&action=show&MaSV=<?= $sv['MaSV'] ?>">Xem</a> |
            <a href="index.php?controller=sinhvien&action=update&MaSV=<?= $sv['MaSV'] ?>">Sửa</a> |
            <a href="index.php?controller=sinhvien&action=delete&MaSV=<?= $sv['MaSV'] ?>" onclick="return confirm('Xóa sinh viên này?')">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php require_once __DIR__ . '/../shares/footer.php'; ?>
