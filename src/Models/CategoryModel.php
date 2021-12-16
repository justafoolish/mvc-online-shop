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

    function getCategory($condition) {
        return $this->getAllRecords(self::TABLE,["*"], $condition,[1]);
    }

    public function insertCategory($data = []) {
        return $this->insert(self::TABLE,$data);
    }

    public function updateCategory($condition = [], $data = []) {
        return $this->update(self::TABLE,$condition,$data);
    }
}