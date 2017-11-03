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


        /*end connect database*/
        function GetDecentralization(){

        
    }

    /* function get_list_sv($search, $start,$limit){
        if($search=="")
        {
$sql = "SELECT id, firstname, lastname,avatar,NumberPhone,birthday FROM lastname LIMIT $start, $limit";
        }
        else {
$sql = "SELECT id, firstname, lastname,avatar,NumberPhone,birthday FROM lastname WHERE firstname='$search' LIMIT $start, $limit";
            
        }
        

       
        $result = $this->conn->query($sql);
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
       } */

 public function handingPaGination(){
    $result        = mysqli_query( $this->conn , 'select count(id) as sum from lastname' );
    $row           = mysqli_fetch_assoc( $result );
    /*số dòng row trong database*/
    $total_records = $row[ 'sum' ];
    return $total_records;

    }
    /*handding Pagination*/
    function add_sv($id,$email,$lastname,$avatar,$NumberPhone,$birthday){


       $sql = "INSERT INTO lastname (id,firstname, lastname,avatar,NumberPhone,birthDay)
VALUES ('$id', '$email', '$lastname','$avatar',$NumberPhone,'$birthday')";
mysqli_query($this->conn, $sql);

$this->conn->close();
    }
    public function update_sv($id,$email,$lastname,$avatar,$NumberPhone,$birthday){
 $sql = "UPDATE lastname SET firstname = '$email', lastname='$lastname', avatar='$avatar', NumberPhone='$NumberPhone', birthDay='$birthday' WHERE id=$id";
 /*$sql="UPDATE lastname SET firstname = '$email', lastname='$LastName', avatar='$avatar', NumberPhone='$NumberPhone', birthDay='$birthday' WHERE id=$id";*/
 $_SESSION['variable']=$id;
 

        if (mysqli_query($this->conn, $sql)) {
           return true;
        } else {
           return false;
        }

        mysqli_close($this->conn);
    }
    /*end update_sv*/
    function delete_sv($id_sv){
        $sql = "DELETE FROM lastname WHERE id=$id_sv";






mysqli_query($this->conn, $sql);
   

mysqli_close($this->conn);
       
    }
   /* public GetDecentralization(){
         

    }
*/
    function check_login($user_name , $pass){

        $sql = "SELECT useName, password,current_id,NameUser FROM admin where useName='$user_name' and password='$pass'" ;
        $result = $this-> conn->query($sql);


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

        mysqli_close($this->conn);


       }
       else{
        return false;
        mysqli_close($this->conn);

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

Model_qlsv::inst();









