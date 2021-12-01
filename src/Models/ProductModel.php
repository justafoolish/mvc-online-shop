<?php
class ProductModel extends BaseModel 
{
    const TABLE = "sanpham";

    public function __construct() {
        parent::__construct();
    }

    public function getAllProducts($limit = 0) {
        $limitString ="${limit}, 8";
        return $this->getAll(self::TABLE,1, $limitString);
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
        return $this->getAll(self::TABLE,$condition, 5,"");
    }

    public function insertProduct($data = []) {
        $insertData = [
            "TenSP" => $data['TenSP'],
            "Hinh1" => $data['Hinh1'],
            "Hinh2" => $data['Hinh2'],
            "TongSoLuong" => $data['TongSoLuong'],
            "DanhMuc" => $data['DanhMuc'],
            "NgayNhap" => $data['NgayNhap'],
            "DonGia" => $data['DonGia'],
            "ChietKhau" => $data['DanhMuc'],
        ];

        return $this->insert(self::TABLE,$insertData);
    }

    public function updateQuantity($productID, $quantity) {
        $condition = "MaSP='${productID}'";
        $data = [
            "TongSoLuong" => $quantity,
        ];
        return $this->update(self::TABLE,$condition,$data);
    }

    public function getQuantityByVariant($productID,$variant) {
        $condition = "MaSP='${productID}' AND MaSize='${variant}'";
        return $this->getAll("bienthe",$condition, 1,"");
    }

    public function countTotalProducts($collection = "") {
        return $this->countRecords(self::TABLE,"MaSP");
    }

}