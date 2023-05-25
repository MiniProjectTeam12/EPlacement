<?php
session_start();
$con= mysqli_connect('localhost', 'root');
// if($con){
//     echo"Application for NOC Successful!";
// }else{
//     echo"no connection";
// }

mysqli_select_db($con, 'sessionpractical');

$name= $_POST['name'];
$email=$_POST['email'];
$phoneno= $_POST['phoneno'];
$semester= $_POST['semester'];
$rollno= $_POST['rollno'];
$department= $_POST['department'];
$industry= $_POST['industry'];

$q = "SELECT * FROM noc WHERE name = '$name' &&  email= '$email' &&  phoneno= '$phoneno' && semester ='$semester' && rollno='$rollno' && department='$department' && industry='$industry' ";
$result= mysqli_query($con, $q);
$num = mysqli_num_rows ($result);

if($num==1){
    echo"Application Successful Again! ";
}else{
    $qy="INSERT INTO noc(name,email,phoneno,semester,rollno,department,industry) VALUES('$name', '$email', '$phoneno', '$semester', '$rollno', '$department', '$industry')";
    mysqli_query($con, $qy);

    // Redirect to success page
    header("Location: loading-noc-successful.html");
    // header("Location: noc-successful.html");
    exit;
}
?>