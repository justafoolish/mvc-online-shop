<?php 
class CategoryManage extends AdminController {

    function __construct($params)
    {
        parent::__construct($params);
    }

    //Hiển thị màn hình quản lý danh mục
    function index() {
        if(empty($this->adminLogin)) {
            header("Location: ".BASE_URL."/Admin");
        }
        else {
            $categoryModel = parent::model("CategoryModel");
            $categories = $categoryModel->getAllCategory();

            parent::view("Admin.Category.index", [
                "category" => $categories
            ]);
        }
    }

    //Xác nhận thêm danh mục
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

    //Màn hình nhập mới danh mục
    function addCategory($previousData = [
        "TenDanhMuc" => "",
        "MoTa" => ""
    ]) {
        parent::view("Admin.Category.add", [
            "previousData" => $previousData,
        ]);
    }

}