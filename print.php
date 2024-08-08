<?php
	include("connection.php");  
 session_start();
 if($_SESSION['usertype']!='cashier' || $_SESSION['username']=="" ){
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
<head>
<title>Drug Store Inventory System </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,widtd=900, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>List of Passer</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="widtd: 900px; font-size:16px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
</head>
<body>
<div id="print_content">
<div id="register" style="
	border: solid 3px #fefcfc;width: 800px;height: auto;margin-left:40px;background-color:#778899">
	<table align="center" bgcolor="#b5afd8" cellpadding="3" cellspacing="6">
<center><font size="6" color="#ffffff"><b>List of saled drugs</b></font></h1>
</center>
<center>
	<form> 
<?php
$con=mysqli_connect('localhost','root','');
if(!$con){ 
die("coud not connect".mysqli_error());
}
mysqli_select_db($con,'drug');
$data=mysqli_query($con,"SELECT * FROM saled_drug")or die(mysql_error());
print "<table border='1' cellpadding=3 width='100%'>
<tr style='background-color:#000000;color: #fffbfb'>
<th>Drug ID</th>
<th>Drug Name</th>
<th>Drug Dosage</th>
<th>Quantity</th>
<th>Total Price</th>
<th>Date</th>

</tr>";
while($info=mysqli_fetch_array($data)){
print "<tr>";
print "<td>".$info['drug_id'];
print "<td>".$info['drug_name'];
print "<td>".$info['drug_dosage'];
print "<td>".$info['quantity'];
print "<td>".$info['price'];

print "<td>".$info['date'];
}
print "</tr>";
print "</table>";

mysqli_close($con);
?>

<a href="javascript:Clickheretoprint()">Print</a>
	</form>
	</center>
</table>
</div>
</div>
</body>
</html>
