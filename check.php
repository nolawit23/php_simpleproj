<!DOCTYPE html>
<html>
<head>
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
<title>WEB DASED  DMU HOUSE MANAGEMNT SYSTEM  </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$(".college").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_department.php",
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

</div><!-- close left div---->
<div id="centerrrr">
	<div id="register" style="background-color: #fff4f4;margin-left: 160px;width: 730px;height: auto;margin-top: 20px;border-radius: 23PX;border: 0PX SOLID">
<?php
// define variables and set to empty values
$aErr=$bErr=$cErr=$dErr="";
$a=$b=$c=$d="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	//no-----------------------------------
   if (empty($_POST["ApID"]))
     {$aErr = "<font color='red'>applicant id  is required</font>";}
   else
     {
     $a = test_input($_POST["ApID"]);
     // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9]*$/",$a))
       {
	    $aErr = " <font color='red'>applicant id contain only char and number</font>"; 
	   
     }
   }
   //cid-----------------------------------
   if (empty($_POST["fname"]))
     {$bErr = "<font color='red'>first name is required</font>";}
   else
     {
     $b = test_input($_POST["fname"]);
     // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$b))
       {
	    $bErr = "<font color='red'>firat name is containe only letter </font>"; 
	   
     }
   }
   //
   if (empty($_POST["mname"]))
     {$cErr = "<font color='red'>father name is required</font>";}
   else
     {
     $c = test_input($_POST["mname"]);
     // check 
     if (!preg_match("/^[a-zA-Z]*$/",$c))
       {
       $cErr = "<font color='red'>father name is Not contain other characters</font>"; 
       }
     } 
     //housetype
if (empty($_POST["lname"]))
     {$dErr = "<font color='red'>grand father name is required</font>";}
   else
     {
     $d = test_input($_POST["lname"]);
     // 
     if (!preg_match("/^[a-zA-Z]*$/",$d))
       {
       $dErr = "<font color='red'>grand father name is Not contain other characters</font>"; 
       }
     }     
}
function test_input($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}
?>
<br/>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

	<table cellpadding="3" width="80%"  align="center" cellspacing="0" style="margin-left: 60px;" border="0">
	<tr>
			<td colspan=2>
			<center><font size=5 color="#332b9d"><b>Applicant Send House Request Form</b></font></center>
			</td>
		</tr>
			<td>Applicant ID</td>
			<td><input type="text" name="ApID" id="ApID" size="30" value="<?php echo $a;?>"><span class="error"> <?php echo $aErr;?></span></td>
		</tr>
		<tr>
			<td>First Name</td>
			<td><input type="text" name="fname" id="fname" size="30" value="<?php echo $b;?>"><span class="error"> <?php echo $bErr;?></span></td>
		</tr>

		<tr>
			<td>Middle Name</td>
			<td><input type="text" name="mname" id="mname"  size="30" value="<?php echo $c;?>"><span class="error"> <?php echo $cErr;?></span></td>
		</tr>
		<tr>
			<td> Last Name</td>
			<td><input type="text" name="lname" id="lname" size="30" value="<?php echo $d;?>"><span class="error"> <?php echo $dErr;?></span></td>
		</tr>
		<tr>
			<td>Age:</td><td><input type="number" max="60" min="18" value="19" name="age" size="150"/></td>
		</tr>
	<tr>
			<td>Sex</td>
			<td>
				<input type="radio" name="sex" value="male" size="35" required="">Male<input type="radio" name="sex" value="Female" size="35" required="">Female
			</td>
		</tr>
		<tr>
			<td style="color:black;">college :	 </td><td>
<select name="college" class="college">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<option selected="selected">--Select college--</option>
<?php
include('dbconfig.php');
	$stmt = $DB_con->prepare("SELECT * FROM college");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['college_id']; ?>"><?php echo $row['college_name']; ?></option>
        <?php
	} 
?>
</select></td>
		</tr>
		<tr>
			<td style="color:black;" >department :</td><td><select name="department" class="department">
<option selected="selected">--Select department--</option>
</select>
			</td>
		</tr>

		<tr >
			<td >House Type:</td>
			<td>
			<div class="multiselect">
        <div class="selectBox" onclick="showCheckboxes()">
            <select>
                <option>Select an House Type</option>
            </select>
        </div>
        <div id="checkboxes">
        <?php
