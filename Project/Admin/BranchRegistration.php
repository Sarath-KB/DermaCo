<?php
include("Head.php");
include("../Assets/connection/connection.php");
if(isset($_POST["txt_save"]))
{
	$name=$_POST['txt_name'];
	$contact=$_POST['txt_contact'];
	$email=$_POST['txt_email'];
	$location=$_POST['txt_location'];
	$password=$_POST['txt_password'];
	
	$image=$_FILES['txt_photo']['name'];
	$path=$_FILES['txt_photo']['tmp_name'];
	move_uploaded_file($path,"../Assets/Files/UserDocs/".$image);
	
	$ins= "insert into tbl_branch(branch_name,branch_contact,branch_email,branch_password,location_id,branch_photo) values('".$name."','".$contact."','".$email."','".$password."','".$location."','".$image."')";
	  mysql_query($ins);
	
		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
  <h3 align="center" style="color:#009CFF;">Branch Registration</h3>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<div class="container-fluid pt-4 px-4">
<div class="bg-light rounded h-100 p-4">

  <table width="400" align="center">
    <tr>
      <!-- <td>Name</td> -->
      <td>
        <div class="form-floating mb-3">
        <input type="text" name="txt_name" id="txt_name" class="form-control" placeholder="Name" autocomplete="off" required="required" onchange="nameval(this)" /><span id="name"></span>
        <label for="floatingInput">Name</label>
        </div>
        </td>
    </tr>
    
    <tr>
      <!-- <td>Contact</td> -->
      <td>
      <div class="form-floating mb-3">
      <input type="text" name="txt_contact" id="txt_contact" placeholder="contact" class="form-control" autocomplete="off" required="required"  pattern="[0-9]{10,10}" onchange="checknum(this)"/><span id="contact"></span>
      <label for="floatingInput">Contact</label>
      </div>
    </td>
    </tr>
    
    <tr>
      <!-- <td>Email</td> -->
      <td>
      <div class="form-floating mb-3">
      <input type="email" name="txt_email" id="txt_email" placeholder="Email" class="form-control" required="required" autocomplete="off" onchange="emailval(this)" /> <span id="content"></span>
      <label for="floatingInput">Email</label>
    </div>
    </td>
    </tr>
    
    <tr>
      <!-- <td>Photo</td> -->
      <td>
      <div class="form-floating mb-3">
      <input type="file" class="form-control" name="txt_photo" id="txt_photo" required="required" />
      <label for="floatingInput">Photo</label>
</div></td>
    </tr>
    
    <tr>
      <!-- <th><div align="left">District</div></th> -->
      <td>
      <div class="form-floating mb-3">
        <select name="sel_district" id="sel_district" class="form-control" onChange="getPlace(this.value)">
          <option>..District..</option>
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
      <td>
      <div class="form-floating mb-3">
        <label for="txt_place"></label>
        <select name="sel_place" class="form-control" id="sel_place" onChange="getLocation(this.value)">
        <option>..Place..</option>
      </select></td>
    </tr>
    
    <tr>
      <!-- <td>Location</td> -->
      <td>
      <div class="form-floating mb-3">
        <label for="txt_location"></label>
        <select name="txt_location" class="form-control" id="txt_location"  >
          <option value="">..Location..</option>
      </select></td>
    </tr>
    
    <tr>
      <!-- <td>Password</td> -->
      <td>
      <div class="form-floating mb-3">  
      <input type="password" placeholder="contact" name="txt_password" class="form-control"  id="txt_password" autocomplete="off" required="required"  />
      <label for="floatingInput">Password</label>
  </div></td>
    </tr>
    <tr>
      <!-- <td>  Re Password</td> -->
      <td>
      <div class="form-floating mb-3">  
      <input type="password" name="txt_cpassword" placeholder="Re password" class="form-control" id="txt_password" autocomplete="off" required="required" onchange="chkpwd(this,txt_password)" /><span id="pass"></span>
      <label for="floatingInput">Re Password</label>
  </div>
    </td>
    </tr>
    
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="txt_save" class="btn btn-outline-primary m-2" id="txt_save" value="Save" />
        <input type="reset" name="txt_cancel" class="btn btn-outline-primary m-2" id="txt_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
  
  </div>
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

		}
	});
}
 function getLocation(pid)
{
	$.ajax({
		url: "../Assets/AjaxPages/AjaxLocation.php?pid=" + pid,
		success: function(data) {
		
			$("#txt_location").html(data);

		}
	});
}


</script>
<script>
    function chkpwd(txtrp, txtp)
{
if((txtrp.value)!=(txtp.value))
{
    document.getElementById("pass").innerHTML = "<span style='color: red;'>Passwords Mismatch</span>";
}
}

function checknum(elem)
{
var numericExpression = /^[0-9]{8,10}$/;
if(elem.value.match(numericExpression))
{
    document.getElementById("contact").innerHTML = "";
    return true;
}
else
{
    document.getElementById("contact").innerHTML = "<span style='color: red;'>Numbers Only Allowed</span>";
    elem.focus();
    return false;
}
}



function emailval(elem)
{ 
var emailexp=/^([a-zA-Z0-9.\_\-])+\@([a-zA-Z0-9.\_\-])+\.([a-zA-Z]{2,4})$/;
if(elem.value.match(emailexp))
{
    document.getElementById("content").innerHTML = "";
    return true;
}
else
{
    
    document.getElementById("content").innerHTML ="<span style='color: red;'>Check Email Address Entered</span>";;
    elem.focus();
    return false;
}
}
function nameval(elem)
{
var emailexp=/^([A-Za-z ]*)$/;
if(elem.value.match(emailexp))
{
    document.getElementById("name").innerHTML = "";
    return true;
}
else
{
    
    document.getElementById("name").innerHTML = "<span style='color: red;'>Alphabets Are Allowed</span>";
    elem.focus();
    return false;
}
}


    </script>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
?>
</html>