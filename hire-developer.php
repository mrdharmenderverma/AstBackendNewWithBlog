<?php 

 
// include 'login/database/_dbconnect.php';  

// $api_url = 'http://localhost/ast_project/rest_api/hire_developer.php';

// Read JSON file
// $json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
// $response_data = json_decode($json_data);

// All user data exists in 'data' object
// $user_data = $response_data->data;

// Cut long data into small & select only first 10 records
// $user_data = array_slice($response_data, 0, 100);

// Print data if need to debug
//print_r($user_data);

// Traverse array and display user data

?>


<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">
<!-- Head Section-->
<?php $title ='Hire Developer Query - Avtar Space Technology'; $page = 'service provider'; $active = 'form'; require 'Components/head.php';?>
<!-- /Head Section-->

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu Sidebar Component-->
            <?php require 'Components/sidebar.php';?>
            <!-- / Menu Sidebar Component-->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar Component-->
                <?php require 'Components/navbar.php';?>
                <!-- / Navbar Component-->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold text-center py-3 mb-4">Hire Developer</h4>

                        <!-- Basic Table -->
                        <div class="card">
                            <h5 class="card-header">Hire Developer Query</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Name</th>
                                            <th>Company Name</th>
                                            <th>Company Email</th>
                                            <th>Contact No.</th>
                                            <th>Select Developer</th>
                                            <th>Developer Details</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody class="table-border-bottom-0" id="load-table">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/ Basic Table -->
                    </div>
                    <!-- / Content -->

                    <!-- Button trigger modal -->
                    
                    <!--Query Fetching Data from Database-->
                    <script type="text/javascript">
                    $(document).ready(function() {
                        //Fetch All Records
                        function loadTable() {
                            $("#load-table").html("");
                            $.ajax({
                                url: 'https://avtarspace.com/ast_backend/rest_api/hire_developer.php',
                                type: "GET",
                                success: function(data) {
                                    if (data.status == false) {
                                        $("#load-table").append("<tr><td colspan='6'><h2>" + data
                                            .message + "</h2></td></tr>");
                                    } else {
                                        $.each(data, function(key, value) {
                                            $("#load-table").append("<tr>" +
                                                "<td><i class='fab fa-react fa-lg text-info me-3'></i><strong>" +
                                                value.id + "</strong></td>" +
                                                "<td>" + value.name + "</td>" +
                                                "<td>" + value.company_name + "</td>" +
                                                "<td>" + value.company_email + "</td>" +
                                                "<td>" + value.phone + "</td>" +
                                                "<td>" + value.select_developer + "</td>" +
                                                "<td>" + value.developer_details + "</td>" +
                                                // "<td><img src='assets/img/WhatsApp.webp' class='edit-btn' style='width:50%;' data-eid='" +
                                                // value.id + "'/></td>" +
                                                "<td><img src='assets/img/WhatsApp.webp' class='whats-btn' style='width:50%; padding-right:20px;' data-bs-toggle='modal' data-bs-target='#whatappMessage' data-id='" +
                                                value.id + "'/> <img src='assets/img/logo-gmail.png' class='email-btn' style='width:50%; padding-right:20px;' data-bs-toggle='modal' data-bs-target='#serviceProvider' data-eid='" +
                                                value.id + "'></td>" +
                                                "</tr>");
                                                
                                        });
                                    }
                                }
                            });
                        }

                        loadTable();
                        
                        // Function for form Data to JSON Object
                        function jsonData(targetForm){
                            var arr = $(targetForm).serializeArray();
                            
                            var obj = {};
                            for(var a= 0; a < arr.length; a++){
                                if(arr[a].value == ""){
                                return false;
                                }
                                obj[arr[a].name] = arr[a].value;
                            }
                            
                            var json_string = JSON.stringify(obj);

                            return json_string;                            
                        }
                        
                        
                        //Fetch Single Record : Show in Modal Box
                        $(document).on("click",".email-btn",function(response){
                            // $("#exampleModal").show();
                            var sevice_provider_id = $(this).data("eid");
                            //Convert into object
                            var obj = {sid : sevice_provider_id};
                            //convert into obj into json format
                            var myJSON = JSON.stringify(obj);
                            // console.log(myJSON);

                            $.ajax({
                            url : 'https://avtarspace.com/ast_backend/rest_api/api-fetch-single.php',
                            type : "POST",
                            data : myJSON,
                            success : function(data){
                                // console.log(data);
                                $("#edit-id").val(data[0].id);
                                // $("#first_name").val(data[0].name);
                                // $("#last_name").val(data[0].lname);
                                // $("#form_address").val(data[0].address);
                                // $("#form_query").val(data[0].query);
                                
                                // for making email dynmic
                                 $("#form_email_address").val(data[0].company_email);
                                 
                                //  for getting email over fontend
                                 $("#email_address").val(data[0].company_email);
                                 
                                $("#form_mobile").val(data[0].phone);
                                // $("#form_message").val(data[0].message);
                            }
                            });
                        });
                        // for whatsapp
                        $(document).on("click",".whats-btn",function(response){
                            // $("#exampleModal").show();
                            var sevice_provider_id = $(this).data("id");
                            //Convert into object
                            var obj = {sid : sevice_provider_id};
                            //convert into obj into json format
                            var myJSON = JSON.stringify(obj);
                            // console.log(myJSON);

                            $.ajax({
                            url : 'https://avtarspace.com/ast_backend/rest_api/api-fetch-single.php',
                            type : "POST",
                            data : myJSON,
                            success : function(data){
                                // console.log(data);
                                $("#whatsAppId").val(data[0].id);
                                // for making email dynmic
                                //  $("#form_email_address").val(data[0].company_email);
                                 
                                //  for getting email over fontend
                                //  $("#email_address").val(data[0].company_email);
                                 
                                $("#whatAppMobile").val(data[0].phone);
                                // $("#form_message").val(data[0].message);
                            }
                            });
                        });
                        // for whatsapp
                    });
                    </script>
                    
                    <!--for Whatsapp msg-->
                    <!--<div id="whatsAppUsers">
                        <form method="POST" action="include/whatsapp-msg.php">
                            <input type="hidden" class="form-control" id="whatsAppId" name="">
                            <input type="hidden" class="form-control" id="whatAppMobile" name="userContact" >
                            <input type="submit" class="btn btn-primary" value="Send Mail">
                        </form>
                    </div> -->       
                    <!--for Whatsapp msg-->
                    
                    
                    
                    
                    
                    <!--Whatsapp Msg Modal -->
                    <div class="modal fade" id="whatappMessage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Send Whatsapp Message</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="include/whatsapp-msg.php">
                                <input type="hidden" class="form-control" id="whatsAppId" name="">
                                <input type="text" class="form-control mb-3" id="whatAppMobile" name="userContact" >
                                <input type="submit" class="btn btn-primary" value="Send Message">
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Whatsapp msg-->
                    
                    
                    <!--Model-->
                    <div class="modal fade" id="serviceProvider" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Send Mail Query</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="include/hire-developer-mail.php">
                                        <div class="mb-3">
                                            <input type="hidden" class="form-control" id="edit-id" name="sid" value="">
                                        </div>
                                        <!--This section working for making email dynamic to email form-->
                                        <div class="mb-3">
                                            <input type="hidden" class="form-control" id="form_email_address" name="userEmail" value="">
                                        </div>
                                        <!--This section working for making email dynamic to email form-->
                                        
                                        <div class="mb-3">
                                            <label for="form_name" class="form-label">To</label>
                                            <input type="text" class="form-control" id="email_address" name="sender_To" value="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="company_name" class="form-label">Subject</label>
                                            <input type="text" class="form-control" id="" name="sender_subject">
                                        </div>                                        
                                        <div class="mb-3">
                                            <textarea class="form-control" placeholder="Enter message here"
                                                id="" style="height: 100px" name="sender_message"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary" value="Send Mail">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <?php require 'Components/footer.php';?>