

<?php
require_once 'models/Department.php';

class DepartmentController
{
    private $department;

    public function __construct()
    {
        // Kiểm tra đăng nhập
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $database = Database::getInstance(); // Sử dụng Singleton
        $db = $database->getConnection();
        $this->department = new Department($db); // Truyền kết nối vào Department
    }

    // Display list of departments
    public function index()
    {
        $departments = $this->department->getAll();
        include 'views/layouts/header.php';
        include 'views/department/index.php';
        include 'views/layouts/footer.php';
    }

    // Add a new department
    public function add()
    {
        if ($_SESSION['role'] != 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ma_phong = $_POST['ma_phong'];
            $ten_phong = $_POST['ten_phong'];
            if ($this->department->create($ma_phong, $ten_phong)) {
                header("Location: index.php?controller=department&action=index");
                exit();
            } else {
                echo "Error adding department";
            }
        }
        include 'views/layouts/header.php';
        include 'views/department/add.php';
        include 'views/layouts/footer.php';
    }

    // Edit a department
    public function edit()
    {
        if ($_SESSION['role'] != 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }
        $ma_phong = $_GET['ma_phong'];
        $department = $this->department->getById($ma_phong);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_phong = $_POST['ten_phong'];
            if ($this->department->update($ma_phong, $ten_phong)) {
                header("Location: index.php?controller=department&action=index");
                exit();
            } else {
                echo "Error updating department";
            }
        }
        include 'views/layouts/header.php';
        include 'views/department/edit.php';
        include 'views/layouts/footer.php';
    }

    // Delete a department
    public function delete()
    {
        if ($_SESSION['role'] != 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }
        $ma_phong = $_GET['ma_phong'];
        if ($this->department->delete($ma_phong)) {
            header("Location: index.php?controller=department&action=index");
            exit();
        } else {
            echo "Error deleting department";
        }
    }
}
?>