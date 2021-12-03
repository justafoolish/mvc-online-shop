<?php
class Account extends BaseCustomer
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
            // header('Location: '.BASE_URL."/Home/");
            echo password_hash('abcabc@12', PASSWORD_DEFAULT);
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

    function checkregister() {
        if(isset($_POST['submit'])) {
            $data['firstname'] = $_POST['firstname'];
            $data['lastname'] = $_POST['lastname'];
            $data['gender'] = $_POST['gender'];
            $data['email'] = $_POST['email'];
            $data['password'] = $_POST['password'];
            
            echo "<pre>";
            print_r($data);
            echo "</pre>";

            //hash password bcrypt
            $hash = password_hash('khactuan', PASSWORD_DEFAULT);

        }
    }

    function checklogin() {
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

                //$confirmPassword = $customer['Password'] == $data['password'] ? 1 : 0;

                if($confirmPassword) {
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
