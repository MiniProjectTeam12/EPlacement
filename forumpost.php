<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if(!isset($_SESSION['name'])){
header("Location: users/students/login.php");
}
include "includes/header.php";
?>
<link rel="stylesheet" href="css/forumpost.css">
<br><br><br><br>
<!-- Everything must be done under section class, add class or id  -->
<section class="posts basic_mrgn">
    <div class="topicInfo">
        <h3 class="postTitle">Lorem ipsum dolor sit amet consectetur.</h3>
        <h5 class="postCategory">Programming</h5>
        <div class="AuthorInfo">
            <img src="./assets/images/nabarun_sir.jpg" alt="" width="80px">
            <h5>Deepjyoti Das
                <span class="date">
                    <div class="post-date">
                        <span class="day">22</span>
                        <span class="month">May</span>
                        <span class="year">2023</span>
                    </div>
                </span>
            </h5>
            <p id="postContent">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, sequi ea in dolorum, eius illum
                nostrum laborum ad fuga molestias quis vitae. Doloremque obcaecati, laudantium optio incidunt
                veritatis ratione nesciuntit. Ullam, sequi ea in dolorum, eius illum
                nostrum laborum ad fuga molestias quis vitae. Doloremque obcaecati, laudantium optio incidunt
                veritatis ratione nesciuntit. Ullam, sequi ea in dolorum, eius illum
                nostrum laborum ad fuga molestias quis vitae. Doloremque obcaecati, laudantium optio incidunt
                veritatis ratione nesciuntit. Ullam, sequi ea in dolorum, eius illum
                nostrum laborum ad fuga molestias quis vitae. Doloremque obcaecati, laudantium optio incidunt
                veritatis ratione nesciunt.
            </p>
            <div id="comments">
                <form action="">
                    <div class="comment-input">
                        <input type="text" placeholder="Add a comment">
                    </div>
                    <div class="comment-button">
                        <button type="submit">Reply</button>
                    </div>
                </form>
                <hr>
            </div>
            <div id="otherComments ">
                <h5 class="message">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</h5>
                <h5 class="message">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</h5>
                <h5 class="message">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</h5>
                <h5 class="message">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</h5>
                <!-- <button><a href="">Delete</a></button> -->
            </div>

        </div>
    </div>
</section>
<br>


<?php
include "includes/footer.php";
?> 
</html>