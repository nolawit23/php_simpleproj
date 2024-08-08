<!DOCTYPE html>
<?PHP
session_start();
	if($_SESSION['usertype']!='admin' || $_SESSION['username']=="" ){
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
	border: solid 3px #fefcfc;width: 800px;height: auto;margin-left:40px;background-color:#778899 ">
	<p align="center"><font size="5" color="#181e4e"><b> Update User Account</b></font></p>
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
$result = mysqli_query($con,"SELECT * FROM user");

Print "<table border cellpadding=3 width='100%'>";
print"<tr style='background-color:#000000;color: #fffbfb'>";
print"<th> User ID</th>";
print"<th> First Name</th>";
print"<th> Middle Name</th>";
print"<th> Last Name</th>";
print"<th> User Name</th>";
print"<th> User Type</th>";
print"<th> Status</th>";
print"<th> De_Activate</th>";
print"<th> Delete</th>";
print"</tr>";
Print "<tr>";
while($row = mysqli_fetch_array($result))
{
Print "<td>" . $row['userid'] . "</td>";
Print "<td>" . $row['fname'] . "</td>";
Print "<td>" . $row['mname'] . "</td>";
Print "<td>" . $row['lname'] . "</td>";
Print "<td>" . $row['username'] . "</td>";
Print "<td>" . $row['usertype'] . "</td>";
Print "<td>" . $row['status'] . "</td>";
Print "<td>" . "<a href='acc.php?action=edit&userid=" . $row['userid'] . "'>Deactivate</a>" . "</td>";
$x=$row['userid'];
$m=$row['fname'];
?>

<td align="center"><a href="deleteuser.php?key=<?php echo $x;?>" onclick="return confirm('Are you sure you want to delete (<?php echo $m;?>)');"><img src="dimage/delete.png" height='20' width='20'/></a></td>
<?php
Print "</tr>";
}


echo "</table>";

?>
</div>
</form>
</body>
</html>
