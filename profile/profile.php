/*
This is the profile of the user that is logged in. They can update their transaction history and view current holdings
*/
<?php
  # logs all errors to html for debugging 
  ini_set('display_errors',1);
  error_reporting(-1);
  # gives access to our database through $conn variable
  include_once '../../inc/dbinfo.inc'; 
    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>User Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/dashboard/">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Favicons -->



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="profile.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../index.php">Crypto History</a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <button class="navbar-toggler" id="signOut">Sign out</button>
        // Adds event listener to signout button
        <script type='text/JavaScript'>
        var btn = document.getElementById('signOut');
        btn.addEventListener('click', function() { 
            // deletes the cookie by setting the expires date to a time that has passed
            document.cookie = "username= ; expires= Thu, 01 Jan 1970 00:00:00 GMT; path=/";
            document.location.href = '../index.php';
        });
        </script>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Portfolio <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Bitcoin
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Ethereum
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Xrp
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Portfolio</h2>
      </div>
      <div class="col-sm-4 py-4">
              <ul class="list-unstyled text-black h6">
              <div class="d-flex justify-content-start">
                <li>Bitcoin holdings: </li>
                <h6 id='btc' style='padding-left:5px'><?php 
                #sql query to get all items
                $username = $_COOKIE['username'];
                $queryStatement = "SELECT SUM(amount) FROM transaction WHERE username='$username' and currency='BTC'";
                
                #Querying the database using $conn from dbinfo.inc
                $results = mysqli_query($conn, $queryStatement);

                #Getting the number of items in 
                $numberOfItems =  mysqli_num_rows($results);

                if($numberOfItems == 0){
                  echo 0;
                }else{
                  $item = mysqli_fetch_array($results);
                  echo $item['SUM(amount)'];
                }

                ?></h6> 
              </div>
              <div class="d-flex justify-content-start">
                <li>Ethereum holdings: </li>
                <h6 id='eth' style='padding-left:5px'><?php 
                #sql query to get all items
                $username = $_COOKIE['username'];
                $queryStatement = "SELECT SUM(amount) FROM transaction WHERE username='$username' and currency='ETH'";
                
                #Querying the database using $conn from db.php
                $results = mysqli_query($conn, $queryStatement);

                #Getting the number of items in 
                $numberOfItems =  mysqli_num_rows($results);

                if($numberOfItems == 0){
                  echo 0;
                }else{
                  $item = mysqli_fetch_array($results);
                  echo $item['SUM(amount)'];
                }

                ?></h6>
              </div>
              <div class="d-flex justify-content-start">
                <li>XRP holdings: </li>
                <h6 id='xrp' style='padding-left:5px'><?php 
                #sql query to get all items
                $username = $_COOKIE['username'];
                $queryStatement = "SELECT SUM(amount) FROM transaction WHERE username='$username' and currency='XRP'";
                
                #Querying the database using $conn from db.php
                $results = mysqli_query($conn, $queryStatement);

                #Getting the number of items in 
                $numberOfItems =  mysqli_num_rows($results);

                if($numberOfItems == 0){
                  echo 0;
                }else{
                  $item = mysqli_fetch_array($results);
                  echo $item['SUM(amount)'];
                }

                ?></h6>
              </div>
              <div class="d-flex justify-content-start">
                <li>USD holdings: </li>
                <h6 id='usd' style='padding-left:5px'><?php 
                #sql query to get all items
                $username = $_COOKIE['username'];
                $queryStatement = "SELECT SUM(amount) FROM transaction WHERE username='$username' and currency='USD'";
                
                #Querying the database using $conn from db.php
                $results = mysqli_query($conn, $queryStatement);

                #Getting the number of items in 
                $numberOfItems =  mysqli_num_rows($results);

                if($numberOfItems <= 0){
                  echo 0;
                }else{
                  $item = mysqli_fetch_array($results);
                  echo $item['SUM(amount)'];
                }

                ?></h6>
              </div>
          </ul>
        </div>


      <div class='d-flex justify-content-between flex-wrap flex-md-nowrap'>
      <h2>Transactions</h2>
      <form id=transaction>
        <div class="input-group input-group-sm mb3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Date</span>
          </div>
        <label for="Day" class="sr-only">Date</label>
          <input type="text" id="day" placeholder="YYYY-MM-DD hh:mm" required="" name='day'>
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Currency</span>
        </div>
        <label for="currency" class="sr-only">Currency</label>
          <input type="text" id="currency" placeholder="BTC/ETH/XRP/USD" required="" name='currency'>
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Amount</span>
        </div>
        <label for="amount" class="sr-only">Amount</label>
          <input type="number" id="amount" placeholder="0.00" step="0.0000001" min="0" required="" name='amount' >
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button id=submitbutton type="submit" class="btn btn-sm btn-outline-secondary">Add new transaction</button>

            </div>
            </div>
          </div>
        </div>
      </form>
      <div class="table-responsive">
        <table class="table table-striped table-sm" id='transTab'>
          <thead>
            <tr>
              <th>Date</th>
              <th>Currency</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
          <?php 
                #sql query to get all items
                $username = $_COOKIE['username'];
                $queryStatement = "SELECT * FROM transaction WHERE username='$username' ORDER BY day DESC";
                
                #Querying the database using $conn from db.php
                $results = mysqli_query($conn, $queryStatement);

                #Getting the number of items in 
                $numberOfItems =  mysqli_num_rows($results);

                # Make a row for each item in DB
                if($numberOfItems > 0){
                    while ($item = mysqli_fetch_assoc($results)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $item["day"] ?></th>
                            <th><?php echo $item["currency"] ?></th>
                            <th><?php echo $item["amount"] ?></th>
                        </tr>
                        <?php
                    }
                }else{
                    # display error if no items are found in db
                    ?><th> No transaction History </th><?php
                }
                ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="profile.js"></script></body>
</html>