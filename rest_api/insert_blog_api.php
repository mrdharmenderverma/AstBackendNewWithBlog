<?php 
error_reporting(0);
 header('content-type: application/json');
 header('Access-control-Allow-origin:*');
 header('Access-Control-Method: POST');
 header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With ');

//  include '../login/database/_dbconnect.php';

 $requestMethod = $_SERVER['REQUEST_METHOD'];

 if($requestMethod == 'POST'){

    $inputData = json_decode(file_get_contents("php://input"), true);

    if(empty($inputData)){

        include '../login/database/_dbconnect.php';
        $blogTitle = $_POST['post_title'];
        $blogTag = $_POST['post_tags'];
        $blogDesc = $_POST['post_description'];

        $target_dir = "upload_images/"; // this used to upload the file
        $file_name  =   $_FILES['post_image']['name']; //Is Used to Store the file.
        $file_tmp_name = $_FILES['post_image']['tmp_name']; //used to get the temp of the file.

        $file_type = $_FILES['post_image']['type'];

        $allowed_file_types = array('image/jpeg', 'image/png');

        $errorAlert = false;
        if (!in_array($file_type, $allowed_file_types)) {
            // $errorAlert =   
            // '<div class="alert alert-danger alert-dismissible" role="alert">
            //         Sorry, only JPEG and PNG files are allowed.
            //             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            //         </div>';
            // echo "<script> alert('Sorry, only JPEG and PNG files are allowed.');</script>";  
            // header("location: insert_blog.php"); 
            echo "only JPEG and PNG files are allowed";     
            exit();
        }

        $file_target =  $target_dir.$file_name;
        
        $file_move = move_uploaded_file($file_tmp_name,  $file_target);  

        // if($file_move){
        //     $insert_query = "INSERT INTO `datablog`(`title`, `blog_tag`, `image`, `blog_description`) VALUES ('$blogTitle', '$blogTag', '$file_name', '$blogDesc')";
        //     $sql_query = mysqli_query($conn, $insert_query);

        //     // if ($sql_query) {

        //     //     // header("location: insert_blog.php");
        //     //     echo "<script> alert('Blog Add Successfully.');</script>";
        //     // }
        // }
        
        $insert_query = "INSERT INTO `datablog`(`title`, `blog_tag`, `image`, `blog_description`) VALUES ('$blogTitle', '$blogTag', '$file_name', '$blogDesc')";
        $sql_query = mysqli_query($conn, $insert_query);

        if($sql_query) {
            $data = [
                'status' => 201,
                'message' => 'Record Inserted',
            ];
            header("HTTP/1.0 201 Record Inserted");
            echo json_encode($data);

            // header("location: insert_blog.php");
            // echo "<script> alert('Blog Add Successfully.');</script>";
        }else{
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error',
            ];
            header("HTTP/1.0 500 Internal Server Error");
            echo json_encode($data);
        }
        
    }
    // else{   
        
    //     // $insert_query = "INSERT INTO `datablog`(`title`, `blog_tag`, `image`, `blog_description`) VALUES ('$blogTitle', '$blogTag', '$file_name', '$blogDesc')";
    //     // $sql_query = mysqli_query($conn, $insert_query);

    //     // if($sql_query) {
    //     //     $data = [
                     
    //     //         'message' => 'Record Inserted',
    //     //     ];
    //     //     header("HTTP/1.0 201 Record Inserted");
    //     //     echo json_encode($data);

    //         // header("location: insert_blog.php");
    //         // echo "<script> alert('Blog Add Successfully.');</script>";
    //     // }else{
    //     //     $data = [
    //     //         'status' => 500,
    //     //         'message' => 'Internal Server Error',
    //     //     ];
    //     //     header("HTTP/1.0 500 Internal Server Error");
    //     //     echo json_encode($data);
    //     // }
    // }       

 }else{
    $data = [
        'status' => 405,
        'message' => 'Method Not Allowed.'
     ];
     header("Http/1.0 405 Method Not Allowed");
     echo json_encode($data);  
 }

?> 