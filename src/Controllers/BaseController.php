<?php
class BaseController
{
    protected $params = [];

    function __construct($params)
    {
        $this->params = $params;
    }
    protected static function view($viewPath, $data = [])
    {
        foreach ($data as $key => $value) $$key = $value;
        require_once "./src/Views/" . str_replace('.', '/', $viewPath) . ".php";
    }

    protected static function model($model) {
        require_once "./src/Models/".$model.".php";
        return new $model();
    }

    protected function print($data) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}
