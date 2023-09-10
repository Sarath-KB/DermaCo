
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
<?php
include("Head.php");
?>
<?php
include("Sessionvalidation.php");
session_start();
include("../Assets/connection/connection.php");

?>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" style="margin-top:150px" cellpadding="10">
    <tr>
      <td>District</td>
      <td><label for="sel_district"></label>
        <select name="sel_district" id="sel_district" onChange="getPlace(this.value)">
          <option value="">--SELECT--</option>
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
      <td>Place</td>
      <td><label for="sel_place"></label>
        <select name="sel_place" id="sel_place"onChange="getLocation(this.value)" >
          <option value="">--SELECT--</option>
      </select></td>
      <td>Location</td>
      <td><label for="sel_loc"></label>
        <select name="sel_loc" id="sel_loc" onchange="getBranch()">
          <option value="">--SELECT--</option>
      </select></td>
    </tr>
  </table>
<style>
  .main-card {
    display:flex;
    justify-content:center;
    align-items:center;
    gap:3rem;
    margin-top:100px;
  }
  .card {
    border:1px black solid;
    width:fit-content;
    padding:10px;
    width:250px;
  }
</style>
  <div class="main-card" id="result">
  <?php
  $sel="select * from tbl_branch b inner join tbl_location l on l.location_id=b.location_id inner join tbl_place p on p.place_id=l.place_id inner join tbl_district d on d.district_id=p.district_id";
  //echo $sel;
  $data=mysql_query($sel);
  $i=0;
  while($row=mysql_fetch_array($data))
  {
	  $i++;
  ?>
    <div class="col-3 card">
      <div style="display:flex; align-items:center; justify-content:center;"><img src="../Assets/Files/UserDocs/<?php echo $row["branch_photo"]?>" width="150" height="150" /></div>
      <div style="margin-top:10px; margin-bottom:10px; color:black;">
        <div>Name :&nbsp;<?php echo $row["branch_name"]?></div>
        <div>Contact :&nbsp;<?php echo $row["branch_contact"]?></div>
        <div>Email :&nbsp;<?php echo $row["branch_email"]?></div>
      </div>
      <div style="display:flex; align-items:center; justify-content:center;"><a href="ViewRoom.php?bid=<?php echo $row["branch_id"]?>" class="btn btn-success">View Rooms</a></div>
    </div>
    <?php 
    }
    ?>
  </div>
</form>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did)
{
	$.ajax({
		url: "../Assets/Ajaxpages/Ajaxplace.php?did=" + did,
		success: function(data) {
		
			$("#sel_place").html(data);
			getBranch();
		}
	});
}
 function getLocation(pid)
{
	$.ajax({
		url: "../Assets/AjaxPages/AjaxLocation.php?pid=" + pid,
		success: function(data) {
		
			$("#sel_loc").html(data);
			getBranch();

		}
	});
}

  function getBranch()
{
	var did=document.getElementById("sel_district").value;
	var pid=document.getElementById("sel_place").value;
	var lid=document.getElementById("sel_loc").value;
	//alert(did);
	$.ajax({
		url: "../Assets/Ajaxpages/AjaxBranch.php?did=" + did+"&pid="+pid+"&lid="+lid,
		success: function(data) {
		
			$("#result").html(data);

		}
	});
}
</script>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
?>
</html>