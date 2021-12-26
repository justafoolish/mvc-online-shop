<?php
class ProductManage extends AdminController
{

    function __construct($params)
    {
        parent::__construct($params);
    }

    //Hiển thị màn hình quản lý sản phẩm
    function index()
    {
        if (empty($this->adminLogin)) {
            header("Location: " . BASE_URL . "/Admin");
        } else {
            $productModel = parent::model("ProductModel");

            $products = $productModel->getProductVariant();
            
            parent::view("Admin.Product.index", [
                "products" => $products
            ]);
        }
    }

    //Hiển thị màn hình thêm mới một sản phẩm
    function formInsert()
    {
        if (empty($this->adminLogin)) {
            $this->index();
        } else {
            $categoryModel = parent::model("CategoryModel");
            $categories = $categoryModel->getAllCategory(); //Lấy thông tin tất cả danh mục cho view option

            parent::view("Admin.Product.add", [
                "categories" => $categories,
            ]);
        }
    }

    //Hiển thị màn hình danh sách phiếu nhập hàng tồn kho
    function inventory()
    {
        $inventoryModel = parent::model("InventoryModel");

        $receipt = $inventoryModel->getAllReceipt();

        parent::view("Admin.Inventory.index", [
            "receipts" => $receipt
        ]);
    }

    //Hiển thị màn hình tạo mới phiếu nhập hàng tồn kho
    function updateInventory()
    {
        $productModel = parent::model("ProductModel");
        $inventory = parent::model("InventoryModel");

        $products = $productModel->getProductVariant();
        $suppliers = $inventory->getAllSups();

        // $this->print($suppliers);

        parent::view("Admin.Inventory.update", [
            "products" => $products,
            "minQuantity" => 5,
            "employee" => $this->adminLogin,
            "sups" => $suppliers,
        ]);
    }

    //Xác nhận tạo phiếu nhập hàng tồn kho
    function createInventoryReceipt()
    {
        # code...
        if (isset($_POST['submit'])) {
            $inventoryModel = parent::model("InventoryModel");
            $checkInsert = true;

            $products = $_POST['data'];
            $receipt['MaNhaCungCap'] = $_POST['supplier'];
            $receipt['NgayNhap'] = date('Y-m-d');
            $receipt['MaNhanVien'] = $this->adminLogin['MaNhanVien'];

            foreach ($products as $product) {
                $receipt['TongTien'] += intval($product['soluong']) * intval($product['dongia']);
            }

            //Lấy được dữ liệu phiếu nhập
            //Thêm phiếu nhập:
            if ($inventoryModel->insertInventoryReceipt($receipt)) {
                $receiptDetail['MaPhieuNhap'] = $inventoryModel->getLastID();
            } else {
                $checkInsert = false;
            }

            //Thêm chi tiết phiếu nhập
            if ($checkInsert) {
                foreach ($products as $product) {
                    $receiptDetail['MaSP'] = $product['masp'];
                    $receiptDetail['MaSize'] = strtoupper($product['size']);
                    $receiptDetail['SoLuong'] = $product['soluong'];
                    $receiptDetail['DonGia'] = $product['dongia'];

                    if (!$inventoryModel->insertReceiptDetail($receiptDetail)) {
                        $checkInsert = false;
                    } else {
                        $this->updateVariantQuantity($receiptDetail,$product['ton']);
                    }
                }
            }
            if($checkInsert) echo 1;
            else echo 0;
        } else echo -1;
    }

    //Cập nhật số lượng tồn kho
    function updateVariantQuantity($product,$inventory)
    {
        $productModel = parent::model("ProductModel");

        $data['MaSP'] = $product['MaSP'];
        $data['MaSize'] = $product['MaSize'];
        $quantity['SoLuong'] = intval($product['SoLuong']) + intval($inventory);

        $productModel->updateQuantity($data, $quantity);
    }

    //Xác nhận thêm sản phẩm
    function createProduct()
    {

        $dirUpload = "./public/images/products/";

        if (isset($_POST['submit'])) {
            $checkInsert = true;

            $data['TenSP'] = $_POST['TenSP'];
            $data['DanhMuc'] = $_POST['DanhMuc'];
            $data['Hinh1'] = $_FILES['Hinh1']['name'];
            $data['Hinh2'] = $_FILES['Hinh2']['name'];
            $data['DonGia'] = $_POST['DonGia'];
            $data['ChietKhau'] = $_POST['ChietKhau'];
            $data['MoTa'] = $_POST['MoTa'];
            $data['NgayNhap'] = date('Y-m-d');

            $variant = array_combine(array_values($_POST['variant']), array_values($_POST['variantValue']));
            $this->print($variant);
            $productModel = parent::model("ProductModel");

            $insertedID = $productModel->insertProduct($data);
            if ($insertedID) {
                move_uploaded_file($_FILES['Hinh1']['tmp_name'], $dirUpload . $data['Hinh1']);
                move_uploaded_file($_FILES['Hinh2']['tmp_name'], $dirUpload . $data['Hinh2']);

                // Lấy mã sản phẩm vừa insert
                echo $insertedID;
                foreach ($variant as $key => $value) {
                    if (!$productModel->insertVariant([
                        "MaSP" => $insertedID,
                        "MaSize" => $key,
                        "SoLuong" => $value
                    ])) $checkInsert = false;
                }
            } else $checkInsert = false;

            if ($checkInsert) {
                header("Location: " . BASE_URL . "/ProductManage");
            } else header("Location: " . BASE_URL . "/ProductManage/FormInsert");
        } else header("Location: " . BASE_URL . "/ProductManage/FormInsert");
    }
}
