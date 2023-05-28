<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
if (isset($_SESSION['isstudent'])) {
  header("Location: ../dashboard/student.php");
}
include "../../includes/connection.php";
$login = false;

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $pass = $_POST['password'];
  if (!empty($email) and !empty($pass)) {
    //to prevent from mysqli injection  
    $email = stripcslashes($email);
    $pass = stripcslashes($pass);
    $email = mysqli_real_escape_string($conn, $email);
    $pass = mysqli_real_escape_string($conn, $pass);


    $search = "SELECT * FROM signup WHERE email='$email' ";
    $result = mysqli_query($conn, $search);
    if (mysqli_num_rows($result) == 0) {
      echo "No account exist";
    } else {
      if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($pass, $row['password'])) {
          if ($row['status'] == "PENDING") {
            echo "Your Account is Not Verified";
            
          }else{
          $login = true;
          $_SESSION['isstudent'] = "YES"; //using session
          $_SESSION['photos'] = $row['photos']; //using session
          $_SESSION['name'] = $row['name']; //using session
          $_SESSION['email'] = $email; //using session
          $_SESSION['id'] = $row['id']; //using session   
          header("Location: ../dashboard/student.php");
          }
        } else {
          echo "Wrong Password";
        }
      }
    }
  } else {
    echo "Empty Info";
  };
};
?>


<?php

if (isset($_SESSION['email'])) {
  header("location:../dashboard/student.php");
} else {
  include "../../includes/header2.php";
?>
  <link rel="stylesheet" href="../../css/form.css">

  <br><br><br><br>
  <!-- Everything must be done under section class, add class or id  -->
  <section id="sign-in-body">
    <div class="container-form">
      <div class="login-left">
        <div class="login-header">
          <h1>Welcome to T&P Cell BVEC</h1><br>
          <p class="error-msg">Invalid email or password. Please try again.</p>
        </div>

        <form class="login-form" method="post">
          <div class="login-form-content">
            <div class="input-control">
              <label>Email</label>
              <input type="text" id="email" name="email">
            </div>
            <div class="input-control" id="pass">
              <label for="password">Password</label>
              <input type="password" id="password" name="password">
            </div>
            <div class="input-control">
              <div class="checkbox">
                <input type="checkbox" id="rememberMeCheckbox"> Remember Me
                <!-- <label for="rememberMeCheckbox" id="checkboxLabel">Remember me</label> -->
              </div>
              <br>
              <button class="btn-sign-in" type="submit" name="login">Sign In</button>
        </form>
      </div>

    </div>
    <br>
    <br>
    <div class="forgot-pass">
      <a href="forgot.php">
        <p>Forgot Password?</p>
      </a>
    </div>
    <br>
    <br>
    <h4>Do not have an account?</h4><br>
    <a href="signup.php"> <button class="btn-sign-up">Create Account</button></a>
    </div>
  </section>
  <br>
<?php
}

include "../../includes/footer.php";
