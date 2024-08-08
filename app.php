<!DOCTYPE html>
<?PHP
session_start();
	if($_SESSION['usertype']!='HMC' || $_SESSION['username']=="" ){
	header("location:index.php");
	}
?>
<html>
<head>
<title>WEB DASED  DMU HOUSE MANAGEMNT SYSTEM  </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body>
<div id="cvvc" style="margin-left: 60px">
<p><font size="6" color="#283fa6">Approve Assigned House</font></p>
 <form action='app.php' method='post'>
	    <table border="1" cellspacing="0">
<?php
 include("connection.php");
//now write a select query to fetch the records from the table
 
$sql = "SELECT assignedhouse.*,applicantresult.totalmark,applicantt.housetype1 FROM  applicantresult,assignedhouse,applicantt WHERE approve='not_approv' and applicantresult.ApID=assignedhouse.ApID and applicantresult.ApID=applicantt.ApID ORDER BY totalmark desc";
$query = mysql_query($sql);
$r=mysql_num_rows($query);
//now read and display the entire row of a table one by one looping through it.
//to loop we are using While condition here
 echo "<tr bgcolor=#2F4F4F>
  <td><font color='#fdfdff'>applicant id</td>
         <td><font color='#fdfdff'>Total Mark</td>
        <td><font color='#fdfdff'>blocknumber</td>
          <td><font color='#fdfdff'>housenumber</td>
            <td><font color='#fdfdff'>Floarnumber</td>
            <td><font color='#fdfdff'>housetype</td>
              <td><font color='#fdfdff'>location</td>
                <td><font color='#fdfdff'>Approve</td>
 </font></tr>";
 //for($i=1;$i<=$r;$i++){
 $i=1;
while( $row9 = mysql_fetch_array($query))
{
	$sid = $row9['ApID'];
	//$status=$_POST['Absent'];
echo "<tr align='center' ;bgcolor=#2F4F4F >";
	?>
<?php
echo "<td><font color='black'>".$row9['ApID']."</font></td>";	
echo "<td><font color='black'>".$row9['totalmark']."</font></td>";
echo "<td><font color='black'>".$row9['blocknumber']."</font></td>";
echo "<td><font color='black'>".$row9['housenumber']."</font></td>";
echo "<td><font color='black'>".$row9['floarnumber']."</font></td>";
echo "<td><font color='black'>".$row9['housetype']."</font></td>";
echo "<td><font color='black'>".$row9['location']."</font></td>";
?>
<td>
<input type='checkbox' name='<?php echo "approve".$i;?>' value='<?php echo $row9['ApID'];?>'/> 
</td>
<?php
echo"</tr>";
$i++;
}
 
?></table>
<button type='submit' name='Submit' value='submit' style="background-color: #1d5652;color: #ffffff;width: 150px;height: 50px" ><font size="6">Approve</font></button>
</form>

</center>
<br>

  <?php     
    if(isset($_POST['Submit']))
	{
		$sql = "SELECT assignedhouse.*,applicantresult.totalmark,applicantt.housetype1 FROM  applicantresult,assignedhouse,applicantt WHERE approve='not_approv' and applicantresult.ApID=assignedhouse.ApID and applicantresult.ApID=applicantt.ApID and approve='not_approv' ORDER BY totalmark desc";
$query = mysql_query($sql) or die(mysql_error());
$r=mysql_num_rows($query);
		$x=1;
		while( $row = mysql_fetch_array($query)){
		if(isset($_POST['approve'.$x])){
		$id= $_POST['approve'.$x];
		
$sql1 = "select * from assignedhouse where ApID='$id' ";
$query1 = mysql_query($sql1) or die(mysql_error());
//$status=$_POST['Absent'];
 $row1 = mysql_fetch_array($query1);
	    $a=$row1['ApID'];
		$f=$row['blocknumber'];
		$g=$row['housenumber'];
		$h=$row['housetype'];
		$i=$row['location'];
	    	//$c=$_POST['Absent']; 
	$con = mysql_connect('localhost','root','')or die(mysql_error());
	mysql_select_db("hms",$con);

   /*  $sql=mysql_query("insert into approvedhouse(ApID,fname,mname,lname,sex,blocknumber,housenumber,housetype,location,approve) 
	 VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','approved')") or die(mysql_error());*/
	$sql= mysql_query("update assignedhouse set approve='approved' WHERE ApID='$a'");
	 if($sql!=0)
echo '<script type="text/javascript">
	alert("Successfully Approved assigned Houses")</script>';
	 }
	 else{
	 }
	$x++;
}

}

?>
</div>
</body>
</html>
