<?php
class BaseModel extends DataBase{
    protected $con; 

    function __construct(){
        $this->con = $this->connect();
    }

    public function query($sql)
    {
        return mysqli_query($this->con, $sql);
    }

    public function getAll($table,$condition = "1", $limit = 8, $subQuery = "") {
        $sql = "SELECT * FROM ${table} WHERE ${condition} ${subQuery} LIMIT ${limit}";

        // echo $sql;

        $query = $this->query($sql);  
        
        $data=[];

        while($row = mysqli_fetch_assoc($query) ) {
            array_push($data,$row);
        }

        return $data;

    }

    public function findByID($table, $column, $value) {
        $sql = "SELECT * FROM ${table} WHERE ${column}=${value}";
        
        $query = $this->query($sql);  

        return mysqli_fetch_assoc($query);
    }

    public function insert($table, $data = []) {
        $column = implode(",",array_keys($data));

        $newValue = array_map(function ($value) {
            return "'${value}'";
        }, array_values($data));

        $newValue = implode(",",$newValue);

        $sql = "INSERT INTO ${table}(${column}) VALUES(${newValue})";

        echo $sql;

        if($this->query($sql)) {
            return 1;
        } 
        return 0;
    }

    public function update($table,$condition, $data = []) {

        $updateData = [];
        foreach($data as $key => $val) {
            array_push($updateData,"${key}='${val}'");
        }

        $updateData = implode(', ',$updateData);

        $sql = "UPDATE ${table} SET ${updateData} WHERE ${condition}";

        echo $sql;

        $this->query($sql);
        
        return mysqli_affected_rows($this->con);
    }

    public function delete() {

    }


}