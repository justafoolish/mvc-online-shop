<?php
class OrderDetailModel extends BaseModel 
{
    const TABLE = "chitiethoadon";

    public function __construct() {
        parent::__construct();
    }

    public function getAllOrderDetail($id = "") {
        $joinTable = "sanpham";
        $fields = $this->getColumns($joinTable);
        $fieldsOrder = $this->getColumns(self::TABLE);
        $condition = $id ? "$fieldsOrder[0]='$id' AND ".self::TABLE.".$fields[0]=$joinTable.$fields[0]" : 1;
        return $this->getAll(self::TABLE.", sanpham",$condition);
    }

    public function insertOrderDetail($data = []) {
        return $this->insert(self::TABLE,$data);
    }

    
    // public function search($keyword)
    // {
    //     $condition = "* LIKE '%${keyword}%'";
    //     return $this->getAll(self::TABLE,$condition, 5,"");
    // }
        //Insert order detail old version
        // $fields = $this->getColumns(self::TABLE); //dua vao 1 cai array de khong can goi ham nhieu lan
        // $fields = array_flip($fields); //Đổi value thành key

        // foreach($fields as $key => $value) {
        //     $fields[$key] = isset($data[$key]) && !empty($data[$key]) ? $data[$key] : " ";
        // }

    // public function updateOrderDetail($orderDetailID, $data = []) {
    //     $temp = $this->getColumns(self::TABLE);
    //     $id = $temp[0];//temp[0] gia tri dau tien la ma chi tiet hoa don
    //     $condition = "$id='${orderDetailID}'";
    //     for($i = 1 ; $i < count($temp) ; $i++ ){
    //         $updateData[$temp[$i]] = $data[$temp[$i]];   //them $key va $value vao array $insertData (de cau truc nhu vay moi khong bi trung lap du lieu trong array)
    //          //                \\   //             \\
    //         //key cua updateData\\ //value cua $data\\
    //     }
    //     return $this->update(self::TABLE,$condition,$updateData);
    // }

    // function getOrderDetailByID($id) {
    //     $fields = $this->getColumns(self::TABLE);
    //     return $this->findByID(self::TABLE,$fields[0],$id);
    // }

}