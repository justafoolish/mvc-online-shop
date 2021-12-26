<?php
class EmployeeModel extends BaseModel 
{
    const TABLE = "nhanvien";

    public function __construct() {
        parent::__construct();
    }

    //Lấy danh sách nhân viên
    public function getAllEmployee($condition = []) {
        return $this->getAllRecords(self::TABLE,["*"] ,$condition);
    }

    //Lấy thông tin 1 nhân viên
    function getEmployee($condition = []) {
        return $this->getAllRecords(self::TABLE,["*"], $condition, [1]);
    }

    //Tạo mới 1 nhân viên
    function insertEmployee($data = [])
    {
        return $this->insert(self::TABLE,$data);
    }

}