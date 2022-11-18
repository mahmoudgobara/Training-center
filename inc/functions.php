<?php

function ifexits($email)
{
    global $connection;
    $sql_query = " SELECT * FROM user where email = '$email'";
    $check_query = mysqli_query($connection,$sql_query);

    if(mysqli_num_rows($check_query) > 0)
    {
        return true;
    }
    else
    {
        return false;
    }

}

function checkexits($username)
{
    global $connection;
    $sql_query = " SELECT * FROM user where username = '$username'";
    $check_query = mysqli_query($connection,$sql_query);

    if(mysqli_num_rows($check_query) > 0)
    {
        return true;
    }
    else
    {
        return false;
    }

}

// Check Validation Error or Success
function error_msg($error,$classname)
{
    $message = <<<TEXT
    <div class="alert alert-$classname">
    $error
    </div>
    TEXT;
return $message;

}




// Register a new User
function register(){

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        global $connection;
        $username = $_POST['username'] ;
        $country = $_POST['country'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $errors = [];

        if($username == '' || $country == '' || $email == '' || $password == '')
        {
            $errors[] = error_msg("Please Fill All Fields",'danger');
  
        }

        if(ifexits($email))
        {   
            $errors[] = error_msg("Sorry Email " . $email . " " . "Already Exists",'danger');


        }

        if(checkexits($username))
        {   
            $errors[] = error_msg("Sorry this username Already Exists",'danger');


        }

        if(strlen($password) < 5)
        {
            $errors[] = error_msg("Password should be atleast 5 characters",'danger');
        }

        if(empty($errors))
        {
            $sql_query  = "Insert into user(username,email,country,password) VALUES ";
            $sql_query .= "('$username','$email','$country',md5('$password'))";
    
            mysqli_query($connection , $sql_query);

            echo error_msg("Inserted Successfully!",'success');

        }
    
        foreach($errors as $era)
        {
            echo $era;
        }

        }


}


function getRole($username){
    global $connection;

    $sql_query = "SELECT role from user where username = '$username' ";
    $send_query = mysqli_query($connection, $sql_query);

    while($rows = mysqli_fetch_assoc($send_query)){

        return $rows['role'];
    }
}


function login()
{
    global $connection;
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $username  =  $_POST['username'];
    $password  =  md5($_POST['password']);
    $sql_query = " SELECT * from user where username ='$username' AND password = '$password' ";
    
    $send_query = mysqli_query($connection,$sql_query);



    
    if(mysqli_num_rows($send_query) > 0)
    {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = getRole($username);
        header('Location: index.php');
    }
    else
    {
       echo error_msg("Username or Password is incorrect",'danger');
    }
    }


}



function showAllCoursesAjax(){
  global $connection;

    $sql_query = "SELECT * from course";
    $send_query = mysqli_query($connection,$sql_query);

    while($rows = mysqli_fetch_assoc($send_query))
    {
        ?>

            <tr>
             <td><?= $rows['course_name'] ?></td>
             <td><?= $rows['course_price'] ?></td>
             <td><?= $rows['course_content'] ?></td>
             <td><?= $rows['course_date']  ?></td>
            

             
             <?php 
             
              if(getRole($_SESSION['username']) == 'admin'){  

                ?>
<td><a class="btn btn-success" href="update.php?id=<?= $rows['id'] ?>" >Update</a>  </td>
             <td><a href="delete.php?id=<?= $rows['id'] ?>" onclick="return confirm('Are you sure you want to delete <?= $rows['course_name'] ?>')"><i class="bi bi-x-circle-fill"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
</svg></i></a></td>
                <?php
             }else{
              return false;
             }
              ?>
             
           </tr>
    <?php
      
        

    }
}



