<?php

class DataBase{

    protected $connect;

    function connect(){
        $this->connect = mysqli_connect(HOST, USERNAME,PASSWD, DB_NAME);
        mysqli_query($this->connect, "SET NAMES 'utf8'");

        if(!mysqli_connect_errno())
            return $this->connect;
    }
    
}

?>