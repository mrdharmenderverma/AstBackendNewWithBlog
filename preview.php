<!-- PHP INSERT SCRIPT START -->
<?php 
    include 'login/database/_dbconnect.php';
    $idd    = $_GET['id'];
    $sql= mysqli_query($conn, "select * from datablog where id = '".$idd."'");
    $num = mysqli_fetch_array($sql);
?>

<?php 
    // $receiveData =$_GET['id'];
    $api_Url = "http://localhost/AstBackend/rest_api/blog_view.php";
    
    //read json file
    $json_data = file_get_contents($api_Url);

    //decode json data into php array
    $response_data = json_decode($json_data);
    //  print_r($response_data);
    $user_data = $response_data ->data;
?>

<!-- PHP INSERT SCRIPT END -->
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/">
<!-- Head -->
<?php $page = 'blog details';  $active = 'blog';  require 'Components/head.php';?>
<!-- /Head -->

<body>
    <?php session_start();?>
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
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="main-body">
                            <div class="row gutters-sm">
                                <div class="col-md-12">
                                    <div class="card p-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <h5 style="color:black">Blog Preview</h5>
                                                </div>
                                            </div>
                                            <div class="modal-body">                                                
                                            <form action="rest_api/blog_update.php?id=<?php echo $num['id'];?>" method="POST" enctype="multipart/form-data">
                                                <div class="form-group mb-3">
                                                    <input type="hidden" class="form-control" placeholder="Post id"
                                                        name="post_id" value="<?php echo $num['id'];?>">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Post Title"
                                                        name="post_title" value="<?php echo $num['title'];?>">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Post Tag"
                                                        name="post_tags" value="<?php echo $num['blog_tag'];?>">
                                                </div>
                                                <div class="mb-3">
                                                    <img src="upload_images/<?php echo $num['image'];?>" width="400px" height="200px" class="mb-3">  <!--to Call Current image-->
                                                    <input class="form-control" type="file" id="" name="image" accept="image/*">
                                                    <input type="hidden" class="custom-file-input" name="old_image" value="<?php echo $num['image'];?>">    
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="updateCkEditor">Description</label>
                                                    <textarea name="post_description" id="updateCkEditor" cols="150" class="form-control" rows="3"><?php echo $num['blog_description'];?></textarea>
                                                    
                                                </div>                                                
                                                <div class="modal-footer">
                                                    <!-- <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button> -->
                                                    <button type="submit" name="submit" class="btn btn-primary">Update Blog</button>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- / Content -->


                            <!--Customer Details Update Modal -->
                            <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Customer Profile</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="rest_api/customer_update.php?id=1" method="POST">
                                                <div class="mb-3">
                                                    <div class="text-secondary mb-2">
                                                        <input value="1" type="hidden" class="form-control"
                                                            id="exampleInputID" aria-describedby="emailHelp" name="id">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="text-secondary mb-2">
                                                        <h6>Full
                                                            Name :</h6>
                                                        <input value="Kishor Kumar Gupta" type="name" name="name"
                                                            class="form-control" id="InputCustomerName"
                                                            aria-describedby="emailHelp">
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <div class="text-secondary mb-2">
                                                        <h6>Email Address :</h6>
                                                        <input value="kishorsingh@gmail.com" type="email"
                                                            class="form-control" id="InputCustomerEmail" name="email"
                                                            aria-describedby="emailHelp">
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <div class="text-secondary mb-2">
                                                        <h6>Mobile
                                                            Number :</h6>
                                                        <input value="9911555306" type="text" class="form-control"
                                                            id="InputCustomerMobile" aria-describedby="emailHelp"
                                                            name="number">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="text-secondary mb-2">
                                                        <h6>Gender :
                                                        </h6>
                                                        <input value="Male" type="text" class="form-control"
                                                            id="InputCustomerGender" aria-describedby="emailHelp"
                                                            name="gender">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="text-secondary mb-2">
                                                        <h6>
                                                            Secondary Email :</h6>
                                                        <input value="ram1@gmail.com" type="text" class="form-control"
                                                            id="secondaryCustomerEmail" aria-describedby="emailHelp"
                                                            name="secondary_email">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="text-secondary mb-2">
                                                        <h6>
                                                            Secondary Mobile :</h6>
                                                        <input value="7827771782" type="text" class="form-control"
                                                            id="secondaryCustomerMobile" aria-describedby="emailHelp"
                                                            name="secondary_mobile">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class=" btn rounded-pill btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="submit"
                                                        class="btn rounded-pill btn-info">Update
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Delete Modal-->
                            <div class="modal fade" id="DeactivateModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Deactivate</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure want to delete account.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn rounded-pill  btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="rest_api/activate_deactivate.php?id=1" method="POST">
                                                <button type="submit"
                                                    class="btn rounded-pill btn-danger">Deactivate</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Footer -->
                            <footer class="content-footer footer bg-footer-theme">
                                <!--<div class="container-xxl flex-wrap text-center py-2 ">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made  by
                  <a href="" target="_blank" class="footer-link fw-bolder">Ruchi</a>
                </div>               
              </div>-->
                            </footer>
                            <!-- / Footer -->

                            <div class="content-backdrop fade"></div>
                        </div>
                        <!-- Content wrapper -->
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
                                                name="post_description"
                                                value="<?php echo $blog_details->blog_description;?>">
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