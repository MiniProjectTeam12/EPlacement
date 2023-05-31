<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

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
                    <a href="../students/edit_account.php" class="list-group-item list-group-item-action" id='edit_account'>Edit Account</a>
                    <a href="../../NOC-form.php" class="list-group-item list-group-item-action  " id='nocapply'>Apply for NOC</a>
                    <a href="JavaScript:void(0)" class="list-group-item list-group-item-action " id='viewnocstatus'>View NOC Status</a>
                    <a href="JavaScript:void(0)" class="list-group-item list-group-item-action " id='viewinternships'>View Open internships</a>
                </div>
               
            </div>
        </div>
        <div class="col text-center  m-auto">
            <a class="btn" href="../logout.php">Logout</a>
             <!-- <div> -->
                    <div id="main_content" class="mt-5">
                        <p style="text-align:justify;">Hello everyone,

                            My name is <span style="text-transform:uppercase;color:chocolate"><?php echo $name; ?></span>
                            and I am currently pursuing my Bachelor of Technology (B.Tech) in Computer Science and Engineering (CSE) 
                            from BVEC. I am in my 6th semester, and I am excited to share a brief introduction about myself. 
                            Ever since my childhood, I have been fascinated by technology and computers. 
                            This fascination led me to choose a career in the field of Computer Science. 
                            I believe that CSE offers endless possibilities to innovate and create solutions that can 
                            positively impact the world around us. During my academic journey, I have gained a strong 
                            foundation in programming languages such as Java, C++, and Python. </p>
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

        $("#viewinternships").click(() => {
            $("#main_content").load("viewinternships.php");
        }); 
        $("#viewnocstatus").click(() => {
            $("#main_content").load("viewnocstatus.php");
        }); 
    })
</script>
<?php
include "../../includes/footer2.php";
