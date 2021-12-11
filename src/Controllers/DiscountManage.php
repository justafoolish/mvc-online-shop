<?php 
class DiscountManage extends AdminController {

    function __construct($params)
    {
        parent::__construct($params);
    }

    public function index() {
        //Todo: Check login first
        //Để tạm ! để confirm đã login
        if(empty($this->adminLogin)) {
            header("Location: ".BASE_URL."/Admin");
        }
        else {
            $discountModel = parent::model("DiscountModel");
            $productModel = parent::model("ProductModel");

            $products = $productModel->getAllProducts();
            $discounts = $discountModel->getAllDiscount();
            parent::view("Admin.Discount.index", [
                "discounts" => $discounts,
                "products" => $products
            ]);
        }
    }

    public function formAdd() {
        parent::view("Admin.Discount.add", []);
    }

    public function formAddAuto() {
        $productModel = parent::model("ProductModel");
        $products = $productModel->getAllProducts();
        
        parent::view("Admin.Discount.auto_add", [
            "products" => $products
        ]);
    }

    public function addDiscount() {
        $checkCreate = false;
        if(isset($_POST['submit'])) {
            //Lấy dữ liệu từ form
            $data['MaKhuyenMai'] = $_POST['code'];
            $data['ChietKhau'] = $_POST['discount'];
            $data['NgayBatDau'] =   date("Y-m-d",strtotime($_POST['startDate']));
            $data['NgayKetThuc'] =   date("Y-m-d",strtotime($_POST['endDate']));
            $data['SoLuongSuDung'] = intval($_POST['quantity']);
            
            //Validate dữ liệu
            if($data['NgayKetThuc'] > $data['NgayBatDau'] && $data['ChietKhau'] > 0 && $data['SoLuongSuDung'] > 0) {
                //Nhập vào cơ sở dữ liệu
                $discountModel = parent::model("DiscountModel");
                $checkCreate = $discountModel->insertDiscount($data);
            }
        }
        if($checkCreate) header("Location: ".BASE_URL."/DiscountManage");
        else header("Location: ".BASE_URL."/DiscountManage/FormAdd");
    }

    public function verifyDiscount() {
        if(isset($_POST['code'])) {
            $discountModel = parent::model("DiscountModel");

            $discount = $discountModel->searchDiscount($_POST['code']);

            if(empty($discount)) {
                echo 0;
            } elseif($discount['SoLuongSuDung'] > 0){
                echo $discount['ChietKhau'];
            } else echo 0;
        } else echo -1;
    }
    public function updateDiscount() {

    }
}