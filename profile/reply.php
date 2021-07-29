<?php
    session_start();
    include_once('../include/config.php');
    if(strlen(trim($_POST['replyText']))){
        $email = $_SESSION['email'];
        $replyText = mysqli_real_escape_string($db, strip_tags($_POST['replyText']));
        $replyTime = time();
        $commentId = $_POST['replyUpload'];
        $result = $db->query("INSERT INTO reply(email, replyText, replyTime, commentId) VALUES('$email', '$replyText', '$replyTime', '$commentId')");
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