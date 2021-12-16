<?php 
class ProductManage extends AdminController {

    function __construct($params)
    {
        parent::__construct($params);
    }

    function index() {
        if(empty($this->adminLogin)) {
            header("Location: ".BASE_URL."/Admin");
        }
        else {
            $productModel = parent::model("ProductModel");
            
            $products = $productModel->getAllProduct();
            parent::view("Admin.Product.index", [
                "products" => $products
            ]);
        }
    }

    function detail($pid="") 
    {
        if(empty($pid)) {
            $this->index();
        }
        else {
            $productModel = parent::model("ProductModel");
            $categoryModel = parent::model("CategoryModel");
            
            $product = $productModel->getProductDetail(["MaSP" => $pid]); //Lấy thông tin sản phẩm theo product ID
            
            $categories = $categoryModel->getAllCategory(); //Lấy thông tin tất cả danh mục cho view option
            
            parent::view("Admin.Product.detail", [
                "product" => $product,
                "categories" => $categories,
            ]);
        }
    }

    function formInsert() 
    {
        if(empty($this->adminLogin)) {
            $this->index();
        }
        else {
            $categoryModel = parent::model("CategoryModel");
            $categories = $categoryModel->getAllCategory(); //Lấy thông tin tất cả danh mục cho view option

            parent::view("Admin.Product.add", [
                "categories" => $categories,
            ]);
        } 
    }

    function inventory() {
        $productModel = parent::model("ProductModel");

        $products = $productModel->getProductVariant();

        parent::view("Admin.Inventory.index", [
            "products" => $products,
            "minQuantity" => 5
        ]);
    }

    function updateVariantQuantity()
    {
        if(isset($_POST['pid']) && isset($_POST['size']) && isset($_POST['quantity'])) {
            $data['MaSP'] = $_POST['pid'];
            $data['MaSize'] = $_POST['size'];
            $quantity['SoLuong'] = $_POST['quantity'];

            $productModel = parent::model("ProductModel");

            if($productModel->updateQuantity($data,$quantity)) {
                echo $quantity['SoLuong'];
            } else echo 0;
        }

        else echo -1;
    }

    function getQuantity() {
        if(isset($_POST['pid']) && isset($_POST['size'])) {
            $pid = $_POST['pid'];
            $sizes = $_POST['size'];
            $productModel = parent::model("ProductModel");

            foreach ($sizes as $size) {
                $quantityByVariant = $productModel->getQuantity([
                    "MaSP" => $pid,
                    "MaSize" => $size,
                ]);
                if($quantityByVariant > 0) {
                    echo $quantityByVariant;
                    break;
                }
            }
        } else {
            echo 0;
        }
    }

    function createProduct()
    {
        
        $dirUpload = "./public/images/products/";

        if(isset($_POST['submit'])) {
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
            if($insertedID) {
                move_uploaded_file($_FILES['Hinh1']['tmp_name'],$dirUpload. $data['Hinh1']);
                move_uploaded_file($_FILES['Hinh2']['tmp_name'],$dirUpload. $data['Hinh2']);

                // Lấy mã sản phẩm vừa insert
                echo $insertedID;
                foreach($variant as $key => $value) {
                    if(!$productModel->insertVariant([
                        "MaSP" => $insertedID,
                        "MaSize" => $key,
                        "SoLuong" => $value
                    ])) $checkInsert = false;
                }
            } else $checkInsert = false;

            if($checkInsert) {
                header("Location: ".BASE_URL."/ProductManage");
            } else header("Location: ".BASE_URL."/ProductManage/FormInsert");

        } else header("Location: ".BASE_URL."/ProductManage/FormInsert");
    }
}