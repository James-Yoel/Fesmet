<?php
session_start();
include_once('../include/config.php');
if(!isset($_SESSION['email'])){
    header("location: ../login/login.php");
    exit();
}
$_SESSION['page'] = "home";
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

$postResult = $db->query("SELECT * FROM post ORDER BY ABS(postTime) DESC");
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
    <link rel ="stylesheet" href="assets/style.css">
</head>
<body>
    <?php
        include("../include/navbar.php");
    ?>
    <!-- Profile Card -->
    <div class="container-fluid" style="margin-top: 5%">
        <div class="row-py-5">
            <div class="col-xs-12 col-md-2 px-1 position-fixed rounded shadow-sm" id="sticky-sidebar" style="background: white;">
                <div class="col-xl-11 sticky-top mx-auto">
                    <a href="myProfile.php">
                        <img src='<?php echo $profileSrc; ?>' style="position: relative; max-width: 100%; height: 170px; border-radius: 100%; border: 1px; display: block; margin-left: auto; margin-right: auto; margin-top: 5%;">
                    </a>
                    <a href="myProfile.php">
                        <p style="text-align: center; font-size: 24px; color: black;"><?php echo $firstName." ".$lastName; ?></p>
                    </a>
                </div>
            </div>
            <!-- Membuat Post -->
            <div class="row" style="padding: 0 10px 0 10px">
                <div class="col-md-7 col-xs-12 mx-auto rounded shadow-sm bg-light" style="background: white; padding-bottom: 19px; margin-bottom: -5%;">
                    <form class="form-group" action="posting.php" method="post" enctype="multipart/form-data" style="margin: 0 6px;">
                        <div class="mb-3">
                            <label for="postText" style="font-size: 24px">Create Post</label>
                            <textarea class="form-control" name="postText" id="validationTextareaPost" placeholder="What's in your mind today..."></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" name="postImage" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Supported File Type: jpg, jpeg, png, gif (Max 2MB)</label>
                            </div>
                        </div>
                        <?php 
                            if(isset($_SESSION['errorMessage'])){?>
                            <div class="form-group ft">
                                <p style="color: red;"> <?php echo $_SESSION['errorMessage']?> </p>
                            </div>
                            <?php
                            unset($_SESSION['errorMessage']);
                            } ?>
                        <button class="btn btn-primary btn-block" type="submit" name='postUpload' style="margin-top: 1%;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br><br><br><br>

    <div class="row">
        <?php
        if ($postResult == null) {
            echo "post NULL";
        } else {
            foreach ($postResult as $rowPost) { ?>
                <div class="col-md-7 py-1 col-xs-12 mx-auto">
                    <div class="py-1">
                        <div class="p-4 bg-light rounded shadow-sm">
                            <div class="row-sm-12">
                                <div class="row-4" style="margin-bottom: -30px;">
                                    <?php
                                    if($rowPost['email'] == $email){ ?>
                                        <form method="post" action="deletePost.php">
                                            <input type="hidden" name="post_id" value="<?php echo $rowPost['postId']?>">
                                            <button type="submit" class="close" name="deletePost" onclick="javascript:return confirm('Do you want to delete this post ?');" data-toggle="tooltip" data-placement="top" title="Delete this post" value="delete" style="margin: -11px -19px 0 0">&times;</button>
                                        </form>
                                    <?php
                                    } else{
                                        echo "<br>";
                                    }
                                    ?> 
                                </div>
                                <div class="row-8"> 
                                <?php
                                if ($rowPost['picture'] != null) {
                                    if ($rowPost['textArea'] != null) {
                                        $pictureSrc = "picture/" . $rowPost['picture']; ?>
                                        <?php
                                        $userPost = $db->query("SELECT * FROM user WHERE email = '" . $rowPost['email'] . "'");
                                        foreach ($userPost as $rowUserPost) { ?>
                                            <a href="profile.php?friend=<?php echo $rowUserPost['firstName'] . " " . $rowUserPost['lastName'] ?>">
                                                <img src='<?php echo "picture/" . $rowUserPost['profilePicture'] ?>' style="width: 40px; height: 40px; border-radius: 100%;">
                                            </a>
                                            <a href="profile.php?friend=<?php echo $rowUserPost['firstName'] . " " . $rowUserPost['lastName'] ?>">
                                                <?php echo $rowUserPost['firstName'] . " " . $rowUserPost['lastName'] ?> <br />
                                            </a>
                                        <?php
                                        }
                                        ?>
                                        <?php echo date("F d Y h:i A", $rowPost['postTime']); ?> <br />
                                        <?php echo $rowPost['textArea']; ?><br />
                                        <img src='<?php echo $pictureSrc; ?>' style="max-width: 100%; max-height: 450px;"><br />
                                    <?php
                                    }
                                }
                                if ($rowPost['picture'] != null) {
                                    if ($rowPost['textArea'] == null) {
                                        $pictureSrc = "picture/" . $rowPost['picture']; ?>
                                        <?php
                                        $userPost = $db->query("SELECT * FROM user WHERE email = '" . $rowPost['email'] . "'");
                                        foreach ($userPost as $rowUserPost) { ?>
                                            <a href="profile.php?friend=<?php echo $rowUserPost['firstName'] . " " . $rowUserPost['lastName'] ?>">
                                                <img src='<?php echo "picture/" . $rowUserPost['profilePicture'] ?>' style="width: 40px; height: 40px; border-radius: 100%;">
                                            </a>
                                            <a href="profile.php?friend=<?php echo $rowUserPost['firstName'] . " " . $rowUserPost['lastName'] ?>">
                                                <?php echo $rowUserPost['firstName'] . " " . $rowUserPost['lastName'] ?> <br />
                                            </a>
                                        <?php
                                        }
                                        ?>
                                        <?php echo date("F d Y h:i A", $rowPost['postTime']); ?> <br />
                                        <img src='<?php echo $pictureSrc; ?>' style="max-width: 100%; max-height: 450px;"><br />
                                    <?php
                                    }
                                }
                                if ($rowPost['picture'] == null) {
                                    if ($rowPost['textArea'] != null) { ?>
                                        <?php
                                        $userPost = $db->query("SELECT * FROM user WHERE email = '" . $rowPost['email'] . "'");
                                        foreach ($userPost as $rowUserPost) { ?>
                                            <a href="profile.php?friend=<?php echo $rowUserPost['firstName'] . " " . $rowUserPost['lastName'] ?>">
                                                <img src='<?php echo "picture/" . $rowUserPost['profilePicture'] ?>' style="width: 40px; height: 40px; border-radius: 100%;">
                                            </a>
                                            <a href="profile.php?friend=<?php echo $rowUserPost['firstName'] . " " . $rowUserPost['lastName'] ?>">
                                                <?php echo $rowUserPost['firstName'] . " " . $rowUserPost['lastName'] ?> <br />
                                            </a>
                                        <?php
                                        }
                                        ?>
                                        <?php echo date("F d Y h:i A", $rowPost['postTime']); ?> <br />
                                        <?php echo $rowPost['textArea']; ?><br />
                                <?php
                                    }
                                } ?>
                                </div>
                            </div>

                            <!-- Memampilkan dan membuat comment -->
                            <button type="button" class="btn btn-secondary mt-2 mb-4 collapsible">Comment</button>
                            <div class="content" style="display: none;">
                                <div class="col-xl-16 py-4 px-4 mx-auto">
                                    <?php
                                    $commentResult = $db->query("SELECT * FROM comment WHERE postId = '" . $rowPost['postId'] . "' ORDER BY ABS(commentTime) DESC");
                                    foreach ($commentResult as $rowComment) {
                                        $userComment = $db->query("SELECT * FROM user WHERE email = '" . $rowComment['email'] . "'");
                                        foreach ($userComment as $rowUserComment) { ?>
                                        <div class="row-sm-12">
                                            <div class="row-4" style="margin-bottom: -30px;">
                                            <?php
                                                if($rowComment['email'] == $email){ ?>
                                                    <form method="post" action="deleteComment.php">
                                                        <input type="hidden" name="comment_id" value="<?php echo $rowComment['commentId']?>">
                                                        <button type="submit" class="close" name="deleteComment" onclick="javascript:return confirm('Do you want to delete this comment ?');" data-toggle="tooltip" data-placement="top" title="Delete this comment" value="delete" style="margin: -11px -19px 0 0">&times;</button>
                                                    </form>
                                                <?php
                                                }
                                            ?>
                                            </div> 
                                            <div class="row-8">
                                                <a href="profile.php?friend=<?php echo $rowUserComment['firstName'] . " " . $rowUserComment['lastName'] ?>">
                                                    <img src='<?php echo "picture/" . $rowUserComment['profilePicture']; ?>' style="width: 40px; height: 40px; border-radius: 100%;">
                                                </a>
                                                <a href="profile.php?friend=<?php echo $rowUserComment['firstName'] . " " . $rowUserComment['lastName'] ?>">
                                                    <?php echo $rowUserComment['firstName'] . " " . $rowUserComment['lastName']; ?>
                                                </a>
                                            <?php
                                            }
                                            ?>
                                            <?php echo date("F d Y h:i A", $rowComment['commentTime']); ?> <br />
                                            <?php echo $rowComment['commentText']; ?><br />
                                            </div>
                                        </div>

                                        <!-- Menampilkan dan membuat reply -->
                                        <button type="button" class="btn btn-secondary mb-2 mt-2 collapsible">Reply</button>
                                        <div class="content" style="display: none;">
                                            <div class="col-xl-16 py-4 px-4 mx-auto ">
                                                <?php
                                                $replyResult = $db->query("SELECT * FROM reply WHERE commentId = '" . $rowComment['commentId'] . "' ORDER BY ABS(replyTime) DESC");
                                                foreach ($replyResult as $rowReply) {
                                                    $userReply = $db->query("SELECT * FROM user WHERE email = '" . $rowReply['email'] . "'");
                                                    foreach ($userReply as $rowUserReply) { ?>
                                                    <div class="row-sm-12">
                                                        <div class="row-4" style="margin-bottom: -30px;">
                                                        <?php
                                                            if($rowReply['email'] == $email){ ?>
                                                                <form method="post" action="deleteReply.php">
                                                                    <input type="hidden" name="reply_id" value="<?php echo $rowReply['replyId']?>">
                                                                    <button type="submit" class="close" name="deleteReply" onclick="javascript:return confirm('Do you want to delete this reply ?');" data-toggle="tooltip" data-placement="top" title="Delete this reply" value="delete" style="margin: -11px -19px 0 0">&times;</button>
                                                                </form>
                                                            <?php
                                                            }
                                                        ?>
                                                        </div> 
                                                        <div class="row-8">
                                                            <br>
                                                            <a href="profile.php?friend=<?php echo $rowUserReply['firstName'] . " " . $rowUserReply['lastName'] ?>">
                                                                <img src='<?php echo "picture/" . $rowUserReply['profilePicture']; ?>' style="width: 40px; height: 40px; border-radius: 100%;">
                                                            </a>
                                                            <a href="profile.php?friend=<?php echo $rowUserReply['firstName'] . " " . $rowUserReply['lastName'] ?>">
                                                                <?php echo $rowUserReply['firstName'] . " " . $rowUserReply['lastName']; ?>
                                                            </a>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php echo date("F d Y h:i A", $rowReply['replyTime']); ?> <br />
                                                        <?php echo $rowReply['replyText']; ?><br />
                                                        <br>
                                                    </div>
                                                </div>
                                                <?php
                                                }
                                                ?>
                                                <form action="reply.php" method="post">
                                                    <label>Reply this comment</label>
                                                    <textarea class="form-control" name='replyText' id="validationTextareaReply" required></textarea>
                                                    <button type="submit" class="btn btn-primary mt-2 mb-4" name='replyUpload' value="<?php echo $rowComment['commentId'] ?>">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                        <br><br>
                                        <!-- bagian reply selesai -->

                                    <?php
                                    } ?>
                                    <form action="comment.php" method="post">
                                        <label>Comment this post</label>
                                        <textarea class="form-control" name="commentText" id="validationTextareaComment" required></textarea>
                                        <button class="btn btn-primary mt-2 mb-4" type="submit" name='commentUpload' value="<?php echo $rowPost['postId'] ?>">Submit</button>
                                    </form>
                                </div>
                            </div>
                            <!-- Bagian comment selesai -->
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <!-- Memampilkan post selesai -->

    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }

        $('#inputGroupFile01').on('change', function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
    <br><br><br>
</body>