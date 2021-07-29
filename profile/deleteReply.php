<?php
session_start();
include_once("../include/config.php");
if(isset($_POST['deleteReply'])){
    $replyId = $_POST['reply_id'];
    $result = $db->query("DELETE FROM reply WHERE replyId = '".$replyId."';");
    if($_SESSION['page'] == "home"){
        header("location: home.php");
        exit();
    }
    else if($_SESSION['page'] == "myProfile"){
        header("location: myProfile.php");
        exit();
    }
    else if($_SESSION['page'] == "profile"){
        header("location: profile.php?friend=".$_SESSION['friend']."");
        exit();
    }
}
?>