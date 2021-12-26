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

    //Lấy danh sách nhà cung cấp
    function getAllSups($condition = [])
    {
        return $this->getAllRecords(self::TABLE_NCC, ["*"]);
    }

    //Lấy danh sách phiếu nhập hàng tồn kho
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

    //Lấy mã phiếu nhập vừa tạo
    public function getLastID()
    {
        return $this->getLastInsertID();
    }

    //Tạo phiếu nhập hàng
    public function insertInventoryReceipt($data = [])
    {
        return $this->insert(self::TABLE, $data);
    }

    //Thêm chi tiết phiếu nhập hàng
    public function insertReceiptDetail($data = []) {
        return $this->insert(self::TABLE_CTPN,$data);
    }
}
