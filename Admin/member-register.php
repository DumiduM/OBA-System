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
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet"> -->
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->

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
      session_start();
      echo '<script language="javascript">';
      echo '</script>';
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
                        <h4 class="page-title">Members</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="../membershipform.php" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">REGISTER NEW MEMBER</a>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Members</li>
                        </ol>
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
        $(document).on('click', '.acceptMember', function(){
                $dataString=$(this).val();
                $('#edit'+$dataString).modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                    $.ajax({
                        type: "POST",
                        url: "./php/membership/MemberController.php",
                        data: {
                            q: $dataString,
                            action: "approveRegistration",
                        },
                        success: function(){
                            showMemberList();
                        }
                    });
        });

        $(document).on('click', '.deleteMember', function(){
            $dataString=$(this).val();
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
			type: 'POST',
			async: false,
			data:{
				show: 1
			},
			success: function(response){
				$('#memberList').html(response);
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
