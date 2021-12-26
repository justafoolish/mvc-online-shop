<?php
class CategoryModel extends BaseModel 
{
    const TABLE = "danhmuc";
    const TABLE_SP = "sanpham";

    public function __construct() {
        parent::__construct();
    }

    //4 tham số getAllRecords: $table, $select = ['*'], $condition = [], $limit = [],$groupBys = [], $orderBys = []
    //Lấy danh sách danh mục sản phẩm
    public function getAllCategory($limit = []) {
        $table1 = self::TABLE;
        $table2 = self::TABLE_SP;
        
        $table = "$table1 JOIN $table2 ON $table1.MaDanhMuc=$table2.DanhMuc";

        return $this->getAllRecords($table,["MaDanhMuc", "TenDanhMuc","count(MaSP) as SoLuong"],[],$limit,["MaDanhMuc","TenDanhMuc"]);
    }

    //Thêm mới danh mục sản phẩm
    public function insertCategory($data = []) {
        return $this->insert(self::TABLE,$data);
    }

}