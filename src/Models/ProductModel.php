<?php
class ProductModel extends BaseModel
{
    const TABLE = "sanpham";
    const subTABLE = "bienthe";

    public function __construct()
    {
        parent::__construct();
    }

    function getAllProduct($limit = [], $condition = [])
    {
        return $this->getAllRecords(self::TABLE, ["*"], $condition, $limit);
    }

    function getLatestProducts($limit)
    {
        return $this->getAllRecords(self::TABLE, ["*"], [], $limit, [], ["NgayNhap" => "DESC"]);
    }

    function getProductDetail($condition)
    {
        return $this->getAllRecords(self::TABLE, ["*"], $condition, [1]);
    }

    function totalProduct($condition = [])
    {
        $resultColumn = "MaSP";
        return $this->getAllRecords(self::TABLE, ["count(MaSP) as $resultColumn"], $condition, [1])[$resultColumn];
    }

    function search($keyword)
    {
        $condition = "TenSP LIKE '%${keyword}%'";
        return $this->getAll(self::TABLE, $condition, 5, "");
    }


    function updateQuantity($productID, $quantity)
    {
        $condition = "MaSP='${productID}'";
        $data = [
            "TongSoLuong" => $quantity,
        ];
        return $this->update(self::TABLE, $condition, $data);
    }

    // function getQuantityByVariant($productID,$variant) {
    //     $condition = "MaSP='${productID}' AND MaSize='${variant}'";
    //     $execute = $this->getAll("bienthe",$condition, 1,"");
    //     return $execute ? $execute[0]['SoLuong'] : 0;
    // }
    // function insertProduct($data = []) {
    //     //ong nho test lai xem co chay hay ko :))
    //     $temp = $this->getColumns(self::TABLE); //dua vao 1 cai array de khong can goi ham nhieu lan

    //     //lay $i = 1 la de bo cai muc ma~ san pham ra
    //     for($i = 1 ; $i < count($temp) ; $i++ ){
    //         $insertData[$temp[$i]] = $data[$temp[$i]];   //them $key va $value vao array $insertData (de cau truc nhu vay moi khong bi trung lap du lieu trong array)
    //          //                \\   //    lay      \\
    //         //  key insertData  \\ //value cua $data\\
    //     }
    //     return $this->insert(self::TABLE,$insertData);
    // }

    function countTotalProducts($collection = "")
    {

        $condition = $collection ? "DanhMuc='${collection}'" : "1";

        $fields = $this->getColumns(self::TABLE);

        return $this->countRecords(self::TABLE, $fields[0], $condition);
    }
}
