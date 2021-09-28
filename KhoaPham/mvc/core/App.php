<?php
class App
{
    // http://localhost/PHP/KhoaPham/HOME/SayHi/1/2/3
    protected $controllers = "Home";
    protected $action = "SayHI";
    protected $param = [];
    public function __construct()
    {
        // Array ( [0] => HOME [1] => action [2] => 1 [3] => 2 [4] => 3 )
        $arr = $this->UrlProcess();
        // print_r($arr);
        // XU LY controllers
        if (!isset($arr[0])) {
            $ControTemp = "";
        } else {
            $ControTemp = $arr[0];
        }
        if (file_exists("./mvc/controller/" . $ControTemp . ".php")) {
            $this->controllers = $arr[0];
            unset($arr[0]);
        }
        require_once "./mvc/controller/" . $this->controllers . ".php";
        $this->controllers = new $this->controllers;
        // echo $this->controllers;

        // su ly action
        if (isset($arr[1])) {
            if (method_exists($this->controllers, $arr[1])) {
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        // xu ly param
        $this->param = $arr ? array_values($arr) : [];

        call_user_func_array([$this->controllers, $this->action], $this->param); // truyen vao ten lop($this->controllers) , ten ham muon chay($this->action) , tham so($this->param)
    }
    public function UrlProcess()
    {
        // /HOME/SayHi/1/2/3
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
