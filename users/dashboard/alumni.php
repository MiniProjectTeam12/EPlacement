<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

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
<div class="container">
    <div class="row">
        <div class="col text-center profilepic mt-3">
            <img src="<?php echo $row['photos']; ?>" class="rounded-circle" width="100px" height="100px">

            <div class="row mt-5 flex_btwn">

                <div class="list-group col-md-4 col-7 m-auto text-center">
                    <a href="JavaScript:void(0)" class="list-group-item list-group-item-action " id="user_name">
                        <!-- Showing Username -->
                        <?php
                        if ($_SESSION == true) {
                        ?>
                            <h6>Hello, <span style="text-transform:uppercase;color:chocolate"><?php echo $name; ?></span></h6>

                        <?php
                        } else {
                            session_destroy();
                        }
                        ?>

                    </a>
                    <a href="../alumni/edit_account.php" class="list-group-item list-group-item-action" id='edit_account'>Edit Account</a>
                    <a href="JavaScript:void(0)" class="list-group-item list-group-item-action  " id='postinternships'>Post Internships</a>
                    <a href="../../forum.php" class="list-group-item list-group-item-action " id='forum'>Visit Forum</a> 
                </div>

            </div>
        </div>
        <div class="col text-center  m-auto">
            <a class="btn" href="../logout.php">Logout</a>
            <!-- <div> -->
            <div id="main_content" class="mt-5">
                <p style="text-align:justify;">Hello everyone,
                    I hope this message finds you well
                    My name is <span style="text-transform:uppercase;color:chocolate"><?php echo $name; ?></span>

                    .I am thrilled to introduce myself as an proud alumnus of BVEC from the class of 2022. After graduating, I have embarked on an exciting journey as a professional working at iNeuron, a renowned organization.

                    Having experienced the challenges and rewards of navigating through the early stages of a career, I understand the importance of guidance and support. As an alum, I am eager to extend a helping hand to my fellow juniors who are currently navigating their academic and professional journeys.

                    I am available to offer assistance, share insights, and provide mentorship to anyone who seeks it. Whether it's discussing career paths, providing advice on projects, or sharing tips on interview preparation, I am here to lend a helping hand based on my own experiences and knowledge gained.

                    Feel free to reach out to me via <span style="color:chocolate"><?php echo $_SESSION['email']; ?></span> or connect with me on professional networking platforms. Together, we can empower and support each other as we continue to grow both personally and professionally.

                    Looking forward to connecting with you all and making a positive impact on your journeys.
            </div>
            <!-- </div> -->
        </div>
    </div>






</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../js/index.js" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(() => {

        // $("JavaScript:void(0)edit_account").click(() => {
        //     $("JavaScript:void(0)main_content").load("../students/edit_account.php");
        // });

        $("#postinternships").click(() => {
            $("#main_content").load("postinternships.php");
        }); 
    })
</script>
<?php
include "../../includes/footer2.php";
