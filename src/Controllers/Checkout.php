<?php
class Checkout extends BaseController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    function index()
    {
        parent::view("Checkout.index", [
            "collections" => $this->collections,
        ]);
    }
}
