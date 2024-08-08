<!DOCTYPE html>
<?PHP
include('connection.php');
session_start();
	if($_SESSION['usertype']!='manager' || $_SESSION['username']=="" ){
	header("location:index.php");
	}
?>
<html>
<head>
<title>Drug Store Inventory System </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body>
<div id="register" style="
	border: solid 3px #fefcfc;width: 800px;height: auto;margin-left:40px;background-color:#778899">
	<table align="center" bgcolor="#b5afd8" cellpadding="3" cellspacing="6">
<center><font size="6" color="#ffffff"><b>List Of Employee</b></font></h1>
</center>
<center>
	<form> 
<?php
$con=mysqli_connect('localhost','root','');
if(!$con){ 
die("coud not connect".mysqli_error());
}
mysqli_select_db($con,'drug');
$data=mysqli_query($con,"SELECT * FROM employee")or die(mysqli_error());
print "<table border='1' cellpadding=3 width='100%'>
<tr style='background-color:#000000;color: #fffbfb'>
<th>Employee ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Sex</th>
<th>Role</th>
<th>Email</th>
<th>Phone</th>
<th>Address</th>
<th>Status</th>
</tr>";
while($info=mysqli_fetch_array($data)){
print "<tr>";
print "<td>".$info['empid'];
print "<td>".$info['fname'];
print "<td>".$info['mname'];
print "<td>".$info['sex'];
print "<td>".$info['role'];
print "<td>".$info['email'];
print "<td>".$info['phone'];
print "<td>".$info['address'];
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
