<!DOCTYPE html>
<?PHP
session_start();
	if($_SESSION['usertype']!='hmanager' || $_SESSION['username']=="" ){
	header("location:index.php");
	}
?>s
<html>
<head>
<script>
function update(){
				var des=confirm("are you sure you want to update this account?");
			
	if(des==true){
					alert("update sucessfull");
				}
				else
				return false;}
</script>
<title>WEB DASED  DMU HOUSE MANAGEMNT SYSTEM  </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body>
<div id="register" style="
	border: solid 3px #0f1ba8;width: 600px;height: 600px;border-corner-shape:#02d01c;border-radius:80px;margin-left:90px">
<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("hms",$con);
if(isset($_GET['ApID']))
{
$hn=$_GET['ApID'];
if(isset($_POST['submit']))
{
$f=$_POST['blocknumber'];
$g=$_POST['housenumber'];
$h=$_POST['location'];
$i=$_POST['status'];
$query3=mysql_query("update assignedhouse set blocknumber='$f',housenumber='$g',location='$h',status='$i' where ApID='$hn'")or die(mysql_error());
$query4=mysql_query("update house set status='$i' WHERE housenumber='$g'");
}
$query1=mysql_query("select * from assignedhouse where ApID='$hn'");
$query2=mysql_fetch_array($query1);
?>

<form action="" method="POST" name="addmult">
<table cellpadding="4" border="0" style="margin-left: 40px" height="400px" >
<tr><td colspan="2" ><h1><font size="6" color="#0b2c82"> Assigned House  Update Form</font></h1></td></tr>
<tr><td><b> Applicant ID:</b></td><td>
<input name="ApID" type="text" value="<?php echo $query2['ApID']; ?>" style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;"/></td></tr>
  
<tr><td ><b>Building Number:</b></td>
<td><input name="blocknumber" type="text" value="<?php echo $query2['blocknumber']; ?>" style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;"/></td></tr>
<tr><td ><b> House Number:</b></td>
<td><input name="housenumber" type="text" value="<?php echo $query2['housenumber']; ?>" style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;"/></td></tr>
<tr><td ><b>Location:</b></td>
<td><input name="location" type="text" value="<?php echo $query2['location']; ?>" style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;"/></td></tr>
<tr><td ><b> Status:</b></td>
<td><?php
$hn=$_GET['ApID'];
  		$sq=mysql_query("select * from assignedhouse WHERE ApID='$_GET[ApID]'");
  		$q=mysql_fetch_array($sq);
  		$st=$q['status'];
  		if($st=='occupied')
  		{
  			echo "<select name='status' style='margin-bottom: 10px;width: 180px;height: 30px;'>";
  			echo "<option value='occupied'  selected>Occupied</option>";
  			echo "<option value='free' >Free</option>";
		}
  		else{
  		echo "<select name='status' style='margin-bottom: 10px;width: 180px;height: 30px;'>";
  			echo "<option value='occupied' >Occupied</option>";
  			echo "<option value='free' selected>Free</option>";		
		}
  		?></td></tr>
<tr><td colspan="2"><button type="submit" name="submit" onclick="return update();" style="background-color: #1b5c53;color: white">Update</button></td></tr>
<!---- <tr><th><a href="updatehouseTable.php">Back to Update Table</a></<th></tr>---->
</table>
</form>
<?php
}
?>
<p><font size="3" color="#244e93"><a href="updateassignedhouseTable.php">Back to update Table</a></font></p>
</div>
</body>
</html>
