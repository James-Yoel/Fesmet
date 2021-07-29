<?php
session_start();
include_once("../include/config.php");
if(!isset($_SESSION['email'])){
    header("location: ../login/login.php");
    exit();
}
$_SESSION['page'] = "friendSearch";
date_default_timezone_set('Asia/Jakarta');
$user = $_SESSION['email'];
$result = $db->query("SELECT * FROM user WHERE email = '".$user."'");
$row = mysqli_fetch_array($result);
$firstName = $row['firstName'];
$lastName = $row['lastName'];
$email = $row['email'];
$tanggalLahir = $row['tanggalLahir'];
$jenisKelamin = $row['jenisKelamin'];
$profile = $row['profilePicture'];
$cover = $row['coverPicture'];
$profileSrc = "picture/".$profile;
$coverSrc = "picture/".$cover;

$friendSearch = mysqli_real_escape_string($db, strip_tags($_GET['friendSearch']));
$friendSearchData = "%".$friendSearch."%";
$friendSearchResult = $db->query("SELECT * FROM user WHERE email LIKE '".$friendSearchData."' OR CONCAT(firstName, ' ', lastName) LIKE '".$friendSearchData."'");
?>
<html>
    <head>
        <title>Fesmet</title>
        <link rel="icon" type="image/png" sizes="32x32" href="../include/favicon/favicon-32x32.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../include/style.css" type="text/css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <link rel ="stylesheet" href="assets/style.css"/>
    </head>
    <body>
        <?php
            include("../include/navbar.php");
        ?>
        <!-- Profile Card -->
        <div class="container-fluid" style="margin-top: 5%">
        <div class="row-py-5">
            <div class="col-xs-12 col-md-2 px-1 position-fixed rounded shadow-sm" id="sticky-sidebar" style="background: white;">
                <div class="sticky-top">
                    <a href="myProfile.php">
                        <img src='<?php echo $profileSrc; ?>' style="position: relative; max-width: 100%; height: 170px; border-radius: 100%; border: 1px; display: block; margin-left: auto; margin-right: auto; margin-top: 5%;">
                    </a>
                    <a href="myProfile.php">
                        <p style="text-align: center; font-size: 24px; color: black;"><?php echo $firstName." ".$lastName; ?></p>
                    </a>
                </div>
            </div>
        </div>
        <!-- Friend Result -->
        <div class="col-md-7 px-1 col-xs mx-auto">
            <h3 class="col-xl-8 py-2 text-black"> <?php echo mysqli_num_rows($friendSearchResult)." Friend Found !"; ?></h3>
            <?php
            foreach($friendSearchResult as $rowFriendSearch){?>
                <div class="py-2">
                    <div class="p-4 bg-light rounded shadow-sm">
                        <div class="_gll">
                            <a href="profile.php?friend=<?php echo $rowFriendSearch['firstName']." ".$rowFriendSearch['lastName']?>">
                                <img src ='<?php echo "picture/".$rowFriendSearch['profilePicture']?>' width="80px" height="80px" style="border-radius: 50%;" data-toggle="tooltip" data-placement="top">
                                <?php echo $rowFriendSearch['firstName']." ".$rowFriendSearch['lastName'] ?><br>
                            </a>
                            <div style="margin-top:10px;">
                                <a href="profile.php?friend=<?php echo $rowFriendSearch['firstName']." ".$rowFriendSearch['lastName']?>">
                                    Email:<?php echo $rowFriendSearch['email'] ?><br>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    </body>
    <br><br><br>
</html>