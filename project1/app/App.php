<?php
class App
{
    private $__controller, $__action, $__params;
    public function __construct()
    {
        global $routes ;
        if(!empty($routes['default_controller'])){
            $this->__controller = $routes['default_controller']; // de dung duoc thi phai goi bien global
        }
        $this->__action = 'index';
        $this->params = [];
        $url = $this->handleUrl();
    }
    public function getUrl()
    {
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        } else {
            $url = "/";
        }

        return $url;
    }
    public function handleUrl()
    {
        $url = $this->getUrl();
        $urlArr = array_filter(explode("/", $url));
        $urlArr = array_values($urlArr);
        // xu ly controller
        if (!empty($urlArr[0])) {
            $this->__controller = ucfirst($urlArr[0]);
        }else{
            $this->__controller = ucfirst($this->__controller);
        }
        if (file_exists("app/controllers/" . $this->__controller . ".php")) {
            require_once "controllers/" . $this->__controller . ".php";
            echo $this->__controller ;
            // kiem tra class $this->__controller ton tai
           if(class_exists( $this->__controller )){
            $this->__controller = new $this->__controller();  // khoi tao doi tuong trong home
           }else{
               $this->loadError('404');
           }
            /*  Array
            (
                [0] => home     controller , Home la class 
                [1] => index    action , index la phuong thuc trong class home
                [2] => 1    }
                [3] => 2    }   => params , cac tham so truyen vao phuong thuc 
                [4] => 3    }
            ) */
            unset($urlArr[0]);   // unset controller de lay cac tham so sau no
            /*  Array
        (
            [1] => index    action , index la phuong thuc trong class home
            [2] => 1    }
            [3] => 2    }   => params , cac tham so truyen vao phuong thuc 
            [4] => 3    }
        ) */
        } else {
            require_once "app/error/404.php";
        }
        // xu ly action 
        if (!empty($urlArr[1])) {
            $this->__action = $urlArr[1];
            unset($urlArr[1]);  // unset action sau do chi con cac tham so 
            array_values($urlArr);
            /*  Array
            (
                [2] => 1    }
                [3] => 2    }   => params , cac tham so truyen vao phuong thuc 
                [4] => 3    }
            ) */
        }
         // xu ly params
        $this->__params = array_values($urlArr); // array_values tao lai thu tu cho khoa
       // kiem tra method ton tai lai
       if(method_exists($this->__controller,$this->__action)){ // method_exists(object,method) 
        call_user_func_array([$this->__controller, $this->__action],$this->__params);
       }else{
           $this->loadError('404');
       }
        
    }
    public function LoadError($name = '404')
    {
        require_once "app/error/$name.php";
    }
}
