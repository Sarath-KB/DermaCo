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
include("Sessionvalidation.php");
include("../Assets/connection/connection.php");
session_start();
 $sel="select * from tbl_user where user_id='".$_SESSION["uid"]."'";
$datauser=mysql_query($sel);
$rowuser=mysql_fetch_array($datauser);
	
		
?>

<style>
  .pro {
    background-color: #005555;
    color: white;
    padding: 10px;
    border-radius: 10px;
    border: none;
    display:flex;
    margin-top:10px;
    justify-content:center;
    align-items:center;
  }
 
</style>
<div style="display:flex; justify-content:center; align-items:center">
 <div style="border: 1px black solid; width:fit-content; padding:10px ;border-radius:10px">
 <table width="250" cellpadding="10px" style="color: black;">
    <tr>
     
      <td colspan="2" align="center"><img src="../Assets/Files/UserDocs/<?php echo $rowuser['user_photo'] ?>" width="150" height="150"/></td>
    </tr>
    <tr>
      <td width="51">Name</td>
      <td width="283"><label for="txt1"></label>
      <?php echo $rowuser["user_name"] ?>
      </td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt2"></label>
      <?php
	  echo $rowuser["user_contact"];
	  ?>
      </td>
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt3"></label>
      <?php
	  echo $rowuser["user_email"];
	  ?>
      </td>
      
      </td>
    </tr>
  </table>
  <div ><a href="EditProfile.php" class="pro">Edit Profile</a></div>
  <div><a href="ChangePassword.php" class="pro">Change Password</a></div>
 </div>
 </div>
  <br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
?>	
</body>
</html>