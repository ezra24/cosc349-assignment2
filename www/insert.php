<!DOCTYPE HTML>
<html>
<main>
<head>
<title> Adding assets to Database </title>
</head>

<?php

	$db_connection = mysqli_connect('assetsdb.chemtctaalfh.us-east-1.rds.amazonaws.com', 'admin', 'hm9RAwT9cgyYBJ5Mf08b', 'assetsdb', 3306);
	
	/* Confirm connection to database */
	if($db_connection === false) {
		die("ERROR: Connection to database failed. " . mysqli_connect_error());
	}
	
	/* parameters */
	$assetType = mysqli_real_escape_string($db_connection, $_REQUEST['assetType']);
	$brand = mysqli_real_escape_string($db_connection, $_REQUEST['brand']);
	$modelno = mysqli_real_escape_string($db_connection, $_REQUEST['modelno']);
	$serialno = mysqli_real_escape_string($db_connection, $_REQUEST['serialno']);
	$datepurchased = mysqli_real_escape_string($db_connection, $_REQUEST['datepurchased']);
	$location = mysqli_real_escape_string($db_connection, $_REQUEST['location']);
	
	$sql = "INSERT INTO assets (assetType, brand, modelno, serialno, datepurchased, location) VALUES ('$assetType', '$brand', '$modelno', '$serialno', '$datepurchased', '$location')";
	       #INSERT INTO assets (assetType, brand, modelno, serialno, datepurchased, location) VALUES ('CPU','Dell','Optiplex 780', 'DGK8H63','2022/08/28','Level 1');
	
	if(mysqli_query($db_connection, $sql)) {
		echo "Entry added successfully to Asset Management Database. </br>";
	} else {
		echo "Failed to add asset. Please check again" . mysqli_error($db_connection);
	}
	
	mysqli_close($db_connection);
?></br>
  <a href="http://ec2-3-82-225-148.compute-1.amazonaws.com"> View Asset Database</a></br>
  <a href="http://ec2-18-212-167-102.compute-1.amazonaws.com"> Add new asset</a>
  </html>