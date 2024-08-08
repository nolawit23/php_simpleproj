<!DOCTYPE html>
<?php
	include("connection.php");  
 session_start();
 if($_SESSION['usertype']!='manager' || $_SESSION['username']=="" ){
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
	


<div id="register" style="
	border: solid 3px #3a33c6;width: 600px;height: auto;margin-top: -1px;margin-left:70px;background-color:#778899  ">
<form id="form1" name="login" method="POST" action="checkitem.php" onsubmit="return formValidation()">
  	
<p style="font-size:20px;color:#000000;" >Check Drug Item</p>
   <table width="399px" valign="top" align="center">
  
  <tr>

	       <td class='para1_text' width="220px"><font color="red">*</font> Drug ID.</td><td><input type="text" name="id" id="user" x-moz-errormessage="Enter office name." ></td>
	       
	
    <td><input type="submit" name="submitlogin" class="button_example" value="Search" /></td>
  </tr>
</table>
  </form>
<!--Php Script-->  
	 <?php	
	if (isset($_POST['submitlogin'])){ 
	$id=$_POST['id'];

	if($id=="")
	{
		echo '<p class="wrong"> please enter drug id to search</p>';
	}	
	else{
	
			$view=mysqli_query($con,"select * from drug where drug_id='$id'");
					$rowCheck = mysqli_num_rows($view);
if($rowCheck<1)
{
echo'<p class="wrong">The drug is not found</p>';
echo' <meta content="5;checkitem.php" http-equiv="refresh" />';
}
else
{
			while($row = mysqli_fetch_array($view))
            {
			$id=$row['drug_id'];
			$name=$row['drug_name'];
            $dosage=$row['drug_dosage'];
			$quantity=$row['quantity'];
			$price=$row['price'];
			$expire_date=$row['expire_date'];
			$status=$row['status'];
			
          
            }
           // if()
			echo"<table align='center' border='2' style='border-radius:15px;border:1px solid #336699;' width='400px' height='300px'>";
			echo"<tr>";
			echo"<th colspan='3' bgcolor='#000000'><font color='white' size='5'>"."Search result"."</font><a href='searchitem.php'><img align='right' src='image/close_icon.gif' width=35 height=20></a></th>";
			echo"</tr><tr>";
	echo"<td><font face='Times New Roman' size='4' color='white'>Drug ID:</td><td>".$id.'</td></tr>';
	echo"<td><font face='Times New Roman' size='4' color='white'>Drug Name:</td><td>".$name.'</td></tr>';
	echo"<td><font face='Times New Roman' size='4' color='white'>Drug Dosage:</td><td>".$dosage.'</td></tr>';
	echo"<td><font face='Times New Roman' size='4' color='white'>Quantity:</td><td>".$quantity.'</td></tr>';
	echo"<td><font face='Times New Roman' size='4' color='white'>Price:</td><td>".$price.'</td></tr>';
	echo"<td><font face='Times New Roman' size='4' color='white'>Expire Date:</td><td>".$expire_date.'</td></tr>';
	echo"<td><font face='Times New Roman' size='4' color='white'>Status:</td><td>".$status.'</td></tr>';
	if($status=="expired"){
		echo '<p><font color=white><strong>Please delete this drug becase this is expired</strong></font></p>';
	}
	echo"</font></table>";
	}
	}
	}
?>
</td>
</table>
</div>
</body>
</html>
