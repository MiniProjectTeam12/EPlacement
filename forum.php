<?php
include "includes/header.php";
?>
<link rel="stylesheet" href="css/forum.css">
<br><br><br><br>
<!-- Everything must be done under section class, add class or id  -->
<section class="forum basic_mrgn">
    <div id="forumHeader">
        <select name="categories" id="category">
            <option value="">--SelectCategory--</option>
            <option value="">Internships</option>
            <option value="">Programming</option>
            <option value="">Placement</option>
        </select>
        <div>
            <a href="">Latest</a>
        </div>
        <div>
            <a href="">Top</a>
        </div>
        <div>
            <a href="">Create</a>
        </div>
    </div>
    <div id="allPostStats">
        <h2>All Time</h2>
        <table>
            <thead>
                <tr>
                    <td>Views</td>
                    <td>Replies</td>
                </tr>
            </thead>
        </table>
    </div>

    <hr>
    <div id="discussionBody">
        <div class="topicInfo">
            <h3 class="postTitle">Lorem ipsum dolor sit amet consectetur.</h3>
            <h5 class="postCategory">Programming</h5>
            <div class="AuthorInfo">
                <img src="./assets/images/nabarun_sir.jpg" alt="" width="30px">
                <h5>Deepjyoti Das
                    <span class="date">
                        <div class="post-date">
                            <span class="day">22</span>
                            <span class="month">May</span>
                            <span class="year">2023</span>
                        </div>
                    </span>
                </h5>
                <a href="forumpost.php">Reply</a>
            </div>
        </div>

        <div class="topicsStats">
            <table>
                <tbody>
                    <tr>
                        <td>10K</td>
                        <td>10</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</section>
<br>


<?php
include "includes/footer.php";
?> 

</html>