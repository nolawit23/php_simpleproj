
<html>
<head>
<link rel="stylesheet" href="styles.css">
<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = " enter current password";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = " enter new password";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = " confirm new password";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "password not match";
	output = false;
} 	
return output;
}

</script>
<?php
 // Define a 32-byte (64 character) hexadecimal encryption key
// Note: The same encryption key used to encrypt the data must be used to decrypt the data
/*define('ENCRYPTION_KEY', 'd0a7e7997b6d5fcd55f4b5c32611b87cd923e88837b63bf2941ef819dc8ca282');
// Encrypt Function
function mc_encrypt($encrypt, $key)
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
session_start();
$user = $_SESSION['username'];
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,'drug');
if(count($_POST)>0) {
	$opass=sha1($_POST['currentPassword']);
	$npass=sha1($_POST['newPassword']);
	$cpass=sha1($_POST['confirmPassword']);
	
$result = mysqli_query($conn,"SELECT *from user WHERE username='" . $_SESSION["username"] . "'");
$row=mysqli_fetch_array($result);
$user=$row['password'];
	/*$oldpassword=mc_decrypt($user, ENCRYPTION_KEY);
	$newpassword=mc_encrypt($npass, ENCRYPTION_KEY);*/
	$newpassword=$npass;
	$oldpassword=$user;
if($opass==$oldpassword) {
mysqli_query($conn,"UPDATE user set password='$newpassword' WHERE username='" . $_SESSION["username"] . "'");
$message = "Password Changed";
} else $message = "wrong current password";
}
?>
<div id="register" style="background-color: #fffdfd;margin-left: 120px;width: 500px;height: auto;margin-top: 1px;border-radius: 23PX;border: 0PX SOLID">
<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="">
<td colspan="2"> <font size='6' color="#ffffff">Change Password</font>  </td>
</tr>
<tr>
<td width="40%"><label ><font color="ffffff">Current Password</font></label></td>
<td width="60%"><input type="password" name="currentPassword" class="txtField"/><span id="currentPassword"  class="required"></span></td>
</tr>
<tr>
<td><label><font color="ffffff">New Password</font></label></td>
<td><input type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span></td>
</tr>
<td><label><font color="ffffff">Confirm Password</font></label></td>
<td><input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"></span></td>
</tr>
<tr>
<td colspan="2"><button type="submit" name="submit"  class="btnSubmit" style="background-color:#1f5758;color: white">Submit</button></td>
</tr>
</table>
</div>
</body>
</html>