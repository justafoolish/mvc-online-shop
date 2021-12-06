<?php
class Account extends CustomerController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    function index()
    {
        if(empty($this->customerLogin)) {
            $this->login();
        } else {
            header('Location: '.BASE_URL."/Home/");
        }
    }
    
    function login()
    {
        if(!empty($this->customerLogin)) {
            header('Location: '.BASE_URL."/Home/");
        }
        parent::view("Account.login", [
            "customerLogin" => $this->customerLogin,
            "collections" => $this->collections,
            "totalCartItem" => $this->totalCartItem
        ]);
    }

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

    function checkLogin() {
        if(isset($_POST['submit'])) {
            $data['email'] = $_POST['email'];
            $data['password'] = $_POST['password'];
            
            $customerModel = parent::model("CustomerModel");
            
            $customer = $customerModel->getCustomer([
                "Email" => $data['email'],
            ]);

            if(empty($customer)) {
                echo -1;
            } else {
                //Verify bcrypt
                $confirmPassword = password_verify($data['password'],$customer['Password']) ? 1 : 0; 

                if($confirmPassword) {
                    unset($customer['Password']);
                    $_SESSION['CustomerLogin'] = $customer;
                }
                echo $confirmPassword;
            }
        }
    }

    function logout() {
        if($this->customerLogin) {
            unset($_SESSION['CustomerLogin']);
            $this->customerLogin = [];
        }
        header("Location: ".BASE_URL);
    }
}
