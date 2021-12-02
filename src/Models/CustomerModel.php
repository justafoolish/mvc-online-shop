<?php
class CustomerModel extends BaseModel 
{
    const TABLE = "khachhang";

    public function __construct() {
        parent::__construct();
    }

    public function getAllCustomer($limit = 8) {
        return $this->getAll(self::TABLE, $limit);
    }

    function getCustomer($id) {
        $temp = $this->getColumns(self::TABLE);
        $idCustomer = $temp[0];//temp[0] gia tri dau tien la ma khach hang
        return $this->findByID(self::TABLE,$idCustomer,$id);
    }

    public function search($keyword)
    {
        $condition = "TenKhachHang LIKE '%${keyword}%'";
        return $this->getAll(self::TABLE,$condition, 5,"");
    }

    public function insertCustomer($data = []) {

        //ong nho test lai xem co chay hay ko :))
        $temp = $this->getColumns(self::TABLE); //dua vao 1 cai array de khong can goi ham nhieu lan

        //lay $i = 1 la de bo cai muc ma~ khach hang ra
        for($i = 1 ; $i < count($temp) ; $i++ ){
            $insertData[$temp[$i]] = $data[$temp[$i]];   //them $key va $value vao array $insertData (de cau truc nhu vay moi khong bi trung lap du lieu trong array)
             //                \\   //             \\
            //key cua insertData\\ //value cua $data\\
        }
        return $this->insert(self::TABLE,$insertData);
    }

    public function updateCustomer($customerID, $data = []) {
        $temp = $this->getColumns(self::TABLE);
        $id = $temp[0];//temp[0] gia tri dau tien la ma khach hang
        $condition = "$id='${customerID}'";
        for($i = 1 ; $i < count($temp) ; $i++ ){
            $updateData[$temp[$i]] = $data[$temp[$i]];   //them $key va $value vao array $insertData (de cau truc nhu vay moi khong bi trung lap du lieu trong array)
             //                \\   //             \\
            //key cua updateData\\ //value cua $data\\
        }
        return $this->update(self::TABLE,$condition,$updateData);
    }

}