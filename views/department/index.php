<div class="department-management">
    <div class="header-section">
        <h1>DEPARTMENT MANAGEMENT</h1>
        <a href="index.php?controller=department&action=add" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Department
        </a>
    </div>

    <div class="table-responsive">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Department ID</th>
                    <th>Department Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($departments) > 0): ?>
                    <?php foreach ($departments as $department): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($department['Ma_Phong']); ?></td>
                            <td><?php echo htmlspecialchars($department['Ten_Phong']); ?></td>
                            <td class="action-buttons">
                                <a href="index.php?controller=department&action=edit&ma_phong=<?php echo $department['Ma_Phong']; ?>"
                                    class="btn btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="index.php?controller=department&action=delete&ma_phong=<?php echo $department['Ma_Phong']; ?>"
                                    class="btn btn-delete"
                                    onclick="return confirm('Are you sure you want to delete this department?')">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center no-data">
                            <i class="fas fa-info-circle"></i> No departments found
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<style>
    /* Department Management Styles */
    .department-management {
        padding: 2rem;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin: 1rem 0;
    }

    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
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

    .text-center {
        text-align: center;
    }

    .no-data {
        color: #666;
        padding: 2rem !important;
    }

    .no-data i {
        margin-right: 8px;
    }

    /* Button Styles */
    .btn {
        display: inline-flex;
        align-items: center;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s;
        border: none;
        cursor: pointer;
        font-size: 0.9rem;
        gap: 8px;
    }

    .btn i {
        font-size: 0.9em;
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

    /* Responsive Table */
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
    }

    @media (max-width: 480px) {
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .btn-edit {
            margin-right: 0;
        }
    }
</style>