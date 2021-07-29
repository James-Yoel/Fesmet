<?php
session_start();
$_SESSION['page'] = "signUp";
if(isset($_SESSION['email'])){
    header("location: ../profile/home.php");
    exit();
}
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
    </head>
    <body class="bg" style="background-attachment: fixed">
        <?php include("../include/navbar.php"); ?>
        <div class="container-fluid" style="margin-top: 5%">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12"></div>
                <div class="col-md-6 col-sm-4 col-xs-12">
                    <h1 id="header">Sign Up</h1>
                    <form action="createUser.php" method="post" class="form-conatiner">
                        <div class="form-group ft">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group ft">
                                    <label for="firstName">First Name</label>
                                    <input type="text" name="firstName" class="form-control" placeholder="First Name" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group ft">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" name="lastName" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ft">
                            <label for="tanggalLahir">Tanggal Lahir<br></label>
                            <input type="date" name="tanggalLahir" max="2020-12-31" class="form-control" required>
                        </div>
                        <div class="form-group ft">
                            <label for="jenisKelamin">Jenis Kelamin<br><label>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenisKelamin" id="inlineRadio1" value="Male" required>
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenisKelamin" id="inlineRadio2" value="Female" required>
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenisKelamin" id="inlineRadio2" value="Special" required>
                                        <label class="form-check-label" for="inlineRadio2">Special</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ft">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group ft">
                            <label for="matchPassword">Confirm Password</label>
                            <input type="password" name="matchPassword" class="form-control" placeholder="Confirm Password" required>
                        </div>
                        <?php
                        if(isset($_SESSION['errorMessage'])){?>
                            <div class="form=group ft">
                                <p style="color: red;"> <?php echo $_SESSION['errorMessage']?> </p>
                            </div>
                            <?php
                            unset($_SESSION['errorMessage']);                        
                        }
                        ?>
                        <button type="submit" class="btn btn-primary btn-block" name="submit">Sign Up</button><br/>
                        <a href="../login/login.php" id="signup">Already have an account ? Log In here</a>
                    </form>
                </div>
            </div>
        </div>
        <br/>
        <br/>
    </body>
</html>

