<?php
class CategoryModel extends BaseModel 
{
    const TABLE = "danhmuc";

    public function __construct() {
        parent::__construct();
    }

    public function getAllCategory($limit = "") {
        //Get all nhận 4 tham số gồm tên bảng, điều kiện, giới hạn, và các câu order
        return $this->getAll(self::TABLE,1,$limit);
    }

    function getCategory($id) {
        $temp = $this->getColumns(self::TABLE);
        $idCategory = $temp[0];//temp[0] gia tri dau tien la ma danh muc
        return $this->findByID(self::TABLE,$idCategory,$id);
    }

    public function search($keyword)
    {
        $condition = "TenDanhMuc LIKE '%${keyword}%'";
        return $this->getAll(self::TABLE,$condition, 5,"");
    }

    public function insertCategory($data = []) {

       
        $temp = $this->getColumns(self::TABLE); //dua vao 1 cai array de khong can goi ham nhieu lan

        //lay $i = 1 la de bo cai muc ma~ khach hang ra
        for($i = 1 ; $i < count($temp) ; $i++ ){
            $insertData[$temp[$i]] = $data[$temp[$i]];   //them $key va $value vao array $insertData (de cau truc nhu vay moi khong bi trung lap du lieu trong array)
             //                \\   //             \\
            //key cua insertData\\ //value cua $data\\
        }
        return $this->insert(self::TABLE,$insertData);
    }

    public function updateCategory($categoryID, $data = []) {
        $temp = $this->getColumns(self::TABLE);
        $id = $temp[0];//temp[0] gia tri dau tien la ma danh muc
        $condition = "$id='${categoryID}'";
        for($i = 1 ; $i < count($temp) ; $i++ ){
            $updateData[$temp[$i]] = $data[$temp[$i]];   //them $key va $value vao array $insertData (de cau truc nhu vay moi khong bi trung lap du lieu trong array)
             //                \\   //             \\
            //key cua updateData\\ //value cua $data\\
        }
        return $this->update(self::TABLE,$condition,$updateData);
    }

    
}