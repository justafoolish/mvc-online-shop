<?php
class Collection extends BaseController
{
    public function __construct($params)
    {
        parent::__construct($params);
    }
    public function index()
    {
        parent::view("Collection.index", [
            "collections" => $this->collections,
        ]);
    }
    public function show()
    {
        parent::view("Collection.index", [
            "collections" => $this->collections,
        ]);
    }
    public function product()
    {
        parent::view("Collection.product", [
            "collections" => $this->collections,
        ]);
    }
}
