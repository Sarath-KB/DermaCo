<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("Head.php");
?>
<br><br><br><br><br><br><br><br>
<?php
include("../Assets/connection/connection.php");
session_start();
$ins="select * from tbl_branch where '".$_SESSION["bid"]."'";
$databranch=mysql_query($ins);
	if($rowuser=mysql_fetch_array($databranch))
	{
		
?>
<style>
  .pro {
    background-color: #005555;
    color: white;
    padding: 10px;
    width:250px;
    border-radius: 10px;
    border: none;
    display:flex;
    margin-top:10px;
    justify-content:center;
    align-items:center;
  }
 
</style>
<div style=" display:flex; justify-content:center; align-items:center">
<div style="border:1px black solid; width: fit-content; padding:10px; border-radius: 10px">
<table   align="center" cellpadding="10">
  <tr>
    <td colspan="2" align="center"><img src="../Assets/Files/UserDocs/<?php echo $rowuser['branch_photo'] ?>" width="150" height="150"/></td>
  </tr>
  <tr>
    <td>Name</td>
    <td>
	<?php
	echo $rowuser["branch_name"];
    ?></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td>
	<?php
	echo $rowuser["branch_contact"];
    ?>
    </td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php
	echo $rowuser["branch_email"];
    ?></td>
  </tr>
</table>
<div style="display:flex; justify-content: center; flex-direction: column; align-items:center; ">
  <a href="ProfileEdit.php"><div class="pro">Edit Profile</div></a>
  <a href="PasswordChange.php"><div class="pro">Change Password</div></a>
</div>
</div></div>
<?php
	}
	?>
</body>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
?>
</html>