<?php
class OrderManage extends AdminController
{

    function __construct($params)
    {
        parent::__construct($params);
    }

    public function index()
    {
        $orderModel = parent::model("OrderModel");
        $customerModel = parent::model("CustomerModel");

        $orders = $orderModel->getAllOrder();
        
        foreach ($orders as $key =>$value) {
            $orders[$key]['TenKhachHang'] = $customerModel->getCustomer([
                "MaKhachHang" => $value['MaKhachHang'],
            ])['TenKhachHang'];
        }

        parent::view("Admin.Order.index", [
            "order" => $orders
        ]);
    }

    function orderDetail($orderID = "") {
        if(empty($orderID)) {
            header("Location: ".BASE_URL."/OrderManage/");
        }
        else {
            $orderModel = parent::model("OrderModel");
            $orderDetailModel = parent::model("OrderDetailModel");
            $order = $orderModel->getOrder($orderID);
            $detail = $orderDetailModel->getAllOrderDetail($orderID);

            $this->print($detail);
            $this->print($order);
            parent::view("Admin.Order.detail", []);
        }
    }
}
