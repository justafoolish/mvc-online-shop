<?php
class DiscountModel extends BaseModel 
{
    const TABLE = "Khuyenmai";

    public function __construct() {
        parent::__construct();
    }
    //4 tham số getAllRecords: $table, $select = ['*'], $condition = [], $limit = [],$groupBys = [], $orderBys = []
    //Lấy danh sách mã khuyến mãi
    public function getAllDiscount() {
        return $this->getAllRecords(self::TABLE);
    }

    //Lấy thông tin 1 mã khuyến mãi
    function getDiscount($condition = []) 
    {
        return $this->getAllRecords(self::TABLE,["*"],$condition,[1]);
    }

    //Tạo mới một mã khuyễn mãi
    public function insertDiscount($data = []) {
        return $this->insert(self::TABLE,$data);
    }
}