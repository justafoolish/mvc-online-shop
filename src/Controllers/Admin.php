<?php
class Admin extends AdminController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    function index()
    {
        //Todo: is Login ? Dashboard / Login
        if(empty($this->adminLogin)) {
            $this->login();
        } else {
            if(strtolower($this->params[0]) === "logout") {
                unset($_SESSION['AdminLogin']);
                $this->adminLogin = [];
                header("Location: ".BASE_URL."/Admin/");
            }
            $customerModel = parent::model("CustomerModel");
            $productModel = parent::model("ProductModel");
            $orderModel = parent::model("OrderModel");

            $customerCount = $customerModel->totalCustomer();
            $productCount = $productModel->totalProduct();
            $orderCount = $orderModel->totalOrder();
            $profit = $orderModel->totalProfit();

            parent::view("Admin.Dashboard.index", [
                "totalCustomer" => $customerCount,
                "totalProduct" => $productCount,
                "totalOrder" => $orderCount,
                "profit" => $profit
            ]);
        }
    }

    function login() {
        parent::view("Admin.Login.index", []);
    }

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
                //Verify bcrypt
                // $confirmPassword = password_verify($data['password'],$customer['Password']) ? 1 : 0; 
                $confirmPassword = $data['password'] == $employee['Password'] ? 1 : 0; 

                if($confirmPassword) {
                    unset($employee['Password']);
                    $_SESSION['AdminLogin'] = $employee;
                }
                echo $confirmPassword;
            }
        } 
    }

}
