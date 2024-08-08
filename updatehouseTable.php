<!DOCTYPE html>
<?PHP
session_start();
	if($_SESSION['usertype']!='hmanager' || $_SESSION['username']=="" ){
	header("location:index.php");
	}
?>
<html>
<head>
<title>WEB DASED  DMU HOUSE MANAGEMNT SYSTEM  </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body>
<div id="tr" style="margin-left: 20px">
<p align="center"><font size="6" color="#26137d">Update Houses</font></p>
<form method="get">
<?php
//connects to database
$con = mysql_connect("localhost","root","");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}

mysql_select_db("kebele", $con);

//retrieve data from database
$result = mysql_query("SELECT * FROM house");

Print "<table border cellpadding='1' cellspacing='0' width='80%'>";
print"<tr style='background-color: #2d8a8a;color: #fff4f4'>";
print"<th> House Number</th>";
print"<th> Floar Number </th>";
print"<th> House Type</th>";
print"<th> Status</th>";
print"<th> Update</th>";
print"</tr>";
Print "<tr>";
while($row = mysql_fetch_array($result))
{

Print "<td>" . $row['housenumber'] . "</td>";
Print "<td>" . $row['floarnumber'] . "</td>";
Print "<td>" . $row['housetype'] . "</td>";
Print "<td>" . $row['status'] . "</td>";
Print "<td>" . "<a href='updahouse.php?action=edit&housenumber=" . $row['housenumber'] . "'>Edit</a>" . "</td>";
Print "</tr>";
}
echo "</table>";

?>
</form>	
</div>
</body>
</html>
