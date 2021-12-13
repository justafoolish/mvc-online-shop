<?php
class CategoryModel extends BaseModel 
{
    const TABLE = "danhmuc";

    public function __construct() {
        parent::__construct();
    }

    //4 tham số getAllRecords: $table, $select = ['*'], $condition = [], $limit = [],$groupBys = [], $orderBys = []
    public function getAllCategory($limit = []) {
        //Get all nhận 4 tham số gồm tên bảng, điều kiện, giới hạn, và các câu order
        return $this->getAllRecords(self::TABLE,["*"],[],$limit);
    }

    function getCategory($id) {
        $temp = $this->getColumns(self::TABLE);
        $idCategory = $temp[0];//temp[0] gia tri dau tien la ma danh muc
        return $this->findByID(self::TABLE,$idCategory,$id);
    }

    public function insertCategory($data = []) {
        return $this->insert(self::TABLE,$data);
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