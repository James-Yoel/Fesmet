<?php
include_once('include/config.php');
session_start();
if(isset($_SESSION['email'])){
    $_SESSION['page'] = "aboutLogin";
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
$profileSrc = "profile/picture/".$profile;
$coverSrc = "profile/picture/".$cover;
}
else{
    $_SESSION['page'] = "about";
}
date_default_timezone_set('Asia/Jakarta');
?>

<html>
<head>
    <title>Fesmet</title>
    <link rel="icon" type="image/png" sizes="32x32" href="include/favicon/favicon-32x32.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
    <link rel="stylesheet" href="include/style.css" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
<body>
    <?php
        include("include/navbar.php");
    ?>

    <div class="bg-light py-5">
        <div class="container py-5">
            <div class="row mb-4">
            <div class="col-lg-5">
                <h2 class="display-4 font-weight-light">Fesmet Team</h2>
                <p class="font-italic text-muted">Universitas Multimedia Nusantara</p>
            </div>
            </div>

            <div class="row text-center">
            <!-- Team item-->
            <div class="col-xl-3 col-sm-6 mb-5">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="include/picture/Reynalfin.PNG" alt="Reynalfin" style="width: 100px; height: 100px;" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0">Reynalfin Nagasaputra</h5><span class="small text-uppercase text-muted">NIM - 00000028632</span>
                </div>
            </div>
            <!-- End-->

            <!-- Team item-->
            <div class="col-xl-3 col-sm-6 mb-5">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="include/picture/Patrick Aubrey.png" alt="Patrick" style="width: 100px; height: 100px;" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0">Patrick Aubrey</h5><span class="small text-uppercase text-muted">NIM - 00000028670</span>
                </div>
            </div>
            <!-- End-->

            <!-- Team item-->
            <div class="col-xl-3 col-sm-6 mb-5">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="include/picture/Yustinus Lionardy.PNG" alt="Yustinus" style="width: 100px; height: 100px;" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0">Yustinus Lionardy</h5><span class="small text-uppercase text-muted">NIM - 00000028826</span>
                </div>
            </div>
            <!-- End-->

            <!-- Team item-->
            <div class="col-xl-3 col-sm-6 mb-5">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="include/picture/James Yoel.png" alt="James" style="width: 100px; height: 100px;"class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0">James Yoel</h5><span class="small text-uppercase text-muted">NIM - 00000028895</span>
                </div>
            </div>
            <!-- End-->

            <!-- Team item-->
            <div class="col-xl-3 col-sm-6 mb-5">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="include/picture/Cagananta.PNG" alt="Cagananta" style="width: 100px; height: 100px;" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0">Cagananta</h5><span class="small text-uppercase text-muted">NIM - 00000028896</span>
                </div>
            </div>
            <!-- End-->

            <!-- Team item-->
            <div class="col-xl-3 col-sm-6 mb-5">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="include/picture/Indra Hadiwana.PNG" alt="Indra" style="width: 100px; height: 100px;" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0">Indra P. Hadiwana</h5><span class="small text-uppercase text-muted">NIM - 00000028935</span>
                </div>
            </div>
            <!-- End-->

            <!-- Team item-->
            <div class="col-xl-3 col-sm-6 mb-5">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="include/picture/Ethan Billy.PNG" alt="Ethan" style="width: 100px; height: 100px;" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0">Ethan Billy Gunawan</h5><span class="small text-uppercase text-muted">NIM - 00000029127</span>
                </div>
            </div>
            <!-- End-->

            </div>
        </div>
    </div>

</body>
</html>