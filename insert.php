<?php
  include("dbconnction.php");
  if(isset($_REQUEST['submit'])){
    $uname=$_REQUEST['name'];
    $pass=$_REQUEST['pwd'];
    $date=$_REQUEST['dt'];
      if(isset($_REQUEST['gender'])){
          $gender=$_REQUEST['gender'];
      }
    $email=$_REQUEST['email'];

    if($uname!=" " && $pass!=" " && $date!=" " && $gender!=" " && $email!=" "){
      $query=" INSERT INTO users(uname,password1,date1,Gender,email) VALUES('$uname','$pass','$date','$gender','$email')";
      $ins=mysqli_query($conn,$query);
    }
    if($ins)
        header("location:registration.php?msg=inserted");
    else
        header("location:registration.php?msg=not_inserted");
  }

?>