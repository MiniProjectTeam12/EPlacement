<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['coordinatoremail'])) {
    header("Location: ../coordinator/coordinator.php");
}

include "../../includes/connection.php";
include "../../includes/header2.php";
$name = $_SESSION['coordinatorname'];
$email = $_SESSION['coordinatoremail'];
$data = "SELECT * from `coordinator` where email='$email'";
$query = mysqli_query($conn, $data);
$row = mysqli_fetch_assoc($query);
?>
<br><br><br><br><br>
<div class="profile-info">
    <a class="btn basic_mrgn" href="../logout.php" style="float:right">Logout</a>


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
                            <td><a href="../coordinator/status.php?id=<?php echo $nocdata['id'];?>" class="btn">Change Status</a> </td>
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
