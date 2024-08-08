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
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "drug");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the current and new passwords from the user
$current_password = $_POST['currentPassword'];
$new_password = $_POST['newPassword'];

// Hash the current password using SHA1
$hashed_current_password = sha1($current_password);

// Update the password in the database if the current password matches
$sql = "UPDATE user SET password='$new_password' WHERE userid=243 AND password='$hashed_current_password'";

if (mysqli_query($conn, $sql)) {
    echo "Password updated successfully";
} else {
    echo "Error updating password: " . mysqli_error($conn);
}

mysqli_close($conn);
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

<tr>
<td colspan="2"><button type="submit" name="submit"  class="btnSubmit" style="background-color:#1f5758;color: white">Submit</button></td>
</tr>
</table>
</div>
</body>
</html>