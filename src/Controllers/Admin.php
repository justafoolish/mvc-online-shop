<?php
class Admin extends BaseController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    function index()
    {
        $this->view("Admin.Dashboard.index", [
            "collections" => $this->collections,
        ]);
    }
    
}
