<?php
    require_once('barcode_connect.php');

   $username = $_POST['username'];
   $password = $_POST['password'];
   $result = mysqli_query($con,"SELECT * FROM user_info where user_name='$username' 
      and Password='$password'");
   $row = mysqli_fetch_array($result);
   $data = $row[0].','.$row[2].','.$row[3];

   if($data){
      echo $data;
   }
   mysqli_close($con);
?>