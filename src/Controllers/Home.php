<?php
class Home extends BaseController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    function index()
    {
        parent::view("Home.index", [
            "collections" => $this->collections,
        ]);
    }
}
