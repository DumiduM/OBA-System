<?php
require_once '../conn.php';
class Member extends Dbh{
    function saveMemberData($regestration_number,$nic,$title,$name,$birthday,$address,$country,$phone,$mobile,$email,$index_num,$ol_year,$al_year,$password){
        $createdAt= date("Y-m-d H:i:sa");

       $query ="INSERT INTO member (regestration_number,nic_num,title,name,birthday,address,country,phone_number,mobile_number,email_address,index_number,olevel_year,alevel_year,password,createdAt) VALUES ('$regestration_number','$nic','$title','$name','$birthday','$address','$country',$phone,$mobile,'$email','$index_num',$ol_year,$al_year,'$password','$createdAt')";
       //"INSERT INTO member (regestration_number,nic_num,title,name,birthday,address,country,phone_number,mobile_number,email_address,index_number,olevel_year,alevel_year,password) VALUES ('943343519',98658541v','Mr','lslsns',22/12/1996,'sssss','SL',785,78,'ddddd','115',2005,2001,'wwww')";
    

       $result =$this->connect()->query($query);

       
    
       if($result)
       {
       return "Success";
       
       }
       else
       {
       return "Error!";
       }
    }
}


    
?>