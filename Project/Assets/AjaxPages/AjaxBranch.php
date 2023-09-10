<?php
include("../connection/connection.php");
$sel="select * from tbl_branch b inner join tbl_location l on l.location_id=b.location_id inner join tbl_place p on p.place_id=l.place_id inner join tbl_district d on d.district_id=p.district_id where true";
//echo $sel;
if($_GET["lid"]!="")
{
	$sel.=" and b.location_id='".$_GET["lid"]."'";
}
if($_GET["pid"]!="")
{
	$sel.=" and l.place_id='".$_GET["pid"]."'";
}
if($_GET["did"]!="")
{
	$sel.=" and p.district_id='".$_GET["did"]."'";
}
?>
  <style>
  .main-card {
    display:flex;
    justify-content:center;
    align-items:center;
    gap:3rem;
    margin-top:50px;
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
  
  $data=mysql_query($sel);
  $i=0;
  while($row=mysql_fetch_array($data))
  {
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