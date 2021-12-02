<?php
class Account extends BaseController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    function index()
    {
        $this->login();
    }
    
    function login()
    {
        parent::view("Account.login", [
            "product" => "Tran Khac Tuan",
            "collections" => $this->collections,
            "totalCartItem" => $this->totalCartItem
        ]);
    }

    function register()
    {
        parent::view("Account.register", [
            "product" => "Tran Khac Tuan",
            "collections" => $this->collections,
            "totalCartItem" => $this->totalCartItem
        ]);
    }

    function checkregister() {
        if(isset($_POST['submit'])) {
            $data['firstname'] = $_POST['firstname'];
            $data['lastname'] = $_POST['lastname'];
            $data['gender'] = $_POST['gender'];
            $data['email'] = $_POST['email'];
            $data['password'] = $_POST['password'];
            
            echo "<pre>";
            print_r($data);
            echo "</pre>";

        }
    }

    function checklogin() {
        if(isset($_POST['submit'])) {
            $data['email'] = $_POST['email'];
            $data['password'] = $_POST['password'];
            
            echo "<pre>";
            print_r($data);
            echo "</pre>";

        }
    }
}
