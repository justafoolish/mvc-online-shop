<?php 
class CategoryManage extends AdminController {

    function __construct($params)
    {
        parent::__construct($params);
    }

    function index() {
        //Todo: Check login first
        //Để tạm ! để confirm đã login
        if(!empty($this->adminLogin)) {
            header("Location: ".BASE_URL."/Admin");
        }
        else {
            $categoryModel = parent::model("CategoryModel");
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
    }

    function detail($categoryID = "") {
        if(empty($categoryID)) {
            $this->index();
        }
        else {
            $categoryModel = parent::model("CategoryModel");
            $productModel = parent::model("ProductModel");
            $getCategory = $categoryModel->getCategory($categoryID);
            $products = $productModel->getAllProducts("",$categoryID);
            parent::view("Admin.Category.detail", [
                "categoryDetail" => $getCategory,
                "products" => $products
            ]);
        }
    }
    function submitNewCategory() {
        if(isset($_POST['submit'])) {
            $data['TenDanhMuc'] = $_POST['name'];
            $data['MoTa'] = $_POST['describe'];

            $categoryModel = parent::model("CategoryModel");
            if($categoryModel->insertCategory($data)) {
                header("Location: ".BASE_URL."/CategoryManage/");
            } else $this->addCategory($data);
        } else $this->addCategory();
    }

    function addCategory($previousData = [
        "TenDanhMuc" => "",
        "MoTa" => ""
    ]) {
        parent::view("Admin.Category.add", [
            "previousData" => $previousData,
        ]);
    }

}