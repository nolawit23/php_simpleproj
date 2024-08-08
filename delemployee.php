<?php
session_start();
include 'connection.php';
if($log != "log"){
	header ("Location: deleteemp.php");
}
$ctrl = $_REQUEST['key'];
$SQL = "DELETE FROM employee WHERE empid = '$ctrl'";
mysql_query($SQL);
mysql_close($conn);

print "<script>location.href = 'deleteemp.php'</script>";
?>