<?php
class OrderDetailModel extends BaseModel 
{
    const TABLE = "chitiethoadon";

    public function __construct() {
        parent::__construct();
    }

    public function getAllOrderDetail($id = "") {
        $fields = $this->getColumns(self::TABLE);
        $condition = $id ? "$fields[0]='$id'" : 1;
        return $this->getAll(self::TABLE,$condition);
    }

    function getOrderDetailByID($id) {
        $fields = $this->getColumns(self::TABLE);
        return $this->findByID(self::TABLE,$fields[0],$id);
    }

    public function search($keyword)
    {
        $condition = "* LIKE '%${keyword}%'";
        return $this->getAll(self::TABLE,$condition, 5,"");
    }

    public function insertOrderDetail($data = []) {
        
        //ong nho test lai xem co chay hay ko :))
        $temp = $this->getColumns(self::TABLE); //dua vao 1 cai array de khong can goi ham nhieu lan

        // ma chi tiet hoa don co the cung 1 ma nen phai nhap vao
        for($i = 0 ; $i < count($temp) ; $i++ ){
            $insertData[$temp[$i]] = $data[$temp[$i]];   //them $key va $value vao array $insertData (de cau truc nhu vay moi khong bi trung lap du lieu trong array)
             //                \\   //             \\
            //key cua insertData\\ //value cua $data\\
        }
        return $this->insert(self::TABLE,$insertData);
    }

    public function updateOrderDetail($orderDetailID, $data = []) {
        $temp = $this->getColumns(self::TABLE);
        $id = $temp[0];//temp[0] gia tri dau tien la ma chi tiet hoa don
        $condition = "$id='${orderDetailID}'";
        for($i = 1 ; $i < count($temp) ; $i++ ){
            $updateData[$temp[$i]] = $data[$temp[$i]];   //them $key va $value vao array $insertData (de cau truc nhu vay moi khong bi trung lap du lieu trong array)
             //                \\   //             \\
            //key cua updateData\\ //value cua $data\\
        }
        return $this->update(self::TABLE,$condition,$updateData);
    }

}