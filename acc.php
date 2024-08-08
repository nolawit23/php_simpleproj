<!DOCTYPE html>
<html>
<head>
<script>
function update(){
				var des=confirm("are you sure you want to deactivate this account?");
			
	if(des==true){
					alert("update sucessfull");
					
				}
				else
				return false;}
</script>
<style>
	#register td
	{
		font-size: 30;
	}
</style>
</head>
<body id="body">
	<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,'drug');
if(isset($_GET['userid']))
{
$hn=$_GET['userid'];
if(isset($_POST['submit']))
{
$j=$_POST['status'];
$query3=mysqli_query($con,"update user set status='$j' where userid='$hn'")or die(mysql_error());

}
$query1=mysqli_query($con,"select * from user where userid='$hn'");
$query2=mysqli_fetch_array($query1);
?>
<div id="register" style="
	border: solid 3px #fefcfc;width: 600px;height: auto;margin-top: -1px;margin-left:70px;background-color:#778899 ">
<form action="" method="POST" name="addmult">
<table cellpadding="8" style="margin-left: 150px">
<tr><td colspan="2" ><p><font size="6" color="#045349">Update User Account</font> </p></td></tr>
<tr><td><b> User ID:</b></td><td>
<input name="userid" type="text" value="<?php echo $query2['userid']; ?>" style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;"/></td></tr>


<tr><td><b> Status:</b></td>
<td>
<?php
$hn=$_GET['userid'];
  		$sq=mysqli_query($con,"select * from user WHERE userid='$_GET[userid]'");
  		$q=mysqli_fetch_array($sq);
  		$st=$q['status'];
  		if($st=='Active')
  		{
  			echo"<select name='status' style=' margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;'>";
		echo"<option value='Active' selected>Active</option>";
		echo"<option value='deactivate'>Deactivate</option>";
	echo"</select>";
	}
	else
	{
	echo"<select name='status' style='margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;'>";
		echo"<option value='Active' >Active</option>";
		echo"<option value='deactivate' selected>Deactivate</option>";
	echo"</select>";	
	}
	?>
</td></tr>
<tr><td><button type="submit" name="submit" onclick="return update();" style="background-color: #003366;color: #fffbfb;width:100px;height: 40px;font-size: 20px">Deactivate</button></td>
<td><button type="submit" name="reset" style="background-color: red;color: #fffbfb;height: 40px;width:100px;font-size: 20px">Reset</button></tr>
</table>
</form>
<?php
}
?>
</div>
</body>
</html>
