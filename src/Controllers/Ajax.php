<?php
class Ajax extends BaseController
{
    public function __construct($params)
    {
        parent::__construct($params);
    }

    public function searchproduct() {
        $keyword= "";
        if(isset($_POST['keyword'])){
            $keyword = $_POST['keyword'];
        }

        parent::view("Templates.search",[
            "result" => $keyword,
        ]);
    }
    
    public function getcart() {
        $total = 450000;
        parent::view("Templates.sidecart",[
            "total" => $total,
        ]);
    }
}
