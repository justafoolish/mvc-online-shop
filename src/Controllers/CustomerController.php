<?php
class CustomerController extends BaseController
{
    protected $collections = [];
    protected $totalCartItem = 0;
    protected $customerLogin = [];
    protected $cartItem = [];

    function __construct($params)
    {
        parent::__construct($params);
        //Check customer Login
        if(isset($_SESSION['CustomerLogin'])) {
            $this->customerLogin = $_SESSION['CustomerLogin'];
        }

        //Check Total quantity of Cart
        if(isset($_SESSION['cart'])) {
            $this->cartItem = $_SESSION['cart'];
            foreach($this->cartItem as $product)
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

    //Lấy danh sách sản phẩm trong giỏ
    protected function getCart() {
        return isset($_SESSION['cart']) && !empty($_SESSION['cart']) ? $_SESSION['cart'] : [];
    }
    
    //Xoá giỏ hàng
    protected function removeCart() {
        unset($_SESSION['cart']);
    }
}
