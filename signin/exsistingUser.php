/*
This file processes the form and inserts the data into the db if it is a valid user. sets a cookie for the current user to be signed it
*/
<?php
  # logs all errors to html for debugging 
  ini_set('display_errors',1);
  error_reporting(-1);
  # gives access to our database through $conn variable
  include_once '../../inc/dbinfo.inc'; 

  $username = $_POST['username'];
  $password = $_POST['password'];
  $remember = $_POST['remember'];

  $checkUserSt = "SELECT password FROM User WHERE username='$username'";
  
  $rs = mysqli_query($conn, $checkUserSt);
  
  $numberOfItems =  mysqli_num_rows($rs);

  if($numberOfItems == 0){
      setcookie('noUser', true, time()+20,'/');
      header('Location: signin.php');
  }else{ 
    $item = mysqli_fetch_assoc($rs);  
    if ($remember and strcmp($item['password'], $password) == 0)
    {  
    # sets cookie to expire in 30 days   
    setcookie('username', $username, time() + 2592000, $path='/');
    header('Location: ../index.php');
    }else if(strcmp($item['password'], $password) != 0) 
    {
      setcookie('incorrectPassword', true, time() + 30,'/');
      setcookie('username_entered',$username,time()+30,'/');
      header('Location: signin.php');
    }else{
      setcookie('username', $username, time()+3600, $path='/');
      header('Location: ../index.php');
    }
}
  
?>
