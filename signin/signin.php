/*
This file is used for submitting the signin form for exsiting users
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
              document.location.href = 'signin.php';
            });
            </script>

            <script type='text/JavaScript'>
              var btn = document.getElementById('signup');
              btn.addEventListener('click', function() {
                document.location.href = '../signup/signup.php';
              });
            </script>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  

  <body class="text-center">
    <div class="body-css">
    <div class="form-signin">    
    <form  action="exsistingUser.php" method="POST">
  <img class="mb-4" src="https://getbootstrap.com//docs/4.0/assets/img/favicons/favicon.ico" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <h6 style='font-color:red'><?php
            if(isset($_COOKIE['noUser'])){
                echo 'Invalid Username';
                setcookie('incorrectPassword','',time()-3600);
                setcookie('noUser','',time()-3600);
            } 
        ?></h6>
  <label for="username" class="sr-only">username</label>
  <input type="username" id="username" class="form-control" <?php if(isset($_COOKIE['username_entered'])){
      echo "value='".($_COOKIE['username_entered'])."'";
      setcookie('username_entered','',time()-3600);
  }else{
      echo "placeholder='Username'";
  }
  ?>
    ) required="" autofocus="" name='username'>
  <h6 style='font-color:red'><?php
            if(isset($_COOKIE['incorrectPassword'])){
                echo 'Incorrect Password';
                setcookie('incorrectPassword','',time()-3600);
            } 
        ?></h6>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name='password'>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me" name='remember'> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <h4> or </h4>
</form>

  <button id="signupRedirect" class="btn btn-lg btn-primary btn-block" type="button">Sign up</button>
  <script type='text/JavaScript'>
    var btn = document.getElementById('signupRedirect');
    btn.addEventListener('click', function() {
    document.location.href = '../signup/signup.php';
  });
  </script>
  <p class="mt-5 mb-3 text-muted">© Crypto History</p>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</div>
</body>
</html>