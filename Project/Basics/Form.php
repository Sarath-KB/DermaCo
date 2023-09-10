<?php
 $fname="";
 $lname="";
 $g="";
 $m=""; $basic="";
 $name="";
 $dept="";
 $ta="";
 $da="";
 $hra="";
 $lic="";
 $pf="";
 $ded="";
 $net="";
if(isset($_POST["submit"]))
{
 $fname=$_POST["fn"];
  $lname=$_POST["ln"];
  $name=$fname." ".$lname;
  $g=$_POST["gender"];
  $m=$_POST["marital"];
  $dept=$_POST["select"];
 $basic=$_POST["salary"];
       if($g=="male")
		{
			$name="Mr.".$name;
			
		}
		else if($g == "female" && $m == "married")
		{
			$name="Mrs.".$name;
		}
		else
		{
			$name="Ms.".$name;
		}
		if($basic>=10000)
		{
		$ta=($basic/100)*40;
		$da=($basic/100)*35;
		$hra=($basic/100)*30;
		$lic=($basic/100)*25;
		$pf=($basic/100)*20;
		}
		else if($basic>=5000 && $basic<10000)
		{
		$ta=($basic/100)*35;
		$da=($basic/100)*30;
		$hra=($basic/100)*25;
		$lic=($basic/100)*20;
		$pf=($basic/100)*15;
		}
		else if($basic<5000)
		{
		$ta=($basic/100)*30;
		$da=($basic/100)*25;
		$hra=($basic/100)*20;
		$lic=($basic/100)*15;
		$pf=($basic/100)*10;
		}
		$ded=$lic + $pf;
		$net=($basic+$ta+$da+$hra)- ($ded);
}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<p>&nbsp;</p>
<body>
<form id="form1" name="form1" method="post" action="">
<table border="1">
<tr>
<td>Firstname</td>
<td><input type="text"  name="fn" value=<?php echo $fname;?> ></td>
</tr>
<tr>
<td>Lastname</td>
<td><input type="text" name="ln" value=<?php echo $lname;?>></td>
</tr>
<tr>
<td>Gender</td>
<td><input type="radio" name="gender" value="male">male<br>
<input type="radio" name="gender" value="female">female</td>
</tr>
<tr>
<td>Martial</td>
<td><input type="radio" name="marital" value="single">single<br>
<input type="radio" name="marital" value="married" >married</td>
</tr>
<tr>
<td>Department</td>
<td>
<select name="select">
<option value="">---select---</option>
<option value="BCA">BCA</option>
<option value="BTTM">BTTM</option>
</select>
</td>
</tr>
<tr>
<td>Basic salary</td>
<td><input type="number" name="salary"></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" name="submit" value="SUBMIT" >
<input type="reset"  name="submit" value="CANCEL">
</td>
</tr>
</table>
<table border="1">
<tr>
<td>Name</td><td><?php echo $name;?></td>
</tr>
<tr>
<td>Gender</td>
<td><?php echo $g;?></td>
</tr>
<tr>
<td>Marital</td>
<td><?php echo $m;?></td>
</tr>
<tr>
<td>Department</td>
<td><?php echo $dept;?></td>
</tr>
<tr>
</tr>
<tr>
<td>Basic Salary</td>
<td><?php echo $basic;?></td>
</tr>
<tr>
<td>T.A</td>
<td><?php echo $ta;?></td>
</tr>
<tr>
<td>D.A</td>
<td><?php echo $da;?></td>
</tr>
<tr>
<td>HRA</td>
<td><?php echo $hra;?></td>
</tr>
<tr>
<td>LIC</td>
<td><?php echo $lic;?></td>
</tr>
<tr>
<td>P.F</td>
<td><?php echo $pf;?></td>
</tr>
<tr>
<td>Deduction</td>
<td><?php echo $ded;?></td>
</tr>
<tr>
<td>NET</td>
<td><?php echo $net;?></td>
</tr>
</table>
</form>
</body>
</html>
