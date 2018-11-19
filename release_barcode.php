<?php
require_once('barcode_connect.php');


if (isset($_POST['release']))
{

    echo "done";
}

    $signup_info = $_POST['signup_info'];
$obj = json_decode($signup_info, true);

$email=$obj['email']; 
$data=$obj['data'];

$query = "UPDATE barking SET data=''  , email =''  , empty = 1 where data='$data' and email ='$email' and empty =0";
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result) > 0)
{
    echo "exists";	
}


mysqli_close($con);

?>