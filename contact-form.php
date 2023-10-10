
<?php 
// include 'login/database/_dbconnect.php';  

$api_url = 'https://avtarspace.com/ast_backend/rest_api/contact_form.php';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data);

// All user data exists in 'data' object
// $user_data = $response_data->data;

// Cut long data into small & select only first 10 records
$user_data = array_slice($response_data, 0, 100);

// Print data if need to debug
//print_r($user_data);

// Traverse array and display user data

?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <!-- Head -->
  <?php $title ='Contact Form - Avtar Space Technology'; $page = 'contact Form'; $active = 'form'; require 'Components/head.php';?>
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

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold text-center py-3 mb-4">Contact Form</h4>


              <!-- Striped Rows -->
              <div class="card">
                <!-- <h5 class="card-header">Striped rows</h5> -->
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <!-- <th>Mobile No.</th>
                        <th>Service Name</th> -->
                        <th>Message</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php foreach($user_data as $user)
                        { ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $user->id?></strong></td>
                        <td><?php echo $user->full_name?></td>
                        <td><?php echo $user->email_address?></td>
                        <td><?php echo $user->message?></td>
                        <!-- <td>Cook</td>
                        <td>Need Cook</td>                       -->
                      </tr> 
                      <?php }?>                    
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Striped Rows -->
            </div>
            
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="form_name" class="form-label">ENTER YOUR NAME</label>
                                            <input type="text" class="form-control" id="form_name"
                                                aria-describedby="emailHelp">                                      
                                        </div>
                                        <div class="mb-3">
                                            <label for="company_name" class="form-label">COMPANY NAME</label>
                                            <input type="text" class="form-control" id="company_name"
                                                aria-describedby="emailHelp">                                      
                                        </div>
                                        <div class="mb-3">
                                            <label for="company_email" class="form-label">COMPANY EMAIL</label>
                                            <input type="text" class="form-control" id="company_email"
                                                aria-describedby="emailHelp">                                      
                                        </div>
                                        <div class="mb-3">
                                            <label for="select_developer" class="form-label">SELECT DEVELOPER</label>
                                            <input type="text" class="form-control" id="select_developer"
                                                aria-describedby="emailHelp">                                      
                                        </div>
                                        <div class="mb-3">
                                            <label for="developer_details" class="form-label">DEVELOPER DETAILS</label>
                                            <input type="text" class="form-control" id="developer_details"
                                                aria-describedby="emailHelp">                                      
                                        </div>                                                      
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
            <!-- / Content -->

            <!-- Footer -->
            <?php require 'Components/footer.php';?>
            <!-- /Footer -->

