<?php
session_start();
include_once 'Member.php';
$action = $_REQUEST['action'];

switch ($action) {
    case "approveRegistration":
    approveRegistration();
    break;

    case "approvePayment":
    approvePayment();
    break;

    case "removeMember":
    removeMember();
    break;
}

function approveRegistration(){
    $regId = $_REQUEST['q'];

    $member = new Member();
       
    $result = $member->approveRegistration($regId);
}

function removeMember(){
    $regId = $_REQUEST['q'];

    $member = new Member();
        // echo '<script language="javascript">';
        // echo 'alert("'.$regId.'")';
        // echo '</script>';
    $result = $member->removeMember($regId);
}

function approvePayment(){
    $regId = $_REQUEST['q'];

    $member = new Member();

    $result = $member->approvePayment($regId);
}


?>