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
<link rel="stylesheet" type="text/css" media="all" href="includes/jquery/jquery-ui-custom.css" />
<script src="includes/jquery/jquery-1.10.2.js"></script>
<script src="includes/jquery/jquery-ui-custom.js"></script>
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
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>
<script>
  jQuery(document).ready(function($) {var dateToday = new Date();
var dates = $("#dateStart, #dateEnd").datepicker({
    defaultDate: "+1w",
	dateFormat: 'yy-mm-dd',
    changeMonth: true,
    numberOfMonths: 1,
    minDate: dateToday,
    onSelect: function(selectedDate) {
        var option = this.id == "dateStart" ? "minDate" : "maxDate",
            instance = $(this).data("datepicker"),
            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker.settings.dateFormat, selectedDate, instance.settings);
        dates.not(this).datepicker("option", option, date);
   	 }
	});
});
  </script>


</head>
<body>
<div id="register" style="
	border: solid 3px #2739dc;width: 500px;height: 850px;margin-left:95px ">
<?php
// define variables and set to empty values
$aErr=$bErr=$cErr=$dErr=$eErr=$fErr=$gErr=$hErr=$iErr=$jErr=$kErr=$lErr="";
$a=$b=$c=$d=$e=$f=$g=$h=$i=$j=$k=$l=$m=$n=$date="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	//no-----------------------------------
   if (empty($_POST["did"]))
     {$aErr = "<font color='red'>Please enter drug id </font>";}
   /*else
     {
     $a = test_input($_POST["sender"]);
     // check if name only contains letters and whitespace
   
   }*/
   //cid-----------------------------------
   if (empty($_POST["dname"]))
     {$bErr = "<font color='red'>Please enetr Drug Name </font>";}
   else
     {
     $b = test_input($_POST["dname"]);
     // check if e-mail address syntax is valid
     if (!preg_match("/^[a-zA-Z]*$/",$b))
       {
       $bErr = "<font color='red'>Please enter correct drug  name</font>"; 
       }
     }
   //
   if (empty($_POST["ddosage"]))
     {$cErr = "<font color='red'>Please enter Drug dosage </font>";}
   
     
     //housetype
if (empty($_POST["quantity"]))
     {$dErr = "<font color='red'>Please enter quantity</font>";}
   

if (empty($_POST["price"]))
     {$eErr = "<font color='red'>Please enter price</font>";}
   
