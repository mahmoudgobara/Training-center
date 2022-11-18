<?php
include('includes/header.php');

// include('inc/init.php');




?>


<?= AddNewStd() ?>

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
                  <label>Student Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input name="std_name" type="text" class="form-control form-control-lg border-left-0" placeholder="student Name">
                  </div>
                </div>
                <div class="">
                  <label>Student Gender</label>
                  <div class="input-group py-5">
                    <div class="input-group-prepend bg-transparent">
                      <!-- <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-email-outline text-primary"></i>
                      </span> -->
                    </div>
                    <span>Male </span> <input name="std_gender" type="radio" value="male"    >
                    <span>Female </span> <input name="std_gender" type="radio" value="female" >
                  </div>
                </div>
                
                

                <div class="form-group">
                  <label>Student Phone</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input name="std_phone" type="text" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Student Phone">                        
                  </div>
                </div>
                

                <div class="form-group">
                  <label>Branch Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>

                    <select name="branch_name" id="">
                        <?= getAllBranchName() ?>
                    </select>

                </div>
                </div>



                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Add New Instructor</button>
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