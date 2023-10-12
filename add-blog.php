<?php 
    //Adding Base url
    include_once 'base_url/base_url.php';
    $api_Url = ''. LOCAL_BASE_URL .'/blog_view.php';
    
    //read json file
    $json_data = file_get_contents($api_Url);

    //decode json data into php array
    $response_data = json_decode($json_data);
//  print_r($response_data);
?>


<!DOCTYPE html>
<?php session_start();?>
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
                        <h2 class="my-3">Create A New Blog</h2>                       
                        
                        <form action="rest_api/insert-data.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Post Title" name="post_title" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Post Tag" name="post_tags" required>
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="file" id="imageId" accept="image/*" name="post_image">                                    
                            </div>                         
                            
                            <div class="form-group mb-3">
                                <label for="ckEditor">Description</label>
                                <textarea class="form-control" id="ckEditor" rows="3"
                                    name="post_description" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Add Post</button>
                        </form>
                    </div>
                    <!-- / Content -->    

                    <!-- Footer -->
                    <?php require 'Components/footer.php';?>
                    <!-- /Footer -->