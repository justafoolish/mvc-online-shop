<?php
class Cart extends BaseController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    function index()
    {
        parent::view("Cart.index", [
            "collections" => $this->collections,
        ]);
    }
    
}
