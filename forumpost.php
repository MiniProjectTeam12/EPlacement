<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['name'])) {
    header("Location: users/students/login.php");
}
include "includes/connection.php";

if (isset($_POST['postreply'])) {

    $content = $_POST['replycontent'];
    date_default_timezone_set('Asia/Kolkata');
    $postdate = date('Y-m-d H:i:s');
    $author = $_SESSION['name'];
    $post_id = $_GET['id'];
    $by = "ALUMNI";
    if (isset($_SESSION['isalumni'])) {
        $forum = "INSERT INTO `replies`(`reply_content`, `reply_date`, `author`,`by`, `post_id`) VALUES ('$content','$postdate','$author','$by','$post_id')";
    } else {
        $forum = "INSERT INTO `replies`(`reply_content`, `reply_date`, `author`, `post_id`) VALUES ('$content','$postdate','$author','$post_id')";
    }
    $forumquery = mysqli_query($conn, $forum);
    if ($forumquery) {
        header("Refresh: 0");
    } else {
        echo "MySQLi Error: " . mysqli_error($conn);
    }
}



?>

<?php

include "includes/header.php";
include "includes/connection.php";
?>
<link rel="stylesheet" href="css/forumpost.css">
<br><br><br><br>
<!-- Everything must be done under section class, add class or id  -->
<section class="posts basic_mrgn">

    <?php
    $id = $_GET['id'];
    $forum = "SELECT * FROM `forum` WHERE id=$id";
    $forumquery = mysqli_query($conn, $forum);
    while ($forumpost = mysqli_fetch_assoc($forumquery)) {
    ?>
        <div class="topicInfo">
            <h3 class="postTitle"><?php echo $forumpost['posttitle']; ?></h3>
            <h5 class="postCategory"><?php echo $forumpost['category']; ?></h5>
            <div class="AuthorInfo">
                <img src="<?php echo $forumpost['author_img']; ?>" alt="" width="80px" height="80px">
                <h5><?php
                    echo $forumpost['author'];
                    $mysqlDate = $forumpost['postdate'];
                    $formattedDate = date('d M Y', strtotime($mysqlDate));
                    ?>

                    <span class="date">
                        <div class="post-date">
                            <span class="day"><?php echo date('d', strtotime($formattedDate)); ?></span>
                            <span class="month"><?php echo date('M', strtotime($formattedDate)); ?></span>
                            <span class="year"><?php echo date('Y', strtotime($formattedDate)); ?></span>
                        </div>
                    </span>
                </h5>
                <p id="postContent">
                <?php echo $forumpost['content'];
            } ?>
                </p>
                <div id="comments">
                    <form method="post">
                        <div class="comment-input">
                            <input type="text" name="replycontent" placeholder="Add a Comment">
                        </div>
                        <div class="comment-button">
                            <input type="submit" value="Reply" class="btn" name="postreply">
                        </div>
                    </form>
                </div>
                <h1>Previous Replies</h1>
                <div id="otherComments ">
                    <?php
                    $id = $_GET['id'];
                    $reply = "SELECT * FROM `replies` WHERE post_id=$id ORDER BY id DESC";
                    $replyquery = mysqli_query($conn, $reply);
                    while ($replyresult = mysqli_fetch_assoc($replyquery)) {
                        $by = "STUDENT";
                        if ($replyresult['by'] == "ALUMNI") {
                            $by = "ALUMNI";
                        }
                    ?>
                        <hr style="margin-top: 1rem;">
                        <div class="comment">
                            <h4 class="message"><?php echo $replyresult['reply_content']; ?></h4>
                            <span style="background:<?php echo ($by=="ALUMNI")?"yellow":"green" ?>">by <span class="message"><?php echo $replyresult['author']; ?></span>
                                , on <span class="message">
                                    <?php
                                    $resultdate = $replyresult['reply_date'];
                                    $resultdateformated = date('d M Y', strtotime($resultdate));
                                    ?>

                                    <span class="date">
                                        <div class="post-date">
                                            <span class="day"><?php echo date('d', strtotime($resultdateformated)); ?></span>
                                            <span class="month"><?php echo date('M', strtotime($resultdateformated)); ?></span>
                                            <span class="year"><?php echo date('Y', strtotime($resultdateformated)); ?></span>
                                        </div>
                                    </span>


                                </span> </span>

                        </div>
                    <?php } ?>
                    <!-- <button><a href="">Delete</a></button> -->
                </div>

            </div>
        </div>
</section>
<br>


<?php
include "includes/footer.php";
?>