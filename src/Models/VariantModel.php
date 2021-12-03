<?php
class VariantModel extends BaseModel 
{
    const TABLE = "bienthe";

    public function __construct() {
        parent::__construct();
    }

    public function getAllVariants($id="") {
        $fields = $this->getColumns(self::TABLE);
        
        $condition = $id ? "$fields[0]=$id" : "1";

        return $this->getAll(self::TABLE,$condition);
    }

    function getSize($id) {
        $fields = $this->getColumns(self::TABLE);
        //temp[0] gia tri dau tien la ma size san pham Ư
        return $this->findByID(self::TABLE,$fields[0],$id);
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