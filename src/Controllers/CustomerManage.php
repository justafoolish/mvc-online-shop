<?php
class CustomerManage extends AdminController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    function index()
    {
        //Todo: is Login ? Dashboard / Login
        parent::view("Admin.Customer.index", []);
    }
}
