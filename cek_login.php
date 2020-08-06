<?php
include 'db/db.php';

//mysqli_escape_string mengamankan karakter aneh
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars(md5($_POST['password']));

$login = mysqli_query($connect,"SELECT * from tbl_user WHERE username='$username' AND password = '$password' ");
$hasil = $login->fetch_assoc();

if($login->num_rows>0){
	session_start();
	$_SESSION['username'] = $username;
	header('Location: dashboard.php');
}else
{
	echo"<script>
	        alert('Maaf, Login GAGAL, pastikan username dan password anda Benar..!');
	        window.location='index.php';
	     </script>";
}
 ?>