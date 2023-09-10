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
if($_GET["rid"])
{
	$rid=$_GET["rid"];
	$upQry1="update tbl_booking set booking_status='4' where booking_id='$rid'";
	mysql_query($upQry1);
}
	?>
  <style>
  tr:hover {
    background-color:#d6d6d6;
  }
</style>
<table width="1200" cellpadding="10px" align="center" border="1">
  <tr>
    <th>Sl.No</th>
    <th>User Name</th>
    <th>RoomDetails</th>
    <th>Room Image</th>
    <th>Contact</th>
    <th>Email</th>
    <th>Accept</th>
    <th>Reject</th>
  </tr>
  <?php
   $i=0;
   $selqry="select * from tbl_booking b inner join tbl_roomdetails r on b.room_id=r.room_id inner join tbl_user u on u.user_id=b.user_id where r.branch_id='".$_SESSION["bid"]."' and booking_status=2";
   $data=mysql_query($selqry);
   while($row=mysql_fetch_array($data))
   {
	   $i++;
	?>
    <tr>
     <td><?php echo $i?></td>
     <td><?php echo $row["user_name"]?></td>
     <td><?php echo $row["room_details"]?></td>
     <td><?php echo $row["room_image"]?></td>
     <td><?php echo $row["user_contact"]?></td>
     <td><?php echo $row["user_email"]?></td>
     <td><a href="Reject.php?rid=<?php echo $row["booking_id"]?>">Reject</a></td>
    </tr>
    <?php
   }
   ?>
   </table>
</body>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
?>
</html>