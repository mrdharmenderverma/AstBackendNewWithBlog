<?php 
    error_reporting(0);
    //Adding Base url
    include_once 'base_url/base_url.php';
    
    // $receiveData =$_GET['id'];
    $api_Url = ''. LOCAL_BASE_URL .'/blog_view.php';
    
    //read json file
    $json_data = file_get_contents($api_Url);

    //decode json data into php array
    $response_data = json_decode($json_data);
    //  print_r($response_data);
    $user_data = $response_data ->data;
?>


<!-- PHP INSERT SCRIPT END -->
<!DOCTYPE html>
<?php session_start();?>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/">
<!-- Head -->
<?php $page = 'blog details'; $active = 'blog'; require 'Components/head.php';?>
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
                    <!---start table--->                    
                    <div class="container mt-5">
                        <table class="table table-striped p-4">
                            <thead>
                                <tr>
                                    <th scope="col">S.No.</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Blog tag</th>
                                    <th scope="col">Blog description</th>
                                    <th scope="col">Images</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sno = 1;
                                   foreach($user_data as $data) {;?>
                                <tr>
                                    <td><?php $eid = $data->id; echo $sno++ ?></td>
                                    <td><?php echo $data->title; ?></td+>
                                    <td><?php echo $data->blog_tag; ?></td>
                                    <td><?php $text = $data->blog_description; $limitedText = mb_strimwidth($text, 0, 200, '...');
                                           echo  $limitedText; ?></td>
                                    <td><img src="upload_images/<?php echo $data->image; ?>"
                                            style="width:180px; height: 100px;"></td>
                                        <!-- <form action="preview.php" method="GET">
                                            <td><a href="preview.php?id=<?php echo $eid;?>" class="btn btn-primary"
                                                        style="color:white !important">Edit</a></td>
                                        </form> -->
                                    <!-- <td><a href="delete.php?id=<?php echo $eid;?>" class="btn btn-danger"
                                                        style="color:white !important">Delete</a></td> -->
                                    <td>
                                        <div class="">
                                            <a href="preview.php?id=<?php echo $eid;?>" class="btn btn-primary mb-2"
                                                style="color:white !important"><i class="bx bx-edit-alt me-1"></i> 
                                            </a>
                                            <a href="delete.php?id=<?php echo $eid;?>" class="btn btn-danger"
                                                style="color:white !important"><i class="bx bx-trash me-1"></i>
                                            </a>
                                        </div>                                                        
                                    </td>                    
                                </tr>                                
                                <?php }; ?>
                            </tbody>
                        </table>    
                    </div>
                    <!---/end table-->                                
                    

                    <!-- Footer -->
                    <?php require 'Components/footer.php';?>
                    <!-- /Footer -->