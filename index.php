<!DOCTYPE html>
<html>
  <head>
<title>Drug Store Inventory System </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="styles.php" rel="stylesheet" type="text/css"/>
<script type = "text/javascript" >
 function preventBack()
 {
 window.history.forward();
 } 
 setTimeout("preventBack()", 0); 
 window.onunload=function(){null};
  </script>
<style>
	h5
	{
	background-color:#004566;
	height:50px;
	color:#ffffff;	
	}
	.form-signin {
            max-width: 250px;
            padding: 6px;
            margin: 0 auto;
            color: #002625;
         }
         
	#right button
	{
		background-color: #008080;
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
#leftt hr{
		color: white;
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
        <li class="active"><a href="index.php">Home</a></li>     
	<li><a  href="description.php" target="content">Drug Description</a></li>
			   <li class="active"><a  href="viewdrugi.php"  target="content">View drug</a></li>
			   <li class="active"><a href="searchdrugs.php" target="content">View drugs detail</a></li>
			   <li><a href="https://www.google.com/maps" target="self">Map</a></li>





    	
         </ul>
     </nav>
  </div>
</div>
<div id="leftt" style="width: 180px;
	height: 910px;
	background-color:#000000;
	font-size: !important;
	border-bottom-right-radius: !important;
	margin-left: 1X;
	margin-bottom: 20PX;
	margin-top: -18PX;
	border: 20PX;
	float: left;
	border-radius: 10PX;
	margin-right: 1PX;">
	


<br/><br />
<style>
#z{
	color:#ffffff;
}

</style>
<h5> Drug List</h5><div id="z">
<ul>
<li><a href="c.php" target="content"><font color="#ffffff">Chloroquine</font></a></li>
<li><a href="f.php"target="content"><font color="#ffffff">Fapisyn</a></li>
<li><a href="a.php" target="content"><font color="#ffffff">Amoxicillin</a></li>
<li><a href="b.php" target="content"><font color="#ffffff">Benadryl</a></li>
<li><a href="e.php" target="content"><font color="#ffffff"> Esomeprazole</a></li>
<li><a href="ce.php" target="content"><font color="#ffffff">Cephalexin</a></li>
<li><a href="di.php" target="content"> <font color="#ffffff">Diclofenac Enteric Coated</a></li>
<li><a href="dig.php" target="content"> <font color="#ffffff">Digoxin</a></li>
<li><a href="i.php" target="content"><font color="#ffffff">Indomethacin</a></li>
<li><a href="as.php" target="content"><font color="#ffffff"> Asasantin Retard</a></li>    
<li><a href="al.php" target="content"> <font color="#ffffff">Albenza(albendazole)</a></li>
<li><a href="cl.php" target="content"><font color="#ffffff">Clotrimazole</a></li>
<li><a href="de.php" target="content"><font color="#ffffff">Dexamethasone</a></li>
<li><a href="me.php" target="content"><font color="#ffffff">Mebendazole</a></li>
<li><a href="p.php" target="content">  <font color="#ffffff">Propranolol</a></li></div>
</ul>
<marquee behavior direction="up"><img src="dimage/15.jpg"></marquee>
<img src="dimage/3.jpg">
<marquee behavior direction="down"><img src="dimage/13.jpg"></marquee>
<marquee behavior direction="up"><img src="dimage/9.jpg"></marquee>


</div><!-- close left div---->
<div id="centerrrr">
	<div id="register" style="background-color: #fffdfd;margin-left: 25px;width: 880px;height: auto;margin-top: -10px;border-radius: 23PX;border: 0PX SOLID">
	<iframe  src="indexframe.php" name="content" width="700px" height="840px" frameBorder="0" scrolling="yes" style="">
</iframe>
	<br />
	<br />
</div><br /><br />
</div><!-- close center div---->

<div id="right" style="margin-top: -930px">

	<h5 style="width: 190px;height:50px;"  align="center"><font size="5"> Login Page</font> </h5>
	
	<div class = "container">
		<form class = "form-signin"  action="login.php" method = "post">
            <input type = "text" class = "form-control" name = "username" placeholder = " Enter username " required ></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "enter password " required><br />
			   <label>Role</label>
	<select name="role" required>
	<option value="admin">System Administrator</option>
	<option value="manager">Manager</option>
	<option value="cashier">Cashier</option>
	<option value="cordinator">Store cordinator</option>
	<option value="pharmasist">pharmacist</option>
	</select><br>
			   <!--
			   <input type = "text" class = "form-control"
               name = "usertype" placeholder = "enter position " required><br />
-->
           <p align="center"> <button class = "" type = "submit" 
               name = "login" style="width: 100px"><font size="4"><b><font color="#003366"> Login</font></b></font></button></p>
			   <a href="reset.php">forget password</a>
<br />
<div id ="cal" style="width: 180px; margin-left: 10px;">
<h5 style="width: 190px;margin-left: -15px" align="center"><font size="5"> Date</font></h5>
<table width="180px" height="40px">
 
        <script type="text/javascript" src="date_time.js"></script>
    <body>
            <font color="white"><span id="date_time"></span>
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
<b><strong><center>Developed By THRED YEAR SOFTWARE regular Students <center></strong></b>	<br/>
</div><!---close footer div--->
</body>
</html>
