<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['email'])) {
    header("Location: users/students/login.php");
}
include "includes/connection.php";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $semester = $_POST['semester'];
    $rollno = $_POST['rollno'];
    $department = $_POST['department'];
    $industry = $_POST['industry'];
    $applydate = date('Y-m-d H:i:s');

    $q = "SELECT * FROM noc WHERE name = '$name' &&  email= '$email' &&  phoneno= '$phoneno' && semester ='$semester' && rollno='$rollno' && department='$department' && industry='$industry' ";
    $result = mysqli_query($conn, $q);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        echo "You have already applied";
    } else {
        $qy = "INSERT INTO noc(name,email,phoneno,semester,rollno,department,industry,applydate) VALUES('$name', '$email', '$phoneno', '$semester', '$rollno', '$department', '$industry','$applydate')";
        mysqli_query($conn, $qy);

        // Redirect to success page
        header("Location: users/dashboard/student.php");
    }
}
?>

<?php
include "includes/header.php";
?>
<link rel="stylesheet" href="css/form.css">
<br><br><br><br>
<!-- Everything must be done under section class, add class or id  -->
<section class="create-account-NOC">
    <div class="container-form">
        <div class="login-left">
            <div class="login-header"><br>
                <h1>Apply For NOC</h1>
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
                        <input type="text" name="name" id="name" value="<?php echo $studname; ?>" readonly required>
                        <div class="error"></div>
                    </div>
                    <div class="input-control">
                        <label>Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $studemail; ?>" required>

                    </div>

                    <div class="input-control">
                        <label>Phone No.</label>
                        <input type="text" name="phoneno" value="<?php echo $studentdata['mobile']; ?>" required>
                    </div>
                    <div class="input-control" id="pass">
                        <label>Select Semester</label>
                        <select name="semester" id="semester" required>
                            
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
                        <label>Roll No.</label>
                        <input type="text" name="rollno" required>
                        <div class="error"></div>
                    </div>
                    <div class="input-control">
                        <label>Department</label>
                        <input type="text" name="department" value="<?php echo $studentdata['branch']; ?>" readonly required>
                        <div class="error"></div>
                    </div>
                    <div class="input-control">
                        <label>Industry / Institution</label>
                        <input type="text" name="industry" required>
                        <div class="error"></div>
                    </div>
                    <button class="btn-sign-up-NOC" type="submit" id="submit" name="submit">SUBMIT</button>
                </div>

            </form>
            <br>
        </div>
    </div>
</section>
</section>
<br>


</html>


<?php
include "includes/footer2.php";
?>