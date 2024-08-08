<!DOCTYPE html>
<?php
	include("connection.php");  
 session_start();
 if($_SESSION['usertype']!='cordinator' || $_SESSION['username']=="" ){
	header("location:index.php");
	}
if(isset($_SESSION['userid']))
 {
  $mail=$_SESSION['userid'];
 } else {
 ?>

<script>
  alert('You Are Not Logged In !! Please Login to access this page');
  alert(window.location='index.php');
 </script>
 <?php
 }
 ?>

<?php

$user_id=$_SESSION['userid'];
$user=$_SESSION['username'];

?>
<html>
<link rel="stylesheet" type="text/css" media="all" href="5/date.css" />
<script type="text/javascript" src="5/date.js"></script>
<head>

<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%Y-%m-%d"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
		});
	};
</script>
<script type="text/javascript">
    var timenow = new Date();
    timenow.format("UTC:h:MM:ss TT Z");
    document.getElementById("date").value = new Date().toUTCString();
</script>
<style>
	#register td
	{
		font-size: 30;
	}
</style>
<script>
  function isdelete()
  {
   var d = confirm('Are you sure you want to Delete !!');
   if(!d)
   {
    alert(window.location='expired.php');
   }
   else
   {
   return false;
    
   }
  }
  </script>
</head>
<body id="body">
	<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,'drug');
if(isset($_GET['drug_id']))
{
$hn=$_GET['drug_id'];
if(isset($_POST['submit']))
{

					$insert=mysqli_query($con,"delete from drug where drug_id='$_GET[drug_id]'"); 
		if($insert)
		{
			echo '<Script>alert("Drug sucessfully deleted")</script>';
			header("location:expired.php");
			
			}
		else
		{
			echo mysql_error();
}

}

$query1=mysqli_query($con,"select * from drug where drug_id='$_GET[drug_id]'");
$query2=mysqli_fetch_array($query1);

?>
<div id="register" style="
	border: solid 3px #3a33c6;width: 600px;height: auto;margin-top: -1px;margin-left:70px;background-color:#ffffff ">
<form action="" method="POST" name="addmult">
<table cellpadding="8" style="margin-left: 150px">
<tr><td colspan="2" ><p><font size="6" color="#045349"> Delete Expired Drug</font> </p></td></tr>
<tr><td><b>Drug ID.:</b></td><td>
<input name="id" type="text" readonly="readonly"value="<?php echo $query2['drug_id']; ?>"  size="25"style=" margin-bottom: 10px;width: 180px;height: 30px;border:1px Solid #071f56;"/></td></tr>


<tr><td><input type="submit" name="submit" onclick='isdelete();'value="delete" style="background-color: #003366;color: #fffbfb;width:100px;height: 40px;font-size: 20px"></td>
<td><input type="submit" name="reset" value="Rset"style="background-color: red;color: #fffbfb;height: 40px;width:100px;font-size: 20px"></tr>
</table>
</form>
<?php
}
?>
</div>
</body>
</html>
