<?php session_start();
require_once "./php/membership/Member.php";
// require_once "../conn.php";
$member = new Member();

//getPendingMember
$pendingMembers = $member->getNewRegisteredMembers();
if($pendingMembers){
$no_pen =mysqli_num_rows($pendingMembers);
}else{
$no_pen ='';
}

//getPendingPaymentMember
$pendingPaymentMembers = $member->getPaymentPendingMembers();
if($pendingPaymentMembers){
$no_Paypen =mysqli_num_rows($pendingPaymentMembers);
}else{
$no_Paypen ='';
}

//getRegisteredMember
$registeredMembers = $member->getRegisteredMembers();
if($registeredMembers){
$no_reg =mysqli_num_rows($registeredMembers);
}else{
$no_reg ='';
}
?>
<div class="col-lg-4 col-md-6 col-sm-12" id="memberList">
    <div class="panel">
        <div class="sk-chat-widgets">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Registrations Pending Members
                </div>
                <div class="panel-body">    
                <p><?php echo $no_pen; ?> result(s) found</p>
                    <ul class="chatonline">
                        
                            <?php
                            if($no_pen>0){
                                while ($row = mysqli_fetch_array($pendingMembers)) { ?>
                                <li>
                                    <div class="call-chat">
                                        <button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $row['regestration_number']; ?>"><span class = "glyphicon glyphicon-pencil"></span> View</button>  <button class="btn btn-danger delete" data-toggle="modal" data-target="#delete<?php echo $row['regestration_number']; ?>"><span class = "glyphicon glyphicon-trash"></span> Remove</button>                                                      
                                    </div>
                                    <a href="javascript:void(0)"><img src="<?php echo $row['profile_picture_url']; ?>" alt="user-img" class="img-circle"> <span><?php echo $row['name']; ?><small class="text-success"><?php echo $row['email_address']; ?></small></span></a>
                                    
                            <?php include('member_modal.php'); ?>
                            <?php include('member_deleteModal.php'); ?>
                                    <?php  } 
                                    }else{ ?>
                                        <div class="col-6 col-lg-3"><p>No result found</p></div>
                                </li>
                            <?php  }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-12" id="memberList">
    <div class="panel">
        <div class="sk-chat-widgets">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Payment Pending Members
                </div>
                <div class="panel-body">    
                <p><?php echo $no_Paypen; ?> result(s) found</p>
                    <ul class="chatonline">
                        
                            <?php
                            if($no_Paypen>0){
                                while ($row = mysqli_fetch_array($pendingPaymentMembers)) { ?>
                                <li>
                                    <div class="call-chat">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#approve<?php echo $row['regestration_number']; ?>"><span class = "glyphicon glyphicon-ok"></span> Approve</button>                                                      
                                    </div>
                                    <a href="javascript:void(0)"><img src="<?php echo $row['profile_picture_url']; ?>" alt="user-img" class="img-circle"> <span><?php echo $row['name']; ?><small class="text-success"><?php echo $row['email_address']; ?></small></span></a>
                                    
                            <?php include('member_approveModal.php'); ?>
                                    <?php  } 
                                    }else{ ?>
                                        <div class="col-6 col-lg-3"><p>No result found</p></div>
                                </li>
                            <?php  }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="panel">
        <div class="sk-chat-widgets">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Registered Members
                </div>
                <div class="panel-body">
                <p><?php echo $no_reg; ?> result(s) found</p>
                    <ul class="chatonline">
                    <?php
                    if($no_reg>0){
                        while ($row = mysqli_fetch_array($registeredMembers)) { ?>
                        <li>
                            <div class="call-chat">
                            <button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $row['regestration_number']; ?>"><span class = "glyphicon glyphicon-pencil"></span> View</button> <button class="btn btn-danger delete" data-toggle="modal" data-target="#delete<?php echo $row['regestration_number']; ?>"><span class = "glyphicon glyphicon-trash"></span> Remove</button>
                            </div>
                            <a href="javascript:void(0)"><img src="<?php echo $row['profile_picture_url']; ?>" alt="user-img" class="img-circle"> <span><?php echo $row['name']; ?><small class="text-success"><?php echo $row['email_address']; ?></small></span></a>
                            <?php include('member_ViewModal.php'); ?>
                            <?php include('member_deleteModal.php'); ?>
                            <?php  } 
                            }else{ ?>
                                <div class="col-6 col-lg-3"><p>No result found</p></div>
                        </li>
                    <?php  }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>