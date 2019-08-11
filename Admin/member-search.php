<?php session_start();
   require_once "./php/membership/Member.php";
   // require_once "../conn.php";
   $gender ='1';
   $member = new Member();
   
   //getPendingMember
   $pendingMembers = $member->getPendingMembers();
   if($pendingMembers){
   $no_pen =mysqli_num_rows($pendingMembers);
   }else{
   $no_pen ='';
   }
   
   //getRegisteredMember
   $registeredMembers = $member->getRegisteredMembers();
   if($registeredMembers){
   $no_reg =mysqli_num_rows($registeredMembers);
   }else{
   $no_reg ='';
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
      <title>Prince ODA Admin</title>
      <!-- Bootstrap Core CSS -->
      <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Menu CSS -->
      <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
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
      <!-- ============================================================== -->
      <!-- Wrapper -->
      <!-- ============================================================== -->
      <div id="wrapper">
         <!-- ============================================================== -->
         <!-- Topbar header - style you can find in pages.scss -->
         <!-- ============================================================== -->
         <nav class="navbar navbar-default navbar-static-top m-b-0" style="margin-top:0px;">
            <?php require_once 'common/header.php'; ?>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
         </nav>
         <!-- End Top Navigation -->
         <!-- ============================================================== -->
         <!-- Left Sidebar - style you can find in sidebar.scss  -->
         <!-- ============================================================== -->
         <div class="navbar-default sidebar" role="navigation">
            <?php require_once 'common/navbar.php'; ?>
         </div>
         <!-- ============================================================== -->
         <!-- End Left Sidebar -->
         <!-- ============================================================== -->
         <!-- ============================================================== -->
         <!-- Page Content -->
         <!-- ============================================================== -->
            <div id="page-wrapper">
               <div class="container-fluid">
                  <div class="row bg-title">
                     <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Members</h4>
                     </div>
                     <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <!-- <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro</a> -->
                        <ol class="breadcrumb">
                           <li><a href="#">Dashboard</a></li>
                           <li class="active">Members</li>
                        </ol>
                     </div>
                  </div>
                <div class="container">
                     <div class="row">
                        <div class="col-12">
                            <form>
                                <div class="row" style="background: #ffffff;padding-top: 25px;margin-bottom: 35px;">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control"  id="searchName" placeholder="Name"  name="searchName">
                                            <input type="hidden" class="form-control"  id="doc_id" placeholder="Doctor's Name"  name="doc_id">
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center" >
                                        <div class="form-group">
                                            <i style="font-size:20px; font-color:white">A/L</i> <input type="radio" <?php $retVal = ($gender==1) ? 'checked' : '' ; //echo $retVal; ?> name="gender" value="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <i style="font-size:20px; font-color:white">O/L</i> <input type="radio" <?php $retVal = ($gender==2) ? 'checked' : '' ; //echo $retVal; ?> name="gender" value="2">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select class="form-control"  id="department"  name="department" disabled>
                                            <option value="">Select Year</option>
                                            <?php for($i=1950; $i<=date("Y"); $i++) { ?>   
                                            <option value="<?php echo "$i"; ?>"><?php echo "$i"; ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="button" class="searchBtn btn btn-success" id="search" value="Search" name="search">&nbsp;&nbsp;
                                            <input type="reset" class="btn btn-danger" id="reset" value="Reset" name="reset">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                  </div>
                <div id="memberList"></div>
            </div>
         <!-- /.container-fluid -->
         <footer class="footer text-center"> 2019 &copy; Powered by Gnex Solutions </footer>
         </div>
         <!-- /#page-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- jQuery -->
      <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- Menu Plugin JavaScript -->
      <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
      <!--slimscroll JavaScript -->
      <script src="js/jquery.slimscroll.js"></script>
      <!--Wave Effects -->
      <script src="js/waves.js"></script>
      <!-- Custom Theme JavaScript -->
      <script src="js/custom.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function(){
             showMemberList();
             $(document).on('click', '.searchBtn', function(){
                     $dataString=$('#searchName').val();
                         $.ajax({
                             type: "POST",
                             url: "MembersListSearch.php",
                             data: {
                                 q: $dataString,
                                 action: "searchMember",
                             },
                             success: function(response){
                                 $('#memberList').html(response);
                             }
                         });
             });
         
             $(document).on('click', '.deleteMember', function(){
                 $dataString=$(this).val();
                //  alert($dataString);
                 $('#edit'+$dataString).modal('hide');
                 $('body').removeClass('modal-open');
                 $('.modal-backdrop').remove();
                     $.ajax({
                         type: "POST",
                         url: "./php/membership/MemberController.php",
                         data: {
                             q: $dataString,
                             action: "removeMember",
                         },
                         success: function(){
                             showMemberList();
                         }
                     });
             });
         
             $(document).on('click', '.approvePayment', function(){
                 $dataString=$(this).val();
                 $('#approve'+$dataString).modal('hide');
                 $('body').removeClass('modal-open');
                 $('.modal-backdrop').remove();
                     $.ajax({
                         type: "POST",
                         url: "./php/membership/MemberController.php",
                         data: {
                             q: $dataString,
                             action: "approvePayment",
                         },
                         success: function(){
                             showMemberList();
                         }
                     });
             });
         
         
             function showMemberList(){
         $.ajax({
         url: 'MembersList.php',
         type: 'GET',
         async: false,
         data:{
         show: 1
         },
         success: function(response){
         $('#memberList').html(response);
                     e.preventDefault();
         }
         });
             }
         
         });
         
      </script> 
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