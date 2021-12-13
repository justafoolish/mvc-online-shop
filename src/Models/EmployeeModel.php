<?php
class EmployeeModel extends BaseModel 
{
    const TABLE = "nhanvien";

    public function __construct() {
        parent::__construct();
    }

    public function getAllEmployee($limit = []) {
        return $this->getAll(self::TABLE, $limit);
    }

    function getEmployee($condition = []) {
        return $this->getAllRecords(self::TABLE,["*"], $condition, [1]);
    }

    // public function insertEmployee($data = []) {
    //     /*$insertData = [
    //         "TenSP" => $data['TenSP'],
    //         "Hinh1" => $data['Hinh1'],
    //         "Hinh2" => $data['Hinh2'],
    //         "TongSoLuong" => $data['TongSoLuong'],
    //         "DanhMuc" => $data['DanhMuc'],
    //         "NgayNhap" => $data['NgayNhap'],
    //         "DonGia" => $data['DonGia'],
    //         "ChietKhau" => $data['DanhMuc'],
    //     ];*/
    //     //ong nho test lai xem co chay hay ko :))
    //     $temp = $this->getColumns(self::TABLE); //dua vao 1 cai array de khong can goi ham nhieu lan

    //     //lay $i = 1 la de bo cai muc ma~ nhan vien ra
    //     for($i = 1 ; $i < count($temp) ; $i++ ){
    //         $insertData[$temp[$i]] = $data[$temp[$i]];   //them $key va $value vao array $insertData (de cau truc nhu vay moi khong bi trung lap du lieu trong array)
    //          //                \\   //             \\
    //         //key cua insertData\\ //value cua $data\\
    //     }
    //     return $this->insert(self::TABLE,$insertData);
    // }

    // public function updateEmloyee($employeeID, $data = []) {
    //     $temp = $this->getColumns(self::TABLE);
    //     $id = $temp[0];//temp[0] gia tri dau tien la ma nhan vien
    //     $condition = "$id='${employeeID}'";
    //     for($i = 1 ; $i < count($temp) ; $i++ ){
    //         $updateData[$temp[$i]] = $data[$temp[$i]];   //them $key va $value vao array $insertData (de cau truc nhu vay moi khong bi trung lap du lieu trong array)
    //          //                \\   //             \\
    //         //key cua updateData\\ //value cua $data\\
    //     }
    //     return $this->update(self::TABLE,$condition,$updateData);
    // }

}