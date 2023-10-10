<!-- PHP INSERT SCRIPT START -->
<?php

    if (isset($_POST['submit'])) {
        include 'login/database/_dbconnect.php';
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

                // echo "<script> alert('Blog Add Successfully.');</script>";
                header("location: insert_blog.php");
            }
        }
        
    };
?>

<!-- PHP INSERT SCRIPT END -->
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/">
<!-- Head -->
<?php $page = 'add blog';  $active = 'blog';  require 'Components/head.php';?>
<!-- /Head -->

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php require 'Components/sidebar.php';?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php require 'Components/navbar.php';?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">


                    <!-- Content -->
                    <div class="container my-5 col-md-6">
                        <h2 class="my-3">Create A New Post</h2>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Post Title" name="post_title">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Post Tag" name="post_tags">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="file" id="formFileMultiple" multiple=""
                                    name="post_image">
                                    
                            </div>
                            <div class="form-group mb-3">
                                <label for="ckEditor">Description</label>
                                <textarea class="form-control" id="ckEditor" rows="3"
                                    name="post_description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Add Post</button>
                        </form>
                    </div>
                    <!-- / Content -->
                    <!---start table--->
                    <!---/end table-->
                    


                    <!-- Modal -->
                    <?php 
                     $api_Url = "http://localhost/AstBackend/rest_api/blog_view.php";
                     
                     //read json file
                     $json_data = file_get_contents($api_Url);

                     //decode json data into php array
                     $response_data = json_decode($json_data);
                    //  print_r($response_data);
                    ?>

                    <?php foreach($response_data as $blog_details) { ?>
                                        <?php }?>

                    <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Blog</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>                               
                                    
                                <div class="modal-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" placeholder="Post Title"
                                                name="post_title" value="<?php echo $blog_details->id;?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" placeholder="Post Tag"
                                                name="post_title" value="<?php echo $blog_details->title;?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" placeholder="Post Tag"
                                                name="post_tags" value="<?php echo $blog_details->blog_tag;?>">
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control" type="file" id="formFileMultiple" multiple=""
                                                name="post_image">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="updateCkEditor">Description</label>
                                            <input class="form-control" id="updateCkEditor" rows="3"
                                                name="post_description" value="<?php echo $blog_details->blog_description;?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update Blog</button>
                                        </div>
                                    </form>                                
                                </div>                                
                            </div>
                        </div>
                    </div>
                    

                    <!-- ck editor -->
                    <script src="ckeditor/ckeditor.js"></script>
                    <script>
                        CKEDITOR.replace('ckEditor');
                        CKEDITOR.replace('updateCkEditor');
                    </script>
                    <!-- Footer -->
                    <?php require 'Components/footer.php';?>
                    <!-- /Footer -->