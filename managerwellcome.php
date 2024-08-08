	<html>
		<body>
		
			<div id="ad" style="margin-left: 60px">
			<h1>Well Come To Manager page</h1>
				<img src="dimage/man.JPG" width="700px"style="padding-left:100px">
	
	
<?php
	if(isset($_SESSION['username'])&&isset($_SESSION['password'])&&isset($_SESSION['usertype']))
	{
	?>
	<?php
	echo "<div id=well><font size='6' color='blue'>Welcome to ".$_SESSION['usertype']." "." page</font></div>";
	
	}else
	{
	?>
	<?php
	}
	?>
	<br />

</div>
</body>
</html>