<?php
class Cart extends CustomerController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    //Hiển thị trang giỏ hàng
    function index()
    {
        parent::view("Cart.index", [
            "customerLogin" => $this->customerLogin,
            "collections" => $this->collections,
            "totalCartItem" => $this->totalCartItem,
            "cart" => $this->cartItem
        ]);
    }

    //Hiển thị thanh panel cart
    public function getSideCart() {
        parent::view("Templates.sidecart",[
            "carts" => $this->cartItem
        ]);
    }

    //Kiểm tra số lượng sản phẩm
    function checkQuantity() {
        if(isset($_POST['pid']) && isset($_POST['size'])) {
            $pid = $_POST['pid'];
            $sizes = $_POST['size'];
            $productModel = parent::model("ProductModel");

            foreach ($sizes as $size) {
                $productQuantity = $productModel->getQuantity([
                    "MaSP" => $pid,
                    "MaSize" => strtoupper($size),
                ]);

                // echo $productQuantity;
                if($productQuantity > 0) {
                    $updateQuantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;
                    $this->addToCart($productModel,strtolower(trim($pid)),strtolower(trim($size)), $productQuantity, $updateQuantity);
                   break;
                }
            } 
            echo $this->countCartItem();
        } else {
            header('Location:'.BASE_URL);
        }
    }

    //Thêm sản phẩm vào giỏ hàng
    function addToCart($productModel, $pid, $size, $maxQuantity, $updateQuantity = 1) {
        $product = $productModel->getProductDetail(["MaSP" => $pid]);

        $checkAdd = 0;
        if(!isset($_SESSION['cart'])) {
            $cart["$pid"."$size"] = array(
                "MaSP" => $pid,
                "TenSP" => $product['TenSP'],
                "Hinh1" => $product['Hinh1'],
                "ChietKhau" => $product['ChietKhau'],
                "DonGia" => $product['DonGia'],
                "MaSize" => $size,
                "SoLuong" => 1
            );
            $checkAdd = 1;
        }else {
            $cart = $_SESSION['cart'];
            if(array_key_exists("$pid"."$size",$cart) && $cart["$pid"."$size"]['MaSize'] === $size) {
                if($cart["$pid"."$size"]["SoLuong"] < $maxQuantity)
                {
                    $cart["$pid"."$size"]["SoLuong"] += $updateQuantity;
                    $checkAdd = 1;
                }
                else $checkAdd = 0;
            } else {
                $cart["$pid"."$size"] = array(
                    "MaSP" => $pid,
                    "TenSP" => $product['TenSP'],
                    "Hinh1" => $product['Hinh1'],
                    "ChietKhau" => $product['ChietKhau'],
                    "DonGia" => $product['DonGia'],
                    "MaSize" => $size,
                    "SoLuong" => 1
                );
                $checkAdd = 1;
            }
        }

        $_SESSION['cart'] = $cart;

        return $checkAdd;
        
    }

    //Đếm số lượng sản phẩm trong giỏ
    function countCartItem() {
        $total = 0;
        if(isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            foreach($cart as $product)
                $total += $product['SoLuong'];
        }
        $this->totalCartItem = $total;
        return $total;
    }

    //Xoá sản phẩm trong giỏ
    function deletecartitem() {
        $total = 0;
        if(isset($_POST['cartID'])) {

            $cartID = $_POST['cartID'];
            $cart = $_SESSION['cart'];
            
            unset($cart[$cartID]);
            
            if(count($cart) == 0) {
                unset($_SESSION['cart']);
            } else {
                $_SESSION['cart'] = $cart;
            }

            foreach($cart as $product) {
                $total+= intval($product['DonGia'])*intval($product['SoLuong']);
            }
        }
        echo $total;        
    }

    //Cập số số lượng trong giỏ
    function updatequantity() {
        $total = 0;
        $cart = [];
        $update = false;
        $totalProduct = 0;
        if(isset($_POST['pid']) && $_POST['size'] && $_POST['option']) {
            $pid = $_POST['pid'];
            $size = $_POST['size'];
            $cart = $_SESSION['cart'];
            $option = intval($_POST['option']);
            
            switch($option) {
                case 1:
                    //Kiểm tra còn đủ để + vào hay ko
                    $productModel = parent::model("ProductModel");
                    $quantity = $productModel->getQuantity([
                        "MaSP" => $pid,
                        "MaSize" => strtoupper($size),
                    ]);
                    if($cart[$pid.$size]['SoLuong'] < $quantity)
                    {
                        $cart[$pid.$size]['SoLuong'] += 1;
                        $update = true;
                    }
                    break;
                case 2:
                    $cart[$pid.$size]['SoLuong'] -= intval($cart[$pid.$size]['SoLuong']) ? 1 : 0;
                    $update = true;
                    break;
            }

            $_SESSION['cart'] = $cart;

            foreach($cart as $product) {
                $total+= intval($product['DonGia'])*intval($product['SoLuong']);
                $totalProduct += intval($product['SoLuong']);
            }
        }
        echo json_encode([
            "update" => $update,
            "cart" => $cart,
            "totalAmount" => $total,
            "totalProduct" => $totalProduct
        ]);   
    }
}