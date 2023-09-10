<?php
session_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST['sub_txt']))
{
	$email=$_POST["email_txt"];
	$password=$_POST["password_txt"];
	$seluser="select user_id,user_name from tbl_user where user_email='$email' and user_password='$password'";
	$datauser=mysql_query($seluser);
	$selbranch="select branch_id,branch_name from tbl_branch where branch_email='$email' and branch_password='$password'";
	$databranch=mysql_query($selbranch);
	
	$seladmin="select * from tbl_admin where admin_email='$email' and admin_password='$password'";
	// echo $seladmin;
	$dataadmin=mysql_query($seladmin);
	
	
	
	if($rowuser=mysql_fetch_array($datauser))
	{
		$_SESSION["uid"]=$rowuser["user_id"];
		$_SESSION["uname"]=$rowuser["user_name"];
		header("location:../User/HomePage.php");
	}
	else if($rowbranch=mysql_fetch_array($databranch))
	{
	$_SESSION["bid"]=$rowbranch["branch_id"];
		$_SESSION["bname"]=$rowbranch["branch_name"];
		header("location:../Branch/Home.php");	
	}
	else if($rowadmin=mysql_fetch_array($dataadmin))
	{
	$_SESSION["aid"]=$rowadmin["admin_id"];
		$_SESSION["aname"]=$rowadmin["admin_name"];
		header("location:../Admin/HomePage.php");	
	}
	else
	{
		?>
		<script>
			alert("Invalid Credentials")
		</script>
		<?php
	}
	
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V16</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Templates/Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Templates/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Templates/Login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Templates/Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../Assets/Templates/Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Templates/Login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Templates/Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../Assets/Templates/Login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Templates/Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../Assets/Templates/Login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../Assets/bg.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
				<form class="login100-form p-b-33 p-t-5" method="post">

					<div class="wrap-input100">
						<input class="input100" type="text" name="email_txt" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100">
						<input class="input100" type="password" name="password_txt" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" name="sub_txt">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="../Assets/Templates/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Templates/Login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Templates/Login/vendor/bootstrap/js/popper.js"></script>
	<script src="../Assets/Templates/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Templates/Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Templates/Login/vendor/daterangepicker/moment.min.js"></script>
	<script src="../Assets/Templates/Login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Templates/Login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Templates/Login/js/main.js"></script>

</body>
</html>
<?php
include("Foot.php");
?>