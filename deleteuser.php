<?php
session_start();
include 'connection.php';
if($log != "log"){
	header ("Location: updateAccountTable.php");
}
$ctrl = $_REQUEST['key'];
$SQL = "DELETE FROM user WHERE userid = '$ctrl'";
mysqli_query($conn,$SQL);
mysqli_close($conn);

print "<script>location.href = 'updateAccountTable.php'</script>";
?>