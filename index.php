<!doctype html>
<!-- INSERT USER -->
<?php
include 'db/db.php';
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$pass = md5($_POST['password']);

	$insert = mysqli_query($connect,"INSERT INTO tbl_user(username, password) VALUES('$username','$pass')");
	if($insert){
		echo"<script>
	        alert('YES');
	        document.location='index.php';
	     </script>";
}else
{
	echo"<script>
	        alert('No');
	        document.location='index.php';
	     </script>";
}
}
 ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>KHAZBON - Login</title>
    <!-- Bootstrap core CSS -->          
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/floating-labels.css" rel="stylesheet">
  </head>
  <body>  
  <div class="text-center mb-4">
    <img class="mb-4" src="image/peruri.jpeg" width="150">
    <h1 class="h3 mb-3 font-weight-normal">Login KHAZBON</h1>
    <p>Silahkan masukan username dan password anda, sebelum masuk ke dalam sistem KHAZBON</p>
  </div>
  <div class="d-flex justify-content-center form_container">
  <form class="form-signin" action="cek_login.php" method="post" >
    <div class="form-label-group mb-2">
      <label for="inputEmail">Username</label>
      <input type="text" name="username" class="form-control" value = "" placeholder="Username" required autofocus>
    </div>
    <div class="form-label-group mb-2">
      <label for="password">Password</label>
      <input type="password" name="password" class="form-control" value="" placeholder="Password" required>
    </div>
    <div class="d-flex justify-content-center mt-3">
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
    </div>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2020-<?=date('Y')?> by.khazanah penyelesaian bon | KHAZBON </p>
  </form>
  </div>
  <script src="plugins/sweetalert/sweetalert.min.js"></script>
</body>
</html>
