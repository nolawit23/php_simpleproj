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


?>
<html>
<head>
<script type = "text/javascript" >
 function preventBack()
 {
 window.history.forward();
 } 
 setTimeout("preventBack()", 0); 
 window.onunload=function(){null};
  </script>
  </head>
  <head>
<title>Drug Store Inventory System </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="styles.php" rel="stylesheet" type="text/css"/>

<style>
	h5
	{
	background-color:#003366;
	height:50px;
	color:#ffffff;	
	}
	.form-signin {
            max-width: 250px;
            padding: 6px;
            margin: 0 auto;
            color: #017572;
         }
         
	#right button
	{
		background-color: #047b99;
		color: #fffbfb;
		width: 170px;
		height: 40px;
	
	}
	#right select
	{
		width: 170px;
		height: 30px;
	}
	#right input
	{
		  margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
		width: 170px;
		height: 30px;
	}
	#right h5{
		width: 170px;
	}
	#register form button
	{
		background-color: #178080;
		color: #fff4f4;
		width: 100px;
	}
	#right{
		background-color:blue;
	}
	
</style>
<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
} 	
return output;
}
</script>
<style>
	#register
	{
		
		margin-left: 70px;
		width: 500px;
		height: auto;
	}
</style>
</head>
<body id="body">
<div id="contaner">

  <header id="header" class="clear">    
   <div id="header1">
         <img src ="dimage/final1.JPG" alt="m1" width="1100px" height="140px" />
    </div>
	</header>
<div class="wrapper row2">
  <div class="rounded">
    <nav id="mainav" class="clear"> 
     <ul class="clear">
        <li class="active"><a href="cordinator.php">Home</a></li>     
	<li> <a href="regdrug.php" target="content">Register Drug</a></li> 
 <li> <a href="expired.php"  target="content">Check Expire Date</a></li>
      <li> <a href="viewdrug.php"  target="content">view Drug</a></li>
<li class="active"><a href="changePassword.php" target="content">Change Password</a></li>
    	    <li class='active'><a href="logout.php">Logout</a>
          
 </li>

    	
         </ul>
     </nav>
  </div>
</div>
<div id="left" style="width: 20px;
	height: 900px;
	background-color:   	#000000;
	font-size: !important;
	border-bottom-right-radius: !important;
	margin-left: 0PX;
	margin-bottom: -20PX;
	margin-top: -29PX;
	border: 20PX;
	float: left;
	border-radius: 10PX;
	margin-right: 1PX;">
	
</div>
<!-- close left div---->
<div id="centerrrr">
	<div id="register" style="background-color: #fffdfd;margin-left: 25px;width: 880px;height: auto;margin-top: -10px;border-radius: 23PX;border: 0PX SOLID">
	<iframe  src="HMANAwell.php" name="content" width="880px" height="840px" frameBorder="0" scrolling="yes" style="">
</iframe>
	<br />
	<br />
</div><br /><br />
</div><!-- close center div---->

<div id="right" style="margin-top: -890px">

		
	<?php
	
	include('connection.php');
$sql = "select Photo from user WHERE username='$_SESSION[username]'";
$query = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($query))
{
echo "<img src='uploads/".$row['Photo']."' width='200'height='100' style='margin-top: -17px;' />" ; 	
}
?><br/><br/>
<a  href="hmanagerupdateprofile.php" target="content"><font size="4" color="#1E90FF">Update Profile</font></a>
<br />
<div id ="cal" style="width: 180px; margin-left: 10px;">
<h5 style="width: 190px;margin-left: -10px" align="center"><font size="5"> Date</font></h5>
<table width="180px" height="40px">
 
       <font color="white"> <script type="text/javascript" src="date_time.js"></script>
    <body>
            <span id="date_time"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script></font>
  
</body>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" media="screen, print, handheld" type="text/css" href="calendar.css" />
        <script type="text/javascript" src="calendar.js"></script>
    </head>
        <script type="text/javascript">
     
        </script>
        </table>
</div>
</div><!-- close right div---->
</div><!-- close container div---->
<div id="footer">
<b><strong><center>Developed By THRED YEAR SOFTWARE regular Students<center></strong></b>
</div><!---close footer div--->
</body>
</html>
