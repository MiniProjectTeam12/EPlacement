<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (isset($_SESSION['email'])) {
    header("Location: ../dashboard/student.php");
}
include "../../includes/header2.php";
if (isset($_POST['submit'])) {
    include "../../includes/connection.php";
    $name = $_POST['name'];
    $password = $_POST['password'];
    $spass = password_hash($password, PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $branch = $_POST['branch'];
    $semester = $_POST['semester'];
    $registration = $_POST['registration'];

    $img = $_FILES['pic'];
    $fname = $img['name'];
    $fpath = $img['tmp_name'];
    $ferror = $img['error'];

    if (!empty($name) and !empty($password)) {
        if ($ferror != 0) {
            $df = "../../assets/images/profilePics/default.svg";
        } else {
            $df = '../../assets/images/profilePics/' . $fname;
            move_uploaded_file($fpath, $df);
        }
        $insert = "INSERT INTO `signup`(`name`,`password`,`email`,`mobile`,`branch`,`sem`,`registration`,`photos`) VALUES ('$name','$spass','$email','$mobile','$branch','$semester',$registration,'$df')";
        $query = mysqli_query($conn, $insert) or die();
        if ($query) {
            // $_SESSION['photos'] = $df; //using session
            // $_SESSION['name'] = $_POST['name']; //using session
            // $_SESSION['email'] = $email; //using session  
            header("Location: login.php");
        }
    }
}
?>
<link rel="stylesheet" href="../../css/form.css">
<br><br><br><br>
<!-- Everything must be done under section class, add class or id  -->
<section id="create-account">
    <div class="container-form">
        <div class="login-left">
            <div class="login-header"><br>
                <h1>Welcome to T&P Cell BVEC</h1>
                <p class="error-msg">Account already exists. Please Login.</p><br>
            </div>

            <form class="login-form" id="form" method="post" enctype="multipart/form-data">

                <div class="signup-form-content">
                    <div class="input-control">
                        <label>Full Name</label>
                        <input type="text" name="name" id="username" required>
                        <div class="error"></div>
                        <br>
                    </div>
                    <div class="input-control">
                        <label>Enter Email</label>
                        <input type="email" name="email" id="email" required>
                        <div class="error"></div>
                    </div>
                    <div class="input-control" id="pass">
                        <label>Enter Password</label>
                        <input type="password" name="password" id="password" required>
                        <div id="password-error" class="error"></div>
                    </div>
                    <div class="input-control" id="pass">
                        <label>Enter Mobile</label>
                        <input type="text" name="mobile" id="mobile" required>
                        <div id="mobile-error" class="error"></div>
                    </div>
                    <div class="input-control" id="pass">
                        <label>Select Branch</label>
                        <select name="branch" id="branch" required>
                            <option value="CSE">CSE</option>
                            <option value="ETE">ETE</option>
                            <option value="CIVIL">CIVIL</option>
                            <option value="MECHANICAL">MECHANICAL</option>
                        </select>
                        <div id="semester-error" class="error"></div>
                    </div>
                    <div class="input-control" id="pass">
                        <label>Select Semester</label>
                        <select name="semester" id="semester" required>
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

                    <div class="upload">
                        <button type="button" class="btn-warning">
                            <i class="fa fa-upload"></i> Upload Photo
                            <input type="file" id="photo-upload" name="pic" enctype="multipart/form-data">
                        </button>
                    </div>
                    <p id="upload-message"></p>
                    <button class="btn-sign-up1" type="submit" id="submit" name="submit">Sign up</button>
                </div>

            </form>
            <br>
            <h4>Already have an account?</h4><br>
            <div class="sign-in">
                <a href="login.php"> <button class="btn-sign-in1">Sign In</button></a>
            </div>
        </div>
    </div>
</section>
<br>

<?php
include "../../includes/footer.php";
