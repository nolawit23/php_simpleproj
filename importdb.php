<?php
error_reporting(E_ALL^E_NOTICE);
include('connection.php');
// new data
$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);

	
		move_uploaded_file($_FILES["image"]["tmp_name"],"" . $_FILES["image"]["name"]);

$filename=$_FILES["image"]["name"];

$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = '';
$mysql_database = 'drug';

// Connect to MySQL server
mysqli_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
// Select database
mysqli_select_db($con,$mysql_database) or die('Error selecting MySQL database: ' . mysqli_error());
mysqli_query($con,"SET NAMES 'utf8'");
// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
    mysqli_query($con,$templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
	//echo "<script>window.location='admin.php'</script>";
    // Reset temp variable to empty
    $templine = '';
}
else{
	echo "<script>alert('Database Restore Successfully!');</script>.</a> </h2>";
}
}
?>