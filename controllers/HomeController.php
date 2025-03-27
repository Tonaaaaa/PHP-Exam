
<?php
require_once 'models/Employee.php';
require_once 'models/Department.php';

class HomeController
{
    private $employee;
    private $department;

    public function __construct()
    {
        $database = Database::getInstance();
        $db = $database->getConnection();
        $this->employee = new Employee($db);
        $this->department = new Department($db);
    }

    // Display the home page
    public function index()
    {
        // Lấy số lượng nhân viên và phòng ban
        $employeeCount = count($this->employee->getAll());
        $departmentCount = count($this->department->getAll());

        // Truyền biến vào view
        include 'views/layouts/header.php';
        include 'views/home/index.php';
        include 'views/layouts/footer.php';
    }
}
?>