<?php
class CustomerModel extends BaseModel 
{
    const TABLE = "khachhang";
    const SUB_TABLE_KH = "hoadon";

    public function __construct() {
        parent::__construct();
    }

    //Lấy danh sách khách hàng
    public function getAllCustomer($limit = []) {
        $table1 = self::TABLE;
        $table2 = self::SUB_TABLE_KH;
        $joinField = "MaKhachHang";
        
        $table = "$table1 LEFT JOIN $table2 ON $table1.$joinField=$table2.$joinField";

        return $this->getAllRecords($table,["$table1.$joinField","count(MaHoaDon) as TongDonHang","COALESCE(sum(TongTien), 0) as TongTien", "TenKhachHang, DiaChi"],[],$limit,["$table1.$joinField"]);
    }

    //Lấy thông tin một khách hàng
    function getCustomerDetail($condition = []) {
        return $this->getAllRecords(self::TABLE,["*"],$condition,[1]);
    }

    //Thêm mới một khách hàng
    public function insertCustomer($data = []) {
        return $this->insert(self::TABLE,$data);
    }
}