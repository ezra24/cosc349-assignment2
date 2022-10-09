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
<h1>System for registering new IT assets for ease of tracking</h1>

<h3>Fill in the form with new asset details </h3>
<form method="post" action="insert.php">
  <label for="assetType">AssetType:</label><br>
  <input type="text" id="assetType" name="assetType" required="required"><br>
  <label for="brand">Brand:</label><br>
  <input type="text" id="brand" name="brand" required="required"><br>
  <label for="modelNo">Model Number:</label><br>
  <input type="text" id="modelno" name="modelno" required="required"><br>
  <label for="serialNo">Serial Number:</label><br>
  <input type="text" id="serialno" name="serialno" required="required"><br>
  <label for="datePurchased">Date Purchased:</label><br>
  <input type="text" id="datepurchased" name="datepurchased" required="required" placeholder="yyyy/mm/dd"><br>
  <label for="location">Location:</label><br>
  <input type="text" id="location" name="location" required="required" placeholder="Level 1 or Level 2"><br>
  <input type="reset">
  <input type="submit" value="Submit">
</form>


</body>
</html>
