
<?php
require_once 'models/User.php';

class AuthController
{
    private $db;
    private $user;

    public function __construct()
    {
        $database = Database::getInstance(); // Sử dụng Singleton
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userData = $this->user->login($username, $password);

            if ($userData) {
                $_SESSION['user_id'] = $userData['Id'];
                $_SESSION['username'] = $userData['username'];
                $_SESSION['role'] = $userData['role'];
                $_SESSION['fullname'] = $userData['fullname'];

                if ($userData['role'] == 'admin') {
                    header("Location: index.php?controller=employee&action=index");
                } else {
                    header("Location: index.php?controller=home&action=index");
                }
                exit();
            } else {
                $error = "Tài khoản hoặc mật khẩu không đúng";
                include 'views/layouts/header.php';
                include 'views/auth/login.php';
                include 'views/layouts/footer.php';
            }
        } else {
            include 'views/layouts/header.php';
            include 'views/auth/login.php';
            include 'views/layouts/footer.php';
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: index.php?controller=auth&action=login");
        exit();
    }
}
?>