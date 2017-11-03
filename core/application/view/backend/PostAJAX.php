<?php
if(isset($_REQUEST["StringArray"])){
function dateNow(){
	$datetime = new DateTime();
	 
	return $datetime->format('Y-m-d H:i:s');
}
isset($_REQUEST["StringArray"])?$StringArray=$_REQUEST["StringArray"]:1;
$link= mysql_connect('localhost', 'root', '');
mysql_select_db('projectbig');
 $array=explode(".",$StringArray);
 var_dump($StringArray);
 $tilte=$array[0];
 $id_user=$array[1];
 $UserName=$array[2];
 $Content=$array[3];
 $DateUp=dateNow();
 if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
		
		$sql="INSERT INTO post ( UserName, Title,Content,view,DateUp,id,id_post) VALUES ('$UserName','$tilte','$Content',1,'$DateUp',$id_user,'')";
		
		mysql_query($sql);
		$id_post= mysql_insert_id();
		$test=explode(',',$_REQUEST["StringCheck"]);
		$sql="";
		foreach ($test as $key => $category_id) {
		$sql="INSERT INTO relationship (id_post, category_id) VALUES ('$id_post','$category_id');";
		mysql_query($sql);
}

echo "SUCCES POST NOW YOU WAIT EDIT OF ADMIN CHECK POST YOU VIEW UP ";





}

?>