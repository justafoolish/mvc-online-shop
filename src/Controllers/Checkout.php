<?php
class Checkout extends BaseController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    function index()
    {
        $this->view("Checkout.index", [
            "collections" => $this->collections,
        ]);
    }
}
