<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include "../../includes/connection.php"; 
if (isset($_GET['id'])) {
    $studentid=$_GET['id'];
    $student="SELECT * FROM `signup` WHERE id=$studentid";
    $studentquery=mysqli_query($conn,$student);
    $studentdata=mysqli_fetch_assoc($studentquery);
    $status=$studentdata['status'];
    if($status=="PENDING"){
        $changestatus="UPDATE `signup` SET `status`='SUCCESS' WHERE id=$studentid";
    }else{
        $changestatus="UPDATE `signup` SET `status`='PENDING' WHERE id=$studentid";
    }
    $successquery=mysqli_query($conn,$changestatus);
    if($successquery){
        header("Location: searchstudents.php");
    }

}
// include "../../includes/header2.php";

// include "../../includes/footer.php";
