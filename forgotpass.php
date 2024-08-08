<!DOCTYPE html>
<html>
<head>
	<title>Forgot Username/Password Form</title>
</head>
<body>
	

	<?php
    session_start();
    include 'login.php';
    include 'connection.php';
	if($_POST){
	    $email = $_POST['username'];

	    $sql = "SELECT * FROM user WHERE username='$email'";
	    $result = mysqli_query($con, $sql);
	    $user = mysqli_fetch_assoc($result);

	    if($user){
	        $username = $user['username'];
	        $token = $user['token'];
	        sendPasswordResetLink($email, $username, $token);
	        echo "<h3>An email has been sent to your email address with your username and a link to reset your password.</h3>";
	    } else {
	        echo "<h3>Invalid email address.</h3>";
	    }
	}

	function sendPasswordResetLink($email, $username, $token){
	    $to = $email;
	    $subject = "Reset your password on example.com";
	    $msg = "Hi there, your username is '$username'. Click on this <a href=\"http://example.com/reset-password.php?token=$token\">link</a> to reset your password on our site";
	    $msg .= "If you did not request this please ignore this email";
	    $headers = "From: example.com <noreply@example.com>\r\n";
	    $headers .= "Reply-To: noreply@example.com\r\n";
	    $headers .= "Content-type: text/html\r\n";

	    mail($to, $subject, $msg, $headers);
	}
	?>
</body>
</html>