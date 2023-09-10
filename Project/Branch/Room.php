<?php
include("Head.php");
?>
<br><br><br><br><br><br><br><br>
<?php
include("Sessionvalidation.php");
$fn="";
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_POST["save"]))
{
  $rate=$_POST["rate"];
  $details=$_POST["details"];
  $type=$_POST["type"];
  $service=$_POST["service"];
  $image=$_FILES['image']['name'];
	$path=$_FILES['image']['tmp_name'];
	move_uploaded_file($path,"../Assets/Files/UserDocs/".$image);
	$ins="insert into tbl_roomdetails (room_rate,room_details,room_type,room_service,room_image,branch_id) values
	('".$rate."','".$details."','".$type."','".$service."','".$image."','".$_SESSION["bid"]."')";
  mysql_query($ins);
  header("location:Room.php");
		
}
if($_GET["did"])
{
	$did=$_GET["did"];
	$delqry = "delete from tbl_roomdetails where room_id='$did'";
	mysql_query($delqry);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1" align="center" cellpadding="10px">
    <tr>
      <td>Image</td>
      <td><label for="image"></label>
      <input type="file" name="image" id="image" required="required" /></td>
    </tr>
    <tr>
      <td>Rate</td>
      <td><label for="rate"></label>
      <input type="text" name="rate" id="rate" autocomplete="off" required="required" /></td>
    </tr>
    <tr>
      <td>Details</td>
      <td><label for="details"></label>
      <textarea name="details" id="details" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>RoomType</td>
      <td><label for="type"></label>
      <input type="text" name="type" id="type" autocomplete="off" required="required" /></td>
    </tr>
    <tr>
      <td>Services</td>
      <td><label for="service"></label>
      <textarea name="service" id="service" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="save" id="save" value="Save" />
        <input type="reset" name="cancel" id="cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
  <table  border="1" align="center" cellpadding="10" style="margin-top:10px">
    <tr>
      <th>Sl.No</th>
      <th>Image</th>
      <th>Rate</th>
      <th>Details</th>
      <th>Room</th>
      <th>Action</th>
    </tr>
    <?php
   $i=0;
   $selqry="select * from tbl_roomdetails where branch_id='".$_SESSION["bid"]."'";
   $data=mysql_query($selqry);
   while($row=mysql_fetch_array($data))
   {
	   $i++;
	?>
    <tr>
    <td><?php echo $i?></td>
     <td><img src="../Assets/Files/UserDocs/<?php echo $row["room_image"]?>" width="130" alt=""></td>
     <td><?php echo $row["room_rate"]?></td>
     <td><?php echo $row["room_details"]?></td>
      <td><?php echo $row["room_type"]?></td>
     <td><a href="Room.php?did=<?php echo $row["room_id"]?>">Delete</a> |<a href="Gallery.php?did=<?php echo $row["room_id"]?>">Add Gallery</a></td>
    </tr>
    
    <?php
   }
   ?>
  </table>
</form>
</body>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
?>
</html>