<?php
include("Head.php");
$fn="";
include("../Assets/Connection/Connection.php");
if(isset($_POST["save"]))
{
  $fn=$_POST["district"];
  $ins="insert into tbl_district(district_name) values('$fn')";
  mysql_query($ins);
}
if($_GET["did"])
{
	$did=$_GET["did"];
	$delqry = "delete from tbl_district where district_id='$did'";
	mysql_query($delqry);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form</title>
</head>
<body>
 <form id="form1" name="form1" method="post" action="">
 <div class="container-fluid pt-4 px-4">
<div class="bg-light rounded h-100 p-4">
 <table width="400" align="center" cellpadding="10" style="border-collapse:collapse">
 <tr>
 <!-- <td>District</td> -->
 <td>
 <div class="form-floating mb-3">
 <input type="text" name="district" placeholder="District" class="form-control" autocomplete="off" required="required" >
 <label for="floatingInput">District</label>
</div>
 </td>
 </tr>
 <tr>
 <td colspan="2" align="center">
 <input type="submit" name="save" class="btn btn-outline-primary m-2" value="SAVE" >
 <input type="reset" name="cancel" class="btn btn-outline-primary m-2" value="CANCEL" /></td>
 </tr>
 </table>
 </form>
</div>
</div>
 <div class="container-fluid pt-4 px-4">
<div class="bg-light rounded h-100 p-4">
 <table  border="1" align ="center" class="table table-hover" cellpadding="10">
   <tr>
     <th>#</th>
     <th>District</th>
     <th>Action</th>
   </tr>
   <?php
   $i=0;
   $selqry="select * from tbl_district";
   $data=mysql_query($selqry);
   while($row=mysql_fetch_array($data))
   {
	   $i++;
	?>
    <tr>
     <td><?php echo $i?></td>
     <td><?php echo $row["district_name"]?></td>
     <td><a href="District.php?did=<?php echo $row["district_id"]?>">Delete</a></td>
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