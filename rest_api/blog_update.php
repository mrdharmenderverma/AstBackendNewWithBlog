<?php
 include '../login/database/_dbconnect.php';

if(isset($_POST['submit']))
{
    $id  = $_GET['id'];
    $title = $_POST['post_title'];
    $blog_tag = $_POST['post_tags'];
    $blog_description = $_POST['post_description'];

    $target_dir = "../upload_images/"; // this used to upload the file
    $file_name = $_FILES['image']['name']; //Is Used to Store the file name.
    $file_temp_name = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    $allowed_file_types = array('image/jpeg', 'image/png', 'image/jpg');

    if (!in_array($file_type, $allowed_file_types)) 
    {
        session_start();
        $_SESSION['status'] = "Only JPG, JPEG or PNG are allowed!!";
        $_SESSION['status_code']= "error";
        header('location: ../preview.php?id='.$id);
    }
    else
    {
        $file_target = $target_dir.$file_name;
        if(file_exists($file_target)){
           session_start();
           $file_name  =   $_FILES['post_image']['name'];
           $_SESSION['status'] = "Image already Exists " . $file_name;
           $_SESSION['status_code']= "error";
           header('location: ../preview.php?id='.$id);
        }
        else{
                $file_move = move_uploaded_file($file_temp_name,  $file_target);
           
                if($file_move){
                        $old_img = $file_name; // To Upload New Image
                        
                        $update_query = "UPDATE `datablog` SET `title` = '$title', `blog_tag` = '$blog_tag', `blog_description` = '$blog_description',  `image` = '$old_img' WHERE id = '".$id."'";   
                        $update = mysqli_query($conn, $update_query); // executation query
                        
                        if($update){
                                session_start();
                                $_SESSION['status'] = "Blog Updated Successfully";
                                $_SESSION['status_code']= "success";
                                header('location: ../blog-details.php');
                        }
                }else{
                        $old_img = $_POST['old_image']; 
                }           
        }
    } 

        

//         if(move_uploaded_file($file_temp_name, $file_target)){
//                 $old_img = $file_name; // To Upload New Image
//         }else{
//                 $old_img = $_POST['old_image']; 
//         }

//         $update_query = "UPDATE `datablog` SET `title` = '$title', `blog_tag` = '$blog_tag', `blog_description` = '$blog_description',  `image` = '$old_img' WHERE id = '".$id."'";
    
//         $update = mysqli_query($conn, $update_query); // executation query


//     if($update){

//         //     echo "Data Updated";
//             header("location: ../blog-details.php");
//     }else{
//             echo "Data NOt Updated";
//     }
}
?>