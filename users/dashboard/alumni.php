<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['isalumni'])) { 
    header("Location: ../../index.php");
}
include "../../includes/connection.php";
include "../../includes/header2.php";
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$data = "SELECT * from `alumni` where email='$email'";
$query = mysqli_query($conn, $data);
$row = mysqli_fetch_assoc($query);
?>
<br><br><br><br><br>
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

<div align="center" style="margin-top: 10rem;">
    <h2><a href="../../forum.php">Go to Forum</a></h2>
    <h2><a href="../../forum.php">Post an internships</a></h2>
</div>

    <?php
    include "../../includes/footer.php";
