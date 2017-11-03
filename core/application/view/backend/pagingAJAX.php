
<?php
// cần gửi về cái gì đây
// 
//   $totalPage là tổng số trang
/* 
$totalpage mình sẽ gửi từ ajax bằng jquery

*/
// function
// mô tả function này => ta phải truyền current_page vào để tính start
function Get_Post_Search_Paging_Data($view,$current_page,$page,$string,$search=""){
    

  
 
  include_once "../../model/manager_user.php";
  $model_qlsv=new Model_qlsv();
  //limit là 5
  $start = ($current_page - 1)*$page ;
  echo $start;
 
  $data=$model_qlsv->{$string}($view,$search,$start,$page);
  //trả về giữ liệu đã đc search
  return $data;
} 

if(isset($_REQUEST["page"])||isset($_REQUEST["search"])){
  isset($_REQUEST["search"])?$search=$_REQUEST["search"]:$search="";
isset($_REQUEST["page"])?$current_page=$_REQUEST["page"]:$current_page=1;
isset($_REQUEST["pageTotal"])?$page=$_REQUEST["pageTotal"]:$page=5;
// mấu chốt ở đây.

$rowConfession=Get_Post_Search_Paging_Data(2,$current_page,$page,"Get_Post_Search_Paging",$search); 
//  $rowCout=Get_Post_Search_Paging_Data(2,$current_page,100,"Get_Post_Search_Paging"); 
$Rowcout=Get_Post_Search_Paging_Data(2,1,1000,"Get_Post_Search_Paging",$search); 
 

 $cout=0;
 foreach ($Rowcout as $row) {$cout++;}
//  foreach ($rowCout as $row) {$cout++;}

 echo "
 
 <table class='table table-bordered  table-hover table-post'>
 <thead>
  <tr> 
  <th> <input type='checkbox' class='checkAll' > </th>
   <th>Avatar</th>
   <th style='color:#20c1c1' >User Name Post</th>
   <th> Title</th>
 <th class='click'>Content</th>
 
   
   <th  style='color:#20c1c1'>DateUp</th>
  

 </tr >
 </thead><tbody class='containerCheck'>";
 foreach ($rowConfession as $row) 
      
   {
     
     $cout++;
     if($row["Avatar"]=="")
     {
       $Avatar="deauft.jpg";
     }
     else{
       $Avatar=$row["Avatar"];
     }
   
     echo " 
   <tr style='transition: 1s;'    >
   <td> <input class='checkboxclass' idcheck=".$row["id_post"]." type='checkbox' value=''></td>
   <th style='text-align:center'><img style='width:60px;height:60px' src='./assets/images/".$Avatar."' ></th>
     
      
     <td style='color:#20c1c1' class='nameUserPost' >".htmlentities($row["UserName"])."</td>

     <td>".$row["Title"]."</td>
     <td style='width: 517px;' class='contentDetailView'  data-test='clickviewContent'  >".$row['Content']." 
     <button data-toggle='modal' data-target='#contentView' class='btn-xs btn btn-info btn-view-model' >Detail</button>
     
     </td>
 
     <td  style='color:#20c1c1'>".$row['DateUp']."</td>
     
 
     
     
   </tr>
   
 ";
 }
 echo "</tbody></table>";
 echo "<script src='./assets/js/index.js'></script>";
 
 
 echo '<div class="pagination">';
 
$x=isset($_REQUEST["numberPage"])?$_REQUEST["numberPage"]:5;
 $a=$cout;
 echo "<ul class='pagination'>";
 $current_page=0;
  $total_page=ceil($a/$x);  
 if($current_page > 1 && $total_page > 1) {
     echo '<li  page='.$x.' class="active"><a pageUser='.( $current_page - 1 ) .' >Prev</a></li> ';
 }  


 for( $i = 1 ; $i <=$total_page ; $i++ ) {
   
     if($i == $current_page) {
         echo '<span>' . $i . '</span> | ';
     } else {
         echo '<li><a search='.$search.' page='.$x.' class="ClickPaging"  pageUser=' . $i . '>' . $i . '</a></li>';
     }
 }
if($current_page < $total_page && $total_page > 1) {
     echo '<li><a pageUser=' . ( $current_page + 1 ) . ' page='.$x.'>Next</a> </li> ';
 }
 echo "</ul>";
 

echo '</div>';
}// end if(isset($_REQUEST["page"]))
?>
<?php if(isset($_REQUEST['pageCheck'])){
isset($_REQUEST["pageCheck"])?$current_page=$_REQUEST["pageCheck"]:1;
isset($_REQUEST["pageTotalCheck"])?$page=$_REQUEST["pageCheck"]:$page=5;
$rowConfession=Get_Post_Search_Paging_Data(1,$current_page,$page,"Get_Post_Search_Paging"); 

foreach ($rowConfession as $row) 
     
  { echo " 
  <tr style='transition: 1s;'    >
  <td> <input class='checkboxclass' idcheck=".$row["id_post"]." type='checkbox' value=''></td>
  <th style='text-align:center'><img style='width:60px;height:60px' src='./controller/folder/deauft.jpg' ></th>
    
     
    <td style='color:#20c1c1' class='nameUserPost' >".htmlentities($row["UserName"])."</td>

    <td>".$row["Title"]."</td>
    <td style='width: 517px;' class='contentDetailView'  data-test='clickviewContent'  >".$row['Content']." 
    <button data-toggle='modal' data-target='#contentView' class='btn-xs btn btn-info btn-view-model' >Detail</button>
    
    </td>

    <td  style='color:#20c1c1'>".$row['DateUp']."</td>
    

    
    
  </tr>
  
";

}


echo "<script src='./assets/js/script.js'></script>";
}// end if(isset($_REQUEST["pageCheck"]))

?>
