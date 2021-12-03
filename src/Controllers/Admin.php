<?php
class Admin extends BaseController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    function index()
    {
        parent::view("Admin.Dashboard.index", []);
    }

    function dashboard() {
        $this->index();
    }

    function inventory() {
        parent::view("Admin.Inventory.index", []);
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
    function addcategory() {
        parent::view("Admin.Category.add", []);
    }

    function customer() {
        parent::view("Admin.Customer.index", []);
    }

    function discount() {
        parent::view("Admin.Discount.index", []);
    }

    function adddiscound() {
        parent::view("Admin.Discount.add", []);
    }

    function automationdiscound() {
        parent::view("Admin.Discount.auto_add", []);
    }
    
    function employee() {
        parent::view("Admin.Employee.index", []);
    }

    function login() {
        parent::view("Admin.Login.index", []);
    }

    function order($orderID = "") {
        if(empty($orderID)) {
            parent::view("Admin.Order.index", []);
        }
        else {
            parent::view("Admin.Order.detail", []);
        }
    }

    function product($pid = "") {
        if(empty($pid)) {
            $productModel = parent::model("ProductModel");

            $products = $productModel->getAllProducts();
            parent::view("Admin.Product.index", [
                "products" => $products
            ]);
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

    function insertproduct() {
        parent::view("Admin.Product.add", []);
    }

    function report() {
        parent::view("Admin.Report.index", []);
    }
}
