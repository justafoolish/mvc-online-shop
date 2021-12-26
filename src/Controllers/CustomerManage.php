<?php
class CustomerManage extends AdminController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    //Hiển thị màn hình quản lý khách hàng
    function index()
    {
        // //Todo: is Login ? Dashboard / Login
        if (empty($this->adminLogin)) {
            header("Location: " . BASE_URL . "/Admin");
        } else {
            $customerModel = parent::model("CustomerModel");

            $customers = $customerModel->getAllCustomer();

            parent::view("Admin.Customer.index", [
                "customer" => $customers
            ]);
        }
    }

    //Hiển thị màn hình chi tiết thông tin khách hàng
    function viewDetail($customerID = "")
    {
        if (empty($customerID)) {
            header("Location: " . BASE_URL . "/CustomerManage");
        } else {
            $orderModel = parent::model("OrderModel");
            $customerModel = parent::model("CustomerModel");

            $customer = $customerModel->getCustomerDetail(["MaKhachHang" => $customerID]);
            unset($customer['Password']);

            $orders = $orderModel->getAllOrders(["khachhang.MaKhachHang" => $customerID]);

            parent::view("Admin.Customer.detail", [
                "customer" => $customer,
                "orders" => $orders
            ]);
        }
    }
}
