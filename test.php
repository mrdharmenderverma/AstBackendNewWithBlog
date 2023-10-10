<!-- PHP INSERT SCRIPT START -->
<?php

    if (isset($_POST['submit'])) {
        include 'login/database/_dbconnect.php';
        $blogTitle = $_POST['post_title'];
        $blogTag = $_POST['post_tags'];
        // $blogImage = $_POST['post_image'];
        $blogDesc = $_POST['post_description'];

        $target_dir = "upload_images/"; // this used to upload the file
        $file_name  =   $_FILES['post_image']['name']; //Is Used to Store the file.
        $file_tmp_name = $_FILES['post_image']['tmp_name']; //used to get the temp of the file.

        $file_type = $_FILES['post_image']['type'];

        $allowed_file_types = array('image/jpeg', 'image/png');

        // $errorAlert = false;
        if (!in_array($file_type, $allowed_file_types)) {
            // $errorAlert =   
            // '<div class="alert alert-danger alert-dismissible" role="alert">
            //         Sorry, only JPEG and PNG files are allowed.
            //             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            //         </div>';
            echo "<script> alert('Sorry, only JPEG and PNG files are allowed.');</script>";  
            // header("location: insert_blog.php");      
            exit();
        }

        $file_target =  $target_dir.$file_name;
        
        $file_move = move_uploaded_file($file_tmp_name,  $file_target); 

        if($file_move){
            $insert_query = "INSERT INTO `datablog`(`title`, `blog_tag`, `image`, `blog_description`) VALUES ('$blogTitle', '$blogTag', '$file_name', '$blogDesc')";
            $sql_query = mysqli_query($conn, $insert_query);

            if ($sql_query) {

                // header("location: insert_blog.php");
                echo "<script> alert('Blog Add Successfully.');</script>";
            }
        }
        
    };        
?>