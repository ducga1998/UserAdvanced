<?php 
$formData=$_REQUEST["formData"];   

$arrayString=explode(".",$formData);
/*  var StringArray = idUser + "." + NameUser + "." + NumberPhoneUser 
+ "." + birthDay + "." + GrantUser + "." + CountryUser; */

$idUser=$arrayString[0];
$NameUser=$arrayString[1];
$NumberPhoneUser=$arrayString[2];
$birthDay=$arrayString[3];
$GrantUser=$arrayString[4];

if($GrantUser=="Admin")
{
    $GrantUser=3;
}
elseif($GrantUser=="User")
{
    $GrantUser=1;
}
else
{
    $GrantUser=2;
}
$CountryUser=$arrayString[5];
$MailUser=$arrayString[6];

 
include "../../model/manager_user.php";
Model_qlsv::inst()->UpdateInfoUser($idUser,$NameUser,$CountryUser,$birthDay,$MailUser,$NumberPhoneUser,$GrantUser);


?>