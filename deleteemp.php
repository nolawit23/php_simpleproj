<!DOCTYPE html>
<?PHP
session_start();
	if($_SESSION['usertype']!='manager' || $_SESSION['username']=="" ){
	header("location:index.php");
	}
?>
<html>
<head>
<title>Drug  Inventory System </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body>
<div id="register" style="
	border: solid 3px #fefcfc;width: 800px;height: auto;margin-left:40px;background-color:#778899 ">
	<p align="center"><font size="5" color="#181e4e"><b> Delete Employee information</b></font></p>
	<form method="get">
<?php
//connects to database
$con = mysqli_connect("localhost","root","");
if (!$con)
{
die('Could not connect: ' . mysqli_error());
}

mysqli_select_db($con,'drug');

//retrieve data from database
$result = mysqli_query($con,"SELECT * FROM employee");

Print "<table border cellpadding=3 width='100%'>";
print"<tr style='background-color:#000000;color: #fffbfb'>";
print"<th> Employee ID</th>";
print"<th> First Name</th>";
print"<th> Last Name</th>";
print"<th> Sex</th>";
print"<th> Role</th>";
print"<th> Delete</th>";
print"</tr>";
Print "<tr>";
while($row = mysqli_fetch_array($result))
{
Print "<td>" . $row['empid'] . "</td>";
Print "<td>" . $row['fname'] . "</td>";
Print "<td>" . $row['mname'] . "</td>";
Print "<td>" . $row['sex'] . "</td>";
Print "<td>" . $row['role'] . "</td>";

$x=$row['empid'];
$w=$row['fname'];
?>

<td align="center"><a href="delemployee.php?key=<?php echo $x;?>" onclick="return confirm('Are you sure you want to delete (<?php echo $w;?>)');"><img src="dimage/delete.png" height='20' width='20'/></a></td>
<?php
Print "</tr>";
}


echo "</table>";

?>
</div>
</form>
</body>
</html>
