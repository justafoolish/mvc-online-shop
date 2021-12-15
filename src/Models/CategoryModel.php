<?php
class CategoryModel extends BaseModel 
{
    const TABLE = "danhmuc";

    public function __construct() {
        parent::__construct();
    }

    //4 tham số getAllRecords: $table, $select = ['*'], $condition = [], $limit = [],$groupBys = [], $orderBys = []
    public function getAllCategory($limit = []) {
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

    public function updateCategory($condition = [], $data = []) {
        return $this->update(self::TABLE,$condition,$data);
    }

    
}