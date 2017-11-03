<html lang="en" class=" ">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/css/set1.css">
    <title>Admin page</title>
   
    <!-- Bootstrap -->
    <!-- <link href="./view/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="./core/system/libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./core/system/libraries/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="./core/system/libraries/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="./core/system/libraries/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="./core/system/libraries/jqvmap/dist/jqvmap.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="./core/system/libraries/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="./assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/maps/style.css">
  
    <style>
       

        .show {
            display: block;
            opacity: 1;
            transition: 1s;
        }
        .mce-notification-inner{
            display:none;
        }
        .mce-notification-warning , .mce-notification-warning .mce-progress .mce-text{
            display:none;
        }
        
    </style>
   


    <body class="nav-md">
    <?php
    
    foreach ($rowPaging_search as $row) 
    
 {
   if($row["view"]==1){
    var_dump($row);
   }
}
    ?>
   
  

        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>Welcome User</span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <div class="profile_pic">

                                <img data-toggle="modal" data-target="#myModal" src="./assets/images/img.jpg" alt=".." class="img-circle profile_img">
                            </div>

                            <div class="profile_info">
                                <span>Welcome</span>
                                <h2><?php
                               echo $rows["UserName"];
                                
                                ?></h2>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->

                        <br>
                      
                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section active">
                                <h3>General</h3>
                                <ul class="nav side-menu" style="">
                                    <li class=""><a><i class="fa fa-home"></i>Confessions<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none;">

                                            <li><a class="showConfession" data-toggle="pill" href="#menu1">New Confession </a></li>

                                        </ul>   
                                    </li>
                                    <li class=""><a><i class="fa fa-edit"></i>Post <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none;">
                                            <li><a class="PostConfessions" href="#">Post Confessions</a></li>
                                              <li><a href="#" class="ShowPostHistory">Post History</a></li>
                                              
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-desktop"></i>Infomation User<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="">
                                            <li><a class="InfoMation" href="#">Infomation Accout You</a></li>
                                        
                                           
                                        </ul>
                                    </li>
                                  


                                </ul>
                            </div>
                            <div class="menu_section">


                            </div>

                        </div>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">



                            <a data-toggle="tooltip" data-placement="top" title="" href="./helper/helpAjAx.php" data-original-title="Logout">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                               
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="./assets/images/img.jpg" alt="">John Doe
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="#aboutModal" data-toggle="modal" data-target="#myModal"> Profile</a></li>
                                        <li>
                                            <a >
                                                <span class="badge bg-red pull-right">50%</span>
                                                <span>Settings</span>
                                            </a>
                                        </li>
                                        <li><a href="javascript:;">Help</a></li>
                                        <li><a href="./core/application/helper/helpAjAx.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                    </ul>
                                </li>

                                <li role="presentation" class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="badge bg-green">6</span>
                                    </a>
                                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                        <li>
                                            <a>
                                                <span class="image"><img src="./assets/images/img.jpg" alt="Profile Image"></span>
                                                <span>
                    <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                    Film festivals used to be do-or-die moments for movie makers. They were where...
                  </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="./assets/images/img.jpg" alt="Profile Image"></span>
                                                <span>
                    <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                    Film festivals used to be do-or-die moments for movie makers. They were where...
                  </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="./assets/images/img.jpg" alt="Profile Image"></span>
                                                <span>
                    <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                    Film festivals used to be do-or-die moments for movie makers. They were where...
                  </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="./assets/images/img.jpg" alt="Profile Image"></span>
                                                <span>
                    <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                    Film festivals used to be do-or-die moments for movie makers. They were where...
                  </span>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="text-center">
                                                <a>
                                                    <strong>See All Alerts</strong>
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main" style="">
                

                    <div class="hides Confession">

                    <?php include_once "./core/application/view/includeView/newConfresssion.php"; ?>



                    </div>
                    <!--end  feature Confession -->
                    <div class="hides InfomationUser">
                  
                        <?php 
                        include_once "./core/application/view/includeView/InformationUser.php";
                         ?>
                    </div>
                    <!--end  feature InfomationUser -->
                    
                            <!-- end Grant User -->
                    <div class="hides PostHistory ">
                    <?php 
                    
                    include_once "./core/application/view/includeView/HistoryPost.php";
                    ?>
                    
                    
                    </div>
                    <!--end  feature postHistory -->
                   

                    <div class="hides PostConfession ">
                       <?php 
                       include "./core/application/view/includeView/PostConfession.php"
                       ?>



                </div>
                
                <!--end  feature PostConfession -->

            </div>
        </div>
        </div>

        <!-- /page content -->

        <!-- footer content -->
        <footer>


      
        </footer>
        <!-- /footer content -->
        </div>
        </div>

        <!-- jQuery -->

        <script src="./core/system/libraries/jquery/dist/jquery.js"></script>
        <script>
   
    </script>
    <script src="./assets/js/classie.js"></script>
        <script src="./assets/js/script.js"></script>
        <script >
      
        </script>
        <script src='https://cloud.tinymce.com/dev/tinymce.min.js?apiKey=qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc'></script>
        <!-- Bootstrap -->
        <!-- <script src="./view/vendors/bootstrap/dist/js/bootstrap.min.js"></script> -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- FastClick -->
        <script src="./core/system/libraries/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="./core/system/libraries/nprogress/nprogress.js"></script>
        <!-- Chart.js -->
        <script src="./core/system/libraries/Chart.js/dist/Chart.min.js"></script>
        <!-- gauge.js -->
        <script src="./core/system/libraries/gauge.js/dist/gauge.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="./core/system/libraries/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="./core/system/libraries/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="./core/system/libraries/skycons/skycons.js"></script>
        <!-- Flot -->
        <script src="./core/system/libraries/Flot/jquery.flot.js"></script>
        <script src="./core/system/libraries/Flot/jquery.flot.pie.js"></script>
        <script src="./core/system/libraries/Flot/jquery.flot.time.js"></script>
        <script src="./core/system/libraries/Flot/jquery.flot.stack.js"></script>
        <script src="./core/system/libraries/Flot/jquery.flot.resize.js"></script>
        <!-- Flot plugins -->
        <script src="./core/system/libraries/flot.orderbars/js/jquery.flot.orderBars.js"></script>
        <script src="./core/system/libraries/flot-spline/js/jquery.flot.spline.min.js"></script>
        <script src="./core/system/libraries/flot.curvedlines/curvedLines.js"></script>
        <!-- DateJS -->
        <script src="./core/system/libraries/DateJS/build/date.js"></script>
        <!-- JQVMap -->
        <script src="./core/system/libraries/jqvmap/dist/jquery.vmap.js"></script>
        <script src="./core/system/libraries/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="./core/system/libraries/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="./core/system/libraries/moment/min/moment.min.js"></script>
        <script src="./core/system/libraries/bootstrap-daterangepicker/daterangepicker.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="./assets/js/custom.js"></script>


