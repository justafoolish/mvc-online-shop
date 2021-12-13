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

        $orders = $orderModel->getAllOrders();

        foreach ($orders as $key => $value) {
            $orders[$key]['TenKhachHang'] = $customerModel->getOneCustomer([
                "MaKhachHang" => $value['MaKhachHang'],
            ])['TenKhachHang'];
        }

        parent::view("Admin.Order.index", [
            "order" => $orders
        ]);
    }

    function orderDetail($orderID = "")
    {
        if (empty($orderID)) {
            header("Location: " . BASE_URL . "/OrderManage/");
        } else {
            $orderModel = parent::model("OrderModel");
            $orderDetailModel = parent::model("OrderDetailModel");
            $customerModel = parent::model("CustomerModel");

            $order = $orderModel->getOrder($orderID);
            $detail = $orderDetailModel->getAllOrderDetail($orderID);
            $customer = $customerModel->getOneCustomer([
                "MaKhachHang" => $order['MaKhachHang']
            ]);

            parent::view("Admin.Order.detail", [
                "order" => $order,
                "detail" => $detail,
                "customer" => $customer
            ]);
        }
    }

    function confirmOrder()
    {
        if (empty($this->adminLogin)) {
            header("Location: " . BASE_URL . "/Admin");
        } else {
            //Kiểm tra đăng nhập trước
            if (!empty($this->params)) {
                // echo $this->params[0];
                $orderModel = parent::model("OrderModel");
                $updateOrder =  $orderModel->updateOrder([
                    "MaHoaDon" => $this->params[0],
                    ],[
                    "TrangThaiThanhToan" => 1
                ]);

                if($updateOrder) {
                    header("Location: " . BASE_URL . "/OrderManage/OrderDetail/".$this->params[0]);
                } else {
                    header("Location: " . BASE_URL . "/OrderManage/OrderDetail/".$this->params[0]);
                }
            } else {
                header('Location: ' . BASE_URL . "/OrderManage");
            }
        }
    }
}
