<?php
session_start();
include_once('../include/config.php');
if(!isset($_SESSION['email'])){
    header("location: ../login/login.php");
    exit();
}
$_SESSION['page'] = "profile";
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
$friend = $_GET['friend'];
$_SESSION['friend'] = $friend;

$friendResult = $db->query("SELECT * FROM user WHERE CONCAT_WS(' ', firstName, lastName) = '".$friend."'");
$rowFriendResult = mysqli_fetch_array($friendResult);
if($rowFriendResult['firstName']." ".$rowFriendResult['lastName'] == $firstName." ".$lastName){
    header("location: myProfile.php");
    exit();
}
$postResult = $db->query("SELECT * FROM post WHERE email = '".$rowFriendResult['email']."' ORDER BY ABS(postTime) DESC");
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
    <!-- Friend Info -->
    <div class="row py-5 px-4">
        <div class="col-xl-8 col-md-6 col-sm-10 mx-auto">
            <div class="bg-white shadow rounded overflow-hidden">
                <img src ='<?php echo "picture/".$rowFriendResult['coverPicture']; ?>' style="height:400px; width:100%;">
                <h2 class="mt-0 mb-0" style="color:black; margin: -250px 0 0 230px"><?php echo $rowFriendResult['firstName']." ".$rowFriendResult['lastName'];?></h2>
                <div class="px-1 pt-0 pb-1" style="margin-bottom: 50px">
                    <div class="media align-items-end profile-header">
                        <div class="profile mr-3">
                            <img src = '<?php echo "picture/".$rowFriendResult['profilePicture']; ?>' width="200px" height="200px" style="border-radius: 50%; margin-top: -240px; margin-left: 15px;">
                        </div>
                    </div>
                </div>
                <div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            E-Mail &nbsp;&nbsp;&nbsp;: <?php echo $rowFriendResult['email']; ?>
                        </li>
                        <li class="list-group-item">
                            Gender&nbsp;&nbsp;: <?php echo $rowFriendResult['jenisKelamin']; ?>
                        </li>
                        <li class="list-group-item">
                            Birthday : <?php echo date('d F Y', strtotime($rowFriendResult['tanggalLahir'])); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Menampilkan Post -->
    <h3 class="col-xl-8 py-1 px-4 mx-auto text-black">Recent Posts</h3>
    <?php
        if(mysqli_num_rows($postResult) == 0){
            echo "<h4 class='col-xl-8 py-1 px-4 mx-auto text-black'>No Post Yet !</h4>";
        }
        else{
            foreach($postResult as $rowPost){ ?>
                <div class="col-xl-8 py-1 px-4 mx-auto">
                    <div class="py-1">
                        <div class="p-4 bg-light rounded shadow-sm">
                            <?php
                            if($rowPost['picture'] != null ) {
                                if($rowPost['textArea'] != null ){
                                    $pictureSrc = "picture/".$rowPost['picture']; ?>
                                    <?php
                                        $userPost = $db->query("SELECT * FROM user WHERE email = '".$rowPost['email']."'");
                                        foreach($userPost as $rowUserPost){?>
                                            <a href="#">
                                                <img src ='<?php echo "picture/".$rowUserPost['profilePicture']?>' style="width: 40px; height: 40px; border-radius: 100%;">
                                            </a>
                                            <a href="#">
                                                <?php echo $rowUserPost['firstName']." ".$rowUserPost['lastName']?> <br/>
                                            </a>
                                    <?php        
                                        }
                                    ?>
                                    <?php echo date("F d Y h:i A", $rowPost['postTime']); ?> <br/>
                                    <?php echo $rowPost['textArea']; ?><br/>
                                    <img src= '<?php echo $pictureSrc; ?>' style="max-width: 100%; max-height: 450px;"><br/>
                                <?php
                                }
                            }
                            if($rowPost['picture'] != null ) {
                                if($rowPost['textArea'] == null ){
                                    $pictureSrc = "picture/".$rowPost['picture']; ?>
                                    <?php
                                        $userPost = $db->query("SELECT * FROM user WHERE email = '".$rowPost['email']."'");
                                        foreach($userPost as $rowUserPost){?>
                                            <a href="#">
                                                <img src ='<?php echo "picture/".$rowUserPost['profilePicture']?>' style="width: 40px; height: 40px; border-radius: 100%;">
                                            </a>
                                            <a href="#">
                                                <?php echo $rowUserPost['firstName']." ".$rowUserPost['lastName']?> <br/>
                                            </a>
                                    <?php        
                                        }
                                    ?>
                                    <?php echo date("F d Y h:i A", $rowPost['postTime']); ?> <br/>
                                    <img src= '<?php echo $pictureSrc; ?>' style="max-width: 100%; max-height: 450px;"><br/>
                                <?php
                                }
                            }
                            if($rowPost['picture'] == null ) {
                                if($rowPost['textArea'] != null ){ ?>
                                    <?php
                                        $userPost = $db->query("SELECT * FROM user WHERE email = '".$rowPost['email']."'");
                                        foreach($userPost as $rowUserPost){?>
                                            <a href="#">
                                                <img src ='<?php echo "picture/".$rowUserPost['profilePicture']?>' style="width: 40px; height: 40px; border-radius: 100%;">
                                            </a>
                                            <a href="#">
                                                <?php echo $rowUserPost['firstName']." ".$rowUserPost['lastName']?><br/>
                                            </a>
                                    <?php        
                                        }
                                    ?>
                                    <?php echo date("F d Y h:i A", $rowPost['postTime']); ?> <br/>
                                    <?php echo $rowPost['textArea']; ?><br/>
                                <?php
                                }
                            }?>

                            <!-- Memampilkan dan membuat comment -->
                            <button type="button" class="btn btn-secondary mt-2 mb-4 collapsible">Comment</button>
                            <div class="content" style="display: none;">
                                <div class="col-xl-16 py-4 px-4 mx-auto">
                                    <?php
                                    $commentResult = $db->query("SELECT * FROM comment WHERE postId = '".$rowPost['postId']."' ORDER BY ABS(commentTime) DESC");
                                    foreach($commentResult as $rowComment){
                                        $userComment = $db->query("SELECT * FROM user WHERE email = '".$rowComment['email']."'");
                                        foreach($userComment as $rowUserComment){?>
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
                                                    <a href="profile.php?friend=<?php echo $rowUserComment['firstName']." ".$rowUserComment['lastName']?>">
                                                        <img src ='<?php echo "picture/".$rowUserComment['profilePicture']; ?>' style="width: 40px; height: 40px; border-radius: 100%;">
                                                        <?php echo $rowUserComment['firstName']." ".$rowUserComment['lastName'];?>
                                                    </a>
                                                    <?php echo date("F d Y h:i A", $rowComment['commentTime']); ?> <br/>
                                                <?php
                                                }
                                                ?>
                                                    <?php echo $rowComment['commentText']; ?><br/>
                                                </div>
                                            </div>
                                        <!-- Menampilkan dan membuat reply -->
                                        <button type="button" class="btn btn-secondary mt-2 mb-4 collapsible">Reply</button>
                                        <div class="content" style="display: none;">
                                            <div class="col-xl-16 py-4 px-4 mx-auto">
                                                <?php
                                                $replyResult = $db->query("SELECT * FROM reply WHERE commentId = '".$rowComment['commentId']."' ORDER BY ABS(replyTime) DESC");
                                                foreach($replyResult as $rowReply){
                                                    $userReply = $db->query("SELECT * FROM user WHERE email = '".$rowReply['email']."'");
                                                    foreach($userReply as $rowUserReply){?>
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
                                                                <a href="profile.php?friend=<?php echo $rowUserReply['firstName']." ".$rowUserReply['lastName']?>">
                                                                    <img src = '<?php echo "picture/".$rowUserReply['profilePicture']; ?>' style="width: 40px; height: 40px; border-radius: 100%;">
                                                                    <?php echo $rowUserReply['firstName']." ".$rowUserReply['lastName'];?>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php echo date("F d Y h:i A", $rowReply['replyTime']); ?> <br/>
                                                        <?php echo $rowReply['replyText']; ?><br/>
                                                    <br>
                                                <?php
                                                }
                                                ?>
                                                <form action="reply.php" method="post">
                                                    <label>Reply this comment</label>
                                                    <textarea class="form-control" name="replyText" id="validationTextareaReply" required></textarea>
                                                    <button class="btn btn-primary mt-2 mb-4" type="submit" name='replyUpload' value="<?php echo $rowComment['commentId']?>">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                        <br/><br>
                                        <!-- bagian reply selesai -->

                                    <?php
                                    }?>
                                    <form action="comment.php" method="post">
                                    <label>Comment this post</label>
                                        <textarea class="form-control" name="commentText" id="validationTextareaComment" required></textarea>
                                        <button class="btn btn-primary mt-2 mb-4" type="submit" name='commentUpload' value="<?php echo $rowPost['postId']?>">Submit</button>
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
    </script>
    <br><br><br>
</body>