<?php
    //  PHP INSERT SCRIPT START 
    if (isset($_POST['submit'])) {
        include '../login/database/_dbconnect.php';
        $blogTitle = $_POST['post_title'];
        $blogTag = $_POST['post_tags'];
        $blogDesc = $_POST['post_description'];

        $target_dir = "../upload_images/"; // this used to upload the file
        $file_name  =   $_FILES['post_image']['name']; //Is Used to Store the file.
        $file_tmp_name = $_FILES['post_image']['tmp_name']; //used to get the temp of the file.

        $file_type = $_FILES['post_image']['type'];

        $allowed_file_types = array('image/jpeg', 'image/png');
        
        if (!in_array($file_type, $allowed_file_types)) 
        {
            session_start();
            $_SESSION['image_status'] = "Only JPG, JPEG or PNG are allowed!!";
            header('location: ../add-blog.php');
            // exit();
        }
        else{        
            $file_target =  $target_dir.$file_name;
            if( file_exists($file_target))
            {   
                session_start();
                $file_name  =   $_FILES['post_image']['name'];
                $_SESSION['image_status_exits'] = "Image already Exists " . $file_name;
                header('location: ../add-blog.php');
            }
            else{        
            
                $file_move = move_uploaded_file($file_tmp_name,  $file_target);             

                if($file_move){   

                    $insert_query = "INSERT INTO `datablog`(`title`, `blog_tag`, `image`, `blog_description`) VALUES ('$blogTitle', '$blogTag', '$file_name', '$blogDesc')";
                    $sql_query = mysqli_query($conn, $insert_query);

                    if ($sql_query) {

                        if($sql_query)
                        {   
                            session_start();
                            $_SESSION['status'] = "success";
                            $_SESSION['inserted_blog'] = "Blog inserted Successfully";
                            header('location: ../add-blog.php');
                        }
                    }
                }
            }
        }    
    };
    //  Inserting data using api
?>