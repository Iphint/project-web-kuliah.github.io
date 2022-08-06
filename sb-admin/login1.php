<?php
// session
session_start();
if (isset($_SESSION["login"])) {
  header("location: index.php ");
  exit;
}
// connect database
require 'functions.php';
// function tombol login
if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $level = $_POST["level"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password' AND level = '$level'");
  // cek username
  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    // set session 
    $_SESSION["login"] = true;
    // set level
    if ($level == "Admin") {
      header("Location: admin.php");
      exit;
    } else {
      header("Location: index.php");
      exit;
    }
  }
  $error = true;
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

    .hilang {
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
            <h1><strong>MDS LOGIN USER</strong></h1>
            <div class="description">
              <p>Selamat datang silahkan login terlebih dahulu untuk mengakses lebih ke platform kami </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3 form-box">
            <div class="form-top">
              <div class="form-top-left">
                <h3>Login disini</h3>
                <p>Masukan username dan password anda disini :</p>
                <!-- pesan error -->
                <?php if (isset($error)) : ?>
                  <p style="color: red; font-style: italic;">Username / password anda salah, silahkan di ketik ulang</p>
                <?php endif; ?>
                <!-- end pesan error -->
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
                <div class="form-group hilang">
                  <select name="level" id="level">
                    <option value="User">User</option>
                  </select>
                </div>
                <button type="submit" class="btn" name="login">Sign in!</button>
                <br />
                <p><a href="admin-login.php">Login admin</a></p>
                <p><a href="register1.php">Register here!</a></p>
                <p><a href="../index.html">Back to website</a></p>
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