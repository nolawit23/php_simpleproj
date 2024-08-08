<?PHP
session_start();
	if($_SESSION['usertype']!='pharmasist' || $_SESSION['username']=="" ){
	header("location:index.php");
	}
?>
<html>
<body>
<div id="app" style="margin-left: 50px">
<?php
//session_start();
	if(isset($_SESSION['username'])&&isset($_SESSION['password'])&&isset($_SESSION['usertype']))
	{
	?>
	<?php
	echo "<div id=well><font size='6' color='black'>Welcome To Pharmasist</font></div>";
	
	}else
	{
	?>
	<?php
	}
	?>
	<br /><br />


		
			<img src="dimage/p.JPG" width="400px;height=400px"style="padding-left:100px">
		
	
		</div>
</body>
</html>