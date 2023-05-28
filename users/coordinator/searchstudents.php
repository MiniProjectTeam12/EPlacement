<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['iscoordinator'])) {
    header("Location: coordinator.php");
}
include "../../includes/connection.php";


include "../../includes/header2.php";
?>
<link rel="stylesheet" href="../../css/session.css">
<br><br><br><br><br>
<section class=" basic_mrgn">
    <div class="heading flex_btwn">
        <h1>ALL STUDENTS</h1>
        <form method="post">
            <input type="text" name="student" style="text-transform:capitalize;padding:0.5rem;border-radius:10px" placeholder="Search by name">
            <button name="searchname" class="btn">search</button>
        </form>

    </div>

    <table class="styled-table">
        <thead>
            <tr>
                <th>Sl. No.</th>
                <th></th>
                <th>Name</th>
                <th>Branch</th>
                <th>Semester</th>
                <th>Email</th>
                <th>mobile</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (isset($_POST['searchname'])) {
                $student = $_POST['student'];
                $studentsearched = "SELECT * FROM `signup` WHERE name LIKE '%$student%'";
                $query = mysqli_query($conn, $studentsearched);
                if (mysqli_num_rows($query) < 1) {
                    echo "<h1 style='color:red'>Not Found</h1>";
                }
            } else {
                $data = "SELECT * from `signup`";

                $query = mysqli_query($conn, $data);
            }

            while ($row = mysqli_fetch_assoc($query)) {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><img src="<?php echo $row['photos']; ?>" alt="" width="50px"></td>
                    <td style="text-transform:capitalize;"><?php echo $row['name']; ?></td>
                    <td><?php echo $row['branch']; ?></td>
                    <td><?php echo $row['sem']; ?></td>
                    <td>
                        <a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a>
                    </td> 
                    <td><?php echo $row['mobile']; ?></td>
                    <?php
                            if ($row['status'] == "PENDING") {
                            ?>
                                <td style="color:red"><?php echo $row['status']; ?></td>
                            <?php
                            } else {
                            ?>
                                <td style="color:green"><?php echo $row['status']; ?></td>
                            <?php
                            }
                            ?>
                            <td><a href="verifystudent.php?id=<?php echo $row['id']; ?>" class="btn">Change Status</a> </td>
                        </tr>
                    <?php
                    };
                    ?>
                </tr>
        </tbody>
    </table>

</section>
<?php
// $query;
// if (isset($_POST['searchname'])) {
//     $student = $_POST['student'];
//     $studentsearched = "SELECT * from `student` WHERE name='$student'";
//     $studentquery = mysqli_query($conn, $studentsearched);
//     if (mysqli_num_rows($studentquery) >= 1) { 
//         global $query;
//         $query = $studentquery;
//         die();
//         // header("Refresh: 0");
//     }  
// }

include "../../includes/footer.php";
