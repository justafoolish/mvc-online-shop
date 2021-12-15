<?php
class CustomerManage extends AdminController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    function index()
    {
        // //Todo: is Login ? Dashboard / Login
        if (empty($this->adminLogin)) {
            header("Location: " . BASE_URL . "/Admin");
        } else {
            $customerModel = parent::model("CustomerModel");
            $orderModel = parent::model("OrderModel");

            $customers = $customerModel->getAllCustomer();

            foreach ($customers as $key => $val) {

                $customers[$key]['TongDonHang'] = $orderModel->countTotalCustomerOrder(["MaKhachHang" => $val['MaKhachHang']]) ?? 0;
                $customers[$key]['TongTien'] = $orderModel->countTotalCustomerSpend(["MaKhachHang" => $val['MaKhachHang']]) ?? 0;
                // $c['NgayGanNhat'] = $orderModel->lastestOrder($c['MaKhachHang']);
                // if($c['NgayGanNhat'] == NULL){
                //     $c['NgayGanNhat'] = "0";
                // }
                unset($customers[$key]['Password']);
            }

            parent::view("Admin.Customer.index", [
                "customer" => $customers
            ]);
        }
    }

    function viewDetail($customerID = "")
    {
        if (empty($customerID)) {
            header("Location: " . BASE_URL . "/CustomerManage");
        } else {
            $orderModel = parent::model("OrderModel");
            $customerModel = parent::model("CustomerModel");

            $customer = $customerModel->getCustomerDetail(["MaKhachHang" => $customerID]);
            unset($customer['Password']);

            $orders = $orderModel->getAllOrders(["MaKhachHang" => $customerID]);

            parent::view("Admin.Customer.detail", [
                "customer" => $customer,
                "orders" => $orders
            ]);
        }
    }
}
