<?php
include("Head.php");
$dis="";
$plc="";
include("../Assets/Connection/Connection.php");
if(isset($_POST["save"]))
{
  $dis=$_POST["district"];
  $plc=$_POST["place"];
  $ins="insert into tbl_place(place_name,district_id)values('$plc','$dis')";
  mysql_query($ins);
}
if($_GET["did"])
{
	$did=$_GET["did"];
	$delqry = "delete from tbl_place where place_id='$did'";
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
<form method="POST">
<div class="container-fluid pt-4 px-4">
<div class="bg-light rounded h-100 p-4">
<table  align="center" cellpadding="10" width="300" style="border-collapse:collapse">
<tr>
<!-- <td>District</td> -->

<td>
<div class="form-floating mb-3">
<select name="district" class="form-control" id="sel_district">
<option value="">District</option>
<?php
 $selqry="select * from tbl_district";
 $data=mysql_query($selqry);
 while($row=mysql_fetch_array($data))
 {
?>
     <option value="<?php echo $row["district_id"]?>">
     <?php echo $row["district_name"]?></option>
<?php
 }
 ?>
</select>
</td>

</tr>
<tr>
<!-- <td>Place</td> -->
<td>
<div class="form-floating mb-3">
  <input type="text" class="form-control" placeholder="Place" name="place" value="" autocomplete="off" required="required" >
 <label for="floatingInput">Place</label>
</td>
</tr>

<tr>
<td colspan="2" align="center">
<input type="submit" name= "save" class="btn btn-outline-primary m-2" value="Save" >
<input type="reset" name="txt1" class="btn btn-outline-primary m-2" id="txt1" value="Cancel" />
</td>
</tr>

</table>
</form>
</div></div>
<div class="container-fluid pt-4 px-4">
<div class="bg-light rounded h-100 p-4">
<table border="1" align="center" class="table table-hover" cellpadding="10">
  <tr>
    <th>#</th>
    <th>District</th>
    <th>Place</th>
    <th>Action</th>
  </tr>
  <?php
   $i=0;
   $selqry="select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
   $data=mysql_query($selqry);
   while($row=mysql_fetch_array($data))
   {
	   $i++;
	?>
    <tr>
     <td><?php echo $i?></td>
     <td><?php echo $row["district_name"]?></td>
     <td><?php echo $row["place_name"]?></td>
     <td><a href="Place.php?did=<?php echo $row["place_id"]?>">Delete</a></td>
    </tr>
    <?php
   }
   ?>
</table>



</body>
<?php
include("Foot.php");
?>
</html>