<?php
require_once 'models/Employee.php';
require_once 'models/Department.php';

class EmployeeController
{
    private $employee;
    private $department;

    public function __construct()
    {
        // Kiểm tra đăng nhập và vai trò admin
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $database = Database::getInstance();
        $db = $database->getConnection();
        $this->employee = new Employee($db);
        $this->department = new Department($db);
    }
    private function generateEmployeeId()
    {
        $employees = $this->employee->getAll();
        if (empty($employees)) {
            return 'A01';
        }

        $lastEmployee = end($employees);
        $lastId = $lastEmployee['Ma_NV'];
        $letter = substr($lastId, 0, 1);
        $number = (int) substr($lastId, 1);

        if ($number >= 4) {
            $letter = chr(ord($letter) + 1);
            $number = 1;
        } else {
            $number++;
        }

        $number = str_pad($number, 2, '0', STR_PAD_LEFT);
        return $letter . $number;
    }

    // Display list of employees with pagination
    public function index()
    {
        $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
        $perPage = 8;
        
        $employees = $this->employee->getAll($page, $perPage);
        $totalEmployees = $this->employee->getTotalCount();
        $totalPages = ceil($totalEmployees / $perPage);

        include 'views/layouts/header.php';
        include 'views/employee/index.php';
        include 'views/layouts/footer.php';
    }

    // Add a new employee
    public function add()
    {
        $departments = $this->department->getAll();
        $newEmployeeId = $this->generateEmployeeId();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ma_nv = $_POST['ma_nv'];
            $ten_nv = $_POST['ten_nv'];
            $phai = $_POST['phai'];
            $noi_sinh = $_POST['noi_sinh'];
            $ma_phong = $_POST['ma_phong'];
            $luong = $_POST['luong'];

            if ($this->employee->create($ma_nv, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong)) {
                header("Location: index.php?controller=employee&action=index");
                exit();
            } else {
                echo "Error adding employee";
            }
        }
        include 'views/layouts/header.php';
        include 'views/employee/add.php';
        include 'views/layouts/footer.php';
    }

    // Edit an employee
    public function edit()
    {
        $ma_nv = $_GET['ma_nv'];
        $employee = $this->employee->getById($ma_nv);
        $departments = $this->department->getAll();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_nv = $_POST['ten_nv'];
            $phai = $_POST['phai'];
            $noi_sinh = $_POST['noi_sinh'];
            $ma_phong = $_POST['ma_phong'];
            $luong = $_POST['luong'];

            if ($this->employee->update($ma_nv, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong)) {
                header("Location: index.php?controller=employee&action=index");
                exit();
            } else {
                echo "Error updating employee";
            }
        }
        include 'views/layouts/header.php';
        include 'views/employee/edit.php';
        include 'views/layouts/footer.php';
    }

    // Delete an employee
    public function delete()
    {
        $ma_nv = $_GET['ma_nv'];
        if ($this->employee->delete($ma_nv)) {
            header("Location: index.php?controller=employee&action=index");
            exit();
        } else {
            echo "Error deleting employee";
        }
    }
}