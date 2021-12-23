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
    function getAllProduct($limit = [], $condition = [], $order = [])
    {
        return $this->getAllRecords(self::TABLE, ["*"], $condition, $limit,[], $order);
    }
    
    function getProductVariant()
    {
        $mainTable = self::TABLE;
        $subTable = self::SUB_TABLE_SP;
        $table = "$mainTable JOIN $subTable on $mainTable.MaSP=$subTable.MaSP";

        return $this->getAllRecords($table,["$mainTable.MaSP","$mainTable.TenSP","$mainTable.Hinh1","$subTable.MaSize","$subTable.SoLuong"]);
    }

    function getProductDetail($condition)
    {
        return $this->getAllRecords(self::TABLE, ["*"], $condition, [1]);
    }

    function totalProduct($condition = [])
    {
        $resultColumn = "MaSP";
        return $this->getAllRecords(self::TABLE, ["count($resultColumn) as $resultColumn"], $condition, [1])[$resultColumn];
    }

    public function insertProduct($data = []) {
        if($this->insert(self::TABLE,$data)) 
            return $this->getLastInsertID();
        return 0;
    }
    

    /*---------------------------------------------------*/

    /*------- Thao tác trên table bienthe --------*/

    public function updateQuantity($condition = [], $data = [])
    {
        return $this->update(self::SUB_TABLE_SP, $condition, $data);
    }

    function getQuantity($data)
    {
        $execute = $this->getAllRecords(self::SUB_TABLE_SP,["*"], $data,[1]);

        return $execute ? $execute['SoLuong'] : 0;
    }

    public function insertVariant($data = []) {
        return $this->insert(self::SUB_TABLE_SP,$data);
    }
}
