<?php
class ProductModel extends BaseModel 
{
    const TABLE = "sanpham";

    public function __construct() {
        parent::__construct();
    }

    public function getAllProducts($limit = 8) {
        return $this->getAll(self::TABLE, $limit);
    }

    public function getLatestProducts() {
        return $this->getAll(self::TABLE,1, 8, "ORDER BY NgayNhap DESC");
    }

    function getProduct($id) {
        return $this->findByID(self::TABLE,"MaSP",$id);
    }

    public function search($keyword)
    {
        $condition = "TenSP LIKE '%${keyword}%'";
        return $this->getAll("sanpham",$condition, 5,"");
    }

    public function insertProduct($data = []) {
        return $this->insert(self::TABLE,$data);
    }

    public function updateQuantity($productID, $quantity) {

    }

}