<?php
include('includes/header.php');

// include('inc/init.php');


AddNewcourse();

?>


<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-12 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <!-- <div class="brand-logo">
                <img src="images/logo.svg" alt="logo">
              </div> -->
              <h6 class="font-weight-light">Add New Course</h6>
              <form class="pt-3" method="POST" action="">
                <div class="form-group">
                  <label>Course Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input name="coursename" type="text" class="form-control form-control-lg border-left-0" placeholder="Course Name">
                  </div>
                </div>
                <div class="form-group">
                  <label>Course Price</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-email-outline text-primary"></i>
                      </span>
                    </div>
                    <input name="courseprice" type="number" class="form-control form-control-lg border-left-0" placeholder="Course Price">
                  </div>
                </div>
                
                <div class="form-group">
                  <label>Course Content</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input name="coursecontent" type="text" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Course Content">                        
                  </div>
                </div>

                <div class="form-group">
                  <label>Course Rate</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input name="courserate" type="number" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Course Rate">                        
                  </div>
                </div>



                <div class="form-group">
                  <label>Course Date</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input name="coursedate" type="datetime-local" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Course Rate">                        
                  </div>
                </div>

                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Add New Course</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.php" class="text-primary">Login</a>
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