<?php
    session_start();
    include_once("../include/config.php");
    date_default_timezone_set('Asia/Jakarta');
    if(!strlen(trim($_POST['postText']))){
        if(!is_uploaded_file($_FILES['postImage']['tmp_name'])){
            $_SESSION['errorMessage'] = "Please input something !";
            if($_SESSION['page'] == "home"){
                header("location: home.php");
                exit();
            }
            else{
                header("location: myProfile.php");
                exit();
            }
        }
    }

    if(!strlen(trim($_POST['postText']))){
        if(is_uploaded_file($_FILES['postImage']['tmp_name'])){
            $email = $_SESSION['email'];
            $postTime = time();
            $postImage = $_FILES['postImage']['name'];
            $size = 2097152;
            $targetDir = "picture/";
            $targetFile = $targetDir.basename($_FILES["postImage"]["name"]);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            $extensionArr = array("jpg", "jpeg", "png", "gif");

            if($_FILES['postImage']['size'] >= $size){
                $_SESSION['errorMessage'] = "File is too big !";
                if($_SESSION['page'] == "home"){
                    header("location: home.php");
                    exit();
                }
                else{
                    header("location: myProfile.php");
                    exit();
                }
            }

            if(in_array($imageFileType, $extensionArr)){
                $result = $db->query("INSERT INTO post(email, picture, postTime) VALUES('$email', '$postImage', '$postTime')");
                move_uploaded_file($_FILES['postImage']['tmp_name'], $targetDir.$postImage);
                if($_SESSION['page'] == "home"){
                    header("location: home.php");
                    exit();
                }
                else{
                    header("location: myProfile.php");
                    exit();
                }
            }
            else{
                $_SESSION['errorMessage'] = "File not supported !";
                if($_SESSION['page'] == "home"){
                    header("location: home.php");
                    exit();
                }
                else{
                    header("location: myProfile.php");
                    exit();
                }
            }
        }
    }

    if(strlen(trim($_POST['postText']))){
        if(!is_uploaded_file($_FILES['postImage']['tmp_name'])){
            $email = $_SESSION['email'];
            $postText = mysqli_real_escape_string($db, strip_tags($_POST['postText']));
            $postTime = time();
            $result = $db->query("INSERT INTO post(email, textArea, postTime) VALUES('$email', '$postText', '$postTime')");
            if($_SESSION['page'] == "home"){
                header("location: home.php");
                exit();
            }
            else{
                header("location: myProfile.php");
                exit();
            }
        }
    }

    if(strlen(trim($_POST['postText']))){
        if(is_uploaded_file($_FILES['postImage']['tmp_name'])){
            $email = $_SESSION['email'];
            $postText = mysqli_real_escape_string($db, strip_tags($_POST['postText']));
            $postTime = time();
            $size = 2097152;
            $postImage = $_FILES['postImage']['name'];
            $targetDir = "picture/";
            $targetFile = $targetDir.basename($_FILES["postImage"]["name"]);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            $extensionArr = array("jpg", "jpeg", "png", "gif");
            
            if($_FILES['postImage']['size'] >= $size){
                $_SESSION['errorMessage'] = "File is too big !";
                if($_SESSION['page'] == "home"){
                    header("location: home.php");
                    exit();
                }
                else{
                    header("location: myProfile.php");
                    exit();
                }
            }

            if(in_array($imageFileType, $extensionArr)){
                $result = $db->query("INSERT INTO post(email, textArea, picture, postTime) VALUES('$email', '$postText', '$postImage', '$postTime')");
                move_uploaded_file($_FILES['postImage']['tmp_name'], $targetDir.$postImage);
                if($_SESSION['page'] == "home"){
                    header("location: home.php");
                    exit();
                }
                else{
                    header("location: myProfile.php");
                    exit();
                }
            }
            else{
                $_SESSION['errorMessage'] = "File not supported !";
                if($_SESSION['page'] == "home"){
                    header("location: home.php");
                    exit();
                }
                else{
                    header("location: myProfile.php");
                    exit();
                }
            }
        }
    }
?>