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
        $this->view("Account.Login.index", [
            "product" => "Tran Khac Tuan",
            "collections" => $this->collections,
        ]);
    }

    function register()
    {
        $this->view("Account.Register.index", [
            "product" => "Tran Khac Tuan",
            "collections" => $this->collections,
        ]);
    }
}
