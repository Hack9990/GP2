<?php
require_once('dbConnect.php');

$signup_info = $_POST['signup_info'];
$obj = json_decode($signup_info, true);
#print 'username= '.$obj->{'username'}; 
#print ',,email= '.$obj->{'email'}; 
#print ',,phone= '.$obj->{'phone'}; 
#print ',,password= '.$obj->{'password'}; 
$user_name=$obj['username'];
$email=$obj['email']; 
$phone=$obj['phone'];
$password=$obj['password'];

$query = "SELECT * from user_info where email='$email' or phone_num ='$phone' or user_name='$user_name' and password='$password'";
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result) > 0)
{
    echo "exists";
}
else {


$sql = "INSERT INTO user_info (user_name, password,email, phone_num )
VALUES ('$user_name', '$password','$email','$phone')";
if (mysqli_query($con, $sql)) {
    echo "New record inserted successfully";
} else {
    echo "Error: " .$sql.",,,".mysqli_error($con);
}


   }

mysqli_close($con);

?>