if (empty($_POST["expire"]))
     {$fErr = "<font color='red'>Expire Date is required</font>";}
 if (empty($_POST["country"]))
     {$gErr = "<font color='red'> Please enter manufactured country</font>";}
  else
     {
     $g = test_input($_POST["country"]);
     // check if e-mail address syntax is valid
     if (!preg_match("/^[a-zA-Z]*$/",$g))
       {
       $gErr = "<font color='red'>Please enter correct country name</font>"; 
       }
     }
     if (empty($_POST["pharmacy"]))
     {$gErr = "<font color='red'> Please enter drug provider pharmacy</font>";}
  else
     {
     $g = test_input($_POST["pharmacy"]);
     // check if e-mail address syntax is valid
     if (!preg_match("/^[a-zA-Z]*$/",$g))
       {
       $gErr = "<font color='red'>Please enter correct pharmacy name</font>"; 
       }
     }
 if (empty($_POST["bname"]))
     {$hErr = "<font color='red'>Drug brand is required</font>";}
  else
     {
     $h = test_input($_POST["bname"]);
     // check if e-mail address syntax is valid
     if (!preg_match("/^[a-zA-Z]*$/",$h))
       {
       $hErr = "<font color='red'>Please enter correct Brand  name</font>"; 
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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<table cellpadding="1" width="100%"  align="center"
	cellspacing="0" style="margin-left: 50px" >
		<tr>
			<th colspan=2>
			<h1><font size="6" color="#2439ca"> Drug Registration</font></h1>
			<h3> (<font color=red>*</font>)required </h3>
			</th>
		</tr>
      
		
<tr><td><b>Drug ID<font color="red" size="4">*</font>:</b></td><td>
		
		<input type="text" name="did" size="25" placeholder="Enter drug id." 
		style=" margin-bottom: 10px;width: 180px;height: 30px;border:1px Solid #071f56;" > 
		<span class="error"> <?php echo $aErr;?></span></td></tr>
   <tr><td><b> Drug Name<font color="red" size="4">*</font>:</b></td><td>
		
		<input type="text" name="dname" size="25" placeholder="Enter drug name ." 
		style=" margin-bottom: 10px;width: 180px;height: 30px;border:1px Solid #071f56;"> 
		<span class="error"> <?php echo $bErr;?></span>
		</td>
   
   </tr>
		<tr><td><b> Drug Dosage(mg)<font color="red" size="4">*</font> :</b></td><td>
		
		<input type="text" name="ddosage" onKeyPress="return isNumberKey(event);  size="25" placeholder="Enter drug dosage." 
		style=" margin-bottom: 10px;width: 180px;height: 30px;border:1px Solid #071f56;"> 
		<span class="error"> <?php echo $cErr;?></span></td>
   
   </tr>
		<tr><td><b>Quantity<font color="red" size="4">*</font>:</b></td><td>
		
		<input type="text" name="quantity" size="25"onKeyPress="return isNumberKey(event);" placeholder="Enter quantity ." 
		style=" margin-bottom: 10px;width: 180px;height: 30px;border:1px Solid #071f56;" > 
		<span class="error"> <?php echo $dErr;?></span></td></tr>
		<tr><td><b>Price(Birr)<font color="red" size="4">*</font>:</b></td><td>
		
		<input type="text" onKeyPress="return isNumberKey(event);" name="price" size="25" placeholder="Enter price ." 
		style=" margin-bottom: 10px;width: 180px;height: 30px;border:1px Solid #071f56;" > 
		<span class="error"> <?php echo $eErr;?></span></td></tr>
				  
		
		
		<tr><td>
<b>Expire Date<font color="red" size="4">*</font>:</b></td ><td><input type="text" name="expire" size="25"  placeholder="enter expire date"  id="dateStart"  style=" margin-bottom: 10px;width: 180px;height: 30px;border:1px Solid #071f56;">
<span class="error"> <?php echo $fErr;?></span></td>
  
   </tr>
	
		
   <tr><td>
<b>Manufactured By<font color="red" size="4">*</font>:</b></td ><td><input type="text" name="country" size="25" 
 placeholder="enter company"  id=""  style=" margin-bottom: 10px;width: 180px;height: 30px;border:1px Solid #071f56;">
<span class="error"> <?php echo $gErr;?></span></td>
  
   </tr>
   <tr>
   <tr><td>
  
<label><b>Pharmacy name</b></label>
	<select name="pharmacy" required>
	<option value="markos">Markos</option>
	<option value="yigarde">Yigarde</option>
	<option value="lalibela">Lalibela</option>
	<option value="abima">Abima</option>
	<option value="worku">Worku</option>
	</select><br></td>

  
   </tr>
   <tr>
			<td ><b> Brand Name<font color="red" size="4">*</font>:</b></td>
		
			<td><input type="text" name="bname" size="25" placeholder="Enter brand name " value="" style=" margin-bottom: 10px;width: 180px;height: 30px;border:1px Solid #071f56;"> 
			<span class="error"> <?php echo $hErr;?></span></td>
			
		</tr>
		 
		<tr><td>
<b>Registration Date:</b></td ><td><input type="text" name="date" size="25"  placeholder="enter  date" readonly value="<?php echo date('Y-m-d');?>" id="datereg"  style=" margin-bottom: 10px;width: 180px;height: 30px;border:1px Solid #071f56;">
</td>
  
   </tr>
		
		
		<tr>
		<p><input type="hidden" name="status"/></p>
			
			<td>
				<button type="submit"  name="submit" style="background-color:#003366;color: #fffdfd;width: 100px;height: 30px;border:1px Solid #071f56;">Register</button>
			</td>
			<td>
				<button type="reset" style="background-color:red;color: #;width: 100px;height: 30px">Reset</button>
			</td>
		</tr>
		
	</table>
	
</form>
<?php
if($aErr==TRUE)
echo " <font color='red'>error please enter valid data</font>";
elseif($bErr==TRUE)
echo "<font color='red'>error please enter valid data</font> ";
elseif($cErr==TRUE)
echo "<font color='red'>error please enter valid data </font>";
elseif($dErr==TRUE)
echo "<font color='red'>error please enter valid data </font>";
else {
	if (isset($_POST['submit']))
		{

				 	 $a=$_POST['did'] ;
					$b= $_POST['dname'] ;					
					$c=$_POST['ddosage'] ;
					$d=$_POST['quantity'] ;
					/*$f=$_POST['location'] ;*/
					$e=$_POST['price'] ;
					 $f=$_POST['expire'] ;					
					$g=$_POST['country'] ;
					 $h=$_POST['bname'] ;
                     $n=$_POST['pharmacy'];
					
					 $date=$_POST['date'] ;
					
					$date=$_POST["date"];
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,'drug');	

			$insert=mysqli_query($con,"insert into drug(drug_id,drug_name,drug_dosage,quantity,price,expire_date,company,drug_brand,reg_date,pharmacy,status) values('$a','$b','$c'+'mg','$d','$e','$f','$g','$h','$date','$n','available')"); 
		if($insert)
		{
			echo '<Script>alert("Drug Information sucessfully registerd")</script>';
			
			}
		else
		{
			echo mysqli_error();
}
}	}


?>	
</div>
</body>
</html>
