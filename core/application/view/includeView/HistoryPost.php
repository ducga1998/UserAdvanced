

        


 
<div class="alert alert-success text-center" role="alert">
  <strong>HISTORY POST</strong>
</div>


<select >
  <option value="">
  Delete
  </option>
  <option value="">
  Update
  </option>
 
</select><input type="button" value="Apply" class="btn">
<div class="wrapAjaxChange">

                                <?php
    echo "<table class='table table-bordered  table-hover table-post'>
    <thead>
     <tr> 
     <th> <input type='checkbox' class='checkAll' > </th>
      <th>Avatar</th>
	  <th style='color:#20c1c1' >User Name Post</th>
	  <th> Title</th>
    <th class='click'>Content</th>
    <th>Category</th>
      
      <th  style='color:#20c1c1'>DateUp</th>
     
   
	</tr >
    </thead><tbody class='containerCheck'>";
    $i=0;
    foreach ($GetPostConfessionUser as $row) 
     	
      {
        if($row["view"]==2){
          $i++;
          $string="";
          $string.="<select>";
         $array= $model_qlsv->Get_category_id_as_id_post($row["id_post"]);
        
         foreach($array as $x){
         $string.="<option>".$x."</option>";
      
         }
         $string.="</select>";
      
        echo " 
      <tr style='transition: 1s;'    >
      <td> <input class='checkboxclass' idcheck=".$row["id_post"]." type='checkbox' value=''></td>
      <th style='text-align:center'><img style='width:60px;height:60px' src='./controller/folder/deauft.jpg' ></th>
        
         
        <td style='color:#20c1c1' class='nameUserPost' >".htmlentities($row["UserName"])."</td>

        <td>".$row["Title"]."</td>
        <td style='width: 517px;' class='contentDetailView'  data-test='clickviewContent'  >".$row['Content']." 
        <button data-toggle='modal' data-target='#contentView' class='btn-xs btn btn-info btn-view-model' >Detail</button>
        
        </td>
        <td class='category'>".$string."</td>
        <td  style='color:#20c1c1'>".$row['DateUp']."</td>
        
	
		
		
      </tr>
      
    ";
    if($i==5){
      break;
    }
    }
  }
	


	echo "</tbody></table>";

 ?>
 </div>
<div class="modal fade" id="contentView" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">View Content Detail</h4>
        </div>
        <div class="modal-body ">
        <table class="table table-bordered">
    <thead>
      <tr>
        <th>User Name</th>
        <th>Content</th>
        <th>Category</th>
       
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="usernameinsert">  </td>
        <td class="ShowContent"></td>
        <td class="ShowCategory"></td>
       
      </tr>
     
    </tbody>
  </table>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <div class="pagination">
        <?php
     $x=isset($_REQUEST["numberPage"])?$_REQUEST["numberPage"]:5;
     
      
    
        isset($totalPage)?$i:1;
        echo "<ul class='pagination'>";
        $current_page=0;
         $total_page=ceil($a/$x);  // nó =0
    
        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
        if($current_page > 1 && $total_page > 1) {
            echo '<li  page='.$x.' class="active"><a pageUser='.( $current_page - 1 ) .' >Prev</a></li> ';
        }  
    
        // Lặp khoảng giữa
        for( $i = 1 ; $i <= $total_page ; $i++ ) {
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            if($i == $current_page) {
                echo '<span>' . $i . '</span> | ';
            } else {
                echo '<li><a  page='.$x.' class="ClickPaging"  pageUser=' . $i . '>' . $i . '</a></li>';
            }
        }
    
        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
        if($current_page < $total_page && $total_page > 1) {
            echo '<li><a pageUser=' . ( $current_page + 1 ) . ' page='.$x.'>Next</a> </li> ';
        }
        echo "</ul>";
        ?>
    
    </div>
  


