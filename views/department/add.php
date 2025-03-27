<div class="form-container">
    <h1>Add New Department</h1>

    <form method="POST" action="" class="department-form">
        <div class="form-group">
            <label for="ma_phong">Department ID</label>
            <input type="text" id="ma_phong" name="ma_phong" required
                placeholder="Enter department ID">
        </div>

        <div class="form-group">
            <label for="ten_phong">Department Name</label>
            <input type="text" id="ten_phong" name="ten_phong" required
                placeholder="Enter department name">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Add Department
            </button>
            <a href="index.php?controller=department&action=index" class="btn btn-cancel">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>

<style>
    .form-container {
        max-width: 600px;
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
        border-bottom: 2px solid var(--primary-color);
        padding-bottom: 0.5rem;
    }

    .department-form {
        display: flex;
        flex-direction: column;
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

    .form-group input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 1rem;
    }

    .form-group input:focus {
        border-color: var(--primary-color);
        outline: none;
        box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
    }

    .form-actions {
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