<?php
class Collection extends BaseController
{
    public function __construct($params)
    {
        parent::__construct($params);
    }
    public function index()
    {
        $this->view("Collection.index", [
            "collections" => $this->collections,
        ]);
    }
    public function show()
    {
        $this->view("Collection.index", [
            "collections" => $this->collections,
        ]);
    }
    public function product()
    {
        $this->view("Collection.product", [
            "collections" => $this->collections,
        ]);
    }
    public function searchproduct() {
        $keyword= "";
        if(isset($_POST['keyword'])){
            $keyword = $_POST['keyword'];
        }

        $this->view("Templates.search",[
            "result" => "result",
        ]);
    }
}
