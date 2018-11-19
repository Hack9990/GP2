<?php
require_once('barcode_connect.php');

$signup_info = $_POST['signup_info'];
$obj = json_decode($signup_info, true);

$email=$obj['email']; 
$password=$obj['password'];
$type=$obj['type'];

$query = "SELECT * from user where email='$email' and password='$password'";
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result) > 0)
{
    echo "exists";
}
else {

$sql = "INSERT INTO user (email , password , type)
VALUES ('$email', '$password','$type')";
if (mysqli_query($con, $sql)) {
    echo "New record inserted successfully";
} else {
    echo "Error: " .$sql.",,,".mysqli_error($con);
}
   }
mysqli_close($con);

?>