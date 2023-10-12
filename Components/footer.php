<footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl flex-wrap text-center py-2 ">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>, made by
                  <a href="" target="_blank" class="footer-link fw-bolder">Ruchi</a>
                </div>               
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->   

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!--Sweet Alert js  -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php         
      if(isset($_SESSION['status']) && $_SESSION['status'] !='')
          {
            ?>              
              <script>
                swal({
                  title: "<?php echo $_SESSION['status']?>",
                  // text: "You clicked the button!",
                  icon: "<?php echo $_SESSION['status_code']?>",
                  button: "Okay!",
                });
              </script>
              <?php
              unset($_SESSION['status']);
          }
    ?>

    
    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- ck editor -->
    <script src="ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckEditor');
        CKEDITOR.replace('updateCkEditor');
    </script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>
    
  </body>
</html>