<?php 
    $idd    = $_GET['id'];
    $api_Url = "http://localhost/AstBackend/AstBackend/rest_api/blog_view.php" .$idd ; 
    
    //read json file
    $json_data = file_get_contents($api_Url);

    //decode json data into php array
    $response_data = json_decode($json_data);
    //  print_r($response_data);
?>

                    <?php foreach($response_data as $blog_details) { ?>
                                        <?php }?>


                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Post Title" name="post_title"
                                    value="<?php echo $blog_details->id;?>">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Post Tag" name="post_title"
                                    value="<?php echo $blog_details->title;?>">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Post Tag" name="post_tags"
                                    value="<?php echo $blog_details->blog_tag;?>">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="file" id="formFileMultiple" multiple="" name="post_image">
                            </div>
                            <div class="form-group mb-3">
                                <label for="updateCkEditor">Description</label>
                                <input class="form-control" id="updateCkEditor" rows="3" name="post_description"
                                    value="<?php echo $blog_details->blog_description;?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update Blog</button>
                            </div>
                        </form>
                    </div>