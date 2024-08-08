<?php
// Database configuration
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName     = 'drug';

// Create connection and select db
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Get All Table Names From the Database
$tables = array();
$sql = "SHOW TABLES";
$result = $db->query($sql);
while ($row = $result->fetch_row()) {
    $tables[] = $row[0];
}

// Create Backup Folder
$folderName = 'backup/';
if (!is_dir($folderName)) {
    mkdir($folderName);
    chmod($folderName, 0777);
}

// Loop through tables and create backup
foreach ($tables as $table) {
    $fileName = $folderName . $table . '.sql';
    $handle = fopen($fileName, 'w+');
    $result = $db->query("SELECT * FROM $table");
    while ($row = $result->fetch_row()) {
        $sql = "INSERT INTO $table VALUES(";
        for ($i = 0; $i < count($row); $i++) {
            if (!isset($row[$i])) {
                $sql .= 'NULL,';
            } elseif ($row[$i] != '') {
                $sql .= '"' . addslashes($row[$i]) . '",';
            } else {
                $sql .= '"",';
            }
        }
        $sql = substr($sql, 0, -1);
        $sql .= ");\n";
        fwrite($handle, $sql);
    }
    fclose($handle);
}

echo "Backup created successfully!";
?>