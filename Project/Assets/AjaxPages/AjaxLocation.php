<option value="">..Location..</option>
<?php
include("../connection/connection.php");
$place=$_GET["pid"];
$selQry="select * from tbl_location where place_id='$place'";
$data=mysql_query($selQry);
while($row=mysql_fetch_array($data))
  {
	  ?>
	  <option value="<?php echo $row['location_id']?>">
      <?php echo $row['location_name'] ?></option>
      <?php
  }
  ?>