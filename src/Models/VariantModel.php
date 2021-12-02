<?php
class VariantModel extends BaseModel 
{
    const TABLE = "bienthe";

    public function __construct() {
        parent::__construct();
    }

    public function getAllCustomer($limit = 8) {
        return $this->getAll(self::TABLE, $limit);
    }

    function getSize($id) {
        $temp = $this->getColumns(self::TABLE);
        $idSize = $temp[0];//temp[0] gia tri dau tien la ma size san pham Ư
        return $this->findByID(self::TABLE,$idSize,$id);
    }

    public function search($keyword)
    {
        $condition = "* LIKE '%${keyword}%'";
        return $this->getAll(self::TABLE,$condition, 5,"");
    }

    public function insertSize($data = []) {

        //ong nho test lai xem co chay hay ko :))
        $temp = $this->getColumns(self::TABLE); //dua vao 1 cai array de khong can goi ham nhieu lan
        
        // 1 ma san pham co nhieu size khac nhau nen trong table bien the cac ma san pham se trung nhau nen lay $i = 0
        for($i = 0 ; $i < count($temp) ; $i++ ){
            $insertData[$temp[$i]] = $data[$temp[$i]];   //them $key va $value vao array $insertData (de cau truc nhu vay moi khong bi trung lap du lieu trong array)
             //                \\   //             \\
            //key cua insertData\\ //value cua $data\\
        }
        return $this->insert(self::TABLE,$insertData);
    }

    public function updateSize($sizeID, $data = []) {
        $temp = $this->getColumns(self::TABLE);
        $id = $temp[0];//temp[0] gia tri dau tien la ma size san pham
        $condition = "$id='${sizeID}'";
        for($i = 1 ; $i < count($temp) ; $i++ ){
            $updateData[$temp[$i]] = $data[$temp[$i]];   //them $key va $value vao array $insertData (de cau truc nhu vay moi khong bi trung lap du lieu trong array)
             //                \\   //             \\
            //key cua updateData\\ //value cua $data\\
        }
        return $this->update(self::TABLE,$condition,$updateData);
    }

}