function parameterschecking()
{
    if(!empty($_GET['param']))

    {
      $get_value =  $_GET['param'];
        
    }
    else

    {
       $_GET['param'] = '';

       $get_value = ''; 
    }
    
    switch($get_value)
    {
        case 'add_newcourse':
            include('./add_newcourse.php');
            break;

        case 'show_course':
                include('./show_all_courses.php');
            break;
        
        
        
            case 'show_std_enrollments':
                include('./show_std_enrollments.php');
            break;

        case 'add_new_instc':
              include('./add_new_instc.php');
            break;
        
        
        case 'add_new_std':
              include('./add_new_std.php');
            break;

        case 'assing_course_instc':
                include('./assign_course_instc.php');
            break;
        
        
        case 'assign_course_std':
                include('./assign_course_std.php');
            break;


        

        default:
            include('./show_all_courses.php');

            break;
    }


}




function ShowSpecificCourse(){
    global $connection;
    $sql_query = "SELECT * from course where id  = '".$_GET['id']."' "; 

$send_query = mysqli_query($connection , $sql_query);







while($rows = mysqli_fetch_assoc($send_query)){






    ?>



<form class="pt-3" method="POST" action="<?= $_SERVER['PHP_SELF'] . '?id=' . $_GET['id'] ?>" enctype="multipart/form-data">


    
                <div class="form-group">
                  <label>Course Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input name="coursename" value="<?= $rows['course_name'] ?>" type="text" class="form-control form-control-lg border-left-0" placeholder="Course Name">
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
                    <input name="courseprice" type="number" value="<?= $rows['course_price'] ?>" class="form-control form-control-lg border-left-0" placeholder="Course Price">
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
                    <input name="coursecontent" type="text" value="<?= $rows['course_content'] ?>" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Course Content">                        
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
                    <input name="coursecrate" type="number" value="<?= $rows['course_rate'] ?>" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Course Rate">                        
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
                    <input name="coursedate" type="datetime-local" value="<?= $rows['course_date'] ?>" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Course Rate">                        
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
                    <input name="courseimg" type="file" value="<?= $rows['course_img'] ?>" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Course Rate">                        
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
                  <button name="updateCourse" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Update Course</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.php" class="text-primary">Login</a>
                </div>
              </form>


<?php


 
}
}



function updateCourseInfo(){
    global $connection;


    if(isset($_POST['updateCourse'])){
        // $idValue = $_POST['idValue'];
        $course_name = $_POST['coursename'];
        $course_price = $_POST['courseprice'];
        $course_content = $_POST['coursecontent'];
        $course_date = $_POST['coursedate'];
        $course_rate = $_POST['coursecrate'];
        $course_img = $_FILES['courseimg']['name'];
        $course_img_size = $_FILES['courseimg']['size'];
        $course_img_type = $_FILES['courseimg']['type'];
        $course_img_error = $_FILES['courseimg']['error'];
        $course_img_tmp_dir = $_FILES['courseimg']['tmp_name'];

        $fileDestination = "imgs/" . $course_img;




        
        // echo dirname(__FILE__);

        $course_dirname = dirname($_SERVER['PHP_SELF']) . '/';

        $course_hostname = $_SERVER['HTTP_HOST'];

        $course_full_img = $course_hostname . $course_dirname . $fileDestination;

        

        move_uploaded_file($course_img_tmp_dir, $fileDestination);

        $sql_query = "UPDATE course SET course_name = '$course_name' ,
         course_price = '$course_price' ,  ";
        $sql_query .= " course_content = '$course_content' , course_date = '$course_date' ,course_rate = '$course_rate' , course_img = '$fileDestination'  where id = '".$_GET['id']."' ";

        $send_query = mysqli_query($connection, $sql_query);
        
        if($send_query){
            echo error_msg("Course Id No. '".$course_name."' Successfully Updated",'success');

        }else{
            echo error_msg("Error throw Update a course",'danger');

        }
    }

    
}





