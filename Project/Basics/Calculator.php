<?php
$result="";
$no1="";
$no2="";
if(isset($_POST["btn_add"]))
{
	$no1=$_POST["txt_no2"];
	$no2=$_POST["txt_no3"];
	$result=$no1+$no2;
}
if(isset($_POST["btn_mul"]))
{
	$no1=$_POST["txt_no2"];
	$no2=$_POST["txt_no3"];
	$result=$no*+$no2;
}
if(isset($_POST["btn_div"]))
{
	$no1=$_POST["txt_no2"];
	$no2=$_POST["txt_no3"];
	$result=$no1/$no2;
}
if(isset($_POST["btn_sub"]))
{
	$no1=$_POST["txt_no2"];
	$no2=$_POST["txt_no3"];
	$result=$no1-$no2;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td width="40">Number1</td>
      <td width="144"><label for="txt_no2"></label>
      <input type="text" name="txt_no2" id="txt_no2" /></td>
    </tr>
    <tr>
      <td>Number2</td>
      <td><label for="txt_no3"></label>
      <input type="text" name="txt_no3" id="txt_no3" /></td>
    </tr>
    <tr>
      <td colspan="2">
      <input type="submit" name="btn_add" id="btn_add" value="add" />
	   <input type="submit" name="btn_mul" id="btn_add" value="mul" />
	    <input type="submit" name="btn_div" id="btn_add" value="div" />
		 <input type="submit" name="btn_sub" id="btn_add" value="sub" />
         </td>
    </tr>
    <tr>
      <td>Result</td>
      <td><?php echo $result;?>;</td>
    </tr>
  </table>
  <label for="txt_no1"></label>
</form>
</body>
</html>