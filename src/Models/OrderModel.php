<?php
class OrderModel extends BaseModel 
{
    const TABLE = "hoadon";

    public function __construct() {
        parent::__construct();
    }

    public function getAllOrder($limit = 8) {
        return $this->getAll(self::TABLE, $limit);
    }

    function getOrder($id) {
        $fields = $this->getColumns(self::TABLE);
        return $this->findByID(self::TABLE,$fields[0],$id);
    }

    public function insertOrder($data = []) {
        
        $fields = $this->getColumns(self::TABLE); //dua vao 1 cai array de khong can goi ham nhieu lan
        $fields = array_flip($fields); //Đổi value thành key

        foreach($fields as $key => $value) {
            $fields[$key] = isset($data[$key]) && !empty($data[$key]) ? $data[$key] : " ";
        }
        return $this->insert(self::TABLE,$fields);
    }

    function getLastID() {
        return $this->getLastInsertID();
    }

    public function updateOrder($condition=[], $data = []) {
        return $this->update(self::TABLE,$condition,$data);
    }

}