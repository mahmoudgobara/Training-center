<?php 

include('./inc/init.php');


if(!$_SESSION['username'])
{
  header('Location : login.php');
}

include('includes/header.php');

include('includes/navbar.php');

// echo $_GET['id'];


?>


<div class="container-fluid page-body-wrapper">
     
    <?php     include('includes/sidebar.php');         ?>

   
      <div class="main-panel">
        <div class="content-wrapper">
          
         
        <?php    include('includes/statistics.php')                   ?>  

          <div class="row">






          <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Total sales</p>
                  <h1>$ 28835</h1>
                  <h4>Gross sales over the years</h4>
                  <p class="text-muted">Today, many people rely on computers to do homework, work, and create or store useful information. Therefore, it is important </p>
                  <div id="total-sales-chart-legend"></div>                  
                </div>
                <canvas id="total-sales-chart"></canvas>
              </div>
            </div>
          </div>


<?= updateCourseInfo() ?>



          



<?= ShowSpecificCourse()
 ?>
  
          
          
        </div>
        <!-- content-wrapper ends -->
        <?php
        include('includes/footer.php'); 
        ?>

