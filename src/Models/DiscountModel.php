<?php
class DiscountModel extends BaseModel 
{
    const TABLE = "Khuyenmai";

    public function __construct() {
        parent::__construct();
    }

    public function getAllDiscount() {
        return $this->getAll(self::TABLE);
    }

    // function getDiscount($id) {
    //     $temp = $this->getColumns(self::TABLE);
    //     $idDiscount = $temp[0];//temp[0] gia tri dau tien la ma khuyen mai
    //     return $this->findByID(self::TABLE,$idDiscount,$id);
    // }

    // public function search($keyword)
    // {
    //     $condition = "* LIKE '%${keyword}%'";
    //     return $this->getAll(self::TABLE,$condition, 5,"");
    // }

    public function insertDiscount($data = []) {
        $fields = $this->getColumns(self::TABLE); //dua vao 1 cai array de khong can goi ham nhieu lan
        $fields = array_flip($fields); //Đổi value thành key

        foreach($fields as $key => $value) {
            $fields[$key] = isset($data[$key]) && !empty($data[$key]) ? $data[$key] : " ";
        }
        return $this->insert(self::TABLE,$fields);
    }

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

    function countTotalProducts() {
        $PK = $this->getColumns(self::TABLE);
        return $this->countRecords(self::TABLE,$PK[0]);
    }


}