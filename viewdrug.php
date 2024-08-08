<!DOCTYPE html>
<?PHP
session_start();
	if($_SESSION['usertype']!='cordinator' || $_SESSION['username']=="" ){
	header("location:index.php");
	}
?>
<html>
<head>
<title>Drug Inventory System  </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body><br />
<div id="cc" style="margin-left: 50px">
<table align="center" bgcolor="#b5afd8" cellpadding="6" cellspacing="0">
<center><font size="5"><b>List Of Registered Drug </b></font></h1>
</center>
<center>
	<form> 
<?php
$con=mysqli_connect('localhost','root','');
if(!$con){ 
die("coud not connect".mysqli_error());
}
mysqli_select_db($con,'drug');
$data=mysqli_query($con,"SELECT * FROM drug")or die(mysqli_error());
$int=mysqli_num_rows($data);
print "<table border='1' cellpadding=4 style='margin-left:70px' cellspacing='0'>
<tr style='background-color: #000000;color: #fff4f4'>
<th>Drug ID</th>
<th>Drug Name</th>
<th>Drug Dosage</th>
<th>Quantity</th>
<th>Unit Price</th>
<th>Drug Brand</th>
<th>Manufactured By </th>
<th>Registered Date </th>
<th>provided by </th>
<th>Expire Date</th>

<th>Status</th>
</tr>";
if($int==0){
	echo '<p><font color=red size=4>There is no available drug</font></p>';
}
while($info=mysqli_fetch_array($data)){
print "<tr>";
print "<td>".$info['drug_id'];
print "<td>".$info['drug_name'];
print "<td>".$info['drug_dosage'];
print "<td>".$info['quantity'];
print "<td>".$info['price'];
print "<td>".$info['drug_brand'];
print "<td>".$info['company'];
print "<td>".$info['reg_date'];
print "<td>".$info['pharmacy'];
print "<td>".$info['expire_date'];
	print "<td>".$info['status'];
}
print "</tr>";
print "</table>";
mysqli_close($con);
?>	
	</form>
	</center>
</table>
</div>
</body>
</html>
