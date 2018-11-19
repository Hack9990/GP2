<?php
  require_once('barcode_connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $id  = $_GET['email'];
    $sql = "SELECT * FROM barking WHERE email='".$id."'";
    //$sql = "SELECT * FROM barking";
    $i = -1;

    $r = mysqli_query($con, $sql);

    // $res = mysqli_fetch_array($r);

    $result = array();
    while ($res = mysqli_fetch_array($r)) {
        array_push($result, array(
		
                "name" => $res['name'],	
                "empty" => $res['empty'],
            )
        );
    }


    echo json_encode($result);

    mysqli_close($con);

}