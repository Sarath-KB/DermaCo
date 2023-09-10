<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style>
  tr:hover {
    background-color:#c8c8c8;
  }
</style>
<body>
<?php
include("Head.php");
?>
<br><br><br><br><br><br><br><br>
<?php
include("Sessionvalidation.php");
include("../Assets/connection/connection.php");
session_start();
if($_GET["did"])
{
	$did=$_GET["did"];
	$delqry = "delete from tbl_booking where booking_id='$did'";
	mysql_query($delqry);
}

if($_GET["cid"])
{
	$did=$_GET["cid"];
	$delqry = "update tbl_booking set booking_status=3 where booking_id='".$did."'";
	mysql_query($delqry);
	header("location:MyBooking.php");
}
?>
<form id="form1" name="form1" method="post" action="">
<div style="display:flex; justify-content:center; align-items:center;">
<div style="border:1px black solid; padding:10px; width:fit-content;">
<table width="1300" style="color:black" cellpadding="10px" align="center">
    <tr>
      <th width="6">Sl.No</th>
      <th width="104">RoomDetails</th>
      <th width="51">Booking Date</th>
      <th width="51">CheckinDate</th>
      <th width="10">Rate</th>
      <th width="20">RoomType</th>
      <th width="30">Service</th>
      
      <th width="180">Action</th>
    </tr>
    <?php
   $i=0;
   $selqry="select * from tbl_booking b inner join tbl_roomdetails r on r.room_id=b.room_id where user_id='".$_SESSION["uid"]."'";
  //  echo $selqry;
   $data=mysql_query($selqry);
   while($row=mysql_fetch_array($data))
   {
	   $i++;
	?>
    <tr>
     <td><?php echo $i?></td>
     <td><?php echo $row["room_details"]?></td>
     <td><?php echo $row["booking_date"]?></td>
     <td><?php echo $row["booking_date"]?></td>
     <td><?php echo $row["room_rate"]?></td>
     <td><?php echo $row["room_type"]?></td>
     <td><?php echo $row["room_service"]?></td>
     <td>
     <?php
	 if($row["booking_status"]==1)
	 {
		 echo "Booking Confirmed and Advance Paid";?>
		 <a href="MyBooking.php?did=<?php echo $row["booking_id"]?>">Delete</a> | <a href="MyBooking.php?cid=<?php echo $row["booking_id"]?>">Cancel Booking</a> | <a href="Payment1.php?pid=<?php echo $row["booking_id"]?>">Pay Now</a><?php
	 }
	 else if($row["booking_status"]==2)
	 {
		 echo "Payment Completed";
	 }
	 else if($ow["booking_status"]==3)
	 {
		 echo "Booking cancelled";
	 }
	 else
	 {
		 echo "Pending";
	 }
	 ?>
     </td>
    </tr>
    <?php
   }
   ?>
  </table>
</div>
</div>
</form>
</body>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
?>
</html>