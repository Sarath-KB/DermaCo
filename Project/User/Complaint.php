<?php
include("../Assets/connection/connection.php");
session_start();
include("Head.php");
if(isset($_POST["btnsub"]))
   {
	 $title=$_POST["txttitle"];
	 $details=$_POST["txtdetails"];
	 $insQry="insert into tbl_complaint(complaint_title ,complaint_details,user_id)values('$title','$details','".$_SESSION['uid']."')";
	
	mysql_query($insQry);
   }
   
   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint</title>
</head>

<style>
  .con {
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
    margin-top:200px;
    margin-bottom:200px;
  }
</style>

<body>
<form id="form1" name="form1" method="post" action="">

<div class="con">
<table>
  <tr>
    <td>Title</td>
    <td>
      <label for="txttitle"></label>
      <input type="text" style="padding:5px 96px" name="txttitle" id="txttitle" />
   </td>
  </tr>
  <tr>
    <td>Details</td>
    <td>
      <label for="txtdetails"></label>
      <textarea name="txtdetails" id="txtdetails" cols="45" rows="5"></textarea>
      <label for="txtdetiails"></label></td>
  </tr>  
</table>
<div>
<input type="submit" name="btnsub" style="padding: 8px 153px; margin-left:53px; background-color:#005555; border:none; color:white; border-radius:10px" id="btnsub" value="Submit" />
</div>
</div>
</form>
</body
></html>
<?php 
include("Foot.php");
?>