//modal bootstrap
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
        <div class="jqvmap-label" style="display: none;"></div>
        <div class="daterangepicker dropdown-menu ltr opensleft">
            <div class="calendar left">
                <div class="daterangepicker_input"><input class="input-mini form-control" type="text" name="daterangepicker_start" value=""><i class="fa fa-calendar glyphicon glyphicon-calendar"></i>
                    <div class="calendar-time" style="display: none;">
                        <div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div>
                </div>
                <div class="calendar-table"></div>
            </div>
            <div class="calendar right">
                <div class="daterangepicker_input"><input class="input-mini form-control" type="text" name="daterangepicker_end" value=""><i class="fa fa-calendar glyphicon glyphicon-calendar"></i>
                    <div class="calendar-time" style="display: none;">
                        <div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div>
                </div>
                <div class="calendar-table"></div>
            </div>
            <div class="ranges">
                <ul>
                    <li data-range-key="Today">Today</li>
                    <li data-range-key="Yesterday">Yesterday</li>
                    <li data-range-key="Last 7 Days">Last 7 Days</li>
                    <li data-range-key="Last 30 Days">Last 30 Days</li>
                    <li data-range-key="This Month">This Month</li>
                    <li data-range-key="Last Month">Last Month</li>
                    <li data-range-key="Custom">Custom</li>
                </ul>
                <div class="range_inputs"><button class="applyBtn btn btn-default btn-small btn-primary" disabled="disabled" type="button">Submit</button>                    <button class="cancelBtn btn btn-default btn-small" type="button">Clear</button></div>
            </div>
        </div>




    </body>

</html>