function AddNewcourse(){
  global $connection;

  if($_SERVER['REQUEST_METHOD'] == "POST"){

    $course_name = $_POST['coursename'];
    $course_price = $_POST['courseprice'];
    $course_rate = $_POST['courserate'];
    $course_content = $_POST['coursecontent'];
    $course_date = $_POST['coursedate'];
    
    $sql_query = "INSERT INTO course (course_name, course_price, course_rate, course_content, course_date) ";
    $sql_query .= " VALUES('$course_name', '$course_price', '$course_rate', '$course_content', '$course_date') ";

    $send_query = mysqli_query($connection, $sql_query);

    if($send_query){
      echo error_msg("New course $course_name added",'success');
    }else{
      echo error_msg("Can not Add a new course",'danger');
    }


  }
  
}




function deleteCourse(){
  global $connection;

  $getId = $_GET['id'];
  $sql_query = "DELETE FROM course where id = '$getId' ";
  $send_query = mysqli_query($connection, $sql_query);

  if($send_query){
    header('Location: index.php?param=show_course');
  }
}




function SearchForm(){

  global $connection;

  if(isset($_POST['inputs'])){
    $searchData = $_POST['inputs'];

    $sql_query = "SELECT * from course where course_name LIKE '$searchData%' ";
    $send_query = mysqli_query($connection, $sql_query);

    while($rows = mysqli_fetch_assoc($send_query)){

      ?>

            <tr>
             <td><?= $rows['course_name'] ?></td>
             <td><?= $rows['course_price'] ?></td>
             <td><?= $rows['course_content'] ?></td>
             <td><?= $rows['course_date'] ?></td>

             <?php
             if(getRole($_SESSION['username']) == 'admin'){ 
              ?>
             
           </tr>
    <?php
             }

    }

  }

}
 


function totalCoursesCount(){
  global $connection;

  $sql_query = "SELECT COUNT(*) course_counter from course";

  $send_query = mysqli_query($connection, $sql_query);

  while($results = mysqli_fetch_assoc($send_query)){
    echo $results['course_counter'];
  }

   

}


function totalstudents(){
  global $connection;

  $sql_query = "SELECT COUNT(*) student_counter from student";

  $send_query = mysqli_query($connection, $sql_query);

  while($results = mysqli_fetch_assoc($send_query)){
    echo $results['student_counter'];
  }

}

function totalinstructors(){
  global $connection;

  $sql_query = "SELECT COUNT(*) instructor_counter from instructor";

  $send_query = mysqli_query($connection, $sql_query);

  while($results = mysqli_fetch_assoc($send_query)){
    echo $results['instructor_counter'];
  }

}











function AddNewInstc(){
  global $connection;

  if($_SERVER['REQUEST_METHOD'] == "POST"){

    $instc_name = $_POST['instc_name'];
    $instc_gender = $_POST['instc_gender'];
    $instc_email = $_POST['instc_email'];


    $sql_query = "INSERT INTO instructor(instructor_name, gender, email) ";
  $sql_query .= " VALUES('$instc_name', '$instc_gender', '$instc_email')";

  $send_query = mysqli_query($connection, $sql_query);

  if($send_query){
    return error_msg('Success Added ','success');
    }else{
    return   error_msg('error in addition','danger');
    }
  }

  
}



function getAllBranchName(){
  global $connection;

  $sql_query = "SELECT * from branch";
  $send_query = mysqli_query($connection, $sql_query);

  while($results = mysqli_fetch_assoc($send_query)){

      ?>

    <option value="<?= $results['id'] ?>"><?= $results['branch_name'] ?></option>

<?php
  }
}




function getAllCourseName(){
  global $connection;

  $sql_query = "SELECT * from course";
  $send_query = mysqli_query($connection, $sql_query);

  while($results = mysqli_fetch_assoc($send_query)){

      ?>

    <option value="<?= $results['id'] ?>"><?= $results['course_name'] ?></option>

<?php
  }
}






function getAllInstcName(){
  global $connection;

  $sql_query = "SELECT * from instructor";
  $send_query = mysqli_query($connection, $sql_query);

  while($results = mysqli_fetch_assoc($send_query)){

      ?>

    <option value="<?= $results['id'] ?>"><?= $results['instructor_name'] ?></option>

<?php
  }
}






