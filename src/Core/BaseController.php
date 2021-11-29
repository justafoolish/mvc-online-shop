<?php
class BaseController
{
    protected $params = [];
    protected $collections = [];

    function __construct($params)
    {
        $this->params = $params;
        $this->collections = [
            ["id" => "1", "name" => "Tops"],
            ["id" => "2", "name" => "Bottoms"],
            ["id" => "3", "name" => "Hats"],
            ["id" => "4", "name" => "Bags"],
        ];
    }
    public function view($viewPath, $data = [])
    {
        foreach ($data as $key => $value) $$key = $value;
        require_once "./src/Views/" . str_replace('.', '/', $viewPath) . ".php";
    }
}
