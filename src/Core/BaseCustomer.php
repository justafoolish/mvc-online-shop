<?php
class BaseCustomer extends BaseController
{
    protected $collections = [];
    protected $totalCartItem = 0;
    protected $customerLogin = [];

    function __construct($params)
    {
        parent::__construct($params);
        //Check customer Login
        if(isset($_SESSION['CustomerLogin'])) {
            $this->customerLogin = $_SESSION['CustomerLogin'];
        }

        //Check Total quantity of Cart
        if(isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            foreach($cart as $product)
                $this->totalCartItem += $product['SoLuong'];
        }

        //Get list Category
        $categoryModel = parent::model("CategoryModel");
        $category = $categoryModel->getAllCategory();
        foreach($category as $cat) {
            array_push($this->collections, [
                "id" => $cat['MaDanhMuc'],
                "name" => $cat['TenDanhMuc'],
            ]);
        }
    }
}
