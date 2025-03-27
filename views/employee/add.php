<div class="form-container">
    <h1>Add New Employee</h1>

    <form method="POST" action="" class="employee-form">
        <input type="hidden" name="ma_nv" value="<?php echo htmlspecialchars($newEmployeeId); ?>">

        <div class="form-group">
            <label for="ten_nv">Employee Name</label>
            <input type="text" id="ten_nv" name="ten_nv" required placeholder="Enter employee name">
        </div>

        <div class="form-group">
            <label for="phai">Gender</label>
            <select id="phai" name="phai" required>
                <option value="NAM">Male</option>
                <option value="NU">Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="noi_sinh">Place of Birth</label>
            <input type="text" id="noi_sinh" name="noi_sinh" placeholder="Enter place of birth">
        </div>

        <div class="form-group">
            <label for="ma_phong">Department</label>
            <select id="ma_phong" name="ma_phong">
                <option value="">-- Select Department --</option>
                <?php foreach ($departments as $department): ?>
                    <option value="<?php echo htmlspecialchars($department['Ma_Phong']); ?>">
                        <?php echo htmlspecialchars($department['Ten_Phong']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="luong">Salary</label>
            <input type="number" id="luong" name="luong" required placeholder="Enter salary">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Add Employee</button>
            <a href="index.php?controller=employee&action=index" class="btn btn-cancel">Cancel</a>
        </div>
    </form>
</div>

<style>
    .form-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 2rem;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .form-container h1 {
        color: var(--dark-color);
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
    }

    .employee-form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: var(--dark-color);
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 1rem;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: var(--primary-color);
        outline: none;
        box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
    }

    .form-actions {
        grid-column: span 2;
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 1rem;
    }

    .btn-cancel {
        background-color: #95a5a6;
        color: white;
    }

    .btn-cancel:hover {
        background-color: #7f8c8d;
    }

    @media (max-width: 768px) {
        .employee-form {
            grid-template-columns: 1fr;
        }

        .form-actions {
            grid-column: span 1;
        }

        .form-container {
            padding: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .form-container {
            padding: 1rem;
        }

        .form-actions {
            flex-direction: column;
        }

        .form-actions .btn {
            width: 100%;
        }
    }
</style>