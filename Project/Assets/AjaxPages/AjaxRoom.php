
<?php
include("../connection/connection.php");
session_start();
$search=$_GET["did"]
?>
<table align="center" cellpadding="10" cellspacing="60" id="result">
  <tr>
  <?php
  $sel="select * from tbl_roomdetails where branch_id='".$_SESSION["bid"]."' and room_type LIKE '$search%'";
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
  <a href="#" class="btn btn-success">Book Now</a>
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