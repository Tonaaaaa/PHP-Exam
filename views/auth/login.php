<!-- views/auth/login.php -->
<div class="login-container">
    <h1>Đăng nhập hệ thống</h1>
    <?php if (isset($error)): ?>
        <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    <form method="POST" action="index.php?controller=auth&action=login">
        <div class="form-group">
            <label for="username">Tài khoản:</label>
            <input type="text" id="username" name="username" required placeholder="Nhập tên đăng nhập">
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required placeholder="Nhập mật khẩu">
        </div>
        <div class="form-group">
            <button type="submit">Đăng nhập</button>
        </div>
    </form>
</div>