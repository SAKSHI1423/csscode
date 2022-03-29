<?php
require('connection.inc.php');
require('functions.inc.php');
$msg='';
if(isset($_POST['submit'])){
	$username=get_safe_value($con,$_POST['username']);
	$password=get_safe_value($con,$_POST['password']);
	$sql="select * from admin_users where username='$username' and password='$password'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
		$_SESSION['ADMIN_LOGIN']='yes';
		$_SESSION['ADMIN_USERNAME']=$username;
		header('location:categories.php');
		die();
	}else{
		$msg="Please enter correct login details";	
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" type="image/png" href="media/logo.png">
</head>
<style>
  body{
    background-image: url('images/bgimg.jpg')
  }
  .field_error{
    color: red;
    margin-top: 5px;
  }
  a{
    color: #ffc107;
  }
  a:hover{
    color:white;
  }
  .container{
    border-radius:8px;
    height: 360px;
  }
  @media only screen and (max-width: 1440px) {
    .container{
      margin-left: 800px;
      width: 420px;
      height: 360px;
    }
    body{
      background-size: 1440px 1044px;

    }
  }
  @media only screen and (max-width: 1024px) {
    .container{
      margin-left: 580px;
      width: 390px;
      height: 360px;
    }
    body{
      background-size: 1024px 751px;

    }
  }
  @media only screen and (max-width: 860px) {
    .container{
      margin-left: 380px;
      width: 290px;
      height: 360px;
    }
    body{
      background-size: 762px 522px;

    }
  }
  @media only screen and (max-width: 600px) {
    body{
      background-size: 800px 600px;
    }
    .container{
      margin-left: 220px;
      width: 290px;
      height: 360px;
    }
  }
  @media only screen and (max-width: 380px) {
    body{
    background-image:none;

    }
    .container{
      margin-left: 45px;
      width: 290px;
      height: 360px;
    }
  }
  @media only screen and (max-width: 320px) {
    body{
    background-image:none;

    }
    .container{
      margin-left: 16px;
      width: 290px;
      height: 360px;
    }
  }


</style>
<body>

<div class="container border shadow col-lg-4 " style="background-color :#212529; color: white; margin-top: 125px">
  <p class="text-center my-2" style="font-size: 27px; font-family:Cursive; text-decoration: underline; text-decoration-color:#ffc107 ;"><strong>Login</strong</p>
  <form method="post">
    <div class="mb-3 mt-3">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter email" name="username" required>
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
    </div>
    <div class="text-center my-4">
     <button type="submit" name="submit" class="btn btn-warning col-lg-3">Login</button>
    </div> 
  </form>
  <div class="field_error"> <?php echo $msg ?></div>
</div>

</body>
</html>