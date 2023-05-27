<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include "../../includes/connection.php";


include "../../includes/header2.php";
?>
<link rel="stylesheet" href="../../css/session.css">
<br><br><br><br><br>
<section class=" basic_mrgn">
    <div class="heading flex_btwn">
        <h1>ALUMNI</h1>
        <form method="post">
            <input type="text" name="alumni" style="text-transform:capitalize;padding:0.5rem;border-radius:10px" placeholder="Search by name">
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
                <th>Year</th>
                <th>Email</th>
                <th>Company</th>
            </tr>
        </thead>
        <tbody>
            <?php



            if (isset($_POST['searchname'])) {
                $alumni = $_POST['alumni'];
                $alumnisearched = "SELECT * FROM `alumni` WHERE name LIKE '%$alumni%'";
                $query = mysqli_query($conn, $alumnisearched);
                if (mysqli_num_rows($query) < 1) {
                    echo "<h1 style='color:red'>Not Found</h1>";
                }
            } else {
                $data = "SELECT * from `alumni`";

                $query = mysqli_query($conn, $data);
            }

            while ($row = mysqli_fetch_assoc($query)) {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><img src="<?php echo $row['photos']; ?>" alt="" width="50px"></td>
                    <td style="text-transform:capitalize;"><?php echo $row['name']; ?></td>
                    <td><?php echo $row['branch']; ?></td>
                    <td><?php echo $row['passout_year']; ?></td>
                    <td>
                        <a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a>
                    </td>
                    <td><?php echo $row['company']; ?></td>
                </tr>
            <?php
            };
            ?>
        </tbody>
    </table>

</section>
<?php
// $query;
// if (isset($_POST['searchname'])) {
//     $alumni = $_POST['alumni'];
//     $alumnisearched = "SELECT * from `alumni` WHERE name='$alumni'";
//     $alumniquery = mysqli_query($conn, $alumnisearched);
//     if (mysqli_num_rows($alumniquery) >= 1) { 
//         global $query;
//         $query = $alumniquery;
//         die();
//         // header("Refresh: 0");
//     }  
// }

include "../../includes/footer.php";
