/*
This file is used for inserting new users to the db and setting a cookie of the current user
*/
<?php
  # logs all errors to html for debugging 
  ini_set('display_errors',1);
  error_reporting(-1);
  # gives access to our database through $conn variable
  include_once '../../inc/dbinfo.inc'; 

  $email = $_POST['Email'];
  $username = $_POST['username'];
  $password = $_POST['Password'];
  $conPassword = $_POST['confirmPassword'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $age = $_POST['age'];
  $remember = $_POST['remember'];

  $createUserSt = "INSERT INTO User(username, password, fname, lname, email, age) VALUES('$username', '$password', '$fname', '$lname', '$email', $age)";
  
  $rs = mysqli_query($conn, $createUserSt);
  
  if ($remember and mysqli_affected_rows($conn) == 1)
  {
    # sets cookie to expire in 30 days   
    setcookie('username', $username, time() + 2592000, $path='/');
    header('Location: ../index.php');
  }else if(mysqli_affected_rows($conn) == 1){
      setcookie('username', $username, time()+3600, $path='/');
      header('Location: ../index.php');
  }else
  {
    setcookie('failed', true, time() + 20,$path='/');
    header('Location: signup.php');
  }
  

?>

