<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include "../../includes/connection.php"; 
if (isset($_GET['id'])) {
    $nocid=$_GET['id'];
    $noc="SELECT * FROM `noc` WHERE id=$nocid";
    $nocquery=mysqli_query($conn,$noc);
    $nocdata=mysqli_fetch_assoc($nocquery);
    $status=$nocdata['status'];
    if($status=="PENDING"){
        $changestatus="UPDATE `noc` SET `status`='SUCCESS' WHERE id=$nocid";
    }else{
        $changestatus="UPDATE `noc` SET `status`='PENDING' WHERE id=$nocid";
    }
    $successquery=mysqli_query($conn,$changestatus);
    if($successquery){
        header("Location: ../dashboard/coordinator.php");
    }

}
// include "../../includes/header2.php";

// include "../../includes/footer.php";
