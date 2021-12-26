<?php
class ProductModel extends BaseModel
{
    const TABLE = "sanpham";
    const SUB_TABLE_SP = "bienthe";

    public function __construct()
    {
        parent::__construct();
    }

    /*------- Thao tác trên table sanpham --------*/
    //Lấy danh sách sản phẩm
    function getAllProduct($limit = [], $condition = [], $order = [])
    {
        return $this->getAllRecords(self::TABLE, ["*"], $condition, $limit,[], $order);
    }
    
    //Lấy danh sách sản phẩm với từng biến thể
    function getProductVariant()
    {
        $mainTable = self::TABLE;
        $subTable = self::SUB_TABLE_SP;
        $table = "$mainTable JOIN $subTable on $mainTable.MaSP=$subTable.MaSP";

        return $this->getAllRecords($table,["$mainTable.MaSP","$mainTable.TenSP","$mainTable.Hinh1","$subTable.MaSize","$subTable.SoLuong"]);
    }

    //Lấy thông tin chi tiết 1 sản phẩm
    function getProductDetail($condition)
    {
        return $this->getAllRecords(self::TABLE, ["*"], $condition, [1]);
    }

    //Tính tổng số sản phẩm
    function totalProduct($condition = [])
    {
        $resultColumn = "MaSP";
        return $this->getAllRecords(self::TABLE, ["count($resultColumn) as $resultColumn"], $condition, [1])[$resultColumn];
    }

    //Thêm sản phẩm mới
    public function insertProduct($data = []) {
        if($this->insert(self::TABLE,$data)) 
            return $this->getLastInsertID();
        return 0;
    }
    

    /*---------------------------------------------------*/

    /*------- Thao tác trên table bienthe --------*/

    //Cập nhật số lượng biến thể sản phẩm
    public function updateQuantity($condition = [], $data = [])
    {
        return $this->update(self::SUB_TABLE_SP, $condition, $data);
    }

    //Lấy thông tin số lượng của một biến thể sản phẩm
    function getQuantity($data)
    {
        $execute = $this->getAllRecords(self::SUB_TABLE_SP,["*"], $data,[1]);

        return $execute ? $execute['SoLuong'] : 0;
    }

    //Thêm mới biến thể sản phẩm
    public function insertVariant($data = []) {
        return $this->insert(self::SUB_TABLE_SP,$data);
    }
}
