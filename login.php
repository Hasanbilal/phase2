<?php
session_start();
require('connect.php');
if(isset($_POST["login"]))
{
	$username=$_POST["username"];
	$password=$_POST["password"];
	$query="SELECT * from tblusers where username='$username' AND userpassword='$password'";
	$result=mysqli_query($con,$query);
	$count=mysqli_num_rows($result);
	if($count=='1')
	{
		$_SESSION['username']=$username;
		header('Location: index.php');
	}
	else
	{
			$message="Wrong username/password";
	}
}
include 'header_login.php';
?>
<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet prefetch' href='bootstrap.min.css'>
<style class="cp-pen-styles">body {
  	background-image: url("HD-Technology-Wallpaper-7.jpg");
	background-size: cover;
}

.wrapper {
  margin-top: 25px;
  margin-bottom: 80px;
}
.form-signin .form-signin-heading, .form-signin .checkbox{
	    font-family: monospace;
    font-weight: 300;
    line-height: 1.1;
    text-align: center;
    color: ghostwhite;
}

.form-signin {
 max-width: 380px;
    padding: 15px 35px 45px;
    margin: 0 auto;
    border-radius: 10px;
    box-shadow: 0 0 10px 0 rgba(0,0,0,.15);
    background: rgba(0,0,0,.8);
	box-sizing: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 30px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  border-bottom-left-radius: 4px;
    border-bottom: 1px solid #999999 !important;
    border: none;
    margin-bottom: 13px;
	background: transparent;
    border-bottom-right-radius: 4px;
}
.form-signin input[type="password"] {
  margin-bottom: 20px;
border-bottom-left-radius: 4px;
    border-bottom: 1px solid #999999 !important;
    border: none;
    margin-bottom: 13px;
	background: transparent;
    border-bottom-right-radius: 4px;}
.btn-block {
    display: block;
    width: 100%;
    padding-right: 0;
    background-color: transparent;
    margin-top: 40px;
    padding-left: 0;
}
#a2tag{
	float: right;
    font-size: 11px;
    text-decoration: none;
    position: relative;
    bottom: 5px;
    right: 0px;
    color: #fff;
    border-bottom: 2px solid #cac0c0;
}
</style>
</head>
<body>
  <div class="wrapper">
  
    <form class="form-signin" action="" method="post" >      
		<h2 class="form-signin-heading">Please login</h2>
		<center><?php if(isset($message)){echo $message;}?></center>
		<input type="text" class="form-control" name="username" placeholder="Username" required=""  autocomplete="off" />
		<input type="password" class="form-control" name="password" placeholder="Password" required=""/>  
		<a href="password_recovery.php" id="a2tag">Forget your Password?</a><br>
		<button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>   
    </form>
  </div>

</body>
</html>
<?php include 'footer.php';?>