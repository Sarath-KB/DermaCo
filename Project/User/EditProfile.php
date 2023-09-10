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
if(isset($_POST["submit"]))
{
	$update="update tbl_user set user_name='".$_POST["txt_name"]."', user_contact='".$_POST["contact"]."' where            user_id='".$_SESSION["uid"]."'";
	mysql_query($update);
	header("location:MyProfile.php");
}
 $sel="select * from tbl_user where user_id='".$_SESSION["uid"]."'";
$datauser=mysql_query($sel);
$rowuser=mysql_fetch_array($datauser);
	
		
?>
<form id="form3" name="form3" method="post" action="">
<table width="200" border="1">
  <tr>
    <td width="40">Name</td>
    <td width="144">
      <label for="txt"></label>
      <input type="text" name="txt_name" id="txt" value=" <?php echo $rowuser["user_name"] ?>" autocomplete="off" required="required"  />
   </td>
  </tr>
  <tr>
    <td>Contact</td>
    <td> <input type="text" name="contact" id="txt" value=" <?php echo $rowuser["user_contact"] ?>"autocomplete="off" required="required"  /></td>
  </tr>
  <tr>
    <td colspan="2">
      <div align="center">
        <input type="submit" name="submit" id="txt2" value="Submit" />
        </div>
      </td>
  </tr>
</table>
<div align="center"></div>

</form>
<br><br><br><br><br><br><br><br>
</body>
<?php
include("Foot.php");
?>
</html>