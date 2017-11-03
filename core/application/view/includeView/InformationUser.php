
<div class="container">
    <div class="span3 well">
        <center>
        <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRbezqZpEuwGSvitKy3wrwnth5kysKdRqBW54cAszm_wiutku3R" name="aboutme" width="140" height="140" class="img-circle"></a>
        <h3><?php
        echo $rows["Name"];
        ?></h3>
        <em>Click my face for more</em>
		</center>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel">More About Joe</h4>
                    </div>
                <div class="modal-body">
                    <center>
                    <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRbezqZpEuwGSvitKy3wrwnth5kysKdRqBW54cAszm_wiutku3R" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                    <h3 class="media-heading"><?php
        echo $rows["Name"];
        ?> <small>Vn</small></h3>
                    <span><strong>Skills: </strong></span>
                    <span class="label label-success">Admin</span>
                        <!-- <span class="label label-warning">HTML5/CSS</span>
                        <span class="label label-info">Adobe CS 5.5</span>
                        <span class="label label-info">Microsoft Office</span>
                         -->
                    </center>
                    <hr>
                    <h3>Name:<?php echo $rows["Name"] ?></h3> 
                    <h3>BirthDay:<?php echo $rows["BirthDay"] ?></h3> 
                    <h3>Country:<?php echo $rows["Country"] ?></h3> 
                    <h3>Grant:<?php echo "Admin"?></h3> 
                    <h3>NumberPhone:<?php echo $rows["NumberPhone"] ?></h3> 
                    
                                        <br>    
                                      
                                    </div>
                                    <div class="modal-footer">
                                        <center>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">I've heard enough about Joe</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end container -->
                 
                    
                    
         

                    



