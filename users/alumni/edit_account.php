<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include "../../includes/connection.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $spass = password_hash($password, PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $branch = $_POST['branch'];
    $passout_year = $_POST['passout_year'];
    $company = $_POST['company']; 
    $id=$_SESSION['id'];
if (!empty($name) && !empty($password)) { 
     
    // Create the SQL query with escaped values
    $insert = "UPDATE `alumni` SET `name`='$name',`password`='$spass',`email`='$email',`mobile`='$mobile',`branch`='$branch',`passout_year`='$passout_year',`company`='$company' WHERE `id`=$id";
    // Execute the query
    $query = mysqli_query($conn, $insert);
    if ($query) {
        header("Location: ../dashboard/alumni.php");
        exit; // Make sure to exit after the redirect
    } else {
        echo mysqli_error($conn);
    }
} 

}
if (!isset($_SESSION['isalumni'])) {
    header("Location: ../../index.php");
}


 
include "../../includes/header2.php";
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$data = "SELECT * from `alumni` where email='$email'";
$query = mysqli_query($conn, $data);
$row = mysqli_fetch_assoc($query);
?>
<br><br><br><br><br>
<link rel="stylesheet" href="../../css/form.css">
<section class="create-account-NOC">
    <div class="container-form">
        <div class="login-left">
            <div class="login-header"><br>
                <h1>Update Your Account</h1>
                <p class="error-msg">Account already exists. Please Login.</p><br>
            </div>

            <form class="login-form" id="form" method="post">

                <?php
                $studname = $_SESSION['name'];
                $studemail = $_SESSION['email'];
                $userdata = "SELECT * FROM `alumni` WHERE name = '$studname' &&  email= '$studemail'";
                $userresult = mysqli_query($conn, $userdata);
                $studentdata = mysqli_fetch_assoc($userresult); 
                ?>
                <div class="signup-form-content">
                    <div class="input-control">
                        <label>Full Name</label>
                        <input type="text" name="name" id="name" value="<?php echo $studname; ?>">
                        <div class="error"></div>
                    </div>
                    <div class="input-control">
                        <label>Update Password</label>
                        <input type="text" name="password" id="password" required>

                    </div>
                    <div class="input-control">
                        <label>Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $studemail; ?>">

                    </div>

                    <div class="input-control">
                        <label>Phone No.</label>
                        <input type="text" name="mobile" value="<?php echo $studentdata['mobile']; ?>">
                    </div>
                     
                    <div class="input-control">
                        <label>Passout Year</label>
                        <input type="text" name="passout_year"  value="<?php echo $studentdata['passout_year']; ?>">
                        <div class="error"></div>
                    </div>
                    <div class="input-control">
                        <label>Company</label>
                        <input type="text" name="company"  value="<?php echo $studentdata['company']; ?>">
                        <div class="error"></div>
                    </div>
                    
                    <div class="input-control" id="pass">
                        <label>Select Branch</label>
                        <select name="branch" id="branch">
                            <option value="<?php echo $studentdata['branch']; ?>"><?php echo $studentdata['branch']; ?></option>
                            <option value="CSE">CSE</option>
                            <option value="ETE">ETE</option>
                            <option value="CIVIL">CIVIL</option>
                            <option value="MECHANICAL">MECHANICAL</option>
                        </select>
                        <div id="semester-error" class="error"></div>
                    </div>
                    <input class="btn-sign-up-NOC" type="submit" id="submit" name="submit" value="SUBMIT">
                </div>

            </form>
            <br>
        </div>
    </div>
</section>  
<?php
include "../../includes/footer2.php";
