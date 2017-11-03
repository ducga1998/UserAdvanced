<?php
class Controller_qlsv
{
    static $_inst;
    function __construct()
    {
        if(Controller_login::is_login() == true){
            if( $_SESSION["current_id"]==3)
            {
                $this->xuly_action();
            }
            elseif($_SESSION["current_id"]==1){
                $this->PageUser();
            }
            elseif($_SESSION["current_id"]==2){
                $this->PageEdit();
            }
            
        } 

    }
    function xuly_action()
    {

        $action = ST_Input::inst()->request("action");
        
        $action = ST_Input::inst()->request("Seacrch");
        

       
        /*bây h action của nó là một mỡ hỗn độn*/
        $action = base64_decode($action);
        /*giải mã nó*/
        $action = unserialize($action);
        $case = '';
       
        
        if(is_array($action) && $action['current_id']==1){
            $case = $action['action'];
           
        }
        if($case=="delete_sv"){
            $case="delete_sv";
        }
        else
        {
            $case=ST_Input::inst()->request("action");
        }
        echo $case;
        
      

        $this->load_view_qlsv();
    }
    public function PageUser()
    {
        # code...
        $model_qlsv=new Model_qlsv();
        $id=$_SESSION["idUser"];
        $name_category=array();
        $model_qlsv = new Model_qlsv();
        $rows= $model_qlsv->GetInfoUserById($id);
        $rowConfession= $model_qlsv->GetInfoPost();
        $rowNameCategory=$model_qlsv->GetCategoryById();
        $_SESSION["test"]=$rowNameCategory;
        $rowPaging_search=$model_qlsv->Get_Post_Search_Paging(2,"",0,5);
        $rowUser=$model_qlsv->GetInfoUser();
        
        $GetPostConfessionUser= $model_qlsv->GetPostConfessionUser($id);
        $x= $model_qlsv->Get_category_id_as_id_post(1);
        
        include_once "./core/application/view/PageUser.php";
    }
    public function PageEdit()
    {   
        $model_qlsv=new Model_qlsv();
        $id=$_SESSION["idUser"];
        $rows= $model_qlsv->GetInfoUserById($id);
        $rowConfession= $model_qlsv->GetInfoPost();// lất hết tất cả post trong csld
        $rowUser=$model_qlsv->GetInfoUser();
        $GetPostConfessionUser= $model_qlsv->GetPostConfessionUser($id);
        include_once "./core/application/view/PageEditer.php";
        
    }

    function load_view_qlsv(){

        /* $model_qlsv = new Model_qlsv();
        $current_page=isset($_REQUEST["page"])?$_REQUEST["page"]:1;
        $limit = 10;
        $start = ($current_page - 1) * $limit;
       
        isset($_REQUEST["search"])?$search=$_REQUEST["search"]:$search="";
       
        /*do function get_list_sv đảm nhiệm*/
        /*
        $totalPage=$model_qlsv->handingPaGination();
        $rows = $model_qlsv->get_list_sv($search ,$start,10); */
        $id="";
        $id=$_SESSION["idUser"];
        $name_category=array();
        $model_qlsv = new Model_qlsv();
        $rows= $model_qlsv->GetInfoUserById($id);
        $rowConfession= $model_qlsv->GetInfoPost();
        $rowNameCategory=$model_qlsv->GetCategoryById();
        $_SESSION["test"]=$rowNameCategory;
        $rowPaging_search=$model_qlsv->Get_Post_Search_Paging(2,"",0,5);
        $rowUser=$model_qlsv->GetInfoUser();
        
        $GetPostConfessionUser= $model_qlsv->GetPostConfessionUser($id);
        $x= $model_qlsv->Get_category_id_as_id_post(1);
        $totalPage=$model_qlsv;
        include_once "./core/application/view/PageAdmin.php";
     }

    static function inst()
    {
        if (!self::$_inst) {
            self::$_inst = new self();
        }
        return self::$_inst;
    }
}
Controller_qlsv::inst();









