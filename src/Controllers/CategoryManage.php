<?php 
class CategoryManage extends AdminController {

    function __construct($params)
    {
        parent::__construct($params);
    }

    function index() {
        if(empty($this->adminLogin)) {
            header("Location: ".BASE_URL."/Admin");
        }
        else {
            $categoryModel = parent::model("CategoryModel");
            $categories = $categoryModel->getAllCategory();
            $productModel = parent::model("ProductModel");

            foreach($categories as $key => $val) {
                $categories[$key]['SoLuong'] = $productModel->totalProduct(["DanhMuc" => $val['MaDanhMuc']]);
            }

            parent::view("Admin.Category.index", [
                "category" => $categories
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
            $categories = $categoryModel->getCategory(["MaDanhMuc" => $categoryID]);
            
            $products = $productModel->getAllProduct([],["DanhMuc" => $categoryID]);
            parent::view("Admin.Category.detail", [
                "categoryDetail" => $categories,
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