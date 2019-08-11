<?php

require_once 'conn.php';


class Member extends Dbh{

    function saveMemberData($regestration_number,$nic,$title,$name,$birthday,$address,$country,$phone,$mobile,$email,$index_num,$ol_year,$al_year,$password, $imgLocation){
        $createdAt= date("Y-m-d H:i:sa");
        if($imgLocation==""){
            $imgLocation= $this->saveProfilePic($regestration_number);
        }

        
        
        $query ="INSERT INTO member (regestration_number,nic_num,title,name,birthday,address,country,phone_number,mobile_number,email_address,index_number,olevel_year,alevel_year,password,createdAt,profile_picture_url) VALUES ('$regestration_number','$nic','$title','$name','$birthday','$address','$country',$phone,$mobile,'$email','$index_num',$ol_year,$al_year,'$password','$createdAt','$imgLocation')";
        $query2="INSERT INTO user(regestration_number,status)VALUES ('$regestration_number',0)";
         
        $result =$this->connect()->query($query);
        $result =$result.$this->connect()->query($query2);
      
        
     
        return $result?'ok':'err';
     }
     function saveProfilePic($regNum)
     {      
            /* Getting file name */
            $filename = $_FILES['file']['name'];
            $temp = explode(".", $filename);
            $newfilename =  $regNum . '.' . end($temp);
        
             /* Location */
         $location = "plugins/images/users/". $newfilename;
         $uploadOk = 1;
         $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
             /* Valid extensions */
         $valid_extensions = array("jpg","jpeg","png");
             /* Check file extension */
         if(!in_array(strtolower($imageFileType), $valid_extensions)) {
         $uploadOk = 0;
         }
         if($uploadOk == 0){
         echo 0;
         }else{
         /* Upload file */
         if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
             return $location;
         }else{
             return "plugins/images/users/man.jpg";
         }
         }
         
     }
    
    function getNewRegisteredMembers(){
        $query ="SELECT * FROM member,user WHERE user.status='0' and member.regestration_number = user.regestration_number";
        $result =$this->connect()->query($query);   
        return $result;
    }

    function getPendingMembers(){
        $query ="SELECT * FROM member,user WHERE user.status='2' and member.regestration_number = user.regestration_number";
        $result =$this->connect()->query($query);   
        return $result;
    }

    function approvePayment($Id){
        $regId = $Id;
        $query ="UPDATE user SET status='3' WHERE regestration_number='$regId'";
        $result =$this->connect()->query($query);   
        echo "Done";
    }
    
    // tempory
    function getPaymentPendingMembers(){
        $query ="SELECT * FROM member,user WHERE user.status='2' and member.regestration_number = user.regestration_number";
        $result =$this->connect()->query($query);   
        return $result;
    }

    function getRegisteredMembers(){
        $query ="SELECT * FROM member,user WHERE user.status >='1' AND member.regestration_number = user.regestration_number";
        $result =$this->connect()->query($query);   
        return $result;
    }

    function approveRegistration($Id){
        $regId = $Id;
        $query ="UPDATE user SET status='2' WHERE regestration_number='$regId'";
        $result =$this->connect()->query($query);   
        echo "Done";
    }

    function removeMember($Id){
        $regId = $Id;
        // $query ="DELETE FROM user WHERE regestration_number='$regId'";
    $query ="UPDATE user SET status='-2' WHERE regestration_number='$regId'";
        $result =$this->connect()->query($query);   
        echo "Done";
        
    }

    function searchMember($val){
        $name = $val."%";
        $query ="SELECT * FROM member,user WHERE member.name Like '$name' AND user.status >= '-1' AND member.regestration_number = user.regestration_number";
        $result =$this->connect()->query($query);   
        $no_reg =mysqli_num_rows($result);
        return $result;
        
    }

}



    
?>