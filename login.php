<?php
require 'function.php';

//cocok login
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $cekdatabase = mysqli_query($conn,"SELECT * FROM login where email='$email' and password='$password'");
    //jumlahdaata
    $hitung = mysqli_num_rows($cekdatabase);

    if($hitung>0){
        $_SESSION['log'] = 'True';
        header('location:index.php');
    } else {
        header('loaction:login.php');
    };
};

if(!isset($_SESSION['log'])){
    
} else {
    header('location:index.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="C:\xamppp\htdocs\stockbarang\css\style.css">
</head>
<body1>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
        <div class="brand-wrapper">
            <img src="assets/images/aa.svg" alt="logo" class="logo" style="width: 200px; height: auto;">
        </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Log in</h1>
            <form method='post'>
              <div class="form-group">
                <label class="small mb-1" for="inputEmailAddress">Email</label>
                <input class="form-control py-4"name="email" id="inputEmailAddress" type="email" placeholder="Enter email address" required/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="inputPassword">Password</label>
                <input class="form-control py-4"name="password" id="inputPassword" type="password" placeholder="Enter password" required/>
            </div>
            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                <button class="btn btn-block login-btn"name="login">Login</button>
            </div>
            </form>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="assets/images/download.jpg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>