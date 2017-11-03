<?php


class Model_qlsv
{
    static $_inst;
    public $conn;
    function __construct()
    {
        $this->_init();
    }
    function _init()
    {
        //setup connect

        $this->connect();
    }
    
function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $nameDB="projectbig";

    // Create connection
    $this->conn = mysqli_connect($servername, $username, $password,$nameDB);

    // Check connection
}
public function DisConnect()
{
    mysqli_close($this->conn);
}
 
public function CoutRow(){
    $sql="SELECT COUNT(id)FROM infouser";
    $result = $this->conn->query($sql);
    $row=array();
     $row = $result->fetch_assoc();
     
     return $row;

}
 public function CoutRowPost($view=2){
    $sql="SELECT COUNT(id)FROM post where view=$view";
    $result = $this->conn->query($sql);    
     $row=array();
      $row = $result->fetch_assoc();
   
      $row=$row["COUNT(id)"];
      return $row;

 }
 public function GetInfoUser()
{
     $sql="SELECT UserName, PassWord, Name,BirthDay,Country,id,Current_id,Mail,Avatar,NumberPhone FROM infouser";
    $result = $this->conn->query($sql);
   $rows=array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
   
}
// chỉ có dành cho admin
public function UpdateInfoUser($id,$Name,$Country,$BirthDay,$Mail,$NumberPhone,$GrantUser)
{
    $sql="UPDATE infouser SET BirthDay = '$BirthDay', Country = '$Country', Mail = '$Mail', NumberPhone = $NumberPhone, Name = '$Name',Current_id=$GrantUser
    WHERE id=$id";
    echo $sql;
    $result = $this->conn->query($sql);
    mysqli_close($this->conn);
    
}
 public function GetCategoryById()
{
    $sql="SELECT  id_category,name_category FROM category where parent_id=0";
    
    $result = $this->conn->query($sql);
    $rows=array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
      
    
       
       return $rows;
}
public function Get_category_id_as_id_post($idpost)
{
    // get name_category với id_category trong table category
    // bằng id_post trong bảng relationship
   
    $sql="SELECT id_post, name_category
FROM category
INNER JOIN relationship ON category_id = id_category where id_post=$idpost";


    $string="";
    $result = $this->conn->query($sql);
    
   $rows=array();
    while($row = $result->fetch_assoc()) {
       $rows[]= $row["name_category"];
    }
      
    
       
       return $rows;
} 
/* public function Get_SubCategory_as_Category_id($parent_id)
{  $rowcategory= $this->Get_category_id_as_id_post($parent_id);
    //tìm subcategory
    $sql="select name_category,id_category FROM category WHERE parent_id=$parent_id";
    
    $result = $this->conn->query($sql);
    $rows=array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    $rows["category_name_parent"]=$rowcategory["name_category"];
    return $rows;
}  */


public function GetSubCategoryByName($name)
{
    $sql="SELECT name_category_detail
    FROM category_detail
    INNER JOIN category ON name_category='$name'";
    
    $result = $this->conn->query($sql);
    $rows=array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
      
    
       
       return $rows;
}
public function PermanentlyDelete(){
    
}

public function GetInfoUserById($id)
{
 $sql="SELECT UserName,PassWord,Name,id,BirthDay,Country,Current_id,Mail,Avatar,NumberPhone FROM infouser WHERE id='$id'";
 
 $result = $this->conn->query($sql);
  
    $row = $result->fetch_assoc();
     
    
    return $row;
   
}
   
public function GetInfoPost()
{ 
    //lấy tất cả các bài viết có trong cơ sở dữ liệu
    $string="";
    $sql="SELECT id, UserName, Title,Content,view,DateUp,id_post FROM post";
    $result = $this->conn->query($sql);
    $rows=array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    

   
    return $rows;
}
public function GetPostConfessionUser($id)
{
    // lấy tất có các bài viết người đang dùng tài khoản
    $sql="SELECT id, UserName, Title,Content,view,DateUp,id_post FROM post where id=$id";
    $result = $this->conn->query($sql);
    $rows=array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
   
    return $rows;
    
}
/* public function GetPostAllConfession()
{
    $sql="SELECT id, UserName, Title,Content,view,DateUp,Category FROM post";
    $result = $this->conn->query($sql);
    $rows=array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
   
    
   
    return $rows;
    
} */

public function Get_Post_Search_Paging($view=2,$search="",$start,$limit){
    // function get toàn bộ nội dung post có tìm và giới hạn
    if($search==""){
       $sql = "SELECT id,UserName,Title,Content,view,DateUp,id_post FROM post where view=$view  LIMIT $start, $limit";
    }
    else {
        $sql = "SELECT id,UserName,Title,Content,view,DateUp,id_post FROM post WHERE view=$view and UserName like '%$search%' Or Title like '%$search%' LIMIT $start, $limit";
        
    }
   
    
    

   
    $result = $this->conn->query($sql);
    $rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

public function check_login($user_name , $pass){
    
            $sql = "SELECT id,UserName, PassWord,Current_id,Name FROM infouser where UserName='$user_name' and PassWord='$pass'" ;
            $result = $this->conn->query($sql);
    
    
            /*if (mysqli_num_rows($result) > 0) {
                // output data of each row
                if($row = mysqli_fetch_assoc($result)) {
                   return true;
                }
            } else {
                return false;
            }*/
           if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row;
    
           
    
    
           }
           else{
            return false;
          
    
           }
           
        }
        /* end check login */
         public function addAccoutIntoPageAdmin($user_name,$gmail,$pass,$number,$country){
        
           
            $sql = "INSERT INTO infouser (UserName,Mail,PassWord,NumberPhone,Country,Current_id) VALUES ('$user_name', '$gmail', '$pass','$number','$country',1)";
            $result = $this-> conn->query($sql);
           
           mysqli_close($this->conn);
           
        }
        // public function InsertCategoryToPost($){

        // }
            



static function inst(){
    if (!self::$_inst) {
        self::$_inst = new self();
    }
    return self::$_inst;
}
}




Model_qlsv::inst();


?>