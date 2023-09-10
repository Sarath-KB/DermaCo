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
	$sel="select * from tbl_branch where branch_id='".$_SESSION["bid"]."' and branch_password='".$_POST["txt"]."'";
	$data=mysql_query($sel);
	if($row=mysql_fetch_array($data))
	{
		if($_POST["txt1"]==$_POST["txt2"])
		{
			$update="update tbl_branch set branch_password='".$_POST["txt1"]."' where branch_id='".$_SESSION["bid"]."'";
			mysql_query($update);
			header("location:Home.php");
		}
		else
		{
			echo "Password Mismatch";
		}
	}
	else
	{
		echo "Current Password Wrong";
	}
}
?>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td width="148">Current Password</td>
      <td width="184"><label for="txt"></label>
      <input type="password" name="txt" id="txt"  autocomplete="off" required="required"/></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt1"></label>
      <input type="password" name="txt1" id="txt1"  autocomplete="off" required="required"/></td>
    </tr>
    <tr>
      <td>Re-Password</td>
      <td><label for="txt2"></label>
      <input type="password" name="txt2" id="txt2"  autocomplete="off" required="required"/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="submit" id="txt4" value="Update" />
      </div></td>
    </tr>
  </table>
</form>
</body>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
?>
</html>