<?php
 include 'login/database/_dbconnect.php';    
 session_start();
//   print_r($_SESSION);
  
 $username = $_SESSION['username'];
 $sqlquery= "SELECT * FROM `users` where username = '".$username."' ";
 $num = mysqli_query($conn, $sqlquery);
 
 $numarr= mysqli_fetch_array($num);

?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default">
  <!-- Head -->
  <?php require 'Components/head.php';?>
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href=""><i class="bx bx-user me-1"></i> Account</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages-account-settings-notifications.html"
                        ><i class="bx bx-bell me-1"></i> Notifications</a
                      >
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="pages-account-settings-connections.html"
                        ><i class="bx bx-link-alt me-1"></i> Connections</a
                      >
                    </li> -->
                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="assets/img/avatars/1.png"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        <div class="button-wrapper">
                          <!--<label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg"
                            />
                          </label>-->
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block"><a href="edit-profile.php?id<?php echo $name= $numarr['id'];?>">Edit</a></span>
                          </button>

                          <!--<p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>-->
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <!--<form id="formAccountSettings" method="POST" onsubmit="return false">-->
                        
                            <div class="row">
                              <div class="mb-3 col-md-6">
                                <label class="form-label">First Name : <?php echo $name= $numarr['first_name'];?></label>
                              </div>
                              <div class="mb-3 col-md-6">
                                <label class="form-label">Last Name: <?php echo $name= $numarr['last_name'];?></label>
                              </div>
                              <div class="mb-3 col-md-6">
                                <label class="form-label">Email: <?php echo $name= $numarr['email'];?></label>
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="organization" class="form-label">Organization: <?php echo $name= $numarr['organization'];?></label>
                              </div>
                              <div class="mb-3 col-md-6">
                                <label class="form-label" for="phoneNumber">Phone Number: <?php echo $name= $numarr['number'];?></label>
                                <!--<div class="input-group input-group-merge">
                                  <span class="input-group-text">INR (+91)</span>
                                  <input
                                    type="text"
                                    id="phoneNumber"
                                    name="phoneNumber"
                                    class="form-control"
                                    placeholder="202 555 0111"
                                  />
                                </div>-->
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">Address: <?php echo $name= $numarr['address'];?></label>
                                <!--<input type="text" class="form-control" id="address" name="address" placeholder="Address" />-->
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">State: <?php echo $name= $numarr['state'];?></label>
                                <!--<input class="form-control" type="text" id="state" name="state" placeholder="California" />-->
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="zipCode" class="form-label">Zip Code: <?php echo $name= $numarr['zip_code'];?></label>
                                <!--<input type="text" class="form-control" id="zipCode"  name="zipCode" placeholder="231465" maxlength="6" />-->
                              </div>                   
                            </div>   
                        <!--<div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Save changes</button>
                          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>-->
                      <!--</form>-->
                    </div>
                    <!-- /Account -->
                  </div>
                  <!--<div class="card">
                    <h5 class="card-header">Delete Account</h5>
                    <div class="card-body">
                      <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                          <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                          <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                      </div>
                      <form id="formAccountDeactivation" onsubmit="return false">
                        <div class="form-check mb-3">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            name="accountActivation"
                            id="accountActivation"
                          />
                          <label class="form-check-label" for="accountActivation"
                            >I confirm my account deactivation</label
                          >
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                      </form>
                    </div>
                  </div>-->
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <?php require 'Components/footer.php';?>
            <!-- /Footer -->

            
