<?php
session_start();
$con = mysqli_connect('localhost', 'root');
if (!$con) {
    echo "No connection";
    exit;
}

mysqli_select_db($con, 'sessionpractical');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $name= $_POST['name'];
    $pass = $_POST['password'];
    $email = $_POST['email'];

    if (!empty($pass) && !empty($email)) {
        $q = "SELECT * FROM signin WHERE password = '$pass' && email = '$email'";
        $result = mysqli_query($con, $q);
        $num = mysqli_num_rows($result);

        if ($num == 1) {
            // $_SESSION['username'] = $name;
            header('location: student-home.php');
            exit;
        } else {
            echo "You do not have an account. Please create an account first!";
        }
    } else {
        echo "Please enter your email and password.";
    }
}
?>