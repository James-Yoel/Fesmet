<?php
    session_start();
    include_once('../include/config.php');
    if(strlen(trim($_POST['commentText']))){
        $email = $_SESSION['email'];
        $commentText = mysqli_real_escape_string($db, strip_tags($_POST['commentText']));
        $commentTime = time();
        $postId = $_POST['commentUpload'];
        $result = $db->query("INSERT INTO comment(email, commentText, commentTime, postId) VALUES('$email', '$commentText', '$commentTime', '$postId')");
        
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