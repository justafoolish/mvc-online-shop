<?php
class OrderManage extends AdminController
{

    function __construct($params)
    {
        parent::__construct($params);
    }

    public function index()
    {
        if (empty($this->adminLogin)) {
            header("Location: " . BASE_URL . "/Admin");
        } else {
            $orderModel = parent::model("OrderModel");

            $orders = $orderModel->getAllOrders();

            parent::view("Admin.Order.index", [
                "order" => $orders
            ]);
        }
    }

    function orderDetail($orderID = "")
    {
        if (empty($orderID)) {
            header("Location: " . BASE_URL . "/OrderManage/");
        } else {
            $orderModel = parent::model("OrderModel");
            $discountModel = parent::model("DiscountModel");


            $order = $orderModel->getOrder(["MaHoaDon" => $orderID]);
            $detail = $orderModel->getAllOrderDetail(["MaHoaDon" => $orderID]);

            $order['ChietKhau'] = $discountModel->getDiscount(['MaKhuyenMai' => $order['MaGiamGia']])['ChietKhau'] ?? 0;

            parent::view("Admin.Order.detail", [
                "order" => $order,
                "detail" => $detail,
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
                ], [
                    "TrangThaiThanhToan" => 1
                ]);

                if ($updateOrder) {
                    header("Location: " . BASE_URL . "/OrderManage/OrderDetail/" . $this->params[0]);
                } else {
                    header("Location: " . BASE_URL . "/OrderManage/OrderDetail/" . $this->params[0]);
                }
            } else {
                header('Location: ' . BASE_URL . "/OrderManage");
            }
        }
    }

    function report()
    {
        if (empty($this->adminLogin)) {
            header("Location: " . BASE_URL . "/Admin");
        } else {
            $currentDate = intval(date("d"));
            $currentDate++;
            $dateProfit = [];
            while($currentDate-- > 1) {
                $dateProfit[date("Y-m")."-$currentDate"] = $this->getProfit($currentDate);
                if(!$dateProfit[date("Y-m")."-$currentDate"]['TongHoaDon']) unset($dateProfit[date("Y-m")."-$currentDate"]);
            }
            parent::view("Admin.Report.index",[
                "profits" => $dateProfit
            ]);
        }
    }

    function getProfit($date = "") {
        if(empty($date)) return 0;
        // echo __METHOD__ ;
        // echo date("Y-m")."-02";
        $orderModel = parent::model("OrderModel");
        $profit = $orderModel->totalProfit(["NgayTao" => date("Y-m")."-$date"], true);
    //
            // $this->print($profit);

        if(isset($_POST['ajax'])) {
            echo json_encode($profit);
        }
        else return $profit;
    }
}
