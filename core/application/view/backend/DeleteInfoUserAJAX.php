<?php 
$id=var_dump($_REQUEST["id_delete"]);   

include "../../model/manager_user.php";
Model_qlsv::inst()->DeleteUser($id);
?>