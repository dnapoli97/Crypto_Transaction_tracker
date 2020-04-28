/*
This file submits the form of new signups to the db
*/
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <link rel="icon" href="https://getbootstrap.com//docs/4.0/assets/img/favicons/favicon.ico">
    <title>Crypto History</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Favicons -->
<meta name="theme-color" content="#563d7c">


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
    <link href="../signin/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
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
          <a href="../index.php" class="navbar-brand d-flex align-items-center">
            <strong>Crypto History</strong>
          </a>
          <button id="signin" class="navbar-toggler" type="button">
            <strong>Sign in</strong>
          </button>
          <button id="signup" class="navbar-toggler" type="button">
            <strong>Sign Up</strong>
          </button>
          <script type='text/JavaScript'>
            var btn = document.getElementById('signin');
            btn.addEventListener('click', function() {
              document.location.href = '../signin/signin.php';
            });
            </script>

            <script type='text/JavaScript'>
              var btn = document.getElementById('signup');
              btn.addEventListener('click', function() {
                document.location.href = 'signup.php';
              });
            </script>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>
    <div class="body-css">
    <form class="form-signin" action="newUser.php" method="POST">
        <img class="mb-4" src="https://getbootstrap.com//docs/4.0/assets/img/favicons/favicon.ico" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="" name="Email">
        <h6 style='font-color:red'><?php
            if(isset($_COOKIE['failed'])){
                echo 'Username already taken';
            } 
        ?></h6>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" id="username" class="form-control" placeholder="Username" required="" name="username">

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="Password">

        <label for="confirmPassword" class="sr-only">Confirm Password</label>
        <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm password" required="" name="confirmPassword">

        <label for="fname" class="sr-only">First name</label>
        <input type="text" id="fname" class="form-control" placeholder="First name" required="" name="fname">

        <label for="lname" class="sr-only">Last name</label>
        <input type="text" id="lname" class="form-control" placeholder="Last name" required="" name="lname">

        <label for="age" class="sr-only">Age</label>
        <input type="number" id="age" class="form-control" placeholder="Age" required="" name="age">

    <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me" name='remember'> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
  <p class="mt-5 mb-3 text-muted">© Crypto History</p>
</form>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </div>
</body>
</html>