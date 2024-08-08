<?php
require("connection.php");
	if(isset($_POST['login']))
{
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
 Decrypt Function
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
}
function get_ip() {
		//Just get the headers if we can or else use the SERVER global
		if ( function_exists( 'apache_request_headers' ) ) {
			$headers = apache_request_headers();
		} else {
			$headers = $_SERVER;
		}
		//Get the forwarded IP if it exists
		if ( array_key_exists( 'X-Forwarded-For', $headers ) && filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {
			$the_ip = $headers['X-Forwarded-For'];
		} elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) && filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )
		) {
			$the_ip = $headers['HTTP_X_FORWARDED_FOR'];
		} else {
			
			$the_ip = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
		}
		return $the_ip;
	}*/
//$ipaddress= get_ip();
		$uname=$_POST['username'];
		$upass=sha1($_POST['password']);
		
		$_SESSION['username']=$uname;
		/*$time=time();
$actual_time=date('d M Y @ H:i:s',$time);*/
$result=mysqli_query($con,"Select * from user where username='$uname'  and status='active' and password='$upass'");
		
		$row=mysqli_fetch_array($result);
		$username=$row['username'];
		$_SESSION['usertype']=$row['usertype'];
		$status=$row['status'];
		$password=$row['password'];
		//$password=mc_decrypt($row['password'], ENCRYPTION_KEY);
		
		if($username!=null&&$_SESSION['usertype']!=null && $status!=null && $password!=null){
			session_start();
			$_SESSION['username']=$uname;
			$_SESSION['password']=$upass;
			$_SESSION['usertype']=$row['usertype'];
			$_SESSION['status']=$status;
			$_SESSION['pid']=$row['username'];
			$password=$upass;
			if($password==$upass)
			{
	if($_SESSION['usertype']=="admin" and $_SESSION['status']='active'){
			$_SESSION['userid']=$row['userid'];
				header("location:admin.php");

	 //mysql_query("INSERT INTO logfile VALUES('$username','$role','$actual_time',' ','active','$ipaddress')");
				}
				else if($_SESSION['usertype']=="manager" and $_SESSION['status']='active'){
					$_SESSION['userid']=$row['userid'];
						header("location:manager.php");
				}
	else if($_SESSION['usertype']=="cordinator" and $_SESSION['status']='active'){
			$_SESSION['userid']=$row['userid'];
				header("location:cordinator.php");
// mysql_query("INSERT INTO logfile VALUES('$username','$role','$actual_time',' ','active','$ipaddress')");
 
 //mysql_query("INSERT INTO logfile ( username, usertype,  login_time, logout_time,status,Ip_address)  VALUES('$username','$role','$actual_time',' ','$status','$ipaddress')") or die (mysql_error());
				}
		
		else if($_SESSION['usertype']=="pharmasist" and $_SESSION['status']='active'){
				$_SESSION['userid']=$row['userid'];
				header('location:pharmasist.php');
		
	// mysql_query("INSERT INTO logfile VALUES('$username','$role','$actual_time',' ','active','$ipaddress')");
				}
				else if($_SESSION['usertype']=="cashier" and $_SESSION['status']='active'){
				$_SESSION['userid']=$row['userid'];
				header('location:cashier.php');
		
	// mysql_query("INSERT INTO logfile VALUES('$username','$role','$actual_time',' ','active','$ipaddress')");
				}
			}
			else 
			{
			echo '<script type="text/javascript">
	                      alert("Please enter correct username and password !")
	                      window.location="index.php"</script>';
		
		   }
		}
		else 
			{
			echo '<script type="text/javascript">
	                      alert("Please enter correct username and password !")
	                      window.location="index.php"</script>';
		
		   }		 	
	}
?>