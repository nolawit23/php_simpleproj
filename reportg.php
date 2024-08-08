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
<head>
<title>Drug Store Inventory System </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="styles.php" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="5/date.css" />
<script type="text/javascript" src="5/date.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$(".building").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_location.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".department").html(html);
			} 
		});
	});
	
	
	$(".department").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_college.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".city").html(html);
			} 
		});
	});
	
});
</script>
<style>
    .multiselect {
        width: 200px;
    }
    .Location
    {
		 width: 200px;
	}
    .selectBox {
        position: relative;
    }
    .locationbox
    {
	position: relative;
	}
    .selectBox select {
        width: 100%;
        font-weight: bold;
    }
    .locationbox select
    {
		 width: 100%;
        font-weight: bold;
	}
    .overSelect {
        position: absolute;
        left: 0; right: 0; top: 0; bottom: 0;
    }
    #checkboxes {
        display: none;
        border: 1px #dadada solid;
    }
    #checkboxes label {
        display: block;
    }
    #checkboxes label:hover {
        background-color: #1e90ff;
    }
    
     #checkboxesss {
        display: none;
        border: 1px #dadada solid;
    }
    #checkboxesss label {
        display: block;
    }
    #checkboxesss label:hover {
        background-color: #1e90ff;
    }
     #locationcheckboxes {
        display: none;
        border: 1px #dadada solid;
    }
    #locationcheckboxes label {
        display: block;
    }
    #locationcheckboxes label:hover {
        background-color: #1e90ff;
    }
</style>
<script>
    var expanded = false;
    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script>
