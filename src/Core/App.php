<?php
class App
{
    protected $controller = "Home";
    protected $action = "index";
    protected $params = [];

    function __construct()
    {
        $url = $this->urlProcess();
        
        // $file = strtolower($url[0]) == "admin" ? "admin" : $url[0]; 
        if (!empty($url[0]) && file_exists("./src/Controllers/" . ucfirst(strtolower($url[0])) . ".php")) {
            $this->controller = ucfirst(strtolower($url[0]));
            unset($url[0]);
        }

        require_once "./src/Controllers/" . $this->controller . ".php";

        if (isset($url[1])) {
            if (method_exists($this->controller, strtolower($url[1]))) {
                $this->action = strtolower($url[1]);
            }
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];

        $contr = strval($this->controller);
        $act = strval($this->action);
        $pars = array_values($this->params);
        // echo $act;

        $contrObject = new $contr($pars);
        // $contrObject->$act($pars);
        call_user_func_array([$contrObject, $act], $pars);
    }

    public function urlProcess()
    {
        if( isset($_GET["url"]) ){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        } 
        return [];
    }
}
