<?php
class OrderModel extends BaseModel 
{
    const TABLE = "hoadon";

    public function __construct() {
        parent::__construct();
    }

    public function getAllOrder($limit = 8) {
        return $this->getAll(self::TABLE, $limit);
    }

    function getOrder($id) {
        $fields = $this->getColumns(self::TABLE);
        // $idOrder = $temp[0];//temp[0] gia tri dau tien la ma hoa don
        return $this->findByID(self::TABLE,$fields[0],$id);
    }

    public function search($keyword)
    {
        $condition = "* LIKE '%${keyword}%'";
        return $this->getAll(self::TABLE,$condition, 5,"");
    }

    public function insertOrder($data = []) {
        
        //ong nho test lai xem co chay hay ko :))
        $temp = $this->getColumns(self::TABLE); //dua vao 1 cai array de khong can goi ham nhieu lan

        //lay $i = 1 la de bo cai muc ma~ hoa don ra
        for($i = 1 ; $i < count($temp) ; $i++ ){
            $insertData[$temp[$i]] = $data[$temp[$i]];   //them $key va $value vao array $insertData (de cau truc nhu vay moi khong bi trung lap du lieu trong array)
             //                \\   //             \\
            //key cua insertData\\ //value cua $data\\
        }
        return $this->insert(self::TABLE,$insertData);
    }

    public function updateOrder($orderID, $data = []) {
        $temp = $this->getColumns(self::TABLE);
        $id = $temp[0];//temp[0] gia tri dau tien la ma hoa don
        $condition = "$id='${orderID}'";
        for($i = 1 ; $i < count($temp) ; $i++ ){
            $updateData[$temp[$i]] = $data[$temp[$i]];   //them $key va $value vao array $insertData (de cau truc nhu vay moi khong bi trung lap du lieu trong array)
             //                \\   //             \\
            //key cua updateData\\ //value cua $data\\
        }
        return $this->update(self::TABLE,$condition,$updateData);
    }

}