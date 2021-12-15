<?php
class BaseModel extends DataBase{
    protected $con; 

    function __construct(){
        $this->con = $this->connect();
    }

    protected function query($sql)
    {
        return mysqli_query($this->con, $sql);
    }

    //Get all nhận 4 tham số gồm tên bảng, điều kiện, giới hạn, và các câu order
    protected function getAll($table,$condition = "1", $limit = "", $subQuery = "") {
        $limit = $limit ? "LIMIT ${limit}" : "";
        
        $sql = "SELECT * FROM ${table} WHERE ${condition} ${subQuery} ${limit}";

        // echo $sql;

        $query = $this->query($sql);  
        
        $data=[];

        while($row = mysqli_fetch_assoc($query) ) {
            array_push($data,$row);
        }

        return $data;

    }

    //findByID nhận 3 tham số gồm bảng, cột cần tìm và giá trị tại record cần tìm
    protected function findByID($table, $column, $value) {
        $sql = "SELECT * FROM ${table} WHERE ${column}=${value}";
        
        // echo $sql;
        $query = $this->query($sql);  

        return mysqli_fetch_assoc($query);
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

        if($this->query($sql)) {
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

        $this->query($sql);

        return mysqli_affected_rows($this->con);
    }

    protected function delete() {

    }

    protected function countRecords($table, $column, $condition = "1", $groupColumn = "") {

        $groupBy = $groupColumn ? "GROUP BY ${groupColumn}" : "";

        $sql = "SELECT count($column) as Tong FROM ${table} WHERE ${condition} ${groupBy}";

        // echo $sql;
        $query = $this->query($sql);

        //Có điều kiện group by thì trả về mảng
        return mysqli_fetch_row($query)[0];
    }

    protected function getColumns($table) {
        $sql = "SHOW fields FROM ${table}";//query de lay toan bo column trong 1 table 
        $colsName = [];
        // $i=0;
        if($query = $this->query($sql))
        {
            //dua cac column trong 1 table vao array
            while ($row = $query->fetch_row()) {
                //cai nay se lay tung column nen se de $row[0]
                // $Col_data[$i] = $row[0];
                // $i= $i+1;
                array_push($colsName, $row[0]);
            }

        }
        return $colsName;
    }

    protected function getLastInsertID() {
        return $this->con->insert_id;
    }

    protected function sumRecords($table, $column, $condition = "1", $groupColumn = "") {

        $groupBy = $groupColumn ? "GROUP BY ${groupColumn}" : "";

        $sql = "SELECT sum($column) as Tong FROM ${table} WHERE ${condition} ${groupBy}";

        // echo $sql;
        $query = $this->query($sql);

        //Có điều kiện group by thì trả về mảng
        return mysqli_fetch_row($query)[0];
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
    function getAllRecords($table, $select = ['*'], $condition = [], $limit = [],$groupBys = [], $orderBys = []) {

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

        $query = $this->query($sql);  
        
        $data=[];

        while($row = mysqli_fetch_assoc($query) ) {
            array_push($data,$row);
        }

        return $isSingleRecord ? $data[0] : $data;
    }
}