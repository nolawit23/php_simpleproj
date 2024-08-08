<?php
	include("connection.php");  
 session_start();
 if($_SESSION['usertype']!='pharmasist' || $_SESSION['username']=="" ){
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
<script>
function update(){
				var des=confirm("are you sure you want to update this account?");
			
	if(des==true){
					alert("update sucessfull");
				}
				else
				return false;}
</script>
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
<title>Drug Inventory System </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body>


	<p align="center"><font size="5" color="#181e4e"><b> Sale Drug</b></font></p>
	<p align="center"><font size="5" color="#181e4e"><b> Available Drug list</b></font></p>
	<form method="get">
<?php
//connects to database
$con = mysqli_connect("localhost","root","");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}

mysqli_select_db($con,'drug');

//retrieve data from database
$result = mysqli_query($con,"SELECT * FROM drug where status='available'");
$intt=mysqli_num_rows($result);
Print "<table border cellpadding=3 width='100%'>";
print"<tr style='background-color:#000000;color: #fffbfb'>";
print"<th> Drug ID</th>";
print"<th> Drug Name</th>";
print"<th> Drug Dosage</th>";
print"<th> Quantity</th>";
print"<th> Unit price</th>";
print"<th> Expire Date</th>";
print"<th> Status</th>";
print"<th> Sale</th>";
print"</tr>";
Print "<tr>";
if($intt==0){
	echo '<p><font size=4 color=red>There is no available </font>';
}


while($row = mysqli_fetch_array($result))
{
Print "<td>" . $row['drug_id'] . "</td>";
Print "<td>" . $row['drug_name'] . "</td>";
Print "<td>" . $row['drug_dosage'] . "</td>";
Print "<td>" . $row['quantity'] . "</td>";
Print "<td>" . $row['price'] . "</td>";
Print "<td>" . $row['expire_date'] . "</td>";
Print "<td>" . $row['status'] . "</td>";
Print "<td>" . "<a href='give.php?action=edit&drug_id=" . $row['drug_id'] . "'>Sale</a>" . "</td>";

Print "</tr>";
}
echo "</table>";

?>
</div>
</body>
</html>
