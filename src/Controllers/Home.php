<?php
class Home extends BaseController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    function index()
    {
        $this->view("Home.index", [
            "collections" => $this->collections,
        ]);
    }
}
