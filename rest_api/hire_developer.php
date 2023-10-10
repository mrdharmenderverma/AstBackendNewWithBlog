<?php 
 header('content-type: application/json');
 header('Access-control-Allow-origin:*');

 include '../login/database/_dbconnect.php';

 $sql = "SELECT * FROM  hire_developer";
 $result = mysqli_query($conn, $sql) or die("sql query failed");

 if(mysqli_num_rows($result) > 0){

    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);

 }else{

    echo json_encode(array('message' => 'no record found.', 'status' => false));
    
 }
 ?>