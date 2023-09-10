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
if(isset($_POST["save"]))
{
	$pic=$_FILES["image"]["name"];
	$patah=$_FILES["image"]["tmp_name"];
	move_uploaded_file($patah,"../Assets/Files/Gallery/".$pic);
	$ins="insert into tbl_gallery(gallery_image,room_id)values('".$pic."','".$_GET["did"]."')";
	mysql_query($ins);
	echo
	header("location:Room.php");
}
?>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <td>Image</td>
      <td><label for="image"></label>
      <input type="file" name="image" id="image" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="save" id="save" value="Save" />
        <input type="reset" name="cancel" id="cancel" value="Cancel" />
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