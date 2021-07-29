<?php
if($_SESSION['page'] == "landing" || $_SESSION['page'] == "login" || $_SESSION['page'] == "signUp" || $_SESSION['page'] == "about"){?>
    <header>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
            <?php
            if($_SESSION['page'] == "landing" || $_SESSION['page'] == "about"){?>
                <a class="navbar-brand" href="index.php">
                    <img src="include/picture/Fesmet.png" width="30" height="30" class="d-inline-block align-top">Fesmet
                 </a>
            <?php
            } else{?>
                <a class="navbar-brand" href="../index.php">
                    <img src="../include/picture/Fesmet.png" width="30" height="30" class="d-inline-block align-top">Fesmet
                </a>
            <?php
            }
            ?>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <form class="form-inline my-2 my-lg-0">
                <?php 
                if($_SESSION['page'] == "landing" || $_SESSION['page'] == "about"){?>
                    <button class="btn btn-outline-primary my-2 my-sm-0 mr-sm-2" type="button"><a href="login/login.php">Log In</a></button>
                    <button class="btn btn-outline-primary my-2 my-sm-0 mr-sm-2" type="button"><a href="signUp/signUp.php">Sign Up</a></button>
                <?php
                } else{?>
                    <button class="btn btn-outline-primary my-2 my-sm-0 mr-sm-2" type="button"><a href="../login/login.php">Log In</a></button>
                    <button class="btn btn-outline-primary my-2 my-sm-0 mr-sm-2" type="button"><a href="../signUp/signUp.php">Sign Up</a></button>
                <?php
                }
                ?>
                </form>
            </div>
        </nav>
    </header>
<?php
} else{?>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <?php
            if($_SESSION['page'] == "aboutLogin"){?>
                <a class="navbar-brand" href="profile/home.php">
                    <img src="include/picture/Fesmet.png" width="30" height="30" class="d-inline-block align-top">
                    Fesmet
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto"  style="margin-left: 110px">
                        <li class="nav-item">
                            <a class="nav-link" href="profile/myProfile.php" style="color: white;">
                                <img src ='<?php echo $profileSrc; ?>' style="width: 30px; height: 30px; margin-right: 5px; border-radius: 100%;">
                                <?php echo $firstName." ".$lastName ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="profile/home.php">|&nbsp;&nbsp;&nbsp; Home &nbsp;&nbsp;&nbsp;|</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="profile/logOut.php">Log Out</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" action="profile/friendSearch.php" method="get">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search Friend" aria-label="Search" name="friendSearch" style="width: 400px;" required>
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            <?php
            } else{?>
                <a class="navbar-brand" href="home.php">
                    <img src="../include/picture/Fesmet.png" width="30" height="30" class="d-inline-block align-top">
                    Fesmet
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto"  style="margin-left: 110px">
                        <li class="nav-item">
                            <a class="nav-link" href="myProfile.php" style="color: white;">
                                <img src ='<?php echo $profileSrc; ?>' style="width: 30px; height: 30px; margin-right: 5px; border-radius: 100%;">
                                <?php echo $firstName." ".$lastName ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="home.php">|&nbsp;&nbsp;&nbsp; Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="logOut.php" onclick="javascript:return confirm('Do you want to log out ?');">|&nbsp;&nbsp;&nbsp;Log Out</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" action="friendSearch.php" method="get">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search Friend" aria-label="Search" name="friendSearch" style="width: 400px;" required>
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            <?php
            }
            ?>
        </nav>
    </header>
<?php
}
?>

<footer>
    <div class="container-fluid fixed-bottom" style="background-color: rgb(50, 50, 50); height: 30px;">
        <?php
            if($_SESSION['page'] == "landing" ||  $_SESSION['page'] == "about"  || $_SESSION['page'] == "aboutLogin"){?>
                <p style="color: white; text-align: center;">©Copyright 
                    <a href="aboutUs.php" class="text-white">Fesmet Team</a> All rights reserved.
                </p>
            <?php
            } else{?>
                <p style="color: white; text-align: center;">©Copyright 
                    <a href="../aboutUs.php" class="text-white">Fesmet Team</a> All rights reserved.
                </p>
            <?php
            }
        ?>
    </div>
</footer>