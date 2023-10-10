<?php
 include '../login/database/_dbconnect.php';

if(isset($_POST['submit']))
{
    $id  =  $_GET['id'];
    $title  =   $_POST['post_title'];
    $blog_tag  =   $_POST['post_tags'];
    $blog_description  =  $_POST['post_description'];

    $target_dir = "../upload_images/"; // this used to upload the file
    $file_name  =   $_FILES['image']['name']; //Is Used to Store the file name.
    $file_temp_name = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    $allowed_file_types = array('image/jpeg', 'image/png');

        // $errorAlert = false;
        if (!in_array($file_type, $allowed_file_types)) {
                // $errorAlert =   
                // '<div class="alert alert-danger alert-dismissible" role="alert">
                //         Sorry, only JPEG and PNG files are allowed.
                //             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                //         </div>';
                // echo "<script> alert('Sorry, only JPEG and PNG files are allowed.');</script>";  
                // header("location: insert_blog.php");      
                exit();
        }

    $file_target =  $target_dir.$file_name;

    if(move_uploaded_file($file_temp_name, $file_target)){
            $old_img = $file_name; // To Upload New Image
    }else{
            $old_img = $_POST['old_image']; 
    }

    $update_query  = "UPDATE `datablog` SET `title`='$title', `blog_tag`='$blog_tag', `blog_description` = '$blog_description',  `image` = '$old_img' WHERE id = '".$id."'";

    // $update_query= "UPDATE `datablog` SET `id`='title'= $title, `blog_tag`= $blog_tag, `blog_description`=$blog_description, `image`=$image, WHERE 1 = '".$update_query."'";


    $update = mysqli_query($conn, $update_query); // executation query


    if($update){

            // echo "Data Updated";
            header("location: ../blog-details.php");
    }else{
            echo "Data NOt Updated";
    }
}
?>