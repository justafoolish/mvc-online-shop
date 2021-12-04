<?php
class Admin extends AdminController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    function index()
    {
        //Todo: is Login ? Dashboard / Login
        parent::view("Admin.Dashboard.index", []);
    }

    function dashboard() {
        $this->index();
    }

    function customer() {
        parent::view("Admin.Customer.index", []);
    }

    function discount() {
        parent::view("Admin.Discount.index", []);
    }

    function adddiscound() {
        parent::view("Admin.Discount.add", []);
    }

    function automationdiscound() {
        parent::view("Admin.Discount.auto_add", []);
    }
    
    function employee() {
        parent::view("Admin.Employee.index", []);
    }

    function login() {
        parent::view("Admin.Login.index", []);
    }

    function order($orderID = "") {
        if(empty($orderID)) {
            parent::view("Admin.Order.index", []);
        }
        else {
            parent::view("Admin.Order.detail", []);
        }
    }

    function report() {
        parent::view("Admin.Report.index", []);
    }
}
