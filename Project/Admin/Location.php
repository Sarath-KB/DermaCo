<?php
include("Head.php");
include("../Assets/connection/connection.php");
if(isset($_POST['submit']))
{
  $place=$_POST['sel_place'];
  $location=$_POST['sel_loc'];
  $ins="insert into tbl_location(location_name,place_id) values('".$location."','".$place."')";
  mysql_query($ins);
}

if(isset($_GET["del"]))
{
  $del="delete from tbl_location where location_id=".$_GET["del"];
  mysql_query($del);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<div class="container-fluid pt-4 px-4">
<div class="bg-light rounded h-100 p-4">
  <table align="center" cellpadding="10" width="300" style="border-collapse:collapse">
    <tr>
       <!-- <th><div align="left">District</div></th> -->
      <td>
      <div class="form-floating mb-3">
        <select name="sel_district" id="sel_district" class="form-control" onChange="getPlace(this.value)">
          <option>District</option>
           <?php
		$selQry = "select * from tbl_district";
		$data = mysql_query($selQry);
		while($row = mysql_fetch_array($data))
		{
		?>
        <option value="<?php echo $row['district_id']  ?>"><?php echo $row['district_name']  ?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <!-- <td>Place</td> -->
      <td><div class="form-floating mb-3">
        <select name="sel_place" class="form-control" id="sel_place">
          <option>Place</option>
      </select></td>
    </tr>
    
    <tr>
      <!-- <td>Location</td> -->
      <td><div class="form-floating mb-3">
      <input type="text" name="sel_loc" class="form-control" placeholder="Location" id="sel_loc" autocomplete="off" required="required" />
 <label for="floatingInput">Location</label>
    </td>
    </tr>
    
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="submit" class="btn btn-outline-primary m-2" id="submit" value="Save" />
        <input type="reset" name="cancel" class="btn btn-outline-primary m-2" id="cancel" value="Cancel" />
      </div></td>
    </tr>
    
  </table>
</form>
</body>
  </div></div>
<div class="container-fluid pt-4 px-4">
<div class="bg-light rounded h-100 p-4">
<table width="300" class="table table-hover">
  <tr>
    <th>#</th>
    <th>District</th>
    <th>Place</th>
    <th>Location</th>
    <th>Action</th>
  </tr>
  <?php 
  $i=0;
  $sel="select * from tbl_location l inner join tbl_place p on l.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id";
  $res=mysql_query($sel);
  while($row = mysql_fetch_array($res))
  {
    $i++;
    ?>
    <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row["district_name"]; ?></td>
    <td><?php echo $row["place_name"]; ?></td>
    <td><?php echo $row["location_name"]; ?></td>
    <td><a href="Location.php?del=<?php echo $row["location_id"]; ?>">Delete</a></td>
    </tr>
    <?php
  }
  ?>
</table>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did)
{
	$.ajax({
		url: "../Assets/ajaxpages/ajaxplace.php?did=" + did,
		success: function(data) {
		
			$("#sel_place").html(data);

		}
	});
}

</script>
<?php
include("Foot.php");
?>
</html>