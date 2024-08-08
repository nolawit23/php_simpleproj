<?PHP
session_start();
	if($_SESSION['usertype']!='cordinator' || $_SESSION['username']=="" ){
	header("location:index.php");
	}
?>
<html>
<head>
</head>
<body>
<div id="re" style="margin-left: 60px">
<?php
	if(isset($_SESSION['username'])&&isset($_SESSION['password'])&&isset($_SESSION['usertype']))
	{
	?>
	<?php
	echo "<div id=well><font color='#000000' size='8'><b>Welcome To Store Cordinator</b></font></div>";
	
	}else
	{
	?>
	<?php
	}
	?>
	<img src="dimage/c.JPG" width="700px"style="padding-left:100px">
		


	
</div>
</body>
</html>