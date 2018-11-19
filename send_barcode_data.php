<?php

require_once('barcode_connect.php');
//$barcode = $_POST['barcode'];
//$signup_info = $_POST['barcode']
//$obj = json_decode($signup_info, true);

if (isset($_POST['barcode']))    
{    

$obj = json_decode($_POST['barcode'], true);

$email=$obj['email']; 
$data=$obj['data'];

$query = "SELECT * from barking where data='$data'";
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result) > 0)
{
    echo "exists";	
}
//echo $email;

else { 
$parent = "SELECT * FROM user WHERE email='".$email."'";
$barking_name = "";
$barking_type="";

	 $re = mysqli_query($con, $parent);
	 $row = mysqli_fetch_row($re);
	 $type = $row[3];
	 if ($type == "student"){
		 $barking_name = "std_barking";	 
	 }
	 else { 
	 $barking_name = "tech_barking";
	 }
//echo $barking_name;
$lock = 1;
$query = "INSERT INTO barking(name , type , empty ,data ,email) 
VALUES('".$barking_name."','".$type."', '".$lock."','".$data."','".$email."')";

		//$sql = "INSERT INTO barking ( name ,type ,empty , data , email)
		//VALUES ('$barking_name','$type' ,'$lock' , '$data',  $email)";
		if (mysqli_query($con, $query)) {
			echo "New record inserted successfully";
		} else {
			echo "Error: " .$query.",,,".mysqli_error($con);
		}
}
mysqli_close($con);
}  
else { echo " nothing ";}


?>