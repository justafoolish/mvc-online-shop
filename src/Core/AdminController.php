<?php
class AdminController extends BaseController
{
    protected $adminLogin = [];

    function __construct($params)
    {
        parent::__construct($params);
        //Check Admin Login
        $this->adminLogin = $this->checkLogin();
    }

    protected function checkLogin() {
        return isset($_SESSION['AdminLogin']) ? $_SESSION['AdminLogin'] : [];
    }
}
