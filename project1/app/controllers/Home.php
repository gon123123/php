<?php
echo "home day <br>";
class Home
{
    public $model ;
    public function __construct()
    {
        require_once _DIR_ROOT ."./app/models/HomeModel.php";
        $this->model = new HomeModel();
    }

    public function index()
    {
        $data = $this->model->getList();
        echo "<pre>";
        print_r($data);
        echo "</pre>";

        $detail = $this->model->getDetail(1);
        echo $detail ;
        // echo "Trang chu home";
    }
    // public function detail($id='', $sl=''){
    //     echo "id san pham : " .$id ."<br>";
    //     echo "slug " .$sl ."<br>" ;
    // }
    // public function search(){
    //     $keyword = $_GET["keyword"];
    //     echo "keyword can tim : " .$keyword ;
    // }
}
