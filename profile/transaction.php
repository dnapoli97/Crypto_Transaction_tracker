/*
This file handles all insertions of transactions into the database
*/
<?php
  # logs all errors to html for debugging 
  ini_set('display_errors',1);
  error_reporting(-1);
  # gives access to our database through $conn variable
  include_once '../../inc/dbinfo.inc'; 

  // reads in username from the cookie since it's the user that in currently logined in
  // Stores the rest of the values from the post 
  $username = $_COOKIE['username'];
  $amount = $_POST['amount'];
  $currency = $_POST['currency'];
  $day = $_POST['day'];
  
  //inserts the new transaction into the db
  $createUserSt = "INSERT INTO transaction(username, day, currency, amount) VALUES('$username', '$day', '$currency', $amount)";
  
  $rs = mysqli_query($conn, $createUserSt);
  
  if (mysqli_affected_rows($conn) == 1)
  {
    echo true;
  }else {
    echo false;
  }
  //do some db stuff...
  //if you echo out something, it will be available in the data-argument of the
  //ajax-post-callback-function and can be displayed on the html-site

?>




