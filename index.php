<?php
require_once 'config/database.php';

// Bắt đầu session (chỉ gọi một lần ở đây)
session_start();

// Lấy controller và action từ URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Bỏ qua kiểm tra đăng nhập nếu đang truy cập trang đăng nhập hoặc đăng xuất
if ($controller != 'auth' || ($action != 'login' && $action != 'logout')) {
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?controller=auth&action=login");
        exit();
    }
}

// Route đến controller phù hợp
if ($controller == 'home') {
    require_once 'controllers/HomeController.php';
    $controller = new HomeController();
} elseif ($controller == 'employee') {
    require_once 'controllers/EmployeeController.php';
    $controller = new EmployeeController();
} elseif ($controller == 'department') {
    require_once 'controllers/DepartmentController.php';
    $controller = new DepartmentController();
} elseif ($controller == 'auth') {
    require_once 'controllers/AuthController.php';
    $controller = new AuthController();
} else {
    die("Controller not found");
}

// Gọi action tương ứng
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    die("Action not found");
}
