<?php 
 error_reporting(0);
 header('content-type: application/json');
 header('Access-control-Allow-origin:*');
 header('Access-Control-Method: GET');
 header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With ');

 include '../login/database/_dbconnect.php';

 $requestMethod = $_SERVER['REQUEST_METHOD'];

 if($requestMethod == 'GET'){

 $sql = "SELECT * FROM  datablog ORDER BY id DESC";
 $result = mysqli_query($conn, $sql) or die("sql query failed");

 if(mysqli_num_rows($result) > 0){

    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
   //  echo json_encode($output);
    $data = [
      'status' => 200,
      'message' => 'Record Fetch Successfully',
      'data' => $output
   ];
      header("Http/1.0 200 OK");
      echo json_encode($data);   

 }else{

   $data = [
      'status' => 404,
      'message' =>  'No Record Found'
   ];
   header("Http/1.0 404 No Record Found");
   echo json_encode($data);    
 }

}else{

   $data = [
      'status' => 405,
      'message' => 'Method Not Allowed.'
   ];
   header("Http/1.0 405 Method Not Allowed");
   echo json_encode($data);  


}
 ?>