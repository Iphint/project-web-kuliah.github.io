<?php
// connect database
require 'functions.php';

if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    echo "
        <script>
        alert ( 'Data user baru sukses di tambahkan' );
        document.location.href = 'login1.php';
        exit;
        </script>";
  } else {
    mysqli_error($conn);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login site</title>
  <style>
    body {
      background-image: url(../form-3/assets/img/backgrounds/1.jpg);
    }

    .kosong {
      display: none;
    }
  </style>

  <!-- CSS -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500" />
  <link rel="stylesheet" href="../form-3/assets/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../form-3/assets/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../form-3/assets/css/form-elements.css" />
  <link rel="stylesheet" href="../form-3/assets/css/style.css" />

  <!-- Favicon and touch icons -->
  <link rel="shortcut icon" href="../form-3/assets/ico/favicon.png" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./form-3/assets/ico/apple-touch-icon-144-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./form-3/assets/ico/apple-touch-icon-114-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./form-3/assets/ico/apple-touch-icon-72-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" href="./form-3/assets/ico/apple-touch-icon-57-precomposed.png" />
</head>

<body>
  <!-- Top content -->
  <div class="top-content">
    <div class="inner-bg">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2 text">
            <h1><strong>MDS</strong> Register Form</h1>
            <div class="description">
              <p>Selamat datang silahkan register terlebih dahulu untuk mengakses lebih ke sistem <strong>MDS</strong> kami</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3 form-box">
            <div class="form-top">
              <div class="form-top-left">
                <h3>Register first</h3>
                <p>Enter your username and password :</p>
              </div>
              <div class="form-top-right">
                <i class="fa fa-lock"></i>
              </div>
            </div>
            <div class="form-bottom">
              <form role="form" action="" method="post" class="login-form">
                <div class="form-group">
                  <label class="sr-only" for="form-username">Username</label>
                  <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="username" />
                </div>
                <div class="form-group">
                  <label class="sr-only" for="form-password">Password</label>
                  <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="password" />
                </div>
                <div class="form-group">
                  <label class="sr-only" for="form-password">Konfirmasi Password</label>
                  <input type="password" name="password2" placeholder="Confirm Password..." class="form-password form-control" id="password2" />
                </div>
                <div class="form-group kosong">
                  <select name="level" id="level">
                    <option value="User">User</option>
                  </select>
                </div>
                <button type="submit" class="btn" name="register">Register!</button>
                <br />
                <p><a href="login1.php">Login here!</a></p>
                <p><a href="../company-profile.html">Back to website</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Javascript -->
  <script src="../form-3/assets/js/jquery-1.11.1.min.js"></script>
  <script src="../form-3/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="../form-3/assets/js/jquery.backstretch.min.js"></script>
  <script src="../form-3/assets/js/scripts.js"></script>
</body>

</html>