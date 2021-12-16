<?php
class DiscountModel extends BaseModel 
{
    const TABLE = "Khuyenmai";

    public function __construct() {
        parent::__construct();
    }
    //4 tham số getAllRecords: $table, $select = ['*'], $condition = [], $limit = [],$groupBys = [], $orderBys = []
    public function getAllDiscount() {
        return $this->getAllRecords(self::TABLE);
    }

    function getDiscount($condition = []) 
    {
        return $this->getAllRecords(self::TABLE,["*"],$condition,[1]);
    }

    public function insertDiscount($data = []) {
        return $this->insert(self::TABLE,$data);
    }
}