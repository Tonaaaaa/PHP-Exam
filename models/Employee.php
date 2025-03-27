<?php
require_once 'config/database.php';

class Employee
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Get all employees with pagination
    public function getAll($page = 1, $perPage = 8)
    {
        $offset = ($page - 1) * $perPage;

        $sql = "SELECT NHANVIEN.*, PHONGBAN.Ten_Phong 
                FROM NHANVIEN 
                LEFT JOIN PHONGBAN ON NHANVIEN.Ma_Phong = PHONGBAN.Ma_Phong 
                LIMIT ? OFFSET ?";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ii", $perPage, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Get total number of employees
    public function getTotalCount()
    {
        $sql = "SELECT COUNT(*) as total FROM NHANVIEN";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    // Get employee by ID
    public function getById($ma_nv)
    {
        $stmt = $this->db->prepare("SELECT * FROM NHANVIEN WHERE Ma_NV = ?");
        $stmt->bind_param("s", $ma_nv);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Create a new employee
    public function create($ma_nv, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong)
    {
        $stmt = $this->db->prepare("INSERT INTO NHANVIEN (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $ma_nv, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong);
        return $stmt->execute();
    }

    // Update an employee
    public function update($ma_nv, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong)
    {
        $stmt = $this->db->prepare("UPDATE NHANVIEN SET Ten_NV = ?, Phai = ?, Noi_Sinh = ?, Ma_Phong = ?, Luong = ? WHERE Ma_NV = ?");
        $stmt->bind_param("ssssis", $ten_nv, $phai, $noi_sinh, $ma_phong, $luong, $ma_nv);
        return $stmt->execute();
    }

    // Delete an employee
    public function delete($ma_nv)
    {
        $stmt = $this->db->prepare("DELETE FROM NHANVIEN WHERE Ma_NV = ?");
        $stmt->bind_param("s", $ma_nv);
        return $stmt->execute();
    }
}
