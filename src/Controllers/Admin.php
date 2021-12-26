<?php
class Admin extends AdminController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    //Hiển thị trang đăng nhập admin (Nếu đã đăng nhập hiển thị trang chủ admin)
    function index()
    {
        //Todo: is Login ? Dashboard / Login
        if(empty($this->adminLogin)) {
            parent::view("Admin.Login.index", []);
        } else {
            if(strtolower($this->params[0]) === "logout") {
                unset($_SESSION['AdminLogin']);
                $this->adminLogin = [];
                header("Location: ".BASE_URL."/Admin/");
            }
            $productModel = parent::model("ProductModel");
            $orderModel = parent::model("OrderModel");

            $productCount = $productModel->totalProduct();
            $orderCount = $orderModel->totalOrder();
            $profit = $orderModel->totalProfit();
            $income = $orderModel->totalProfit(["TrangThaiThanhToan" => 1]);

            parent::view("Admin.Dashboard.index", [
                "income" => $income,
                "totalProduct" => $productCount,
                "totalOrder" => $orderCount,
                "profit" => $profit
            ]);
        }
    }

    //Xác nhận đăng nhập
    function checkLoginAdmin() {
        if(isset($_POST['submit'])) {
            $data['email'] = $_POST['email'];
            $data['password'] = $_POST['password'];
            
            $employeeModel = parent::model("EmployeeModel");
            
            $employee = $employeeModel->getEmployee([
                "Email" => $data['email'],
            ]);

            if(empty($employee)) {
                echo -1;
            } else {
                echo $this->verifyLogin($employee, $data);
            }
        } 
    }

    //Kiểm tra đăng nhập
    function verifyLogin($admin, $data) {
        if(empty($admin)) {
            return -1;
        } else {
            $confirmPassword = $data['password'] == $admin['Password'] ? 1 : 0; 

            if($confirmPassword) {
                unset($admin['Password']);
                $_SESSION['AdminLogin'] = $admin;
            }
            return $confirmPassword;
        }
    }
}
