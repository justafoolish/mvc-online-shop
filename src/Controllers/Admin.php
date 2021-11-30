<?php
class Admin extends BaseController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    function index()
    {
        parent::view("Admin.Dashboard.index", []);
    }

    function dashboard() {
        $this->index();
    }

    function inventory() {
        parent::view("Admin.Inventory.index", []);
    }

    function category($categoryID = "") {
        if(empty($categoryID)) {
            parent::view("Admin.Category.index", []);
        }
        else {
            parent::view("Admin.Category.detail", []);
        }
    }
    function addcategory() {
        parent::view("Admin.Category.add", []);
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

    function product($pid = "") {
        if(empty($pid)) {
            parent::view("Admin.Product.index", []);
        }
        else {
            parent::view("Admin.Product.detail", []);
        }
    }

    function insertproduct() {
        parent::view("Admin.Product.add", []);
    }

    function report() {
        parent::view("Admin.Report.index", []);
    }
}
