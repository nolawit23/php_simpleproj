<!DOCTYPE html>
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
<head>
<title>Drug Store Inventory System </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body>
<?php
  // Define a 32-byte (64 character) hexadecimal encryption key
// Note: The same encryption key used to encrypt the data must be used to decrypt the data
//define('ENCRYPTION_KEY', 'd0a7e7997b6d5fcd55f4b5c32611b87cd923e88837b63bf2941ef819dc8ca282');
// Encrypt Function
/*function mc_encrypt($encrypt, $key)
{
    $encrypt = serialize($encrypt);
    $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_DEV_URANDOM);
    $key = pack('H*', $key);
    $mac = hash_hmac('sha256', $encrypt, substr(bin2hex($key), -32));
    $passcrypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $encrypt.$mac, MCRYPT_MODE_CBC, $iv);
    $encoded = base64_encode($passcrypt).'|'.base64_encode($iv);
    return $encoded;
}
// Decrypt Function
function mc_decrypt($decrypt, $key)
{
    $decrypt = explode('|', $decrypt.'|');
    $decoded = base64_decode($decrypt[0]);
    $iv = base64_decode($decrypt[1]);
    if(strlen($iv)!==mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)){ return false; }
    $key = pack('H*', $key);
    $decrypted = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $decoded, MCRYPT_MODE_CBC, $iv));
    $mac = substr($decrypted, -64);
    $decrypted = substr($decrypted, 0, -64);
    $calcmac = hash_hmac('sha256', $decrypted, substr(bin2hex($key), -32));
    if($calcmac!==$mac){ return false; }
    $decrypted = unserialize($decrypted);
    return $decrypted;
}*/

?>
<head>
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
   </head>
	<?php
