<?php
$date1=date_create(date('Y-m-d'));
$date2=date_create("2017-03-29");
$diff=date_diff($date2,$date1);
echo $diff->format("%R%a");
?>