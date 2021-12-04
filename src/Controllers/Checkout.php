<?php
class Checkout extends CustomerController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    function index()
    {
        if(isset($_SESSION['cart'])){
            $cart = [];
            $cart = $_SESSION['cart'];
            parent::view("Checkout.index", [
                "customerLogin" => $this->customerLogin,
                "collections" => $this->collections,
                "totalCartItem" => $this->totalCartItem,
                "cart" => $cart,
            ]);
        }
        else header("Location: ".BASE_URL);
        
    }
}
