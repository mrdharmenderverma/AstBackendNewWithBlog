<?php
  error_reporting(0);
  $receivedData = $_GET['id'];


  $api_id_url = 'http://localhost/helperadda_backend/view.php'; 
  error_reporting(0);
  // $scid = $_GET['sub_category_id'];
  $blank_url = 'http://localhost/helperadda_backend/view.php' . $receivedData;
  
   if($api_id_url != $blank_url){  
  
    


    $api_url = 'http://3.6.48.68/social_app/public/api/show-service-provider/details/' . $receivedData;

    // Read JSON file
    $json_data = file_get_contents($api_url);
  
    // Decode JSON data into PHP array
     $response_data = json_decode($json_data);
    //  print_r($response_data);

    // $resultsArr = cleanResponse($response_data);
    // //  $businessAddress = $response_data['business_address'];
    //  print_r($resultsArr);

  
    // All user data exists in 'data' object
    // $user_data = $response_data->data;
  
    // Cut long data into small & select only first 10 records
    // $user_data = array_slice($response_data, 0, 100);
  
    // Print data if need to debug
  
    // Traverse array and display user data
  
  

   }else {

    
    header('Location: partner.php');
}







  // echo "Received Data: " . $receivedData;

  
?>


<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/">
<!-- Head -->
<?php $page = 'dashboard';
require 'Components/head.php'; ?>
<!-- /Head -->

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php require 'Components/sidebar.php'; ?>
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php require 'Components/navbar.php'; ?>
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="main-body">
                            <div class="row gutters-sm">
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <?php foreach($response_data as $providerDetials){?>
                                        <?php }?>
                                        <div class="card-body">
                                            <div class="d-flex flex-column align-items-center text-center"><img
                                                    src="<?php echo $providerDetials->photo;?>" alt="Admin" width="150"
                                                    height="150" class="rounded-circle">
                                                <div class="mt-3"><span class="py-1 px-2 rounded btn-success"
                                                        style="color: #00a115 !important; background-color: #fff; border-color: #fff; box-shadow: 0 0.125rem 0.25rem 0 rgb(255 255 255 / 40%);;">
                                                        <?php if(($user->active) >  0){ echo $active ="<span class='badge bg-label-danger me-1'>InActive</span>";}else
                                                    {
                                                        echo $inactive = "<span class='badge bg-label-success me-1'>Active</span>"; 
                                                    }?>
                                                    </span>

                                                    <h4 class="text fs-10">
                                                        <?php echo $providerDetials->name;?>
                                                    </h4>
                                                    <p class="text fs-15">
                                                        <?php echo $providerDetials->email;?>
                                                    </p>
                                                    <p class="text-secondary"><span style="color: skyblue;"> Service
                                                            Provider</span></p>

                                                    <button type="button" class="btn rounded-pill btn-danger "
                                                        style="margin-right: 40px;" data-bs-dismiss="modal"
                                                        aria-label="Close" data-bs-toggle="modal"
                                                        data-bs-target="#DeactivateModal">Deactivate</button>
                                                    <button type="button" class="btn rounded-pill btn-info"
                                                        data-bs-toggle="modal" data-bs-target="#EditModal">Edit
                                                        Profile</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card mb-3 p-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <h5 style="color:black">Personal Details</h5>
                                                </div>
                                            </div>
                                            <div class="row border rounded p-3 mb-3">

                                                <!-- <div class="col-sm-3 mb-2">
                          <h6 class="mb-0">Full Name</h6>
                        </div> -->


                                                <div class="col-sm-9 text-secondary mb-2">
                                                    <h6 style="display:inline-block">Name:</h6>
                                                    <?php echo $providerDetials->name;?>
                                                </div>
                                                <!-- <div class="col-sm-3 mb-2">
                          <h6 class="mb-0">Email</h6>
                        </div> -->
                                                <div class="col-sm-9 text-secondary mb-2">
                                                    <h6 style="display:inline-block">Email:</h6>
                                                    <?php echo $providerDetials->email;?>
                                                </div>
                                                <!-- <div class="col-sm-3 mb-2">
                          <h6 class="mb-0">Mobile</h6>
                        </div> -->
                                                <div class="col-sm-9 text-secondary mb-2">
                                                    <h6 style="display:inline-block">Mobile number:</h6>
                                                    <?php echo $providerDetials->mobile_no;?>
                                                </div>
                                                <!-- <div class="col-sm-3 mb-2">
                          <h6 class="mb-0">Gender</h6>
                        </div> -->
                                                <div class="col-sm-9 text-secondary mb-2">
                                                    <h6 style="display:inline-block">Gender:</h6>
                                                    <?php echo $providerDetials->gender;?>
                                                </div>
                                                <!-- <div class="col-sm-3 mb-2">
                          <h6 class="mb-0">Secondary Email</h6>
                        </div> -->
                                                <div class="col-sm-9 text-secondary mb-2">
                                                    <h6 style="display:inline-block">Secondary Email:</h6>
                                                    <?php echo $providerDetials->secondary_email;?>
                                                </div>
                                                <!-- <div class="col-sm-3 mb-2">
                          <h6 class="mb-0">Secondary Mobile</h6>
                        </div> -->
                                                <div class="col-sm-9 text-secondary mb-2">
                                                    <h6 style="display:inline-block">Secondary mobile:</h6>
                                                    <?php echo $providerDetials->secondary_mobile;?>
                                                </div>

                                            </div>

                                            <h5 style="color:black">Categories</h5>
                                            <div class="row border  rounded p-3 mb-4">
                                                <div>
                                                    <button type="button" class="btn btn-info"
                                                        style="margin-right: 15px;">Cook</button>
                                                    <button type="button" class="btn btn-info">Massager</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                <?php 

              // Step 1: Retrieve Child Data from API
              $apiUrl = "http://3.6.48.68/social_app/public/api/show-service-provider/details/" . $receivedData;
              $ch = curl_init($apiUrl);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              $response = curl_exec($ch);

                // print_r($response);
                if ($response === false) {
                  echo "Failed to retrieve child data from API";
              } else {
                  $childData = json_decode($response);
                  // print_r($childData);

                  // $category = $childData->data->category->business_name;
                  $businessAddress = $childData->data->business_details->business_name;
                  $buinessEmail = $childData->data->business_details->business_email;
                  $buinessMobile = $childData->data->business_details->business_mobile_num;
                  $country = $childData->data->business_address->country;
                  $state = $childData->data->business_address->state;
                  $city = $childData->data->business_address->city;
                  $address = $childData->data->business_address->address;
                  $pincode = $childData->data->business_address->pin_code;


                  // foreach ($childData->data as $categoryName) {
                  //   $category = $categoryName->provider_categories->category;
                  //   // $longitude = $category->business_address->longitude;
                
                  //   echo "Provider name: $category";
                  //   echo "<br>";                    
                  // }
                  
                  }

                  curl_close($ch);
              ?>



                            <!-- test -->
                            <div class="container card overflow-hidden">
                                <div class="row gx-5 my-4">
                                    <div class="col">
                                        <div class="p-3">
                                            <h5 class="d-flex align-items-center mb-3" style="color:black">Business
                                                Details</details>
                                            </h5>

                                            <div class="row border  rounded p-3 "
                                                style="padding-bottom:70px !important;">


                                                <div class="col-sm-3 mb-2">
                                                    <h6 class="mb-0">Business Name : </h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary mb-2">
                                                    <?php echo $businessAddress;?>
                                                </div>
                                                <div class="col-sm-3 mb-2">
                                                    <h6 class="mb-0">Business Email : </h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary mb-2">
                                                    <?php echo $buinessEmail;?>
                                                </div>
                                                <div class="col-sm-3 mb-2">
                                                    <h6 class="mb-0">Business Mobile : </h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary mb-2">
                                                    <?php echo $buinessMobile;?>
                                                </div>



                                                <!-- <div class="col-sm-9 text-secondary mb-2">

                        </div> -->
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col">
                                        <div class="p-3 ">
                                            <h5 class="d-flex align-items-center mb-3" style="color:black">Business
                                                Address</Address>
                                                </details>
                                            </h5>
                                            <div class="row border rounded p-3 mb-3">

                                                <div class="col-sm-3 mb-2">
                                                    <h6 class="mb-0">Country</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary mb-2">
                                                    <?php echo $country;?>
                                                </div>
                                                <div class="col-sm-3 mb-2">
                                                    <h6 class="mb-0">State</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary mb-2">
                                                    <?php echo $state;?>
                                                </div>
                                                <div class="col-sm-3 mb-2">
                                                    <h6 class="mb-0">City</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary mb-2">
                                                    <?php echo $city;?>
                                                </div>
                                                <div class="col-sm-3 mb-2">
                                                    <h6 class="mb-0">Address</Address>
                                                    </h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary mb-2">
                                                    <?php echo $address;?>
                                                </div>
                                                <div class="col-sm-3 mb-2">
                                                    <h6 class="mb-0">Pincode</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary mb-2">
                                                    <?php echo $pincode;?>
                                                    <div class="col-sm-9 text-secondary mb-2">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- test -->
                            </div>
                            <div class="modal" tabindex="-1">

                            </div>

                            <!-- / Content -->
                            <!-- Button trigger modal -->


                            <!-- Modal -->
                            <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit profile</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                                    <input type="name" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp">
                                                    <div id="name" class="form-text"></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Email
                                                        address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp">
                                                    <div id="emailHelp" class="form-text"></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Mobile
                                                        number</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp">
                                                    <div id="emailHelp" class="form-text"></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Gender</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp">
                                                    <div id="emailHelp" class="form-text"></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Secondary
                                                        Email</label>
                                                    <input type="password" class="form-control"
                                                        id="exampleInputPassword1">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Secondary
                                                        mobile:</label>
                                                    <input type="password" class="form-control"
                                                        id="exampleInputPassword1">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn rounded-pill btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn rounded-pill btn-info">Save
                                                changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                            <p>Are you sure want to delete account</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn rounded-pill btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button"
                                                class="btn rounded-pill btn-danger ">Deactivate</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Footer -->
                            <?php require 'Components/footer.php'; ?>
                            <!-- /Footer -->