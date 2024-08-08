$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'drug';
$source = "D:/backup/drug.sql";
$command = "mysql -h $dbhost -u $dbuser -p$dbpass $dbname < $source";
system($command);
echo "Restore complete!";