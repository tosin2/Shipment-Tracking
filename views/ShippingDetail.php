<?php
$message = "";
if (isset($_POST['PIN_CODE'])){
include("db.php");
$PinCode = $_POST['PIN_CODE'];
$myquery = "SELECT * FROM mtrackers.order,item,agent  WHERE pin = '$PinCode'" ;

$result = mysql_query($myquery) or die("Could not retrieve data from database" .mysql_error());
$data = mysql_fetch_assoc($result);  

    $message = "<h2>Container ID:</h2>" . $data['Container_id']. "<br><h2>Shipping Date: </h2>" . $data['ShippingDate'] . "<br><h2>Delivery date: </h2>" . $data['DeliveryDate']."<br><h2>Country:</h2>".$data['Country']."<br><h2>Shipping Harbour:</h2>".$data['Shipping_harbour']."<br><h2>Shipping Product(s):</h2>".$data['Name'];

     }
?>
<!DOCTYPE HTML>
<HTML>
  <HEAD>
    <meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
    <link href="shf.css" rel="stylesheet" type="text/css" />
    <TITLE>ShippingDetail.php</TITLE>
  </HEAD>
 <BODY>

    <div id="header">
    	<font color="white" size="65px">THIS IS YOUR SHIPPING DETAIL</font> 
    </div>
	  <div id ="form">


       <form action="ShippingDetail.php" method="post">

               	<label>PIN CODE</label><input type="text" name="PIN_CODE"></input> 
               	<input type="submit" value="See Detail" name="Detail"></input> 
                <br><br>
          <?php
              echo "$message"; 
          ?>        
       </form>
       
	 </div>
        
 </BODY>
</HTML>