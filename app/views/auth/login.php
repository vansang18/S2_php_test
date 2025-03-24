<h2>Đăng nhập</h2>
<?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>

<form action="index.php?controller=auth&action=login" method="POST">
    <label for="MaSV">Mã số sinh viên:</label>
    <input type="text" name="MaSV" required>
    <button type="submit">Đăng nhập</button>
</form>
