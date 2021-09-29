<!--  file controller nay dung de goi view va model cho controller CHINH-->
<?php
class Controller{
    public function model($model){
        require_once "./mvc/model/".$model.".php"; // goi SinhVienModel.php 
        return new $model;   // goi class SinhVienModel
    }
    public function view($view,$data=[]){
        require_once "./mvc/view/".$view.".php";
    }
}
?>
