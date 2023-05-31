<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['isstudent'])) {
    header("Location: ../../index.php");
}
include "../../includes/connection.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $spass = password_hash($password, PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $branch = $_POST['branch'];
    $semester = $_POST['semester'];
    $registration = $_POST['registration']; 
    $id=$_SESSION['id'];
if (!empty($name) && !empty($password)) { 
     
    // Create the SQL query with escaped values
    $insert = "UPDATE `signup` SET `name`='$name',`password`='$spass',`email`='$email',`mobile`='$mobile',`branch`='$branch',`sem`='$semester',`registration`=$registration WHERE `id`=$id";
    // Execute the query
    $query = mysqli_query($conn, $insert);
    if ($query) {
        header("Location: ../dashboard/sdashboard.php");
        exit; // Make sure to exit after the redirect
    } else {
        echo mysqli_error($conn);
    }
} 

}

 
include "../../includes/header2.php";
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$data = "SELECT * from `signup` where email='$email'";
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
                $userdata = "SELECT * FROM signup WHERE name = '$studname' &&  email= '$studemail'";
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
                    <div class="input-control" id="pass">
                        <label>Select Semester</label>
                        <select name="semester" id="semester">
                            
                            <option value="<?php echo $studentdata['sem'];?>"><?php echo $studentdata['sem'];?></option>
                            <option value="1st">Semester 1</option>
                            <option value="2nd">Semester 2</option>
                            <option value="3rd">Semester 3</option>
                            <option value="4th">Semester 4</option>
                            <option value="5th">Semester 5</option>
                            <option value="6th">Semester 6</option>
                            <option value="7th">Semester 7</option>
                            <option value="8th">Semester 8</option>
                        </select>
                        <div id="semester-error" class="error"></div>
                    </div>
                    <div class="input-control">
                        <label>Registration</label>
                        <input type="text" name="registration"  value="<?php echo $studentdata['registration']; ?>">
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
