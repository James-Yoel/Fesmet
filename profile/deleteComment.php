<?php
session_start();
include_once("../include/config.php");
if(isset($_POST['deleteComment'])){
    $commentId = $_POST['comment_id'];
    $replyCheck = $db->query("SELECT * FROM reply WHERE commentId = '".$commentId."';");
    foreach($replyCheck as $reply){
        $deleteReply = $db->query("DELETE FROM reply WHERE replyId = '".$reply['replyId']."';");
    }
    $result = $db->query("DELETE FROM comment WHERE commentId = '".$commentId."';");
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