<?php

$fistname=$_POST["fname"];
$lastname=$_POST["lname"];
$email=$_POST["email"];
$mobile=$_POST["mobile"];
$address=$_POST["address"];
$workout=$_POST["workout"];
$month=$_POST["month"];
//$group=$_POST["group"];
$password=$_POST["password"];
$conn = mysqli_connect("localhost","root","","database_form") or die("connection failed");
$sql="INSERT INTO database_table(First_name, Last_name, Email, Mobile, Address_name, Workout, Month, Password_no) VALUES('{$fistname}','{$lastname}','{$email}'
,'{$mobile}','{$address}','{$workout}','{$month}','{$password}')"; //
$result = mysqli_query($conn, $sql) or die("Query Failed");
header("location: http://localhost/database%20form/contactfrom.php");
mysqli_close($connection);
?>