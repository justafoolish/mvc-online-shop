<?php
class ProductModel extends BaseModel 
{
    const TABLE = "sanpham";

    public function __construct() {
        parent::__construct();
    }

    function getAllProducts($limit = "0, 8", $collection = "") {
        $condition = $collection ? "DanhMuc='${collection}'" : "1";
        return $this->getAll(self::TABLE,$condition, $limit);
    }

    function getLatestProducts() {
        return $this->getAll(self::TABLE,1, 8, "ORDER BY NgayNhap DESC");
    }

    function getProduct($id) {
        return $this->findByID(self::TABLE,"MaSP",$id);
    }

    function search($keyword)
    {
        $condition = "TenSP LIKE '%${keyword}%'";
        return $this->getAll(self::TABLE,$condition, 5,"");
    }

    function insertProduct($data = []) {
        // $insertData = [
        //     "TenSP" => $data['TenSP'],
        //     "Hinh1" => $data['Hinh1'],
        //     "Hinh2" => $data['Hinh2'],
        //     "TongSoLuong" => $data['TongSoLuong'],
        //     "DanhMuc" => $data['DanhMuc'],
        //     "NgayNhap" => $data['NgayNhap'],
        //     "DonGia" => $data['DonGia'],
        //     "ChietKhau" => $data['DanhMuc'],
        // ];

        // return $this->insert(self::TABLE,$insertData);

        //ong nho test lai xem co chay hay ko :))
        $temp = $this->getColumns(self::TABLE); //dua vao 1 cai array de khong can goi ham nhieu lan

        //lay $i = 1 la de bo cai muc ma~ san pham ra
        for($i = 1 ; $i < count($temp) ; $i++ ){
            $insertData[$temp[$i]] = $data[$temp[$i]];   //them $key va $value vao array $insertData (de cau truc nhu vay moi khong bi trung lap du lieu trong array)
             //                \\   //    lay      \\
            //  key insertData  \\ //value cua $data\\
        }
        return $this->insert(self::TABLE,$insertData);
    }

    function updateQuantity($productID, $quantity) {
        $condition = "MaSP='${productID}'";
        $data = [
            "TongSoLuong" => $quantity,
        ];
        return $this->update(self::TABLE,$condition,$data);
    }

    function getQuantityByVariant($productID,$variant) {
        $condition = "MaSP='${productID}' AND MaSize='${variant}'";
        return $this->getAll("bienthe",$condition, 1,"")[0]['SoLuong'];
    }

    function countTotalProducts($collection = "") {
        $condition = $collection ? "DanhMuc='${collection}'" : "1";
        return $this->countRecords(self::TABLE,"MaSP",$condition);
    }

}