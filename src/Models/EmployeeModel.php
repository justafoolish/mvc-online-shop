<?php
class EmployeeModel extends BaseModel 
{
    const TABLE = "nhanvien";

    public function __construct() {
        parent::__construct();
    }

    public function getAllEmployee($condition = []) {
        return $this->getAllRecords(self::TABLE,["*"] ,$condition);
    }

    function getEmployee($condition = []) {
        return $this->getAllRecords(self::TABLE,["*"], $condition, [1]);
    }

    function insertEmployee($data = [])
    {
        return $this->insert(self::TABLE,$data);
    }

}