<!-- views/layouts/header.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <style>
        /* Reset và font chữ */
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
            --font-main: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-main);
            line-height: 1.6;
            color: #333;
            background-color: #f5f7fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        nav {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: all 0.3s ease;
            margin: 0.2rem;
            font-weight: 500;
        }

        nav a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .user-info span {
            white-space: nowrap;
        }

        /* Container */
        .container {
            flex: 1;
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
            width: 100%;
        }

        /* Form đăng nhập */
        .login-container {
            max-width: 500px;
            margin: 3rem auto;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-container h1 {
            color: var(--dark-color);
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: border 0.3s;
        }

        .form-group input:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }

        button[type="submit"] {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            transition: background-color 0.3s;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: var(--secondary-color);
        }

        .error-message {
            color: var(--accent-color);
            background-color: rgba(231, 76, 60, 0.1);
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        /* Responsive */
        @media (max-width: 768px) {
            nav {
                flex-direction: column;
                align-items: stretch;
                padding: 1rem;
            }

            nav a {
                display: block;
                margin: 0.25rem 0;
                text-align: center;
            }

            .user-info {
                justify-content: center;
                margin-top: 1rem;
            }

            .container {
                padding: 0 1rem;
                margin: 1rem auto;
            }

            .login-container {
                margin: 1.5rem auto;
                padding: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 1rem;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <div class="nav-links">
                <a href="index.php?controller=home&action=index">Home</a>
                <a href="index.php?controller=employee&action=index">Manage Employees</a>
                <a href="index.php?controller=department&action=index">Manage Departments</a>
            </div>
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="user-info">
                    <span>Xin chào, <?php echo htmlspecialchars($_SESSION['fullname']); ?> (<?php echo htmlspecialchars($_SESSION['role']); ?>)</span>
                    <a href="index.php?controller=auth&action=logout">Đăng xuất</a>
                </div>
            <?php else: ?>
                <div class="user-info">
                    <a href="index.php?controller=auth&action=login">Đăng nhập</a>
                </div>
            <?php endif; ?>
        </nav>
    </header>
    <div class="container">