

<div class="alert alert-success text-center" role="alert">
  <strong>NEW CONFRESSION</strong>
</div>
<script src='./assets/js/script.js'></script>
        <span class="input input--haruki">
					<input  placeholder="Search ..."  name="searchPost"  type="text" class="input__field input__field--haruki" type="text" id="input-1">
					<label class="input__label input__label--haruki" for="input-26">
            <span class="input__label-content input__label-content--haruki">Search User Name and Title</span>
           
					</label>
        </span>
        <div id='result'></div>
 
    <label for="name"></label>
    <div class="form-group search-box form-inline">
    
       
      </div>
      <button type="button" class="btn btn-primary btn-searchpost">Search</button>
     
  </select> 

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
    foreach ($rowPaging_search as $row) 
     	
      {
        if($row["view"]==2){
          $string="";
          $string.="<select>";
         $array= $model_qlsv->Get_category_id_as_id_post($row["id_post"]);
        
         foreach($array as $x){
         $string.="<option>".$x."</option>";
      
         }
         $string.="</select>";
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
      <th style='text-align:center'><img style='width:60px;height:60px' src='./controller/folder/".$Avatar."' ></th>
        
         
        <td style='color:#20c1c1' class='nameUserPost' >".htmlentities($row["UserName"])."</td>

        <td>".$row["Title"]."</td>
        <td style='width: 517px;' class='contentDetailView'  data-test='clickviewContent'  >".$row['Content']." 
        <button data-toggle='modal' data-target='#contentView' class='btn-xs btn btn-info btn-view-model' >Detail</button>
        
        </td>
        <td class='category'>".$string."</td>
        <td  style='color:#20c1c1'>".$row['DateUp']."</td>
        
	
		
		
      </tr>
      
    ";
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
  
  
