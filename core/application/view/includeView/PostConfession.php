<div class="alert alert-success text-center" role="alert">
  <strong> POST </strong>
</div>
</h1>
                        <form action="" id="formPostConfession">
                            <div class="row">
                                
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                              <span class="input input--haruki">
                        <input class="input__field input__field--haruki TitleConfession" type="text" id="input-38"  name="tilte">
                        <label class="input__label input__label--haruki" for="input-1" data-content="Title Post">
                        <span class="input__label-content input__label-content--haruki">Title Post</span>
                        </label>
				                </span>


                        <input name="IdUser" type="hidden" class="form-control" value=<?php echo $rows["id"] ?> >
                        <input name="UserName" type="hidden" class="form-control" value=<?php echo $rows["UserName"] ?> >
                       
                       
                                </div>
                                
                               
                                <div class="col-md-6">
                                         <h4>Checkbox Buttons</h4>
                                 <?php
                                 
                                
                                  
                                foreach($rowNameCategory as $indexs){
                                 
                                    echo' <section title=".squaredOne">
                                    
                                     <div class="squaredOne">
                                       <input type="checkbox" idCategory="'.$indexs["id_category"].'"  value="" class="checkCategory">
                                       <label for="squaredOne">'.$indexs["name_category"].'</label>
                                     </div>
                                    
                                   </section>';
                                
                                    
                                // echo "<input type='checkbox' onclick='clickOption(this.idCategory)' >".$indexs["name_category"]."</option>";
                                } 
                                // end foreach select
                                ?> 
                                </div>
                               
                               
                                <select name="" id="SubAddCategory">
                                <option>NO SUBCATEGORY</option>
                                </select>
                              
                               
                            
                        
   
                        <div class="form-group">
                            <label for="comment">Content Post:</label>
                            <textarea name="Content" style='display:block'  rows="10" id="Content" placeholder="Description"></textarea>
                           
                        </div>
                        <input 
                        type="submit" class="btn btn-primary btn-post" value="Post">
                        </form>
                        
                        <div class="success text-center">
                           
                        </div>
                        


                    </div>