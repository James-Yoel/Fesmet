<?php
    session_start();
    include_once("../include/config.php");
    if(isset($_POST['editUpload'])){
        $email = mysqli_escape_string($db, strip_tags($_POST['emailProfile']));
        $firstName = mysqli_escape_string($db, strip_tags($_POST['firstNameProfile']));
        $lastName = mysqli_real_escape_string($db, strip_tags($_POST['lastNameProfile']));
        $birthDate = $_POST['birthDateProfile'];
        $gender = $_POST['genderProfile'];
        $result = $db->query("UPDATE user SET firstName ='".$firstName."', lastName ='".$lastName."', tanggalLahir='".$birthDate."', jenisKelamin='".$gender."' WHERE email ='".$email."';");
        header("location: myProfile.php");
    }
?>