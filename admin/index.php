<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head><title>IT Asset Management System</title>
<style>
th { text-align: left; }

table, th, td {
  border: 2px solid grey;
  border-collapse: collapse;
}

th, td {
  padding: 0.2em;
}
</style>
</head>

<body>
<h2>Asset Management Database</h2>
<table border="5">
<tr><th>AssetID</th><th>AssetType</th><th>Brand</th><th>ModelNumber</th><th>SerialNumber</th><th>DatePurchased</th><th>Location</th></tr>

<!--information from database-->
<?php 
$dbhost   = 'assetsdb.chemtctaalfh.us-east-1.rds.amazonaws.com';
$dbport = '3306';
$dbname   = 'assetsdb';
$charset = 'utf8';

$dsn = "mysql:host=$dbhost;dbname=$dbname";
$username   = 'admin';
$password = 'hm9RAwT9cgyYBJ5Mf08b';

$pdo = new PDO($dsn, $username, $password);

$q = $pdo->query("SELECT * FROM assets");

while($row = $q->fetch()){
  echo "<tr><td>".$row["assetID"]."</td><td>".$row["assetType"]."</td><td>".$row["brand"]."</td><td>".$row["modelno"]."</td><td>".$row["serialno"]."</td><td>".$row["datepurchased"]."</td><td>".$row["location"]."</td></tr>\n";
}
?>
</table>
</body>
</html>
