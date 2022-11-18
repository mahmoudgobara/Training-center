<?php

include('inc/init.php');



include('includes/header.php');

include('includes/navbar.php');

  $something = $_SESSION['username'] ? true : false;


  if(!isset($_SESSION['username']))
  {
      // not logged in
      header('Location: login.php');
      exit();
  }
  


?>

  
    



    <div class="container-fluid page-body-wrapper">
     
    <?php     include('includes/sidebar.php');         ?>

   
      <div class="main-panel">
        <div class="content-wrapper">
          
         
        <?php    include('includes/statistics.php');                   ?>  

          


    



  <?= parameterschecking(); ?>
          
        </div>
        <!-- content-wrapper ends -->
        <?php
        include('includes/footer.php'); 
        ?>

