<?php 
ob_start();
session_start();
include "../includes_db/db.php";
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back To My L!</h1>
                  </div>
                  <form class="user" action="" method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="loginmail" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="passwordlogin">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>

                    <div class="form-group"> 
                      <input type="submit" name="loginbtn" value="Login Kor" class="btn btn-primary btn-user btn-block">

                    </div>
                    
                    <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                  </form>

                  <?php 
                  if(isset($_POST['loginbtn'])){
                    $loginemail=mysqli_real_escape_string($connect,$_POST['loginmail']);
                   $loginpassword=mysqli_real_escape_string($connect,$_POST['passwordlogin']);
                   $haspass=sha1($loginpassword);
                   $loginquery="SELECT * FROM users WHERE email='$loginemail'";
                   $queryconnect=mysqli_query($connect,$loginquery);
                   while($row=mysqli_fetch_array($queryconnect)){
                      $_SESSION['userId']         =$row['id'];
                      $_SESSION['userAvatar']     =$row['avatar'];
                      $_SESSION['userFullName']   =$row['name'];
                      $password                   =$row['password'];
                      $_SESSION['userName']       =$row['user_name'];
                      $_SESSION['userEmail']      =$row['email'];
                      $_SESSION['userPhone']      =$row['phone'];
                      $_SESSION['is_active ']     =$row['is_active'];
                      $_SESSION['userRole ']      =$row['role'];

                      if($loginemail==$_SESSION['userEmail']&& $loginpassword==$password &&  $_SESSION['is_active '] == 1 ){
                        header("location:dashboard.php");

                      }
                      else if($loginemail!=$_SESSION['userEmail'] || $loginpassword!=$password){
                        header("location:index.php");

                      }
                      else{
                        header("location:index.php");
                      }
                   }               
                  }

                  ?>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <?php 
  ob_end_flush();

  ?>

</body>

</html>