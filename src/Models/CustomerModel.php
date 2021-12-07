<?php
class CustomerModel extends BaseModel 
{
    const TABLE = "khachhang";

    public function __construct() {
        parent::__construct();
    }

    public function getAllCustomer($limit = "") {
        return $this->getAll(self::TABLE,1,$limit);
    }

    function getCustomer($data = []) {
        $condition = [];

        foreach($data as $key => $val) {
            array_push($condition,"$key='$val'");
        }
        $condition = implode(" AND ",$condition);

        $condition = $condition ? $condition : "1";
        
        $execute = $this->getAll(self::TABLE,$condition);
        
        return $execute ? $execute[0] : [];
    }

    // public function search($keyword)
    // {
    //     $condition = "TenKhachHang LIKE '%${keyword}%'";
    //     return $this->getAll(self::TABLE,$condition, 5,"");
    // }

    public function insertCustomer($data = []) {

        $fields = $this->getColumns(self::TABLE); //dua vao 1 cai array de khong can goi ham nhieu lan
        $fields = array_flip($fields); //Đổi value thành key

        foreach($fields as $key => $value) {
            $fields[$key] = isset($data[$key]) && !empty($data[$key]) ? $data[$key] : " ";
        }
        return $this->insert(self::TABLE,$fields);
    }

    // public function updateCustomer($customerID, $data = []) {
    //     $temp = $this->getColumns(self::TABLE);
    //     $id = $temp[0];//temp[0] gia tri dau tien la ma khach hang
    //     $condition = "$id='${customerID}'";
    //     for($i = 1 ; $i < count($temp) ; $i++ ){
    //         $updateData[$temp[$i]] = $data[$temp[$i]];   //them $key va $value vao array $insertData (de cau truc nhu vay moi khong bi trung lap du lieu trong array)
    //          //                \\   //             \\
    //         //key cua updateData\\ //value cua $data\\
    //     }
    //     return $this->update(self::TABLE,$condition,$updateData);
    // }

}