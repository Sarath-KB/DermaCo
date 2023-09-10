<?php
include("Head.php");
include("../Assets/connection/connection.php");

if(isset($_POST['btn_submit']))
{
	
	$name=$_POST['txt_name'];
	$email=$_POST['txt_email'];
	$contact=$_POST['txt_contact'];
    $place=$_POST['sel_place'];
	$password=$_POST['txt_password'];
	
	$image=$_FILES['file_image']['name'];
	$path=$_FILES['file_image']['tmp_name'];
	move_uploaded_file($path,"../Assets/Files/UserDocs/".$image);
	$proof=$_FILES['file_proof']['name'];
	$path1=$_FILES['file_proof']['tmp_ename'];
	move_uploaded_file($path1,"../Assets/Files/UserDocs/".$proof);
	
	
	$ins="insert into tbl_user(user_name,user_contact,user_email,user_photo,user_proof,place_id,user_password)
	values('".$name."','".$contact."','".$email."','".$image."','".$proof."','".$place."','".$password."')";
	
	
	if(mysql_query($ins))
	{
		?>
        <script>
			alert("Query Inserted")
			window.location="NewUser.php";
		</script>
        <?php
	}
	else
	{
		echo "Insert Failed";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Registration</title>
<style>
  body{
    background: url('../Assets/bg.jpg');
    background-repeat: no-repeat;
    background-size: cover;
  }
  table{
    color: aliceblue;
  }
  .tex{
    background-color: transparent;
  }
  /* The Modal */
.modal {
    display: none;
    position: fixed;
    top: 30%;
    left: 25%;

    width: 50%;
    height: 100%;
    z-index: 1;
    justify-content: center;
    align-items: center;
    display: flex;
}

/* Modal Content */
.modal-content {
    background-color: #fff;
    padding: 20px;
    border: 1px solid #888;
    text-align: center;
}

/* Add your additional styles as needed */

</style>
</head>

<body>
<br><br><br><br><br><br><br><br><br><br><br><br>
<div align="center">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<h2 style="color: brown;">User Registration</h2><br><br>
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse;display: none;" id="tb">
  <tr>
      <th><div align="left" class="form-label">Name</div></th>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name"  autocomplete="off" required="required" onchange="nameval(this)"  class="form-control tex"/> <span id="name"></span></td>
    </tr>
    <tr>
      <th><div align="left">Contact</div></th>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_contact" id="txt_contact"required="required"  pattern="[0-9]{10,10}"  onchange="checknum(this)" class="form-control tex"/> <span id="contact"></span></td>
    </tr>
    <tr>
      <th><div align="left">Email</div></th>
      <td><label for="txt_contact"></label>
      <input type="email" name="txt_email" id="txt_email"  autocomplete="off" required onchange="emailval(this)" class="form-control tex"/><span id="content" ></span></td>
    </tr>
    <tr>
      <th><div align="left">Image</div></th>
      <td><label for="file_image"></label>
      <input type="file" name="file_image" id="file_image"required="required"  class="form-control tex" /></td>
    </tr>
    <tr>
      <th><div align="left">Proof</div></th>
      <td><label for="file_proof"></label>
      <input type="file" name="file_proof" id="file_proof"required="required"   class="form-control tex"    /></td>
    </tr>
    
     <tr>
      <th><div align="left">District</div></th>
      <td><label for="sel_district"></label>
        <select name="sel_district" id="sel_district" onChange="getPlace(this.value)"  class="form-select tex">
          <option>--SELECT--</option>
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
      <th><div align="left">Place</div></th>
      <td><label for="sel_place"></label>
        <select name="sel_place" id="sel_place"  class="form-select tex" >
          <option>--SELECT--</option>
      </select></td>
    </tr>
    
    
    <tr>
      <th><div align="left">Password</div></th>
      <td><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password" autocomplete="off" required   class="form-control tex"/></td>
    </tr>
     <tr>
      <th><div align="left">Re Password</div></th>
      <td><label for="txt_password"></label>
      <input type="password" name="txt_cpassword" id="txt_password" autocomplete="off" required onchange="chkpwd(this,txt_password)"   class="form-control tex"/><span id="pass"></span></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit"  class="btn btn-success"/>
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Reset"  class="btn btn-danger"/></td>
    </tr>
  </table>
</form>
</div>
<div id="myModal" class="modal">
  <div class="modal-content">
    <div ><img src="../Assets/Templates/Login/images/smily.png" width="200" height="150" alt=""></div>
      <h2>Welcome to Our Website!</h2>
      <p>Thank you for visiting our website.</p>
  </div>
</div>
</body>



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
var numericExpression = /^[0-9]{10,10}$/;
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

// Get the modal element
var modal = document.getElementById("myModal");
var tb = document.getElementById("tb");

// Function to open the modal
function openModal() {
    modal.style.display = "block";
}

// Function to close the modal
function closeModal() {
    modal.style.display = "none";
    tb.style.display="table";
}

// Open the modal when the page loads
window.onload = function () {
    openModal();

    // Set a time delay (e.g., 5 seconds) to close the modal
    setTimeout(function () {
        closeModal();
    }, 5000); // 5000 milliseconds = 5 seconds
}

    </script>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
?>

</html>