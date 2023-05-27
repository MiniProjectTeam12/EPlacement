<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['iscoordinator'])) {
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
        // header("Refresh: 0");
    }
}
if (isset($_POST['uploadnotice'])) {
    date_default_timezone_set('Asia/Kolkata');
    $postdate = date('Y-m-d H:i:s');
    $title=$_POST['title'];
    $img = $_FILES['pic'];
    $fname = $img['name'];
    $fpath = $img['tmp_name'];
    $ferror = $img['error'];
    // var_dump($img);

    if ($ferror != 0) {
        $df = "../../assets/notices/default.pdf";
    } else {
        $df = '../../assets/notices/' . $fname;
        move_uploaded_file($fpath, $df);
    }
    $insert = "INSERT INTO `notifications`(`title`,`postdate`,`pdf`) VALUES ('$title','$postdate','$df')";
    $query = mysqli_query($conn, $insert) or die();
    if ($query) {
        // header("Refresh: 0");
    }
}

include "../../includes/header2.php";
$name = $_SESSION['coordinatorname'];
$email = $_SESSION['coordinatoremail'];
$data = "SELECT * from `coordinator` where email='$email'";
$query = mysqli_query($conn, $data);
$row = mysqli_fetch_assoc($query);
?>
<br><br><br><br><br>
<link rel="stylesheet" href="../../css/form.css">

<div class="profile-info">
    <a class="btn basic_mrgn" href="../logout.php" >Logout</a>
    <h2 align="center">Post Notifications</h2>
    <form class="upload" method="post" enctype="multipart/form-data" class="flex">
        <input type="text" name="title" placeholder="Give a title" style="margin-bottom:1vh">
        <button type="button" class="btn-warning">
            <i class="fa fa-upload"></i> Upload Notification
            <input type="file" id="photo-upload" name="pic" enctype="multipart/form-data" accept="application/pdf">
        </button>
        <button class="btn" type="submit" id="submit" name="uploadnotice">Upload</button>

    </form>
<hr>
<h2 align="center" style="color:green">Post Internships</h2>
    <form class="upload" method="post" enctype="multipart/form-data" class="flex">
        <input type="text" name="internship" placeholder="Give a title" style="margin-bottom:1vh">
        <button type="button" class="btn-warning">
            <i class="fa fa-upload"></i> Upload Internships
            <input type="file" id="photo-upload" name="internshippdf" enctype="multipart/form-data" accept="application/pdf">
        </button>
        <button class="btn" type="submit" id="submit" name="uploadinternship">Upload</button>

    </form>

    <div class="nocstatus">
        <?php
        $noc = "SELECT * from `noc`";
        $nocquery = mysqli_query($conn, $noc);


        ?>
        <link rel="stylesheet" href="../../css/session.css">
        <br><br><br><br>
        <section class=" basic_mrgn">
            <h1 class="heading">NOC Applied Students Data</h1>

            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Sl. No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Semester</th>
                        <th>Roll</th>
                        <th>Branch</th>
                        <th>Industry</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Change Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($nocdata = mysqli_fetch_assoc($nocquery)) {
                    ?>
                        <tr>
                            <td><?php echo $nocdata['id']; ?></td>
                            <td><?php echo $nocdata['name']; ?></td>
                            <td><?php echo $nocdata['email']; ?></td>
                            <td><?php echo $nocdata['phoneno']; ?></td>
                            <td><?php echo $nocdata['semester']; ?></td>
                            <td><?php echo $nocdata['rollno']; ?></td>
                            <td><?php echo $nocdata['department']; ?></td>
                            <td><?php echo $nocdata['industry']; ?></td>
                            <td><?php echo $nocdata['applydate']; ?></td>
                            <?php
                            if ($nocdata['status'] == "PENDING") {
                            ?>
                                <td style="color:red"><?php echo $nocdata['status']; ?></td>
                            <?php
                            } else {
                            ?>
                                <td style="color:green"><?php echo $nocdata['status']; ?></td>
                            <?php
                            }
                            ?>
                            <td><a href="../coordinator/status.php?id=<?php echo $nocdata['id']; ?>" class="btn">Change Status</a> </td>
                        </tr>
                    <?php
                    };
                    ?>
                </tbody>
            </table>

        </section>
        <br>

    </div>


</div>
<br>
<?php

include "../../includes/footer2.php";
?>

