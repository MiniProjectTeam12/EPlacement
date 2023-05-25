<?php
session_start();
$con= mysqli_connect('localhost', 'root');
if($con){
    echo"Account Created successfuly!";
}else{
    echo"no connection";
}

mysqli_select_db($con, 'sessionpractical');

$name= $_POST['name'];
$pass=$_POST['password'];
$email= $_POST['email'];

$q = "SELECT * FROM coordinator WHERE name = '$name' && password = '$pass' && email = '$email'";
$result= mysqli_query($con, $q);
$num = mysqli_num_rows ($result);

if($num==1){
    echo"duplicate data";
}else{
    $qy="INSERT INTO coordinator(name, password, email) VALUES('$name', '$pass', '$email')";
    mysqli_query($con, $qy);

    // header("Location: loading-acc-successful.html");
    // header("Location: noc-successful.html");
    exit;
}
?>