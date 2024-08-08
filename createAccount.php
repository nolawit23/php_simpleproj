<!DOCTYPE html>
<?PHP
session_start();
	if($_SESSION['usertype']!='admin' || $_SESSION['username']=="" ){
	header("location:index.php");
	}
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
	<?php
// define variables and set to empty values
$aErr=$bErr=$cErr=$dErr=$ageErr=$eErr=$fErr=$gErr=$hErr=$iErr ="";
$a=$b=$c=$d=$age=$e=$f=$g=$h=$i="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	//no-----------------------------------
   if (empty($_POST["userid"]))
     {$aErr = "<font color='red'>user id  is required</font>";}
   else
     {
     $a = test_input($_POST["userid"]);
     // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9]*$/",$a))
       {
	    $aErr = " <font color='red'>user id contain only char and number</font>"; 
	   
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
	    $bErr = "<font color='red'>first name is containe only letter </font>"; 
	   
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
     //age
     if (empty($_POST["age"]))
     {$ageErr = "<font color='red'>grand father name is required</font>";}
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
     {$eErr = "<font color='red'>Sex is required</font>";}
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
     if (empty($_POST["username"]))
     {$fErr = "<font color='red'>username is required</font>";}
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
  if (empty($_POST["password"]))
     {$gErr = "<font color='red'>password is required</font>";}
   else
     {
     $g = test_input($_POST["password"]);
     // check if e-mail address syntax is valid
     if (!preg_match("/^[a-zA-Z0-9]*$/",$g))
       {
       $gErr = "<font color='red'>password is Not contain other characters</font>"; 
       }
     }
     //user type
    if (empty($_POST["usertype"]))
     {$hErr = "<font color='red'>usertype is required</font>";}
   else
     {
     $h = test_input($_POST["usertype"]);
     // check if e-mail address syntax is valid
     if (!preg_match("/^[a-zA-Z ]*$/",$h))
       {
       $hErr = "<font color='red'>usertype is Not contain other characters</font>"; 
       }
     }
     //status
     if (empty($_POST["status"]))
     {$iErr = "<font color='red'>status is required</font>";}
   else
     {
     $i = test_input($_POST["status"]);
     // check if e-mail address syntax is valid
     if (!preg_match("/^[a-zA-Z ]*$/",$i))
       {
       $iErr = "<font color='red'>status is Not contain other characters</font>"; 
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
<div id="register" style="
	border: solid 3px #3a33c6;width: 600px;height: auto;margin-top: -1px;margin-left:70px;background-color:#778899  ">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<center><p><font size="6" color="#021e1b"> Create Account  Form</font> </p></center>
<table border="0"cellpadding="5" cellspacing="3" style="margin-left: 90px" >
<tr>
 <td><b> User ID :</b></td> <td>  <input type="text" name="userid" id="NoID"  placeholder="enter user id "  value="" style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;"><span class="error"> <?php echo $aErr;?></span></td>
   </tr>
   <tr>
 <td><b>  First Name:</b></td> <td>  <input type="text" name="fname" id="subject"  placeholder="enter first name"  value="" style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;"><span class="error"> <?php echo $bErr;?></span></td>
   </tr>
   <tr>
 <td><b> Father Name:</b></td> <td>  <input type="text" name="mname" id="content"  placeholder="enter father name  "   value="" style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;"><span class="error"> <?php echo $cErr;?></span></td>
   </tr>
     <tr>
 <td><b> Grand Father Name:</b></td> <td>  <input type="text" name="lname" id="postdate"  placeholder="enter grand father name"  value=""  style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;"><span class="error"> <?php echo $dErr;?></span></td>
   </tr>
   <tr>
 <td><b>Age</b></td> <td>  <input type="number" size="32" name="age" min="20" max="40"   value="21" style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;" ><span class="error"> <?php echo $ageErr;?></span></td>
   </tr>
   <tr>
   	<td><b>Sex:</b>  </td><td><input type="radio" name="sex"   value="male">Male</input>
	<input type="radio" name="sex"  value="female">Female</input><span class="error"> <?php echo $eErr;?></span></td>
   </tr>
   <tr>
   	<td><b> User Name:</b></td><td><input type="text" name="username" placeholder="Enter username"value="" style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;"><span class="error"> <?php echo $fErr;?></span></td>
   </tr>
    <tr> 
	<tr>
   	<td><b> Password :</b> </td><td><input type="password" name="password"   placeholder="Enter a valid Passord"  value="" style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;"><span class="error"> <?php echo $gErr;?></span></td>
   </tr>
   <tr>
   	<td><b> user type :</b></td><td><select name="usertype" required style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;">
			<option value="" > Select</option>
		<option value="admin">Admin</option>
    <option value="manager">Manager</option>
		<option value="cordinator">Store Cordinator</option>
		<option value="pharmasist"> Pharmasist</option>
		<option value="cashier"> Cashier</option>
		</select>
	<span class="error"> <?php echo $hErr;?></span>
	</td>
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
if($aErr==TRUE)
echo " <font color='red'>error please enter valid data</font>";
elseif($bErr==TRUE)
echo "<font color='red'>error please enter valid data</font> ";
elseif($cErr==TRUE)
echo "<font color='red'>error please enter valid data </font>";
elseif($dErr==TRUE)
echo "<font color='red'>error please enter valid data </font>";
elseif($ageErr==TRUE)
echo "<font color='red'>error please enter valid data </font>";
elseif($eErr==TRUE)
echo "<font color='red'>error please enter valid data </font>";
elseif($fErr==TRUE)
echo "<font color='red'>error please enter valid data </font>";
elseif($gErr==TRUE)
echo "<font color='red'>error please enter valid data </font>";
elseif($hErr==TRUE)
echo "<font color='red'>error please enter valid data </font>";

else {
if(isset($_POST['submit']))
{
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,'drug');

$a=$_POST['userid'];
$b=$_POST['fname'];
$c=$_POST['mname'] ;
$d=$_POST['lname'];
$age= $_POST['age'];
$e= $_POST['sex'];
$f=$_POST['username'];
$pass=sha1($_POST['password']);
$h=$_POST['usertype'];



$sql="INSERT INTO user(userid,fname,mname,lname,age,sex,username,password,usertype,status,Photo) values('$a','$b','$c','$d','$age','$e','$f','$pass','$h','Active','user.jpg')";
$query=mysqli_query($con,$sql); 
if($query>0)
	
	echo '<script type="text/javascript">
	alert("Account is created !")</script>';
	
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
