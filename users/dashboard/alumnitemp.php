<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['isalumni'])) { 
    header("Location: ../../index.php");
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

    }
}

include "../../includes/header2.php";
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$data = "SELECT * from `alumni` where email='$email'";
$query = mysqli_query($conn, $data);
$row = mysqli_fetch_assoc($query);
?>
<br><br><br><br><br>
<link rel="stylesheet" href="../../css/form.css">

<div class="profile-info">
    <div class="info flex_arnd">
        <div class="flex ">
            <img src="<?php echo $row['photos']; ?>" alt="" width="120px" class="round">
            <h1>Hello, <span style="text-transform:uppercase;color:chocolate"><?php echo $name; ?></span></h1>
            <h3><span style="color:blue;"><?php echo " Batch of ".$row['passout_year']; ?></span>,<span style="color:rgb(17, 242, 43)"><?php echo $row['company']; ?></span></h3>

        </div>
        <a class="btn" href="../logout.php">Logout</a>
    </div>
</div>
<h2 align="center" style="color:green">Post Internships</h2>
    <form class="upload" method="post" enctype="multipart/form-data" class="flex">
        <input type="text" name="internship" placeholder="Give a title" style="margin-bottom:1vh">
        <button type="button" class="btn-warning">
            <i class="fa fa-upload"></i> Upload Internships
            <input type="file" id="photo-upload" name="internshippdf" enctype="multipart/form-data" accept="application/pdf">
        </button>
        <button class="btn" type="submit" id="submit" name="uploadinternship">Upload</button>

    </form> 
    <h2 align="center" class="basic_mrgn" style="border:1px solid blue;padding:1rem;background:yellow"><a href="../../forum.php">Go to Forum</a></h2> 

    <?php
    include "../../includes/footer2.php";
