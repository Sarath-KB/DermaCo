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

if(isset($_POST["btn"]))
{
	$selb="select * from tbl_booking where checkin_date='".$_POST["txtdate"]."' and room_id='".$_GET["did"]."'";
	$datab=mysql_query($selb);
	if($rowb=mysql_fetch_array($datab))
	{
		?>
        <script>
		alert("Room Not Available For The Day Please Choose Other AvailABle Rooms")
		window.location="SearchBranch.php";
        </script>
        <?php
	}
	else
	{
	$ins="insert into tbl_booking(booking_date,room_id,booking_amount,user_id,checkin_date)values(curdate(),'".$_GET["did"]."','".$_POST["txtt"]."','".$_SESSION["uid"]."','".$_POST["txtdate"]."')";
	
	if(mysql_query($ins))
	{
		header("location:Payment.php");
	}
	else
	{
		?>
        <script>
		alert("Due To Server Issue Your Booking is Not Completed Please try Again AFter Some Time.....")
        </script>
        <?php
	}
	}
}
$sel="select * from tbl_roomdetails where room_id='".$_GET["did"]."'";
$datauser=mysql_query($sel);
$rowuser=mysql_fetch_array($datauser);
?>
<form method="post">
  <table width="350" border="1" align="center">
    <tr>
     
      <td colspan="2" align="center"><img src="../Assets/Files/UserDocs/<?php echo $rowuser['room_image'] ?>" width="150" height="150"/></td>
    </tr>
    <tr>
      <td width="51">DETIALS</td>
      <td width="283"><label for="txt1"></label>
      <?php echo $rowuser["room_details"] ?>
      </td>
    </tr>
    <tr>
      <td>RATE</td>
      <td><label for="txt2"></label>
      <input type="hidden" name="txtrate" id="txtrate" value="<?php
	  echo $rowuser["room_rate"];
	  ?>"  />
      <?php
	  echo $rowuser["room_rate"];
	  ?>
      </td>
      </td>
    </tr>
    <tr>
      <td>Room Type</td>
      <td><label for="txt3"></label>
      <?php
	  echo $rowuser["room_type"];
	  ?>
      </td>
      
     
    </tr>
    <tr>
      <td>Room Service</td>
      <td><label for="txt3"></label>
      <?php
	  echo $rowuser["room_service"];
	  ?>
      </td>
      
     
    </tr>
   
    <tr>
    <td>No Of Days </td>
    <td><input type="number" name="txtnum"  id="txtnum" min="1" onchange="getTotal()" /></td>
    </tr>
    <tr>
    <td>Check In Date</td>
    <td><input type="date" name="txtdate"  id="txtnum"  /></td>
    </tr>
    <tr>
    <td>Grand Total</td>
    <td><input type="text" name="txtt"  id="txtt"readonly="readonly"  /></td>
    </tr>
    <tr>
    <td colspan="2" align="center">
    <input type="submit" value="Book Now" name="btn" />
    </td>
    </tr>
    
  </table>
  </form> 
<?php
	
?>
</body>
</html>
<script>
function getTotal()
{
	var rate=document.getElementById("txtrate").value;
	var qt=document.getElementById("txtnum").value;
	var tot=rate*qt;
	document.getElementById("txtt").value=tot;
}
</script>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
?>