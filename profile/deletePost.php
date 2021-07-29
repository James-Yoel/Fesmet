<?php
session_start();
include_once("../include/config.php");
if(isset($_POST['deletePost'])){
    $postId = $_POST['post_id'];
    $commentCheck = $db->query("SELECT * FROM comment WHERE postId = '".$postId."';");
    foreach($commentCheck as $comment){
        $replyCheck = $db->query("SELECT * FROM reply WHERE commentId = '".$comment['commentId']."';");
        foreach($replyCheck as $reply){
            $deleteReply = $db->query("DELETE FROM reply WHERE replyId = '".$reply['replyId']."';");
        }
        $deleteComment = $db->query("DELETE FROM comment WHERE commentId = '".$comment['commentId']."';");
    }
    $result = $db->query("DELETE FROM post WHERE postId = '".$postId."';");
    if($_SESSION['page'] == "home"){
        header("location: home.php");
        exit();
    }
    else if($_SESSION['page'] == "myProfile"){
        header("location: myProfile.php");
        exit();
    }
}
?>