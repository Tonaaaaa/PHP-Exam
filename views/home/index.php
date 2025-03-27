<div class="home-container">
    <div class="welcome-section">
        <h1>Welcome to Employee Management System</h1>
        <p class="subtitle">Streamline your workforce management with our comprehensive solution</p>
    </div>

    <div class="dashboard">
        <div class="dashboard-card employee-card">
            <div class="card-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-content">
                <h3>Total Employees</h3>
                <p class="count"><?php echo htmlspecialchars($employeeCount); ?></p>
                <a href="index.php?controller=employee&action=index" class="btn btn-view">
                    <i class="fas fa-arrow-right"></i> View Employees
                </a>
            </div>
        </div>

        <div class="dashboard-card department-card">
            <div class="card-icon">
                <i class="fas fa-building"></i>
            </div>
            <div class="card-content">
                <h3>Total Departments</h3>
                <p class="count"><?php echo htmlspecialchars($departmentCount); ?></p>
                <a href="index.php?controller=department&action=index" class="btn btn-view">
                    <i class="fas fa-arrow-right"></i> View Departments
                </a>
            </div>
        </div>
    </div>

    <div class="quick-actions">
        <h2>Quick Actions</h2>
        <div class="action-buttons">
            <a href="index.php?controller=employee&action=add" class="btn btn-action">
                <i class="fas fa-user-plus"></i> Add Employee
            </a>
            <a href="index.php?controller=department&action=add" class="btn btn-action">
                <i class="fas fa-plus-circle"></i> Add Department
            </a>
        </div>
    </div>
</div>

<style>
    /* Home Page Styles */
    .home-container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 2rem;
    }

    .welcome-section {
        text-align: center;
        margin-bottom: 3rem;
    }

    .welcome-section h1 {
        color: var(--dark-color);
        font-size: 2.2rem;
        margin-bottom: 0.5rem;
    }

    .subtitle {
        color: #666;
        font-size: 1.1rem;
        max-width: 700px;
        margin: 0 auto;
    }

    /* Dashboard Cards */
    .dashboard {
        display: flex;
        justify-content: center;
        gap: 2rem;
        flex-wrap: wrap;
        margin-bottom: 3rem;
    }

    .dashboard-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        width: 280px;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .card-icon {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 1.5rem;
        text-align: center;
        font-size: 2rem;
    }

    .department-card .card-icon {
        background: linear-gradient(135deg, #9b59b6, #8e44ad);
    }

    .card-content {
        padding: 1.5rem;
        text-align: center;
    }

    .card-content h3 {
        color: var(--dark-color);
        margin: 0 0 1rem;
        font-size: 1.2rem;
    }

    .count {
        font-size: 2.5rem;
        font-weight: bold;
        color: var(--primary-color);
        margin: 0 0 1.5rem;
    }

    .department-card .count {
        color: #9b59b6;
    }

    .btn-view {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 0.75rem 1.5rem;
        background-color: var(--primary-color);
        color: white;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 500;
        transition: background-color 0.3s;
    }

    .department-card .btn-view {
        background-color: #9b59b6;
    }

    .btn-view:hover {
        background-color: var(--secondary-color);
    }

    .department-card .btn-view:hover {
        background-color: #8e44ad;
    }

    /* Quick Actions */
    .quick-actions {
        text-align: center;
        margin-top: 2rem;
    }

    .quick-actions h2 {
        color: var(--dark-color);
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 0.75rem 1.5rem;
        background-color: white;
        color: var(--dark-color);
        border: 2px solid var(--primary-color);
        border-radius: 50px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s;
    }

    .btn-action:hover {
        background-color: var(--primary-color);
        color: white;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .home-container {
            padding: 0 1rem;
        }

        .welcome-section h1 {
            font-size: 1.8rem;
        }

        .dashboard {
            gap: 1.5rem;
        }

        .dashboard-card {
            width: 100%;
            max-width: 350px;
        }

        .action-buttons {
            flex-direction: column;
            align-items: center;
        }

        .btn-action {
            width: 100%;
            max-width: 250px;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .welcome-section h1 {
            font-size: 1.5rem;
        }

        .subtitle {
            font-size: 1rem;
        }

        .count {
            font-size: 2rem;
        }
    }
</style>