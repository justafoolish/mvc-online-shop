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

    
    
    // function countTotalProducts() {
    //     $PK = $this->getColumns(self::TABLE);
    //     return $this->countRecords(self::TABLE,$PK[0]);
    // }
    // public function searchDiscount($code)
    // {
    //     $fields = $this->getColumns(self::TABLE);
    //     $condition = "$fields[0]='$code'";
    //     $discount = $this->getAll(self::TABLE,$condition);
    //     return $discount ? $discount[0] : [];
    // }
    // public function updateDiscount($discountID, $data = []) {
    //     $temp = $this->getColumns(self::TABLE);
    //     $id = $temp[0];//temp[0] gia tri dau tien la ma khuyen mai
    //     $condition = "$id='${discountID}'";
    //     for($i = 1 ; $i < count($temp) ; $i++ ){
    //         $updateData[$temp[$i]] = $data[$temp[$i]];   //them $key va $value vao array $insertData (de cau truc nhu vay moi khong bi trung lap du lieu trong array)
    //          //                \\   //             \\
    //         //key cua updateData\\ //value cua $data\\
    //     }
    //     return $this->update(self::TABLE,$condition,$updateData);
    // }
}