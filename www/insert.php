<!DOCTYPE HTML>
<html>
<main>
<head>
<title> Adding assets to Database </title>
</head>

<?php

	$db_connection = mysqli_connect('192.168.56.12', 'user-1', 'samoa1234', 'assetmanagement');
	
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
	
	if(mysqli_query($db_connection, $sql)) {
		echo "Entry added successfully to Asset Management Database. </br>";
	} else {
		echo "Failed to add asset. Please check again" . mysqli_error($db_connection);
	}
	
	mysqli_close($db_connection);
?></br>
  <a href="http://192.168.56.13"> View Asset Database</a></br>
  <a href="http://192.168.56.11"> Add new asset</a>