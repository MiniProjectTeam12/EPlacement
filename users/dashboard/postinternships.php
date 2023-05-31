<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include "../../includes/connection.php";

if (isset($_POST['uploadinternship'])) {
    date_default_timezone_set('Asia/Kolkata');
    $postdate = date('Y-m-d H:i:s');
    $title=$_POST['internship'];
    $img = $_FILES['internshippdf'];
    $fname = $img['name'];
    $fpath = $img['tmp_name'];
    $ferror = $img['error'];
    // var_dump($img);

    if ($ferror != 0) {
        $df = "../../assets/internships/default.pdf";
    } else {
        $df = '../../assets/internships/' . $fname;
        move_uploaded_file($fpath, $df);
    }
    $insert = "INSERT INTO `internships`(`title`,`postdate`,`pdf`) VALUES ('$title','$postdate','$df')";
    $query = mysqli_query($conn, $insert) or die();
    if ($query) {
        echo "<div id='popup-message' style='display: none; position: fixed; top: 20%; right: 0; transform: translateX(100%); background: #000;color:green; padding: 20px; border: 1px solid #ccc; z-index: 9999;'>Uploaded Successfully</div>";
    header("Location:alumni.php");
    }
}
?>
<link rel="stylesheet" href="../../css/form.css"> 
<h2 align="center" style="color:green;margin-top:1rem;">Post Internships</h2>
    <form class="upload" method="post" enctype="multipart/form-data" class="flex" action="postinternships.php">
        <input type="text" name="internship" placeholder="Give a title" style="margin-bottom:1vh">
        <button type="button" class="btn-warning">
            <i class="fa fa-upload"></i> Upload Internships
            <input type="file" id="photo-upload" name="internshippdf" enctype="multipart/form-data" accept="application/pdf">
        </button>
        <button class="btn" type="submit" id="submit" name="uploadinternship">Upload</button>

    </form>