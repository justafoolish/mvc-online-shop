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
        $customerModel = parent::model("CustomerModel");
        $orderModel = parent::model("OrderModel");

        $customers = $customerModel->getAllCustomer();
        
        foreach($customers as $key => $val) {

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
