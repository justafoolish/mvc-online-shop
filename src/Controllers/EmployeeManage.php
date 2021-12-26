<?php
class EmployeeManage extends AdminController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    //Hiển thị danh sách nhân viên
    function index()
    {
        // //Todo: is Login ? Dashboard / Login
        if (empty($this->adminLogin)) {
            header("Location: " . BASE_URL . "/Admin");
        } else {
            $employeeModel = parent::model("EmployeeModel");

            $employees = $employeeModel->getAllEmployee();
            parent::view("Admin.Employee.index", [
                "employees" => $employees
            ]);
        }
    }

    //Hiển thị form tạo nhân viên mới
    function formAdd()
    {
        if (empty($this->adminLogin)) {
            header("Location: " . BASE_URL . "/Admin");
        } else {
            parent::view("Admin.Employee.add", []);
        }
    }

    //Xác nhận tạo mới nhân viên
    function submitNewEmp()
    {
        if(isset($_POST['submit'])) {
            $employee['TenNhanVien'] = $_POST['name'] ?? "";
            $employee['ChucVu'] = $_POST['permission'] == 1 ? "Admin" : "Nhân Viên";
            $employee['Email'] = $_POST['email'] ?? "";
            $employee['Password'] = $_POST['password'] ?? "";
            $employee['SDT'] = $_POST['phone'] ?? "";
            $employee['DiaChi'] = $_POST['address'] ?? "";

            $this->print($employee);

            $employeeModel = parent::model("EmployeeModel");

            if($employeeModel->insertEmployee($employee)) {
                header("Location: " . BASE_URL . "/EmployeeManage");
            } else header("Location: ".BASE_URL."/EmployeeManage/FormAdd");

        } else header("Location: ".BASE_URL."/EmployeeManage");
    }
}
