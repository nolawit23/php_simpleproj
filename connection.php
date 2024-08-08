<?php
 $server='localhost';
 $dbuser='root';
 $dbpass='';
 $dbname='drug';
 $con=mysqli_connect('localhost','root','');
if(!$con){ 
die("coud not connect".mysqli_error());
}
mysqli_select_db($con,'drug');
 
// mysqli_select_db($dbname) or die(mysqli_error());
 ?>

