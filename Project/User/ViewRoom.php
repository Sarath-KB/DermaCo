<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
<body>	
<?php
include("Head.php");
?>
<br><br><br><br><br><br><br><br>
<?php
include("Sessionvalidation.php");
include("../Assets/connection/connection.php");
session_start();

if(isset($_GET["bid"]))
{
	$_SESSION["bid"]=$_GET["bid"];
}
if($_GET["did"])
{
	$did=$_GET["did"];
	$delqry = "select * from tbl_gallery where room_id='$did'";
	mysql_query($delqry);
}
?>
<table align="center" cellpadding="10" border="1">
<tr>
<td><input type="search" name="type" autocomplete="off"  onchange="getRoom(this.value)"/></td>
</tr>
</table>



<table align="center" cellpadding="10" cellspacing="60" id="result">
  <tr>
  <?php
  $sel="select * from tbl_roomdetails where branch_id='".$_GET["bid"]."'";
  //echo $sel;
  $data=mysql_query($sel);
  $i=0;
  while($row=mysql_fetch_array($data))
  {
	  $i++;
  ?>
  <td><p><img src="../Assets/Files/UserDocs/<?php echo $row["room_image"]?>" width="150" height="150" /><br />
  Type:<?php echo $row["room_type"]?><br />
  Details:<?php echo $row["room_details"]?><br />
  Service:<?php echo $row["room_service"]?><br />
  Rate:<?php echo $row["room_rate"]?><br />
 <a href="Gallery.php?did=<?php echo $row["room_id"]?>">Gallery</a><br />
 <a href="BookRoom.php?did=<?php echo $row["room_id"]?>" class="btn btn-success">Book Now</a>
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
</html>

<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getRoom(did)
{
	$.ajax
	({
		url: "../Assets/Ajaxpages/AjaxRoom.php?did=" + did,
		success: function(data) 
		{
		
			$("#result").html(data);
		
		}
	});
}
</script>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
?>