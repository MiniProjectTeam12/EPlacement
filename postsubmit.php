<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['name'])) {
    header("Location: users/students/login.php");
}
include "includes/connection.php";

if(isset($_POST['post'])){
    $posttitle = mysqli_real_escape_string($conn, $_POST['posttitle']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    date_default_timezone_set('Asia/Kolkata');
    $postdate = date('Y-m-d H:i:s');
    $author = mysqli_real_escape_string($conn, $_SESSION['name']);  

    $string = $_SESSION['photos'];
    $author_img = str_replace("../../", "", $string); 

    $content = mysqli_real_escape_string($conn, $_POST['postcontent']);  
    $forum = "INSERT INTO `forum`(`posttitle`, `category`, `postdate`, `author`, `author_img`, `content`) VALUES ('$posttitle','$category','$postdate','$author','$author_img','$content')";
    $forumquery = mysqli_query($conn, $forum);
    if($forumquery){
        header("Location: forum.php");
    }else{
        echo "MySQLi Error: " . mysqli_error($conn);
    }
}
?>
