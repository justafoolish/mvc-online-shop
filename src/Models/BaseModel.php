<?php
class BaseModel extends DataBase{
    protected $con; 

    function __construct(){
        $this->con = $this->connect();
    }

    protected function insert($table, $data = []) {
        
        $insertColumn = implode(",",array_keys($data));

        $insertValue = [];
        foreach ($data as $value) {
            array_push($insertValue,"'$value'");
        }
        $valueString = implode(",",$insertValue);

        $sql = "INSERT INTO $table($insertColumn) VALUES($valueString)";

        // echo $sql;

        if(mysqli_query($this->con, $sql)) {
            return 1;
        } 
        return 0;

    }

    protected function update($table,$condition = [], $data = []) {

        $updateData = [];
        foreach($data as $key => $val) {
            array_push($updateData,"${key}='${val}'");
        }
        $updateData = implode(', ',$updateData);


        $updateCondition = [];
        foreach($condition as $key => $val) {
            array_push($updateCondition, "${key}='${val}'");
        }

        $updateCondition = implode(' AND ',$updateCondition);
        $updateCondition = $updateCondition ? $updateCondition : 1;
        
        $sql = "UPDATE ${table} SET ${updateData} WHERE ${updateCondition}";

        // echo $sql;

        mysqli_query($this->con, $sql);

        return mysqli_affected_rows($this->con);
    }

    protected function getLastInsertID() {
        return $this->con->insert_id;
    }

    /****************************************************
    * Danh sách tham số getAllRecords
    * 
    * $table: Tên bảng truy vấn
    * 
    * $select: Danh sách các cột cần lấy trong bảng
    * Ví dụ: ["MaKhachHang", "TenKhachHang"] => Cần lấy cột MaKhachHang và TenKhachHang
    * sql sẽ được viết thành: SELECT MaKhachHang, TenKhachHang
    * Default value của $select là *
    *
    * $condition: Danh sách các điều kiện
    * Ví dụ: ["MaKhachHang" => 1, "TenKhachHang" => "Tuan"]
    * sql được viết thành WHERE MaKhachHang=1 AND TenKhachHang='Tuan'
    * Default value của $condition là 1
    *
    * $limit: Giới hạn số record cần lấy
    * Kiểu truyền vào: "10, 8" => Lấy từ record 10 đến 8 record tiếp theo
    *
    * $groupBys: Danh sách điều kiện gom nhóm
    * Ví dụ: ["MaKhachHang"]
    *
    * $orderBys: Danh sách điều kiện sắp xếp các columns
    * Ví dụ: ["TenKhachHang" => "asc"]
    *
    ****************************************************/
    protected function getAllRecords($table, $select = ['*'], $condition = [], $limit = [],$groupBys = [], $orderBys = []) {

        $columns = implode(',', $select);
        $limit = implode(',', $limit);

        $isSingleRecord = $limit == 1 ? 1 : 0; 

        $limit = $limit ? "LIMIT ${limit}" : "";

        $orderString = [];
        foreach ($orderBys as $key => $value) {
            array_push($orderString,"$key $value");           
        }
        $orderString = $orderString ? "ORDER BY ".implode(",",$orderString) : "";

        $groupByString = $groupBys ? "GROUP BY ".implode(",",$groupBys) : "";

        if(!empty($condition)) {
            $conditionString = [];
            foreach($condition as $key => $val) {
                array_push($conditionString, "${key}='${val}'");
            }
            $conditionString = implode(' AND ', $conditionString);
        } else {
            $conditionString = 1;
        }

        $sql = "SELECT $columns FROM $table WHERE $conditionString $groupByString $orderString $limit";

        // echo $sql;

        $query = mysqli_query($this->con, $sql);  
        
        $data=[];

        while($row = mysqli_fetch_assoc($query) ) {
            array_push($data,$row);
        }

        return $isSingleRecord ? $data[0] : $data;
    }
}