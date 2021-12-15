<?php
class OrderModel extends BaseModel
{
    const TABLE = "hoadon";

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllOrders($condition = [], $limit = []) {
        return $this->getAllRecords(self::TABLE,["*"],$condition,$limit);
    }

    function getOrder($id)
    {
        $fields = $this->getColumns(self::TABLE);
        return $this->findByID(self::TABLE, $fields[0], $id);
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
        return $this->getAllRecords(self::TABLE, ["count(MaHoaDon) as $resultColumn"], $condition, [1], ["MaKhachHang"])[$resultColumn];
    }

    function countTotalCustomerSpend($condition = [])
    {
        $resultColumn = "TongTien";
        return $this->getAllRecords(self::TABLE, ["sum(TongTien) as $resultColumn"], $condition, [1], ["MaKhachHang"])[$resultColumn];
    }

    function totalOrder()
    {
        $resultColumn = "MaHoaDon";
        return $this->getAllRecords(self::TABLE,["count(MaHoaDon) as $resultColumn"],[],[1])[$resultColumn];
    }
    function totalProfit()
    {
        $resultColumn = "TongTien";
        return $this->getAllRecords(self::TABLE,["sum(TongTien) as $resultColumn"],[],[1])[$resultColumn];
    }
}
