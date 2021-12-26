<?php 
class DiscountManage extends AdminController {

    function __construct($params)
    {
        parent::__construct($params);
    }

    //Hiển thị màn hình quản lý khuyến mãi
    public function index() {
        //Todo: Check login first
        //Để tạm ! để confirm đã login
        if(empty($this->adminLogin)) {
            header("Location: ".BASE_URL."/Admin");
        }
        else {
            $discountModel = parent::model("DiscountModel");
            $productModel = parent::model("ProductModel");

            $products = $productModel->getAllProduct();
            $discounts = $discountModel->getAllDiscount();
            parent::view("Admin.Discount.index", [
                "discounts" => $discounts,
                "products" => $products
            ]);
        }
    }

    //Hiển thị form tạo mới khuyến mãi
    public function formAdd() {
        echo __METHOD__;
        if(empty($this->adminLogin)) {
            header("Location: ".BASE_URL."/Admin");
        }
        else {

            parent::view("Admin.Discount.add", []);
        }
    }

    //Xác nhận tạo mới mã khuyến mãi
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

}