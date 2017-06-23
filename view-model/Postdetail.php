
<?php
include("db.php");
$PinCode = $_POST['PIN_CODE'];
$query = "SELECT * FROM mtrackers.order WHERE pin = '$PinCode'";

$result = mysql_query($query) or die("Could not retrieve data from database" .mysql_error());
$data = mysql_fetch_assoc($result);

 
?>