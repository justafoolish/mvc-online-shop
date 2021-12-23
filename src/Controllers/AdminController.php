<?php
class AdminController extends BaseController
{
    protected $adminLogin = [];

    function __construct($params)
    {
        parent::__construct($params);
        //Check Admin Login
        $this->adminLogin = isset($_SESSION['AdminLogin']) ? $_SESSION['AdminLogin'] : [];
    }
}
