/*
This file is the Ethereum price history. It also provides navagation to sign in/sign up page and to view crypto currency histories.
*/
<?php
  # logs all errors to html for debugging 
  ini_set('display_errors',1);
  error_reporting(-1);
  # gives access to our database through $conn variable
  include_once '../inc/dbinfo.inc'; 
    
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com//docs/4.0/assets/img/favicons/favicon.ico">

    <title>Crypto History</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  </head>

  <body>

    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">About</h4>
              <p class="text-muted">Displaying full daily price history of top cryptocurriencies</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Contact</h4>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white">Follow on Twitter</a></li>
                <li><a href="#" class="text-white">Like on Facebook</a></li>
                <li><a href="#" class="text-white">Email me</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
        <a href="index.php" class="navbar-brand d-flex align-items-center ">
            <strong>Crypto History</strong>
          </a>
          <a href="index.php" class="navbar-brand d-flex align-items-center ">
            <strong>Bitcoin</strong>
          </a>
          <a href="ethIndex.php" class="navbar-brand d-flex align-items-center ">
            <strong>Ethereum</strong>
          </a>
          <a href="xrpIndex.php" class="navbar-brand d-flex align-items-center ">
            <strong>XRP</strong>
          </a>
          <?php
          if(isset($_COOKIE['username'])){
            ?>
            <button id="user" class="navbar-toggler " type="button">
            <strong ><?php echo $_COOKIE['username']?></strong>
          </button>
         <script type='text/JavaScript'>
            var btn = document.getElementById('user');
            btn.addEventListener('click', function() {
            document.location.href = 'profile/profile.php';
            });
          </script>
          <?php
          }else{
            ?>
          <button id="signin" class="navbar-toggler" type="button">
            <strong >Sign in</strong>
          </button>
          <button id="signup" class="navbar-toggler" type="button">
            <strong >Sign Up</strong>
          </button>
          <script type='text/JavaScript'>
            var btn = document.getElementById('signin');
            btn.addEventListener('click', function() {
              document.location.href = 'signin/signin.php';
            });
            </script>

            <script type='text/JavaScript'>
              var btn = document.getElementById('signup');
              btn.addEventListener('click', function() {
                document.location.href = 'signup/signup.php';
              });
            </script>
            <?php
          }
          ?>
          <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <body>

        <h1> Ethereum </h1>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Open</th>
                    <th scope="col">Close</th>
                    <th scope="col">High</th>
                    <th scope="col">Low</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                #sql query to get all items
                $queryStatement = "SELECT * FROM Ethereum ORDER BY day DESC";
                
                #Querying the database using $conn from dbinfo.inc
                $results = mysqli_query($conn, $queryStatement);

                #Getting the number of items in 
                $numberOfItems =  mysqli_num_rows($results);

                # Make a row for each item in DB
                if($numberOfItems > 0){
                    while ($item = mysqli_fetch_assoc($results)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $item["day"] ?></th>
                            <th><?php echo $item["open"] ?></th>
                            <th><?php echo $item["close"] ?></th>
                            <th><?php echo $item["high"] ?></th>
                            <th><?php echo $item["low"] ?></th>
                        </tr>
                        <?php
                    }
                }else{
                    # display error if no items are found in db
                    echo 'DB error';
                }
                ?>
            </tbody>
        </table>
    </body>



    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <form action="/WebShop/shopadmin.php">
            <button class="btn btn-secondary" type="submit">Edit Listings</button>
          </form>            
        </p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
