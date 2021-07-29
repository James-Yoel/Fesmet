<?php
session_start();
$_SESSION['page'] = "landing";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fesmet</title>
    <link rel="icon" type="image/png" sizes="32x32" href="include/favicon/favicon-32x32.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="include/style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
    <?php include("include/navbar.php");?>
    <main role="main">
    <section class="jumbotron text-center mb-0">
            <div class="container">
                <h1>Fesmet</h1>
                <p class="lead text-muted">Meet the new people that you never met. Find over 100000+ people in here.</p>
            </div>
        </section>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-75 container-md" src="include/picture/people.jpg"height="500px" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>Start Sharing And Connecting</h3>
                <p>With Your Friends, Family, and People You Know.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img class="d-block w-75 container-md" src="include/picture/starrysky.jpg"height="500px" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>Find Over 100000+ People In Here</h3>
            </div>
            </div>
            <div class="carousel-item">
            <img class="d-block w-75 container-md" src="include/picture/home3.jpg"height="500px" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>Helps You Connect And Share With The People In Your Life.</h3>
                <p>With The People In Your Life</p>
            </div>
            </div>
        </div>
        <a class="carousel-control-prev w-50" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next w-50" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
        <section class="jumbotron text-center">
            <div class="container">
                <h1>Get Started</h1>
                <p>
                    <a href="signUp/signUp.php" class="btn btn-primary my-2">Sign Up</a>
                </p>
                <p class="lead text-muted"><a href="login/login.php">Already have account? Sign in here</a></p>
            </div>
        </section>
    </main>
</body>

</html>