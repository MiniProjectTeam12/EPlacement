

<?php
session_start();
if(!isset($_SESSION['name'])){
header("Location: ../students/login.php");
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
        <div>
            <img src="<?php echo $row['photos']; ?>" alt="" width="120px" class="round">
            <h1>Hello, <span style="text-transform:uppercase;"><?php echo $name; ?></span></h1>
            <h3><span><?php echo $row['branch']; ?></span>,<span><?php echo $row['sem']; ?> SEM</span></h3>

        </div>
        <a class="btn" href="../logout.php">Logout</a>
    </div>

    <div class="nocstatus">
        <?php
        $noc = "SELECT * from `noc` where email='$email'";
        $nocquery = mysqli_query($conn, $noc);
        $nocdata = mysqli_fetch_assoc($nocquery);
        if ($nocdata['email'] == $row['email']) {
        ?>
            <div class="flex_arnd basic_mrgn" style="border:1px solid blue;padding:1rem">
                <h1 style="color:green">You have applied for NOC</h1> <span style="color:red"><?php echo $nocdata['status'];?></span>
            </div>
        <?php
        } else{
        ?>
        <div class="flex_arnd basic_mrgn" style="border:1px solid blue;padding:1rem">
            <h1 style="color:red">You have not applied for NOC</h1><a href="../../NOC-form.php" class="btn">Apply</a>
        </div>
        <?php
        }
        ?>
    </div>


</div>
<br>
<?php
include "../../includes/footer2.php";
