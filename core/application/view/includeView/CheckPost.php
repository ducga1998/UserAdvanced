<div class="alert alert-success text-center" role="alert">
  <strong>CHECH POST</strong>
</div>
<span class="input input--haruki">
					<input  placeholder="Search ..."  name="searchPost"  type="text" class="input__field input__field--haruki" type="text" id="input-1">
					<label class="input__label input__label--haruki" for="input-26">
            <span class="input__label-content input__label-content--haruki">Search User Name and Title</span>
           
					</label>
        </span>
        <div id='result'></div>
    <button type="button" name="" id="" class="btn btn-primary btn-searchpost">Search </button>
<?php
echo "<button data-toggle='tooltip' title='Delete selected elements ' type='button' idcheck=".$row["id_post"]."   class='btn btn-danger btn-delete'><i class='fa fa-trash-o' aria-hidden='true'></i></button>
                               <button data-toggle='tooltip' title='Browse selected elements ' type='button' idcheck=".$row["id_post"]."  class='btn btn-browse btn-success'><i class='fa fa-check' aria-hidden='true'></i></i></button>";
                              
                               
    echo "<table class='table table-bordered  table-hover table-post'>
    <thead>
     <tr> 
     <th> <input type='checkbox' class='checkAll' > </th>
      <th>Avatar</th>
    <th style='color:#20c1c1' >User Name Post</th>
    <th> Title</th>
    <th class='click'>Content</th>
  
      
      <th  style='color:#20c1c1'>DateUp</th>
      <th>Setting</th>
     
   
  </tr >
    </thead><tbody class='containerCheck'>";
    $i=0;
    foreach ($rowConfession as $row) 
       
      {
        
        if($row["view"]==1){
        
         $i++;
        echo " 
      <tr style='transition: 1s;'    >
      <td> <input class='checkboxclass' idcheck=".$row["id_post"]." type='checkbox' value=''></td>
      <th style='text-align:center'><img style='width:60px;height:60px' src='./assets/images/deauft.jpg' ></th>
        
         
        <td style='color:#20c1c1' class='nameUserPost' >".htmlentities($row["UserName"])."</td>

        <td>".$row["Title"]."</td>
        <td style='width: 517px;'  data-test='clickviewContent'  ><div  style='word-wrap: break-word;' class='contentDetailView' >".$row['Content']."</div> 
        <button data-toggle='modal' data-target='#contentView' class='btn-xs btn btn-info btn-view-model'>Detail</button>
        </td>
       <td  style='color:#20c1c1'>".$row['DateUp']."</td>
        <td>
        </td>
        
        
  
    
    
      </tr>
      
    ";
    }
    if($i==5){
      break;
    }
  }
  


  echo "</tbody></table>";
 if($i==0){

 
   echo "<h3 class='text-center '>No data </h3>";
 }

 
 

 ?>
 <div class="pagination">
        <?php
     $x=isset($_REQUEST["numberPage"])?$_REQUEST["numberPage"]:5;
     
      
    
        isset($totalPage)?$a=$totalPage->CoutRowPost(1):1;
        echo "<ul class='pagination'>";
        $current_page=0;
         $total_pages=ceil($a/$x);  // nó =0
    
        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
        if($current_page > 1 && $total_pages > 1) {
            echo '<li  pageCheck='.$x.' class="active"><a pageUser='.( $current_page - 1 ) .' >Prev</a></li> ';
        }  
    
        // Lặp khoảng giữa
        for( $i = 1 ; $i <= $total_pages ; $i++ ) {
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            if($i == $current_page) {
                echo '<span>' . $i . '</span> | ';
            } else {
                echo '<li><a  pageCheck='.$x.' class="ClickPagingCheck"  pageUser=' . $i . '>' . $i . '</a></li>';
            }
        }
    
        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
        if($current_page < $total_pages && $total_pages > 1) {
            echo '<li><a class="ClickPagingCheck" pageUser=' . ( $current_page + 1 ) . ' pageCheck='.$x.'>Next</a> </li> ';
        }
        echo "</ul>";
        ?>
    
    </div>
