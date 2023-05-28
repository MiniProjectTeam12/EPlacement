<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['isstudent'])) {
    header("Location: ../../index.php");
}

include "../../includes/connection.php";
include "../../includes/header2.php";
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$data = "SELECT * from `signup` where email='$email'";
$query = mysqli_query($conn, $data);
$row = mysqli_fetch_assoc($query);
?>
<br><br><br><br><br>
<div class="profile-info">
    <div class="info flex_arnd">
        <div class="flex ">
            <img src="<?php echo $row['photos']; ?>" alt="" width="120px" class="round">
            <h1>Hello, <span style="text-transform:uppercase;color:chocolate"><?php echo $name; ?></span></h1>
            <h3><span style="color:blue;"><?php echo $row['branch']; ?></span>,<span style="color:rgb(17, 242, 43)"><?php echo $row['sem']; ?> SEM</span></h3>

        </div>
        <a class="btn" href="../logout.php">Logout</a>
    </div>

    <div class="nocstatus">
        <?php
        $noc = "SELECT * from `noc` where email='$email'";
        $nocquery = mysqli_query($conn, $noc);
        $nocdata = mysqli_fetch_assoc($nocquery);
        if ($nocdata == 0) {
        ?>
            <div class="flex_arnd basic_mrgn" style="border:1px solid blue;padding:1rem">
                <h1 style="color:red">You have not applied for NOC</h1><a href="../../NOC-form.php" class="btn">Apply</a>
            </div>
        <?php
        } else if ($nocdata['email'] == $row['email']) {
        ?>
            <div class="flex_arnd basic_mrgn" style="border:1px solid blue;padding:1rem">
                <?php
                if ($nocdata['status'] == "PENDING") {
                ?>
                    <h1 style="color:red">You have applied for NOC</h1> <span style="color:red"><?php echo $nocdata['status']; ?></span>
                <?php
                } else {
                ?>
                    <h1 style="color:green">Your NOC has been sent to email</h1> <span style="color:green"><?php echo $nocdata['status']; ?></span>
            <?php
                }
            }
            ?>
            </div>
            <div class="viewinternships">
                <h1 align="center">View Open Internships</h1>
                <hr>
                <?php
                $internshipsdata = "SELECT * from `internships` ORDER BY id DESC";
                $internshipsquery = mysqli_query($conn, $internshipsdata);
                while ($indata = mysqli_fetch_assoc($internshipsquery)) {
                    $inurl = $indata['pdf'];
                ?>
                    <h3 style="text-transform:capitalize" class="basic_mrgn">
                        <a href="<?php echo $inurl; ?>">
                            <?php echo $indata['title']; ?></a><span style="color:red;font-size:0.7rem"><?php echo " On " . $indata['postdate']; ?></span>
                    </h3>
                <?php } ?>
            </div>
            <?php
            ?>
            
    </div>

    <?php
    include "../../includes/footer.php";
