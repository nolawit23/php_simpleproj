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
<title>Drug Store Inventory System </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body>
<div id="register" style="
	border: solid 3px #fefcfc;width: 800px;height: auto;margin-left:40px;background-color:#ffffff ">
	<p align="center"><font size="5" color="#181e4e"><b> List Expired Drug</b></font></p>
	<form method="get">
<?php
$con=mysqli_connect('localhost','root','');
if(!$con){ 
die("coud not connect".mysqli_error());
}
mysqli_select_db($con,'drug');
$data=mysqli_query($con,"SELECT * FROM drug ")or die(mysql_error());
$int=mysqli_num_rows($data);
print "<table border='1' cellpadding=3 style='margin-left:50px' cellspacing='0'>
<tr style='background-color: #000000;color: #fff4f4'>
<th>Drug ID</th>
<th>Drug Name</th>
<th>Drug Dosage</th>
<th>Quantity</th>
<th>Price</th>
<th>Drug Brand</th>
<th>Manufactured By </th>
<th>Expire Date</th>
<th>Registered Date </th>
<th>Status</th>
<th>Action</th>
</tr>";
if($int==0){
	echo '<p><font color=red size=4>There is no Expired drug</font></p>';
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
print "<td>".$info['expire_date'];
print "<td>".$info['reg_date'];
$s=$info['drug_id'];
$date=date_create(date('Y-m-d'));
$ex=date_create($info['expire_date']);


if($date>=$ex){
print "<td>".'expired';
mysqli_query($con,"update drug set status='expired' where drug_id='$s'");
}


else{
	print "<td>".$info['status'];
}
if($info['status']=='expired')
	Print "<td>" . "<a href='delexpiredrug.php?  action=edit&drug_id=" . $info['drug_id'] . "'><img src='dimage/delete.png'' </a>" . "</td>";


}
print "</tr>";
print "</table>";
mysqli_close($con);
?>	
</div>
</body>
</html>
