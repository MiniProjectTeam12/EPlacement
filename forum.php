<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['name'])) {
    header("Location: users/students/login.php");
}
include "includes/header.php";
include "includes/connection.php";
?>
<link rel="stylesheet" href="css/forum.css">
<br><br><br><br>
<!-- Everything must be done under section class, add class or id  -->
<section class="forum basic_mrgn">
    <!-- <div id="forumHeader">
        <select name="categories" id="category">
            <option value="">--SelectCategory--</option>
            <option value="">Internships</option>
            <option value="">Programming</option>
            <option value="">Placement</option>
        </select> -->
    <!-- <div>
            <a href="">Latest</a>
        </div>
        <div>
            <a href="">Top</a>
        </div>-->

    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Create New Post
    </button>
    <br><br>
    <div id="allPostStats">
        <h2 style="color:#fff">All Time</h2>
        <!-- <table>
            <thead>
                <tr>
                    <td class="fs-5">Views</td>
                    <td class="fs-5">Replies</td>
                </tr>
            </thead>
        </table> -->
    </div>

    <hr style="color:#fff">
    <?php
    $forum = "SELECT * FROM `forum` ORDER BY id DESC";
    $forumquery = mysqli_query($conn, $forum);
    while ($forumpost = mysqli_fetch_assoc($forumquery)) {
    ?>
        <div id="discussionBody">

            <div class="topicInfo">
                <h5 class="posttitle"><?php echo $forumpost['posttitle']; ?></h5>
                <h6 class="postCategory">
                    <?php echo $forumpost['category'];
                    echo ", Posted by " . $forumpost['author']; ?></h6>

                <div class="AuthorInfo">

                    <img src="<?php echo $forumpost['author_img']; ?>" alt="" width="30px" height="30px">
                    <div>
                        <?php
                        date_default_timezone_set('Asia/Kolkata');
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

                    </div>

                    <a href="forumpost.php?id=<?php echo $forumpost['id']; ?>">Reply</a>
                </div>
            </div>

            <!-- <div class="topicsStats">
                <table>
                    <tbody>
                        <tr>
                            <td class="fs-5"></td>
                            <td class="fs-5"></td>
                        </tr>
                    </tbody>
                </table>
            </div> -->

        </div>
    <?php
    }
    ?>
</section>
<br>

<?php
include "includes/footer.php";
?>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Forum Post</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="postsubmit.php" method="post">
                    <div class="form-group">
                        <label for="posttitle">Post Title</label>
                        <input type="text" class="form-control" id="posttitle" name="posttitle" placeholder="Enter post title" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="UNDEFINED">--SelectCategory--</option>
                            <option value="INTERNSHIP">Internships</option>
                            <option value="PROGRAMMING">Programming</option>
                            <option value="PLACEMENT">Placement</option>
                        </select>
                    </div>
                    <label for="postcontent">Write Your Post</label>
                    <div class="form-group">
                        <textarea name="postcontent" id="postcontent" rows="10" style="width: 100%; resize: none;" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- <button type="button" >Post</button> -->
                        <input type="submit" class="btn btn-primary" value="POST" name="post">
                </form>
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<script>
    const myModal = document.getElementById('createPostModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
    })
</script>