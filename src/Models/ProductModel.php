<?php
class ProductModel extends BaseModel 
{
    const TABLE = "sanpham";
    const subTABLE = "bienthe";

    public function __construct() {
        parent::__construct();
    }

    function getAllProducts($limit = "", $collection = "") {
        //Lọc theo danh mục
        $condition = $collection ? "DanhMuc='${collection}'" : "1";

        //Get all nhận 4 tham số gồm tên bảng, điều kiện, giới hạn, và các câu order
        return $this->getAll(self::TABLE,$condition, $limit);
    }

    function getLatestProducts() {
        return $this->getAll(self::TABLE,1, 8, "ORDER BY NgayNhap DESC");
    }
    

    function getProduct($id) {

        $fields = $this->getColumns(self::TABLE);

        return $this->findByID(self::TABLE,$fields[0],$id);
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

        $fields = $this->getColumns(self::TABLE);

        return $this->countRecords(self::TABLE,$fields[0],$condition);
    }

    function getAllVariants($id = "") {
        $fields = $this->getColumns(self::TABLE);

        $condition = $id ? "$fields[0]='${id}'" : "1";

        //Get all nhận 4 tham số gồm tên bảng, điều kiện, giới hạn, và các câu order
        return $this->getAll(self::subTABLE,$condition);    
    }

}