// define variables and set to empty values
$idErr=$fnameErr=$lnameErr=$ageErr=$sexErr=$roleErr=$addressErr=$emailErr=$phoneErr=$salaryErr =$drugwant="";
$aErr=$bErr=$cErr=$adErr=$age=$e=$f=$g=$h=$i=$j="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	//no-----------------------------------

   //cid-----------------------------------
   if (empty($_POST["fname"]))
     {$fnameErr = "<font color='red'>first name is required</font>";}
   else
     {
     $b = test_input($_POST["fname"]);
     // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$b))
       {
	    $bErr = "<font color='red'>first name is containe only letter </font>"; 
	   
     }
   }
   //
   if (empty($_POST["lname"]))
     {$lnameErr = "<font color='red'>last name is required</font>";}
   else
     {
     $c = test_input($_POST["lname"]);
     // check 
     if (!preg_match("/^[a-zA-Z]*$/",$c))
       {
       $cErr = "<font color='red'>last name is Not contain other characters</font>"; 
       }
     } 
     //housetype

     //age
     if (empty($_POST["age"]))
     {$ageErr = "<font color='red'>enter age</font>";}
   else
     {
     $age = test_input($_POST["age"]);
     // 
     if (!preg_match("/^[0-9]*$/",$age))
       {
       $ageErr = "<font color='red'>age contain number only</font>"; 
       }
     }
     //sex
     if (empty($_POST["sex"]))
     {$sexErr = "<font color='red'>Sex is required</font>";}
   else
     {
     $e = test_input($_POST["sex"]);
     // check if e-mail address syntax is valid
     if (!preg_match("/^[a-zA-Z]*$/",$e))
       {
       $eErr = "<font color='red'>Sex is Not contain other characters</font>"; 
       }
     }
     //user name
     
   /*else
     {
     $f = test_input($_POST["username"]);
     // check if e-mail address syntax is valid
     if (!preg_match("/^[a-zA-Z.@]*$/",$f))
       {
       $fErr = "<font color='red'>username is Not contain other characters</font>"; 
       }
     }*/
     //password
  if (empty($_POST["address"]))
     {$addressErr = "<font color='red'>Address can not empty</font>";}
   else
     {
     $c = test_input($_POST["address"]);
     // check 
     if (!preg_match("/^[a-zA-Z]*$/",$c))
       {
       $adErr = "<font color='red'>address  is Not contain other characters</font>"; 
       }
     } 
     
     //user type
    if (empty($_POST["phone"]))
     {$phoneErr = "<font color='red'>enet phone number</font>";}
  
     //status
     
     
  
     //status
     
     }    
     if (empty($_POST["drugwant"]))
     {$lnameErr = "<font color='red'>bought drug is required</font>";}
   else
     {
     $c = test_input($_POST["drugwant"]);
     // check 
     if (!preg_match("/^[a-zA-Z]*$/",$c))
       {
       $cErr = "<font color='red'>drug name is Not contain other characters</font>"; 
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

<div id="register" style="
	border: solid 3px #3a33c6;width: 600px;height: auto;margin-top: -1px;margin-left:70px;background-color:#778899  ">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<center><p><font size="6" color="#021e1b">Register Customer</font> </p></center>
<table border="0"cellpadding="5" cellspacing="3" style="margin-left: 90px" >
   <tr>
 <td><b>  First Name:</b></td> <td>  <input type="text" name="fname" id="fname"  placeholder="enter first name"  value="" style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;">
 <span class="error"> <?php echo $fnameErr;?></span>
 <span class="error"> <?php echo $bErr;?></span></td>
   </tr>
   <tr>
 <td><b> Last Name:</b></td> <td>  <input type="text" name="lname" id="lname"  placeholder="enter Last name  "   value="" style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;">
 
 <span class="error"> <?php echo $lnameErr;?></span>
  <span class="error"> <?php echo $cErr;?></span></td>
   </tr>
    
   <tr>
 <td><b>Age</b></td> <td>  <input type="number" size="32" name="age"     style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;" ><span class="error"> <?php echo $ageErr;?></span></td>
   </tr>
   <tr>
   	<td><b>Sex:</b>  </td><td><input type="radio" name="sex"   value="male">Male</input>
	<input type="radio" name="sex"  value="female">Female</input><span class="error"> <?php echo $sexErr;?></span></td>
   </tr>
  
  
    <tr>
 <td><b> Address:</b></td> <td>  <input type="text" name="address" id="address"  placeholder="enter Address"  value=""  style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;"><span class="error"> <?php echo $addressErr;?>
  <span class="error"> <?php echo $adErr;?></span></span></td>
   </tr>
    
    <tr>
 <td><b> Phone:</b></td> <td>  <input type="text" name="phone" id="phone" maxlength="10" value="09" placeholder="enter phone number" onKeyPress="return isNumberKey(event);"  value=""  style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;"><span class="error"> <?php echo $phoneErr;?></span></td>
   </tr>
   <tr>
 <td><b> Date:</b></td> <td>  <input type="text" name="date"  value="<?php echo date('Y-m-d');?>"onKeyPress="return isNumberKey(event);"  value=""  style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;"><span class="error"> <?php echo $phoneErr;?></span></td>
   </tr>
   <tr>
 <td><b> Bought Drug Name:</b></td> <td>  <input type="text" name="drugwant" id="drugwant"  placeholder="enter bought drug name  "  
  value="" style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;">
 <span class="error"> <?php echo $drugwant;?></span>
  <span class="error"> <?php echo $j;?></span></td>
   </tr>
  
   <!--<tr>
   	<td><b> Status:</b></td><td><select name="status"  style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;">
	<option selected> Select.....................</option>
		<option value="Active">Active</option>
		<option value="Block">Block</option>
	</select><span class="error"> <?php echo $iErr;?></span></td>
   </tr>-->
<p><input type="hidden" type="file" name="Photo" style="height: 30" size="15" placeholder="photo "/></p>
    <tr>
  <td align="center"> <button type="submit" name="submit" value="Submit" style="margin-bottom: 2px;;background-color: #003366;color: #ffffff;height: 35px;width: 100px">Submit</button></td>
  <td align="center"> <button type="reset" name="reset" style="height: 35px;width: 100px;background-color: red;color: #ffffff">RESET</button></td>
   </tr>
    </table>
</form>

<?php

if($fnameErr==TRUE)
echo "<font color='red'>error please enter valid data</font> ";
elseif($lnameErr==TRUE)
echo "<font color='red'>error please enter valid data </font>";
elseif($ageErr==TRUE)
echo "<font color='red'>error please enter valid data </font>";

elseif($phoneErr==TRUE)
echo "<font color='red'>error please enter valid data </font>";
elseif($addressErr==TRUE)
echo "<font color='red'>error please enter valid data </font>";

else {
if(isset($_POST['submit']))
{
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,'drug');

$fname=sha1($_POST['fname']);
$lname=sha1($_POST['lname']);
$age= $_POST['age'];
$sex= $_POST['sex'];
$address=$_POST['address'];
$phone=sha1($_POST['phone']);
$date=$_POST['date'];
$drugwant=$_POST['drugwant'];

if($bErr!=true||$cErr!=true||$adErr!=true)
{
$sql="INSERT INTO customer(Fname,Lname,age,sex,address,phone,date,boughtdrug) values('$fname','$lname','$age','$sex','$address','$phone','$date','$drugwant')";
$query=mysqli_query($con,$sql); 
if($query>0)
	
	echo '<script type="text/javascript">
	alert("customer  is Registered !")</script>';
}

else
	{
		echo '<Script>alert("unsucessful")</script>';
	echo mysqli_error();	
	}

	
}
}
?>
</div>
</body>
</html>
