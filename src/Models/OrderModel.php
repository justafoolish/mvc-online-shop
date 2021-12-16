<?php
class OrderModel extends BaseModel
{
    const TABLE = "hoadon";
    const SUB_TABLE_HD = "chitiethoadon";
    const SUB_TABLE_CTHD = "sanpham";

    public function __construct()
    {
        parent::__construct();
    }

    /* 
    *   Thao tác trên table hoadon
    */
    public function getAllOrders($condition = [], $limit = []) {
        return $this->getAllRecords(self::TABLE,["*"],$condition,$limit);
    }

    function getOrder($condition)
    {
        return $this->getAllRecords(self::TABLE,["*"],$condition, [1]);
    }

    public function insertOrder($data = [])
    {
        return $this->insert(self::TABLE, $data);
    }

    function getLastID()
    {
        return $this->getLastInsertID();
    }

    public function updateOrder($condition = [], $data = [])
    {
        return $this->update(self::TABLE, $condition, $data);
    }

    function countTotalCustomerOrder($condition = [])
    {
        $resultColumn = "TongHoaDon";
        return $this->getAllRecords(self::TABLE, ["count($resultColumn) as $resultColumn"], $condition, [1], ["MaKhachHang"])[$resultColumn];
    }


    function countTotalCustomerSpend($condition = [])
    {
        $resultColumn = "TongTien";
        return $this->getAllRecords(self::TABLE, ["sum($resultColumn) as $resultColumn"], $condition, [1], ["MaKhachHang"])[$resultColumn];
    }

    function totalOrder()
    {
        $resultColumn = "MaHoaDon";
        return $this->getAllRecords(self::TABLE,["count($resultColumn) as $resultColumn"],[],[1])[$resultColumn];
    }

    function totalProfit($condition = [], $report = false)
    {
        $resultColumn = "TongTien";

        $select = $report ? "COUNT(MaHoaDon) as TongHoaDon, SUM(TongTien) as TongTien, SUM(case when TrangThaiThanhToan='1' then TongTien else 0 end) as TongThu" : "sum($resultColumn) as $resultColumn";
        $execute = $this->getAllRecords(self::TABLE,[$select],$condition,[1]);
        return $report ? $execute : $execute[$resultColumn];
    }

    /* 
    *   Thao tác trên table chitiethoadon
    */
    public function getAllOrderDetail($condition = []) {
        $table = self::SUB_TABLE_HD." JOIN ".self::SUB_TABLE_CTHD." ON ".self::SUB_TABLE_HD.".MaSP = ".self::SUB_TABLE_CTHD.".MaSP";
        return $this->getAllRecords($table,["*"],$condition);
    }

    public function insertOrderDetail($data = []) {
        return $this->insert(self::SUB_TABLE_HD,$data);
    }

}
