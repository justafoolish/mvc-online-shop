<?php
class CustomerModel extends BaseModel 
{
    const TABLE = "khachhang";

    public function __construct() {
        parent::__construct();
    }

    public function getAllCustomer($limit = []) {
        return $this->getAllRecords(self::TABLE,["*"],[],$limit);
    }

    function getCustomerDetail($condition = []) {
        return $this->getAllRecords(self::TABLE,["*"],$condition,[1]);
    }

    public function insertCustomer($data = []) {
        return $this->insert(self::TABLE,$data);
    }

    function totalCustomer()
    {
        $resultColumn = "MaKhachHang";
        return $this->getAllRecords(self::TABLE,["count($resultColumn) as $resultColumn"],[],[1])[$resultColumn];
    }  
}