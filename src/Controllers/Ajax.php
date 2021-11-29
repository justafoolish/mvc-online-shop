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

        $this->view("Templates.search",[
            "result" => $keyword,
        ]);
    }

    function getcart() {
        $this->view("Templates.sidecart",[
            "cart"=>"cart",
        ]);
    }
}
