<?php
class InventoryModel extends BaseModel
{
    const TABLE = "phieunhap";
    const TABLE_CTPN = "chitietphieunhap";
    const TABLE_NCC = "nhacungcap";
    const TABLE_NV = "nhanvien";

    public function __construct()
    {
        parent::__construct();
    }

    function getAllSups($condition = [])
    {
        return $this->getAllRecords(self::TABLE_NCC, ["*"]);
    }

    public function getAllReceipt()
    {
        $table1 = self::TABLE;
        $table2 = self::TABLE_NCC;
        $table3 = self::TABLE_NV;
        $key1 = "MaNhaCungCap";
        $key2 = "MaNhanVien";

        $table = "$table1 JOIN $table2 on $table1.$key1=$table2.$key1 JOIN $table3 on $table1.$key2=$table3.$key2";
        
        return $this->getAllRecords($table,["MaPhieuNhap","NgayNhap","TenNhanVien","TenNhaCungCap","TongTien"]);
    }

    public function getLastID()
    {
        return $this->getLastInsertID();
    }

    public function insertInventoryReceipt($data = [])
    {
        return $this->insert(self::TABLE, $data);
    }

    public function insertReceiptDetail($data = []) {
        return $this->insert(self::TABLE_CTPN,$data);
    }
}
