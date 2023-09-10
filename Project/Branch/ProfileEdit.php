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
	$update="update tbl_branch set branch_name='".$_POST["txt_name"]."', branch_contact='".$_POST["contact"]."' where            branch_id='".$_SESSION["bid"]."'";
	mysql_query($update);
	header("location:BranchProfile.php");
}
$ins="select * from tbl_branch where '".$_SESSION["bid"]."'";
$databranch=mysql_query($ins);
$rowuser=mysql_fetch_array($databranch);
	
		
?>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td>Name</td>
      <td><label for="txt2"></label>
      <input type="text" name="txt_name" id="txt2" value="<?php echo $rowuser["branch_name"];?>" autocomplete="off" required="required" />
	
    </td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt3"></label>
      <input type="text" name="contact" id="txt3"  value="<?php echo $rowuser["branch_contact"];?>" autocomplete="off" required="required" pattern="[0-9]{10,10}" />
</td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="submit" id="txt1" value="Submit" />
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