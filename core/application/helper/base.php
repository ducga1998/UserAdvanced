<?php
class ST_Input
{
    static $_inst;
    function __construct()
    {
    }
    function request($key){
        if(!empty($_REQUEST[$key])){
            return $_REQUEST[$key];
        }else{
            return false;
        }
    }
    
    function get($key){
        if(!empty($_GET[$key])){
            return $_GET[$key];
        }else{
            return false;
        }
    }
    function post($key){
        if(!empty($_POST[$key])){
            return $_POST[$key];
        }else{
            return false;
        }
    }
    function RandomString()
    {
        $chars = "ABCDEFGHIJKLMACSVfdbbdNOPQRSTUVWXYZ123456789";
        $name = "";
        for($i=0; $i<12; $i++)
        $name.= $chars[rand(0,strlen($chars))];
        return $name;
    }
    function TestImg($strings){

       
            if(strtolower($strings)=="jpg"||strtolower($strings)=="png")
            {
                return true;
            }
            else {
                return false;
            }
            
        

    }
    public function GetFile(){
        if (isset($_POST['uploadclick']))
    {
        // Nếu người dùng có chọn file để upload
        if (isset($_FILES['avatar']))
        {
             $stringFile= explode(".",$_FILES['avatar']['name']);
            
            // Nếu file upload không bị lỗi,
            // Tức là thuộc tính error > 0
            if ($_FILES['avatar']['error'] > 0)
            {
                echo 'File Upload Bị Lỗi';
            }
            else{
$nameFile=ST_Input::inst()->RandomString().".".$stringFile[count($stringFile)-1];

                // Upload file
                 /*vào base.php để xem code function TestImg()*/
                if(ST_Input::inst()->TestImg($stringFile[count($stringFile)-1])==true){
                move_uploaded_file($_FILES['avatar']['tmp_name'], './controller/folder/'.$nameFile);
                return $nameFile;
            }
            /*kiểm tra file có đúng là có đuôi là jpg và png ko*/
            else{
                echo "error Update File";
            }
            }
        }
        else{
            echo 'Bạn chưa chọn file upload';
        }
    }
    }
    
    static function inst()
    {
        if (!self::$_inst) {
            self::$_inst = new self();
        }
        return self::$_inst;
    }

}
ST_Input::inst();








