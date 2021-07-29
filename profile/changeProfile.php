<?php
    session_start();
    include_once("../include/config.php");
    if(isset($_POST['profileUpload'])){
        $size = 2097152;
        $name = $_FILES['fileProfile']['name'];
        $user = $_SESSION['email'];
        $targetDir = "picture/";
        $targetFile = $targetDir.basename($_FILES["fileProfile"]["name"]);

        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $extensionArr = array("jpg", "jpeg", "png");

        if($_FILES['fileProfile']['size'] >= $size){
            $_SESSION['errorMessagePicture'] = "File is too big !";
            header("location: myProfile.php");
            exit();
        }

        if(in_array($imageFileType, $extensionArr)){
            $result = $db->query("UPDATE user SET profilePicture='".$name."' WHERE email = '".$user."'");
            move_uploaded_file($_FILES['fileProfile']['tmp_name'], $targetDir.$name);
        }
        else{
            $_SESSION['errorMessagePicture'] = "File not supported !";
            header("location: myProfile.php");
            exit();
        }

        header("location: myProfile.php");
    }
?>