function getAllStdName(){
  global $connection;

  $sql_query = "SELECT * from student";
  $send_query = mysqli_query($connection, $sql_query);

  while($results = mysqli_fetch_assoc($send_query)){

      ?>

    <option value="<?= $results['id'] ?>"><?= $results['student_name'] ?></option>

<?php
  }
}

function AddNewStd(){
  global $connection;

  if($_SERVER['REQUEST_METHOD'] == "POST"){

    $std_name = $_POST['std_name'];
    $std_gender = $_POST['std_gender'];
    $std_phone = $_POST['std_phone'];
    $branch_name = $_POST['branch_name'];


    $sql_query = "INSERT INTO student(student_name, gender, phone, branch_id) ";
  $sql_query .= " VALUES('$std_name', '$std_gender', '$std_phone', '$branch_name')";

  $send_query = mysqli_query($connection, $sql_query);

  if($send_query){
    return error_msg('Success Added a new Student','success');
    }else{
    return   error_msg('Can\'t add a new Student','danger');
    }
  }

  
}




function AssignCourseInstc(){
  global $connection;

 if($_SERVER['REQUEST_METHOD'] == "POST"){

  $course_id = $_POST['course_name'];
  $instc_id = $_POST['instc_name'];


  $sql_query = "INSERT INTO instructor_course (course_id, instructor_id)  ";
  $sql_query .= " values ('$course_id', '$instc_id')  ";

  $send_query = mysqli_query($connection, $sql_query);

  if($send_query){
   return error_msg('Assigned a new Course to Instructor successfully','success');
  }else{
    return  error_msg('Can\'t Assign a new course to Instructor','danger');

  }
 }
}








function AssignCourseStd(){
  global $connection;

 if($_SERVER['REQUEST_METHOD'] == "POST"){

  $course_id = $_POST['course_name'];
  $student_id = $_POST['std_name'];


  $sql_query = "INSERT INTO student_course (course_id, student_id)  ";
  $sql_query .= " values ('$course_id', '$student_id')  ";

  $send_query = mysqli_query($connection, $sql_query);

  if($send_query){
   return error_msg('Assigned a new Course to Student successfully','success');
  }else{
    return  error_msg('Can\'t Assign a new course to Student','danger');

  }
 }
}






function showallcourses()
{
    global $connection;

    $sql_query = "SELECT * from course";
    $send_query = mysqli_query($connection,$sql_query);

    while($results = mysqli_fetch_assoc($send_query))
    {
        ?>

            <tr>
             <td><?= $results['course_name'] ?></td>
             <td><?= $results['course_price'] ?></td>
             <td><?= $results['course_content'] ?></td>
             <td><?= $results['course_date']  ?></td>
             

             
             
             
    <?php
      
        

    }

}


function showallStdCourses(){
  global $connection;

  $sql_query = "SELECT student.student_name std_name ,  student.gender std_gender , 
  student.phone std_phone, course.course_name crse_name, course.course_price crse_price , course.course_rate
  crs_rate, course.course_date crs_date from student
  INNER JOIN student_course ON student_course.student_id = student.id 
  INNER JOIN course ON student_course.course_id = course.id";

  $send_query = mysqli_query($connection, $sql_query);

  while($results = mysqli_fetch_assoc($send_query)){


    ?>

            <tr>
             <td><?= $results['std_name'] ?></td>
             <td><?= $results['std_gender'] ?></td>
             <td><?= $results['std_phone'] ?></td>
             <td><?= $results['crse_name']  ?></td>
             <td><?= $results['crse_price']  ?></td>
             <td><?= ($results['crs_rate'] == 1) ? '⭐' : 
             
             ($results['crs_rate'] == 2) ? '⭐⭐' : 
              ($results['crs_rate'] == 3) ? '⭐⭐⭐' : ($results['crs_rate'] == 4) ? '⭐⭐⭐⭐' :
              ($results['crs_rate'] == 5) ? '⭐⭐⭐⭐⭐' : '✰✰✰✰✰'
             ?></td>
             <td><?= $results['crs_date']  ?></td>

             
             
             <?php 


  }
}

?>