<script>
	 var expanded = false;
    function showCheckboxess() {
        var checkboxes = document.getElementById("checkboxesss");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
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
</head>
<body>

<table  align="center"border="0" cellspacing="0">
   <tr>
     
     <td width="800"  height="600" valign="top"><br><br>
	 <script type="text/javascript">
function showDiv(prefix,chooser) 
{
        for(var i=0;i<chooser.options.length;i++) 
		{
        	var div = document.getElementById(prefix+chooser.options[i].value);
            div.style.display = 'none';
        }
 
		var selectedOption = (chooser.options[chooser.selectedIndex].value);
		if(selectedOption == "1")
		{
			displayDiv(prefix,"1");
		}
		if(selectedOption == "2")
		{
			displayDiv(prefix,"2");
		}
		if(selectedOption == "3")
		{
			displayDiv(prefix,"3");
		}
		if(selectedOption == "4")
		{
			displayDiv(prefix,"4");
		}
		if(selectedOption == "5")
		{
			displayDiv(prefix,"5");
		}
} 
function displayDiv(prefix,suffix) 
{
        var div = document.getElementById(prefix+suffix);
        div.style.display = 'block';
}
</script>
	 <table id="contentbox">
		<tr>
			<td id="content">
				<div id="report">
				Select category:
				<select name="portal" id="cboOptions" onChange="showDiv('div',this)">
					<option value="1">...</option>
					<option value="2">Daily</option>
					<option value="4">Monthly</option>
					<option value="5"> Yearly</option>
				</select>
				<br /><br />
						  
				<div id="div1" style="display:none;"></div>	
				<div id="div5" style="display:none;">
					<form action="" method="post" >
					
						
						<?php 
						$date=date('Y-m-d');
	$sell=mysql_query("SELECT * FROM population");
			echo '<table style="border-radius:10px;" bgcolor="#FFE4C4" border="1"><tr>';
			echo '<th bgcolor="#000000" colspan=8 ><font color="#F0FFFF" size=5 >List of total Population  </font></th></tr>';
			echo '<tr><th bgcolor="#336699"><font color="white" size="4"> HouseNo.</th><th bgcolor="#336699"><font color="white" size="4">First Name </th><th bgcolor="#336699"><font color="white" size="4">Last name</th><th bgcolor="#336699"><font color="white" size="4">Sex </th>
			<th bgcolor="#336699"><font color="white" size="4">Phone No.</th>
			<th bgcolor="#336699"><font color="white" size="4">Job.</th>
			<th bgcolor="#336699"><font color="white" size="4">Nationality</th>
			<th bgcolor="#336699"><font color="white" size="4">Birth Place</th></tr>';
		
			$intt=mysql_num_rows($sell);
			echo"<br>";
			if($intt==0)
			{
				echo '<p><font size=4 color=red>Empty List</font></p>';
			}
			
			while($row=mysql_fetch_array($sell)){
  print ("<tr>");
	 print ("<td><font size='4'>" . $row['houseno'] . "</td>");
print ("<td><font size='4'>" . $row['fname'] . "</td>");
print ("<td><font size='4'>" . $row['mname'] . "</td>");
print ("<td><font size='4'>" . $row['sex'] . "</td>");
print ("<td><font size='4'>" . $row['phone'] . "</td>");
print ("<td><font size='4'>" . $row['job'] . "</td>");
print ("<td><font size='4'>" . $row['nationality'] . "</td>");
print ("<td><font size='4'>" . $row['birth_place'] . "</td>");
	
	 
  print ("</tr>");
  }
print( "</table>");
if($intt!=0)

{
	echo'<p valign="bottom" align="right"><form><input type="button" style="width:30%;height:30px;color:#2E8B57;
					   text-transform:capitalize;Font-weight:bolder;font-size:15px"; value="Print" onclick="window.print();"></form></p>';
}
	?>
					</form>
				</div>		
				<div id="div2" style="display:none;">
					<form action="" method="post">
					
						<?php 
						$date=date('Y-m-d');
						$sel=mysql_query("SELECT * FROM id_number where givendate='$date' and status='unrenewed'");
			echo '<table style="border-radius:10px;" bgcolor="#FFE4C4" border="1"><tr>';
			echo '<th bgcolor="#000000" colspan=7  ><font color="#F0FFFF" size=5 >No.of Customer that get id card today</font></th></tr>';
			echo '<tr><th bgcolor="#336699"><font color="white" size="4">ID No.</th><th bgcolor="#336699"><font color="white" size="4">First Name </th><th bgcolor="#336699">
			<font color="white" size="4">Middle Name </th>
			<th bgcolor="#336699"><font color="white" size="4">Last Name </th>
			<th bgcolor="#336699"><font color="white" size="4">Kebele </th>
			<th bgcolor="#336699"><font color="white" size="4">House No</th><th bgcolor="#336699"><font color="white" size="4">Given Date</th></tr>';
			
			$intt=mysql_num_rows($sel);
			echo"<br>";
			if($intt==0)
			{
				echo '<p><font size=4 color=red>Empty List</font></p>';
			}
			
			while($row=mysql_fetch_array($sel)){
  print ("<tr>");
	 print ("<td><font size='4'>" . $row['ID'] . "</td>");
	 print ("<td><font size='4'>" . $row['fname'] . "</td>");
print ("<td><font size='4'>" . $row['mname'] . "</td>");
print ("<td><font size='4'>" . $row['lname'] . "</td>");
print ("<td><font size='4'>" . $row['kebele'] . "</td>");	
print ("<td><font size='4'>" . $row['houseno'] . "</td>");
print ("<td><font size='4'>" . $row['givendate'] . "</td>");
	 
  print ("</tr>");
  }
print( "</table>");
		$sell=mysql_query("SELECT * FROM id_number where givendate='$date' and status='renewed'");
			echo '<table style="border-radius:10px;" bgcolor="#FFE4C4" border="1"><tr>';
			echo '<th bgcolor="#000000" colspan=7  ><font color="#F0FFFF" size=5 >No.of Customer that nenewed  id card today</font></th></tr>';
			echo '<tr><th bgcolor="#336699"><font color="white" size="4">ID No.</th><th bgcolor="#336699"><font color="white" size="4">First Name </th><th bgcolor="#336699">
			<font color="white" size="4">Middle Name </th>
			<th bgcolor="#336699"><font color="white" size="4">Last Name </th>
			<th bgcolor="#336699"><font color="white" size="4">Kebele </th>
			<th bgcolor="#336699"><font color="white" size="4">House No</th><th bgcolor="#336699"><font color="white" size="4">Given Date</th></tr>';
			
			$intt=mysql_num_rows($sell);
			echo"<br>";
			if($intt==0)
			{
				echo '<p><font size=4 color=red>Empty List</font></p>';
			}
			
			while($row=mysql_fetch_array($sell)){
  print ("<tr>");
	 print ("<td><font size='4'>" . $row['ID'] . "</td>");
	 print ("<td><font size='4'>" . $row['fname'] . "</td>");
print ("<td><font size='4'>" . $row['mname'] . "</td>");
print ("<td><font size='4'>" . $row['lname'] . "</td>");
print ("<td><font size='4'>" . $row['kebele'] . "</td>");	
print ("<td><font size='4'>" . $row['houseno'] . "</td>");
print ("<td><font size='4'>" . $row['givendate'] . "</td>");
	 
  print ("</tr>");
  }
print( "</table>");
if($intt!=0)
{
	echo'<p valign="bottom" align="right"><form><input type="button" style="width:30%;height:30px;color:#2E8B57;
					   text-transform:capitalize;Font-weight:bolder;font-size:15px"; value="Print" onclick="window.print();"></form></p>';
}			
						?>
					</form>
				</div>
				<div id="div4" style="display:none;">
					<form action="" method="post">
					
						<?php
						$date=date('Y-m-d');
$sel=mysql_query("SELECT * FROM clearance where date='$date'");
			echo '<table style="border-radius:10px;" bgcolor="#FFE4C4" border="1"><tr>';
			echo '<th bgcolor="#000000" colspan=9  ><font color="#F0FFFF" size=5 >No.of customer that get clearance today</font></th></tr>';
			echo '<tr><th bgcolor="#336699"><font color="white" size="4"> ID</th><th bgcolor="#336699"><font color="white" size="4">First name </th><th bgcolor="#336699"><font color="white" size="4">Middle name</th>
			<th bgcolor="#336699"><font color="white" size="4">Subject </th>
			<th bgcolor="#336699"><font color="white" size="4">Reason</th>
			<th bgcolor="#336699"><font color="white" size="4">Date</th></tr>';
		
			$intt=mysql_num_rows($sel);
			echo"<br>";
			if($intt==0)
			{
				echo '<p><font size=4 color=red>Empty List</font></p>';
			}
			
			while($row=mysql_fetch_array($sel)){
  print ("<tr>");
	 print ("<td><font size='4'>" . $row['ID'] . "</td>");
print ("<td><font size='4'>" . $row['fname'] . "</td>");
print ("<td><font size='4'>" . $row['mname'] . "</td>");
print ("<td><font size='4'>" . $row['subject'] . "</td>");
print ("<td><font size='4'>" . $row['reason'] . "</td>");
print ("<td><font size='4'>" . $row['date'] . "</td>");
	
	 
  print ("</tr>");
  }
print( "</table>");



$sell=mysql_query("SELECT * FROM population where date='$date' and status=0");
			echo '<table style="border-radius:10px;" bgcolor="#FFE4C4" border="1"><tr>';
			echo '<th bgcolor="#000000" colspan=8 ><font color="#F0FFFF" size=5 >List of customer that registered today </font></th></tr>';
			echo '<tr><th bgcolor="#336699"><font color="white" size="4"> HouseNo.</th><th bgcolor="#336699"><font color="white" size="4">First Name </th><th bgcolor="#336699"><font color="white" size="4">Last name</th><th bgcolor="#336699"><font color="white" size="4">Sex </th>
			<th bgcolor="#336699"><font color="white" size="4">Phone No.</th>
			<th bgcolor="#336699"><font color="white" size="4">Job.</th>
			<th bgcolor="#336699"><font color="white" size="4">Nationality</th>
			<th bgcolor="#336699"><font color="white" size="4">Birth Place</th></tr>';
		
			$intt=mysql_num_rows($sell);
			echo"<br>";
			if($intt==0)
			{
				echo '<p><font size=4 color=red>Empty List</font></p>';
			}
			
			while($row=mysql_fetch_array($sell)){
  print ("<tr>");
	 print ("<td><font size='4'>" . $row['houseno'] . "</td>");
print ("<td><font size='4'>" . $row['fname'] . "</td>");
print ("<td><font size='4'>" . $row['mname'] . "</td>");
print ("<td><font size='4'>" . $row['sex'] . "</td>");
print ("<td><font size='4'>" . $row['phone'] . "</td>");
print ("<td><font size='4'>" . $row['job'] . "</td>");
print ("<td><font size='4'>" . $row['nationality'] . "</td>");
print ("<td><font size='4'>" . $row['birth_place'] . "</td>");
	
	 
  print ("</tr>");
  }
print( "</table>");
if($intt!=0)

{
	echo'<p valign="bottom" align="right"><form><input type="button" style="width:30%;height:30px;color:#2E8B57;
					   text-transform:capitalize;Font-weight:bolder;font-size:15px"; value="Print" onclick="window.print();"></form></p>';
}
	?>
						
					
					</form>
				</div>
				</div>
			</td>
		</tr>
	</table>
</td>
	</tr>
	 </table> 	
</div>
</body>
</html>
