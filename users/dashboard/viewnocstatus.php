<div class="nocstatus" style="margin-top: 12rem;">
    <?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    if (!isset($_SESSION['isstudent'])) {
        header("Location: ../../index.php");
    }
    
    include "../../includes/connection.php";
    $email = $_SESSION['email'];
    $noc = "SELECT * from `noc` where email='$email'";
    $nocquery = mysqli_query($conn, $noc);
    $nocdata = mysqli_fetch_assoc($nocquery);
    if ($nocdata == 0) {
    ?>
        <div class="flex_arnd ">
            <h3 style="color:red">You have not applied for NOC</h3><a href="../../NOC-form.php" class="btn">Apply</a>
        </div>
    <?php
    } else if ($nocdata['email'] == $email) {
    ?>
        <div class="flex_arnd ">
            <?php
            if ($nocdata['status'] == "PENDING") {
            ?> 
                <h3 style="color:green">You have applied for NOC</h3> <span style="color:red"> Status: <?php echo $nocdata['status']; ?></span>
                
            <?php
            } else {
            ?>
                <h3 style="color:green">Your NOC has been sent to email</h3>
        <?php
            }
        }
        ?>
        </div>
    </div>