<?php session_start();
require_once "./php/membership/Member.php";
// require_once "../conn.php";
$member = new Member();

//getPendingMember
$pendingMembers = $member->getPendingMembers();
if($pendingMembers){
$no_pen =mysqli_num_rows($pendingMembers);
}else{
$no_pen ='';
}

//getNewRegisteredMember
$newregisteredMembers = $member->getNewRegisteredMembers();
if($newregisteredMembers){
$no_newreg =mysqli_num_rows($newregisteredMembers);
}else{
$no_newreg ='';
}

//getTotalMember
$totalMembers = $member->getRegisteredMembers();
if($totalMembers){
$no_totalreg =mysqli_num_rows($totalMembers);
}else{
$no_totalreg ='';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <title>Prince OBA Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    <link rel="stylesheet" type="text/css" href="../template/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../template/css/style.css">
	<link rel="stylesheet" type="text/css" href="../template/css/lightbox.css">
     <link rel="stylesheet" type="text/css" href="../template/css/animate.css">  
  
	<script type="text/javascript" src="../template/js/jquery-1.11.2.js"></script>
     <script type="text/javascript" src="../template/js/bootstrap.min.js"></script> 
     <script type="text/javascript" src="../template/js/lightbox.js"></script> 
	<script type="text/javascript" src="https://use.fontawesome.com/20bf8ce7c9.js"></script>



<?php


      if( isset($_SESSION['login_user']) ){
        echo "<span id ='login_user' style='visibility:hidden; position:absolute;'>".$_SESSION['login_user']."</span>";
        echo "<span id ='login_user_reg' style='visibility:hidden; position:absolute;'>".$_SESSION['regestration_number']."</span>";
        echo "<span id ='login_user_role' style='visibility:hidden; position:absolute;'>".$_SESSION['admin_role']."</span>";

      }
      else{
        echo "<span id ='login_user' style='visibility:hidden;position:absolute;'>no_data</span>";
      }
  ?>
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="wrapper">
        <header>
            <nav class="navbar navbar-default navbar-static-top m-b-0" style="margin-top:0px;">
            <?php require_once 'common/header.php'; ?>
            </nav>
        </header>

        <div class="navbar-default sidebar" role="navigation">
        <?php require_once 'common/navbar.php'; ?>
    </div>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4> </div>
                    <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro</a>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                        </ol>
                    </div> -->
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <a href="member-register.php">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">New Registration(s)</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><?php echo "$no_newreg";?></span></li>
                            </ul>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <a href="member-register.php">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Pending Registration(s)</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple"><?php echo "$no_pen";?></span></li>
                            </ul>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <a href="member-search.php">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Members</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info"><?php echo "$no_totalreg";?></span></li>
                            </ul>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Membership fee collection</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">999</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Pending Renewals</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">999</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
 
                <!-- ============================================================== -->
                <!-- chat-listing & recent comments -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- .col -->
                    <div class="col-md-12 col-lg-8 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Send a Message to Members....</h3>
                            <textarea style="width: 100%;height: 150px;padding: 12px 20px;box-sizing: border-box;
                            border: 2px solid #ccc;border-radius: 4px;background-color: #f8f8f8;resize: none;" rows="4" cols="90">
                                
                            </textarea>
                            <button style="background-color:orange;border: none;color: black;padding: 12px 20px;text-align: center;text-decoration: none;
                            display: inline-block;font-size: 18px;margin: 4px 2px;cursor: pointer;">
                                Send Message</button>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="panel">
                            <div class="sk-chat-widgets">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        CHANGE MEMBERSHIP FEE
                                    </div>
                                    <div class="panel-body">
                                        <label for="cfee">Current Fee</label>
                                        <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;
                                        border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;" type="text" id="cfee" name="cfee" placeholder="Current Fee..">
                                        <br><br>
                                        <label for="nfee">New Fee</label>
                                        <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;
                                        border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;" type="text" id="nfee" name="nfee" placeholder="New Fee..">
                                        <button style="background-color:orange;border: none;color: black;padding: 12px 20px;text-align: center;text-decoration: none;
                                        display: inline-block;font-size: 18px;margin: 4px 2px;cursor: pointer;">
                                        Change</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- /.col -->
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2019 &copy; Powered by gNEX solutions </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Counter js -->
    <script src="plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- chartist chart -->
    <script src="plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <script src="plugins/bower_components/toast-master/js/jquery.toast.js"></script>

    <script>

var usr = document.getElementById("login_user").innerHTML;
var user_reg =  document.getElementById("login_user_reg").innerHTML;
var user_admin_role =  document.getElementById("login_user_role").innerHTML;

  window.onload = function(e){
      if(usr != "no_data"){

        var btn = document.getElementById("login_btn");
        var login_as =  document.getElementById("login_as");  

        btn.innerHTML="LOGOUT";
        login_as.innerHTML=usr;
      }
  };

  function login(){

    if(usr == "no_data"){ //logout by clearing session
      console.log("usr == 'no_data'");
      location.href='../login.php';
    }
    else{
      console.log("usr != 'no_data'");
      location.href='../php/auth.php';
    }
     
  }
</script>
</body>

</html>
