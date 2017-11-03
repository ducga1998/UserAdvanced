
<select>
  <option value="">Delete</option>
  <option value="">Update</option>
</select>
<?php 

echo "<table class='table table-bordered  table-hover'>
    <thead>
     <tr> 
     <th> <input type='checkbox' value=''></th>
      <th>Avatar</th>
	  <th>ID</th>
	  <th> Name</th>
	  <th>Country</th>
      
      <th>NumberPhone</th>
      <th>BirthDay</th>
      <th>Grant</th>
      <th>Setting</th>
	</tr>
    </thead>";
    foreach ($rowUser as $row) 
     	
      {
      	/* $data  = array(
      		'user_id' => $row['id'],
      		'current_id' => isset($_SESSION["current_id"])?$_SESSION["current_id"]:0,
      		'action' => 'delete_sv'
      	);

      	$url = './index.php';

      	$data = base64_encode(serialize($data));

        $url .='?action='.$data; */
        if($row["Current_id"]==3)
        {
          $pepole="Admin";
        }
        elseif($row["Current_id"]==2)
        {
          $pepole="Editer";
        }
        else{
          $pepole="User";
        }
        
      	if($row["Avatar"]=="")
      	{
      		$avatar="deauft.jpg";

   }
   else {
   	# code... 
   	$avatar=$row["Avatar"];
   }
/* UserName
PassWord



id

Mail


 */
        echo " <tbody>

      <tr style='transition: 1s;' >
      <th> <input type='checkbox' value=''></th>
      <th style='text-align:center'><img style='width:60px;height:60px' src='./controller/folder/".$avatar."' ></th>
        <td>".$row["id"]." </td>
         
        <td>".htmlentities($row["Name"])."</td>

        <td>".$row["Country"]."</td>
        <th>".$row['NumberPhone']."</th>
        <th>".$row['BirthDay']."</th>
        <th>".$pepole."</th>
		<td><a Filename='".$row["Avatar"]."' data-toggle='modal'  data-target='#updateStudent' class='GetIdClass' id='".$row['id']."' firstname='".$row["Name"]."' LastName='".$row["Name"]."' avatar=".$row["Avatar"]." NumberPhone=".$row["NumberPhone"]." birthDay=".$row["BirthDay"]." ><i class='fa fa-wrench' aria-hidden='true'></i></a>
		<a id=".$row['id']."   type='button' class='btnDelete' name='".$row["Name"]."'><i class='fa fa-trash' aria-hidden='true'></i></a>
		<a getId='".$row['id']."' class='btnDetail'  data-toggle='modal' data-target='#DetailStudent'><i class='fa fa-info' aria-hidden='true'></i></a>
		</td>
		
		
      </tr>
      
    </tbody>";
    }
	


	echo "</table>";

 ?>
 <div id="updateStudent" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Update Student</h4>
			</div>
		
			<div class="modal-body">

			
      	<form   id="FormUpdateInfoUser" method="get">
    
<div class="form-group"><input style="display: none" type="text" name="idUpdate"   </div>
					<div class="form-group"><label for="pwd">Avatar</label><input type="file"  style="display:inline-block" >
                       <img src=""class="imgUpdate" style="width:60px;float:right">
18630598
				
					</div>
          <input type="hidden" name="idUser" class="form-control" id="firtName" value=<?php echo $row["id"] ?> placeholder="Email import">
					<div class="form-group"><label for="pwd">Mail:</label><input type="text" name="MailUser" class="form-control" id="firtName" placeholder="Email import"></div>
				<div class="form-group"><label for="email">UserName:</label><input type="text" name="NameUser" class="form-control" id="lastName" placeholder="Last name import now "></div>
				<div class="form-group"><label for="Number Phone">Number Phone:</label><input type="text" name="NumberPhoneUser" class="form-control" id="NumberPhone" placeholder="Number Phone import now "></div>
				<div  class="form-group"><label for="birthday">BirthDay:</label><input type="text" name="birthDay"  data-toggle="datepicker" class="form-control" id="birthDay" placeholder="birthDay import now "></div>
        <div  class="form-group"><label for="">Grant:</label>
        <select name="GrantUser" id="">
       
        <option >Admin</option>
        <option >Edit</option>
        <option >User</option>
        
        </select>
        <label for="Country">Country:</label><input type="text" name="CountryUser"  data-toggle="datepicker" class="form-control" id="Country" placeholder="Country import now "></div>
        
        </div>
 

        
					<!--xử lý thông báo trùng id-->
				</form>
        <!-- end form  -->
			</div>
			<div class="modal-footer">
      <input type="button"  name="uploadclick" class="btn btn-default btn-updateInfo " value="Update User">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>