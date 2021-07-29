<?php
session_start();
include_once("../include/config.php");
if(isset($_POST['submit'])){
    $capthca = mysqli_real_escape_string($db, strip_tags($_POST['captcha']));
    if($_SESSION['code'] == $capthca){
        $email = mysqli_real_escape_string($db, strip_tags($_POST['email']));
        $password = mysqli_real_escape_string($db, strip_tags($_POST['password']));
        $salt = substr($email, 0, 3);
        $passSalt = md5($password.$salt);
        $login = $db->query("SELECT * FROM user WHERE email='".$email."' AND pass='$passSalt'");
        if($login->num_rows > 0){
            $row = $login->fetch_assoc();
            $_SESSION['email'] = $email;
            header('location: ../profile/home.php');
            exit();
        }
        else{
            $_SESSION['errorMessage'] = "Email or Password incorrect !"; 
            header('location: login.php');
            exit();
        }
    }
    else{
        $_SESSION['errorMessage'] = "Capthca doesn't match !";
        header('location: login.php');
        exit();
    }
}
else{
    header('location: login.php');
    exit();
}
?>