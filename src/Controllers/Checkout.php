<?php
class Checkout extends CustomerController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    function index()
    {
        if (empty($this->customerLogin)) {
            header('Location: ' . BASE_URL . "/Account");
        } else {
            if (isset($_SESSION['cart'])) {
                $cart = [];
                $cart = $_SESSION['cart'];

                parent::view("Checkout.index", [
                    "customerLogin" => $this->customerLogin,
                    "collections" => $this->collections,
                    "totalCartItem" => $this->totalCartItem,
                    "cart" => $cart,
                ]);
            } else header("Location: " . BASE_URL);
        }
    }

    function submitOrder() {
        /*----------    
            Todo: 
            1. Tính tổng tiền hóa đơn
            2. Apply giảm giá hóa đơn
            3. 
            1. Tạo hóa đơn: 
            [
                mã hóa đơn, mã khách hàng, ngày tạo(current date php), tổng tiền, trạng thái thanh toán, địa chỉ giao hàng
            ]        
        ----------*/
        if(isset($_POST['submitBtn'])) {
            $discountModel = parent::model("DiscountModel");
            $orderModel = parent::model("OrderModel");
            $orderDetailModel = parent::model("OrderDetailModel");

            $checkInsert = true;
            $customer = $this->customerLogin;
            $carts = $this->getCart();

            // $data['MaHoaDon'] = 16;
            $data['MaGiamGia'] = isset($_POST['discount']) && !empty($_POST['discount']) ? $_POST['discount']  : "";
            $data['DiaChiGiaoHang'] = isset($_POST['address']) && empty($_POST['address']) ? $_POST['address']  : $customer['DiaChi'];
            $data['MaKhachHang'] = $customer['MaKhachHang'];
            $data['NgayTao'] = date('Y-m-d');
            $data['TrangThaiThanhToan'] = 0;

            $data['TongTien'] = 0;
            foreach($carts as $product) {
                $data['TongTien'] += (intval($product['DonGia']) * (1 - intval($product['ChietKhau'])/100)) * intval($product['SoLuong']);
            }
            $discount = $discountModel->searchDiscount($data['MaGiamGia']);
            if(!empty($discount)) {
                $data['TongTien'] = (1 - intval($discount['ChietKhau'])/100) * $data['TongTien'];
            }

            if($orderModel->insertOrder($data)) {
                $orderDetail['MaHoaDon'] = $orderModel->getLastID();
            } else {
                $checkInsert = false;
            }
            /*----------
                Todo:
                1. Lấy ra mã hóa đơn vừa thêm
                2. Lặp từng sản phẩm thêm vào chi tiết hóa đơn

            ----------*/
            if($checkInsert) {
                foreach($carts as $product) {
                    $orderDetail['MaSP'] = $product['MaSP'];
                    $orderDetail['MaSize'] = strtoupper($product['size']);
                    $orderDetail['SoLuong'] = $product['SoLuong'];
                    $orderDetail['DonGia'] = $product['DonGia'];
                    $orderDetail['ChietKhau'] = $product['ChietKhau'];

                    if(!$orderDetailModel->insertOrderDetail($orderDetail)) {
                        $checkInsert = false;
                    }
                }
            }

            if($checkInsert) {
                $this->removeCart();
                header('Location: '.BASE_URL."/Home");
            }
            else {
                echo "<script>"; 
                echo "alert('Thanh toán thất bại'); "; 
                echo "window.open('./','_self')</script>";
            }
                
        } else header("Location: ".BASE_URL."/Home/");
    }
}
