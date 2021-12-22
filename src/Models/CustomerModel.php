<?php
class CustomerModel extends BaseModel 
{
    const TABLE = "khachhang";
    const SUB_TABLE_KH = "hoadon";

    public function __construct() {
        parent::__construct();
    }

    public function getAllCustomer($limit = []) {
        $table1 = self::TABLE;
        $table2 = self::SUB_TABLE_KH;
        $joinField = "MaKhachHang";

        $table = "$table1 LEFT JOIN $table2 ON $table1.$joinField=$table2.$joinField";

        return $this->getAllRecords($table,["$table1.$joinField","count(MaHoaDon) as TongDonHang","COALESCE(sum(TongTien), 0) as TongTien", "TenKhachHang, DiaChi"],[],$limit,["$table1.$joinField"]);
    }

    function getCustomerDetail($condition = []) {
        return $this->getAllRecords(self::TABLE,["*"],$condition,[1]);
    }

    public function insertCustomer($data = []) {
        return $this->insert(self::TABLE,$data);
    }

    function totalCustomer()
    {
        $resultColumn = "MaKhachHang";
        return $this->getAllRecords(self::TABLE,["count($resultColumn) as $resultColumn"],[],[1])[$resultColumn];
    }  
}