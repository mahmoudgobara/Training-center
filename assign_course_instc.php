<?php
include('includes/header.php');

// include('inc/init.php');




?>


<?= AssignCourseInstc() ?>

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-12 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <!-- <div class="brand-logo">
                <img src="images/logo.svg" alt="logo">
              </div> -->
              <h6 class="font-weight-light">Add New Student</h6>
              <form class="pt-3" method="POST" action="">
                
                <div class="form-group">
                  <label>Instructor Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>

                    <select name="instc_name" id="">
                        <?= getAllInstcName() ?>
                    </select>

                </div>
                </div>





                <div class="form-group">
                  <label>Course Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>

                    <select name="course_name" id="">
                        <?= getAllCourseName() ?>
                    </select>

                </div>
                </div>



                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Assign Instructor Course</button>
                </div>
                
              </form>
            </div>
          </div>
          <!-- <div class="col-lg-6 register-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2020  All rights reserved.</p>
          </div> -->
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->





<?php

include('includes/footer.php');

?>