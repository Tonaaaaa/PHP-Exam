<?php
require_once 'config/database.php';

class Department
{
    private $db;

    public function __construct($db) // Nhận kết nối từ tham số
    {
        $this->db = $db;
    }

    // Get all departments
    public function getAll()
    {
        $sql = "SELECT * FROM PHONGBAN";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Get department by ID
    public function getById($ma_phong)
    {
        $stmt = $this->db->prepare("SELECT * FROM PHONGBAN WHERE Ma_Phong = ?");
        $stmt->bind_param("s", $ma_phong);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Create a new department
    public function create($ma_phong, $ten_phong)
    {
        $stmt = $this->db->prepare("INSERT INTO PHONGBAN (Ma_Phong, Ten_Phong) VALUES (?, ?)");
        $stmt->bind_param("ss", $ma_phong, $ten_phong);
        return $stmt->execute();
    }

    // Update a department
    public function update($ma_phong, $ten_phong)
    {
        $stmt = $this->db->prepare("UPDATE PHONGBAN SET Ten_Phong = ? WHERE Ma_Phong = ?");
        $stmt->bind_param("ss", $ten_phong, $ma_phong);
        return $stmt->execute();
    }

    // Delete a department
    public function delete($ma_phong)
    {
        $stmt = $this->db->prepare("DELETE FROM PHONGBAN WHERE Ma_Phong = ?");
        $stmt->bind_param("s", $ma_phong);
        return $stmt->execute();
    }
}
