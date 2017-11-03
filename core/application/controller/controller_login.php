<?php
class Controller_login
{
   static $_inst;
   public function __construct()
    {
        $this->xuly_action_login();
    }
   public function xuly_action_login()
    {
        $user_name = ST_Input::inst()->request('email');
        $user_pass = ST_Input::inst()->request('pwd');
        if(!empty($user_name) and !empty($user_pass)){
            $model = Model_qlsv::inst();
            $rs = $model->check_login($user_name,$user_pass);
            
           
            if($rs != false){
                $_SESSION['login'] = true;
                $_SESSION["current_id"]=$rs["Current_id"];
               
                $_SESSION["idUser"]=$rs["id"];
               
               

            }
        }
       
        if($this->is_login() == false){
            $this->load_view_login();
       
        }
    }

    function load_view_login(){
        include "./core/application/view/login.php";
        
    }
    static function is_login(){
        if(!empty($_SESSION['login']) and $_SESSION['login'] == true){
            return true;
        }
        return false;

    }
    static function inst()
    {
        if (!self::$_inst) {
            self::$_inst = new self();
        }
        return self::$_inst;
    }
}
Controller_login::inst();








