<?php
class OrderModel extends BaseModel
{
    const TABLE = "hoadon";
    const SUB_TABLE_HD = "chitiethoadon";
    const SUB_TABLE_CTHD = "sanpham";
    const SUB_TABLE_HD2 = "khachhang";

    public function __construct()
    {
        parent::__construct();
    }

    /* 
    *   Thao tác trên table hoadon
    */
    //Lấy toàn bộ hoá đơn
    public function getAllOrders($condition = [], $limit = []) {
        $table1 = self::TABLE;
        $table2 = self::SUB_TABLE_HD2;
        $joinField = "MaKhachHang";

        $table = "$table1 JOIN $table2 ON $table1.$joinField=$table2.$joinField";

        return $this->getAllRecords($table,["*"],$condition,$limit);
    }

    //Lấy thông tin 1 hoá đơn
    function getOrder($condition)
    {
        $table1 = self::TABLE;
        $table2 = self::SUB_TABLE_HD2;
        $joinField = "MaKhachHang";

        $table = "$table1 JOIN $table2 ON $table1.$joinField=$table2.$joinField";

        return $this->getAllRecords($table,["*"],$condition, [1]);
    }

    //Tạo hoá đơn
    public function insertOrder($data = [])
    {
        return $this->insert(self::TABLE, $data);
    }

    //Lấy mã hoá đơn vừa tạo
    function getLastID()
    {
        return $this->getLastInsertID();
    }

    //Cập nhật hoá đơn
    public function updateOrder($condition = [], $data = [])
    {
        return $this->update(self::TABLE, $condition, $data);
    }

    //Tổng số hoá đơn
    function totalOrder()
    {
        $resultColumn = "MaHoaDon";
        return $this->getAllRecords(self::TABLE,["count($resultColumn) as $resultColumn"],[],[1])[$resultColumn];
    }

    //Doanh thu
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
    //Lấy thông tin chi tiết hoá đươn
    public function getAllOrderDetail($condition = []) {
        $table = self::SUB_TABLE_HD." JOIN ".self::SUB_TABLE_CTHD." ON ".self::SUB_TABLE_HD.".MaSP = ".self::SUB_TABLE_CTHD.".MaSP";
        return $this->getAllRecords($table,["*"],$condition);
    }

    //Thêm chi tiết hoá đơn
    public function insertOrderDetail($data = []) {
        return $this->insert(self::SUB_TABLE_HD,$data);
    }

}
