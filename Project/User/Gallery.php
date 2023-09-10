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
session_start();
include("../Assets/connection/connection.php");

?>
<table align="center" cellpadding="10" cellspacing="60" id="result">
  <tr>
  <?php
  $sel="select * from tbl_gallery where room_id='".$_GET["did"]."'";
  //echo $sel;
  $data=mysql_query($sel);
  $i=0;
  while($row=mysql_fetch_array($data))
  {
	  $i++;
  ?>
  <td><p><img src="../Assets/Files/UserDocs/<?php echo $row["gallery_image"]?>" width="150" height="150" /><br />
 

  </p>
  </td>
  <?php
  if($i==4)
  {
	  echo "</tr>";
	  $i=0;
	  echo "<tr>";
  }
  }
  ?>
  </table>

</body>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
?>
</html>