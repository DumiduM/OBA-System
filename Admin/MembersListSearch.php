<?php session_start();
require_once "./php/membership/Member.php";
// require_once "../conn.php";
$member = new Member();

searchMember();
function searchMember(){
    $val = $_REQUEST['q'];
    
    $member = new Member();

    $result = $member->searchMember($val);

    if($result){
        $no_reg =mysqli_num_rows($result);
    //     echo '<script language="javascript">';
    // echo 'alert("'.$no_reg.'")';
    // echo '</script>';
        }else{
        $no_reg ='';
        }
        ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="panel">
                <div class="sk-chat-widgets">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Search Results
                        </div>
                        <div class="panel-body">
                        <p><?php echo $no_reg; ?> result(s) found</p>
                            <ul class="chatonline">
                            <?php
                            if($no_reg>0){
                                while ($row = mysqli_fetch_array($result)) { ?>
                                <li>
                                    <div class="call-chat">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $row['regestration_number']; ?>"><span class = "glyphicon glyphicon-eye-open"></span> View</button> <button class="btn btn-danger delete" data-toggle="modal" data-target="#delete<?php echo $row['regestration_number']; ?>"><span class = "glyphicon glyphicon-trash"></span> Remove</button>
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

        <?php 
}
?>