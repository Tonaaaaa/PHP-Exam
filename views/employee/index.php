<div class="employee-management">
    <div class="header-section">
        <h1>EMPLOYEE MANAGEMENT</h1>
        <a href="index.php?controller=employee&action=add" class="btn btn-primary">Add New Employee</a>
    </div>

    <div class="table-responsive">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Gender</th>
                    <th>Place of Birth</th>
                    <th>Department</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($employees) > 0): ?>
                    <?php foreach ($employees as $employee): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($employee['Ma_NV']); ?></td>
                            <td><?php echo htmlspecialchars($employee['Ten_NV']); ?></td>
                            <td class="gender-icon">
                                <img src="assets/images/<?php echo $employee['Phai'] == 'NU' ? 'female.png' : 'male.png'; ?>"
                                    alt="<?php echo $employee['Phai'] == 'NU' ? 'Female' : 'Male'; ?>"
                                    class="gender-img">
                            </td>
                            <td><?php echo htmlspecialchars($employee['Noi_Sinh']); ?></td>
                            <td><?php echo htmlspecialchars($employee['Ten_Phong']); ?></td>
                            <td class="text-right"><?php echo number_format($employee['Luong']); ?></td>
                            <td class="action-buttons">
                                <a href="index.php?controller=employee&action=edit&ma_nv=<?php echo $employee['Ma_NV']; ?>"
                                    class="btn btn-edit">Edit</a>
                                <a href="index.php?controller=employee&action=delete&ma_nv=<?php echo $employee['Ma_NV']; ?>"
                                    class="btn btn-delete"
                                    onclick="return confirm('Are you sure you want to delete this employee?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center no-data">No employees found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if ($totalPages > 1): ?>
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="index.php?controller=employee&action=index&page=<?php echo ($page - 1); ?>" class="btn btn-pagination">Previous</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="index.php?controller=employee&action=index&page=<?php echo $i; ?>"
                    class="btn btn-pagination <?php echo $i == $page ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <a href="index.php?controller=employee&action=index&page=<?php echo ($page + 1); ?>" class="btn btn-pagination">Next</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<style>
    /* Employee Management Styles */
    .employee-management {
        padding: 2rem;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .header-section h1 {
        color: var(--dark-color);
        font-size: 1.8rem;
        margin: 0;
    }

    /* Table Styles */
    .styled-table {
        width: 100%;
        border-collapse: collapse;
        margin: 1rem 0;
    }

    .styled-table th {
        background-color: var(--primary-color);
        color: white;
        padding: 12px 15px;
        text-align: left;
    }

    .styled-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
    }

    .styled-table tr:hover {
        background-color: rgba(52, 152, 219, 0.05);
    }

    .gender-icon {
        text-align: center;
    }

    .gender-img {
        width: 24px;
        height: 24px;
        object-fit: contain;
    }

    .text-right {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }

    .no-data {
        color: #666;
        padding: 2rem !important;
    }

    /* Button Styles */
    .btn {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s;
        border: none;
        cursor: pointer;
    }

    .btn-primary {
        background-color: var(--primary-color);
        color: white;
    }

    .btn-primary:hover {
        background-color: var(--secondary-color);
    }

    .btn-edit {
        background-color: var(--warning-color);
        color: white;
        margin-right: 8px;
    }

    .btn-edit:hover {
        background-color: #e67e22;
    }

    .btn-delete {
        background-color: var(--accent-color);
        color: white;
    }

    .btn-delete:hover {
        background-color: #c0392b;
    }

    .action-buttons {
        white-space: nowrap;
    }

    /* Pagination Styles */
    .pagination {
        margin-top: 2rem;
        display: flex;
        justify-content: center;
        gap: 5px;
        flex-wrap: wrap;
    }

    .btn-pagination {
        background-color: var(--primary-color);
        color: white;
        min-width: 35px;
        text-align: center;
    }

    .btn-pagination:hover {
        background-color: var(--secondary-color);
    }

    .btn-pagination.active {
        background-color: var(--accent-color);
        cursor: default;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .header-section {
            flex-direction: column;
            align-items: flex-start;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .styled-table {
            font-size: 0.9rem;
        }

        .styled-table th,
        .styled-table td {
            padding: 8px 10px;
        }

        .btn {
            padding: 6px 12px;
            font-size: 0.8rem;
        }

        .pagination {
            gap: 3px;
        }

        .btn-pagination {
            padding: 6px 10px;
            font-size: 0.8rem;
        }
    }
</style>