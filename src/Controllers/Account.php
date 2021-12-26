<?php
class Account extends CustomerController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    //Hiển thị trang đăng nhập (Nếu đã đăng nhập hiển thị trang cá nhân)
    function index()
    {
        if(empty($this->customerLogin)) {
            // $this->login();
            parent::view("Account.login", [
                "customerLogin" => $this->customerLogin,
                "collections" => $this->collections,
                "totalCartItem" => $this->totalCartItem
            ]);
        } else {
            if(strtolower($this->params[0]) === "logout") {
                unset($_SESSION['CustomerLogin']);
                $this->customerLogin = [];
                header("Location: ".BASE_URL);
            }
            else $this->viewOrder();
        }
    }

    //Hiển thị trang lịch sử mua hàng
    function viewOrder() {
        empty($this->customerLogin) && header("Location: ".BASE_URL."/Account");
        $orderModel = parent::model("OrderModel");
        if(empty($this->params)) {
            /*
                Todo:
                1. Gọi hàm get all order
                2. Truyền tham số vào hàm get all order dạng:
                [
                    "MaKhachHang" => ""
                ]
            */
            $orders = $orderModel->getAllOrders([
                "KhachHang.MaKhachHang" => $this->customerLogin["MaKhachHang"]    
            ]) ?? [];

            parent::view("Account.index", [
                "customerLogin" => $this->customerLogin,
                "collections" => $this->collections,
                "totalCartItem" => $this->totalCartItem,
                "orders" => $orders,
            ]);
        } else {
            $id = $this->params[0];
            $orders = $orderModel->getOrder([
                "MaHoaDon" => $id   
            ]) ?? [];

            $orderDetail = $orderModel->getAllOrderDetail([
                "MaHoaDon" => $id 
            ]) ?? [];

            parent::view("Account.order", [
                "customerLogin" => $this->customerLogin,
                "collections" => $this->collections,
                "totalCartItem" => $this->totalCartItem,
                "orders" => $orders,
                "details" => $orderDetail
            ]);
        }
    }

    //Hiển thị trang đăng ký
    function register()
    {
        if(!empty($this->customerLogin)) {
            header('Location: '.BASE_URL."/Home/");
        }
        parent::view("Account.register", [
            "customerLogin" => $this->customerLogin,
            "collections" => $this->collections,
            "totalCartItem" => $this->totalCartItem
        ]);
    }

    //Xác nhận đăng ký
    function checkRegister() {
        if(isset($_POST['submit'])) {
            $data['TenKhachHang'] = isset($_POST['name']) ? $_POST['name'] : "";
            $data['GioiTinh'] = $_POST['gender'] != "male" ? "Nam" : "Nữ";
            $data['Email'] = isset($_POST['email']) ? $_POST['email'] : "";
            $data['Password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
            $data['NgaySinh'] = isset($_POST['name']) ? date("Y-m-d",strtotime($_POST['dob'])) : "";
            $data['SDT'] = isset( $_POST['phone']) ? $_POST['phone'] : "";
            $data['DiaChi'] = isset( $_POST['address']) ? $_POST['address'] : "";

            $customerModel = parent::model("CustomerModel");

            echo $customerModel->insertCustomer($data);
        }
        else echo -1;
    }

    //Xác nhận đăng nhập
    function checkLogin() {
        if(isset($_POST['submit'])) {
            $data['email'] = $_POST['email'];
            $data['password'] = $_POST['password'];
            
            $customerModel = parent::model("CustomerModel");
            
            $customer = $customerModel->getCustomerDetail([
                "Email" => $data['email'],
            ]);

            echo $this->verifyLogin($customer,$data);
        }
    }

    //Kiểm tra đăng nhập
    function verifyLogin($customer, $data) {
        if(empty($customer)) {
            return -1;
        } else {
            //Verify bcrypt
            $confirmPassword = password_verify($data['password'],$customer['Password']) ? 1 : 0; 

            if($confirmPassword) {
                unset($customer['Password']);
                $_SESSION['CustomerLogin'] = $customer;
            }
            return $confirmPassword;
        }
    }
}
