<!DOCTYPE html>
<html>
<head>
<title>WEB DASED  DMU HOUSE MANAGEMNT SYSTEM  </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<body>
	<center><font size="6"><b>View Rule Form</b></font></h1>
</center>
<center>
	<form> 
<?php
$con=mysql_connect('localhost','root','');
if(!$con){ 
die("coud not connect".mysql_error());
}
mysql_select_db("hms",$con);
$data=mysql_query("SELECT * FROM rule")or die(mysql_error());
print "<table border='1' cellpadding=3 style='margin-left: 20px' cellspacing='0'>
<tr style='background-color: #2d8a8a;color: #fff4f4'>
<th>Rule ID</th>
<th>Rule Name</th>
<th>Mark</th>
</tr>";
while($info=mysql_fetch_array($data)){
print "<tr>";
print "<td>".$info['RID'];
print "<td>".$info['Rname'];
print "<td>".$info['mark'];
}
print "</tr>";
print "</table>";
mysql_close($con);
?>	
	</form>
	</center>
	</table>
	<br />
	
</body>
</html>