include('dbconfig.php');
	$stmt = $DB_con->prepare("SELECT * FROM housetype ");
	$stmt->execute();
	$i=1;
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <label for="one"><input type="checkbox" id="one"  name='<?php echo "housetype".$i;?>' value="<?php echo $row['housetype_Name']; ?>"><?php echo $row['housetype_Name']; ?></label>
        <?php
  	$i++;
  	?>
        <?php
	} 
?>
</select>
        </div>
    </div>
			</td>
		</tr>
		
		<tr>
			<td>Location:</td>
			<td >
				<div class="multiselect">
        <div class="selectBox" onclick="showCheckboxess()">
            <select>
                <option>Select an Location</option>
            </select>
        </div>
        <div id="checkboxesss">
        <?php
include('dbconfig.php');
	$stmt = $DB_con->prepare("SELECT * FROM site");
	$stmt->execute();
	$i=1;
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
	?>
  <label for="one"><input type="checkbox" id="one" name='<?php echo "location".$i;?>' value="<?php echo $row['sitename']; ?>"><?php echo $row['sitename']; ?></label>	
  	<?php
  	$i++;
  	?>
</select>
<?php
}?>
        </div>
    </div>
			
			</td>
		</tr>
		<p>	<input type="hidden" name="request" id="request" size="30"></p>
			<p>	<input type="hidden" name="status" id="status" size="30"></p>
		<tr>
			
			<td>
				<button type="submit" name="submit" style="background-color: #296270;color: #fffbfb;width: 100px;height: 40px" >Send</button>
			</td>
			<td>
				<button type="reset" style="background-color: #296270;color: #fffbfb;width: 100px;height: 40px">Reset</button>
			</td>
		</tr>
	</table>
</form>
</fieldset>
<?php
if($aErr==TRUE)
echo " <font color='red'>error please enter valid data</font>";
elseif($bErr==TRUE)
echo "<font color='red'>error please enter valid data</font> ";
elseif($cErr==TRUE)
echo "<font color='red'>error please enter valid data </font>";
elseif($dErr==TRUE)
echo "<font color='red'>error please enter valid data </font>";
else
{
if(isset($_POST['submit']))
{
$con=mysql_connect("localhost","root","");
mysql_select_db("hms",$con);
$a=$_POST['ApID'];
$b=$_POST['fname'];
$c=$_POST['mname'] ;
$lname=$_POST['lname'];
$age=$_POST['age'];
$d=$_POST['sex'];
$e=$_POST['college'];
$f=$_POST['department'];
$g='NULL';
$h1='NULL';
$h2='NULL';
if(isset($_POST['housetype1'])){
$g=$_POST['housetype1'];}
if(isset($_POST['housetype2'])){
$h1=$_POST['housetype2'];
}
if(isset($_POST['housetype3'])){
$h2=$_POST['housetype3'];
}
$l1='NULL';
$l2='NULL';
if(isset($_POST['location1'])){
	$l1=$_POST['location1'];
}
if(isset($_POST['location2'])){
$l2=$_POST['location2'];	
}

$ss=$_POST['status'];
$hh=$_POST['request'];
$sql="INSERT INTO applicantt(ApID,fname,mname,lname,age,sex,college,department,housetype1,housetype2,housetype3,location1,location2,status,request) values('$a','$b','$c','$lname','$age','$d','$e','$f','$g','$h1','$h2','$l1','$l2','not assigned','unread')";
 mysql_query("INSERT INTO user values('$a','$b','$c','$lname','$age','$d','$b@gmail.com','$b','Applicant','active')");
$query=mysql_query($sql); 
if($query>0)
	{
		echo '<script type="text/javascript">
	alert("successful !")</script>';
	}
else
{
	echo '<Script>alert("unsucessful")</script>';
echo mysql_error();
		
}	
}	
}
?>
<br />
</div>
</div>
<div id="footer">
<b><strong><center>Copy right&copy;DMU house management All Rights Reserved<center></strong></b>	
</div><!---close footer div--->
</div><!-- close container div---->
</body>
</html>
