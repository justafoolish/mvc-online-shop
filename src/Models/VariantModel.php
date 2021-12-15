<?php
class VariantModel extends BaseModel
{
    const TABLE = "bienthe";

    public function __construct()
    {
        parent::__construct();
    }

    function getVariants($data = [])
    {
        return $this->getAllRecords(self::TABLE,["*"], $data);
    }

    public function updateQuantity($data = [], $condition = [])
    {
        return $this->update(self::TABLE, $data, $condition);
    }

    function getQuantity($data)
    {
        $execute = $this->getAllRecords(self::TABLE,["*"], $data,[1]);

        return $execute ? $execute['SoLuong'] : 0;
    }

        
    // function getSize($id)
    // {
    //     $fields = $this->getColumns(self::TABLE);
    //     //temp[0] gia tri dau tien la ma size san pham Ư
    //     return $this->findByID(self::TABLE, $fields[0], $id);
    // }

    // public function insertSize($data = []) {

    //     //ong nho test lai xem co chay hay ko :))
    //     $temp = $this->getColumns(self::TABLE); //dua vao 1 cai array de khong can goi ham nhieu lan

    //     // 1 ma san pham co nhieu size khac nhau nen trong table bien the cac ma san pham se trung nhau nen lay $i = 0
    //     for($i = 0 ; $i < count($temp) ; $i++ ){
    //         $insertData[$temp[$i]] = $data[$temp[$i]];   //them $key va $value vao array $insertData (de cau truc nhu vay moi khong bi trung lap du lieu trong array)
    //          //                \\   //             \\
    //         //key cua insertData\\ //value cua $data\\
    //     }
    //     return $this->insert(self::TABLE,$insertData);
    // }

    // function getquantity($condition = []) {
    //     $cond = [];

    //     foreach($condition as $key => $value) {
    //         array_push($cond, "$key='$value'");
    //     }

    //     $cond = implode(' AND ',$cond);

    //     return $this->getAll(self::TABLE,$condition);
    // }

    // function getQuantity($data) {
    //     // $condition = "MaSP='${productID}' AND MaSize='${variant}'";
    //     $condition = [];

    //     foreach($data as $key => $val) {
    //         array_push($condition,"$key='$val'");
    //     }
    //     $condition = implode(" AND ",$condition);

    //     $condition = $condition ? $condition : "1";

    //     // echo $condition;
    // $execute = $this->getAll(self::TABLE,$condition, 1,"");

    //     return $execute ? $execute[0]['SoLuong'] : 0;
    // }





}
