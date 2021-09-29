<?php
// dung controller trong file Controller trong CORE
class Home extends Controller {
    function SayHI(){
        $teo = $this->model('SinhVienModel');
        echo $teo->GetSV();
    }
    function Show($a,$b){
        // goi Model
        $teo = $this->model('SinhVienModel');
        $tong = $teo->Tong($a,$b); // chua co ao , phai co view 
        // goi View
        $this->view("aodep",["page"=>"news","number"=>$tong,"Mau"=>"red",
    "sothich"=>["A","B","C"]
    ]); // require aodep.php
    }
}
