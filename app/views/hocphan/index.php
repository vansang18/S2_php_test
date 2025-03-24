<?php require_once __DIR__ . '/../shares/header.php'; ?>

<h2>Danh sách Học Phần</h2>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Mã HP</th>
            <th>Tên Học Phần</th>
            <th>Số Tín Chỉ</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($hocphans as $hocphan): ?>
        <tr>
            <td><?= htmlspecialchars($hocphan["MaHP"]) ?></td>
            <td><?= htmlspecialchars($hocphan["TenHP"]) ?></td>
            <td><?= htmlspecialchars($hocphan["SoTinChi"]) ?></td>
            <td>
                <form action="index.php?controller=hocphan&action=dangKy" method="post">
                    <input type="hidden" name="MaHP" value="<?= htmlspecialchars($hocphan["MaHP"]) ?>">
                    <button type="submit">Đăng ký</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php">Quay lại</a>

<?php require_once __DIR__ . '/../shares/footer.php'; ?>
