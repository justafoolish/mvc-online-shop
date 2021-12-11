<?php 
class ProductManage extends AdminController {

    function __construct($params)
    {
        parent::__construct($params);
    }

    function index() {
        //Todo: Check login first
        //Để tạm ! để confirm đã login
        if(empty($this->adminLogin)) {
            header("Location: ".BASE_URL."/Admin");
        }
        else {
            $productModel = parent::model("ProductModel");
            
            $products = $productModel->getAllProducts();
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
            $variantModel = parent::model("VariantModel");
            
            $product = $productModel->getProduct($pid); //Lấy thông tin sản phẩm theo product ID
            
            $categories = $categoryModel->getAllCategory(); //Lấy thông tin tất cả danh mục cho view option
            
            $variant = $variantModel->getAllVariants($product['MaSP']);
            
            // $this->print($variant);
            parent::view("Admin.Product.detail", [
                "product" => $product,
                "categories" => $categories,
                "variant" => $variant
            ]);
        }
    }

    function inventory() {
        $productModel = parent::model("ProductModel");
        $variantModel = parent::model("VariantModel");

        $products = $productModel->getAllProducts();

        foreach($products as $key => $product) {
            $products[$key]['Variants'] = $variantModel->getAllVariants($product['MaSP']);
        }        

        // $this->print($products);
        parent::view("Admin.Inventory.index", [
            "products" => $products,
            "minQuantity" => 5
        ]);
    }

    function category($categoryID = "") {
        $categoryModel = parent::model("CategoryModel");
        if(empty($categoryID)) {
            $getAll = $categoryModel->getAllCategory();
            $productModel = parent::model("ProductModel");

            $category = [];
            foreach($getAll as $cat) {
                $cat['SoLuong'] = $productModel->countTotalProducts($cat['MaDanhMuc']);
                array_push($category,$cat);
            }

            parent::view("Admin.Category.index", [
                "category" => $category
            ]);
        }
        else {
            $getCategory = $categoryModel->getCategory($categoryID);
            parent::view("Admin.Category.detail", [
                "categoryDetail" => $getCategory
            ]);
        }
    }

    function updateVariantQuantity()
    {
        if(isset($_POST['pid']) && isset($_POST['size']) && isset($_POST['quantity'])) {
            $data['MaSP'] = $_POST['pid'];
            $data['MaSize'] = $_POST['size'];
            $quantity['SoLuong'] = $_POST['quantity'];

            // $this->print($data);

            $variantModel = parent::model("VariantModel");

            if($variantModel->updateQuantity($data,$quantity)) {
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

            // echo json_encode($sizes);
            foreach ($sizes as $size) {
                $quantityByVariant = $productModel->getQuantityByVariant($pid, $size);
                if($quantityByVariant > 0) {
                    echo $quantityByVariant;
                    break;
                }
            }
        } else {
            echo 0;
        }
    }
}