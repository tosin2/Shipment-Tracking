<?php
 require_once 'view-model/Utilities.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/mini_css.css" rel="stylesheet" type="text/css"/>
        <link href="css/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css"/>
        
        <title>home page</title>
    </head>
    <body>
        <div id="header_container">
            <div id="header">
                <img src="images/S Magic.jpg" width="180" height="152" alt="acient" />
                <img src="images/SM fire.jpg" width="180" height="152" alt="acient" style="float:right" />
                <marquee behavior="alternate"> <h1><b><font style="alignment-baseline:middle" color="#8EA9BE">m TRACKers</font></b></h1></marquee>
            </div>
        </div><!--end of container -->

        <?php
            $available = new Utilities();
            if ($available->isAdminAvailable()) {
        ?>
            <ul id="MenuBar1" class="MenuBarHorizontal">
            <li><a href="index.php">Home</a>
            </li>
            <li><a href="#" class="MenuBarItemSubmenu">Shipping</a>
                <ul>
                    <li><a href="views/ShippingForm.php">Ship An Item</a></li>
                    <li><a href="#" data-toggle = "modal" data-target = "#check_status">Check Cargo Status</a></li>
                </ul>
            </li>
            <li><a class="MenuBarItemSubmenu" href="#">Help</a>
                <ul>
                    <li><a href="#" data-toggle = "modal" data-target = "#retrieve_agent_pin">Retrieve PIN</a></li>
                </ul>
            </li>
            <li><a href="ShippingDetail.php">Agent Detail</a></li>
            <li><a href="About.php">About</a></li>
            <li><a href="#" data-toggle = "modal" data-target = "#login">Login</a></li>
        </ul>

        <div id="bodyContent">

            <div id="content_image"><img src="images/Mriver2.JPG" width="292" height="221" alt="Mriver_alt" /></div>

            M tracing,is an online platform where an individual or 

            a cooperate organisations that deals in export and import trading could track 

            their goods from source to destination.<br/>
            The website is accessed via signing up with a user name and password 

            ,where, an information form concerning your transactions will need to be 

            filled. This is done as your agent will be required to also fill a form that 

            provides all necessary information about their client and the goods they are 

            shipping to their client.We offer you the opportunity to get interactive with your client, with the aim of tracking all your goodees anytime, anywhere online
        </div>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p style='color:white'><b " . $_SESSION['message'] . "</p>";
            session_destroy();
        }
        ?>
        <div class = "modal fade" id = "check_status">
            <div class = "modal-dialog">
                <div class = "modal-content">
                    <div class = "modal-header">
                        <button type = "button" class = "close" data-dismiss = "modal" arial-label = ""><span>&times;</span></button>
                    </div>
                    <div class = "modal-body">
                        <form class = "form-horizontal" action = "" method = "POST">
                            <div class = "form-group" >
                                <label class = "col-md-4 col-md-offset-1" style="font-weight:normal; font-size: 16px;">PIN</label>
                                <div class = "col-md-5">
                                    <input type = "text" class = "form-control input-sm" name = "pin" id="agent_pin" placeholder="Enter your pin number here"/>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class = "modal-footer">
                        <p align = "left" style="color: #000; font-weight: bold;" id="shipping_stat"></p>
                        <p align = "left" style="color: #000; font-weight: bold;" id="arrival_stat"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class = "modal fade" id = "retrieve_agent_pin">
            <div class = "modal-dialog">
                <div class = "modal-content">
                    <div class = "modal-header">
                        <button type = "button" class = "close" data-dismiss = "modal" arial-label = ""><span>&times;</span></button>
                    </div>
                    <div class = "modal-body">
                        <form class = "form-horizontal" action = "" method = "POST">
                            <div class = "form-group" >
                                <label class = "col-md-4 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Email</label>
                                <div class = "col-md-5">
                                    <input type = "email" class = "form-control input-sm" name = "email" id="email" placeholder="Enter your email here"/>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class = "modal-footer">
                        <p align = "left" style="color: #000; font-weight: bold;" id="agent_name"></p>
                        <p align = "left" style="color: #000; font-weight: bold;" id="agent_pin_number"></p>
                    </div>
                </div>
            </div>
        </div>
         <div class = "modal fade" id = "login">
            <div class = "modal-dialog">
                <div class = "modal-content">
                    <div class = "modal-header">
                        <button type = "button" class = "close" data-dismiss = "modal" arial-label = ""><span>&times;</span></button>
                        <h4 class = "modal-title">User login</h4>
                    </div>
                    <div class = "modal-body">
                        <form class = "form-horizontal" action = "view-model/Login.php" method = "POST">
                            <div class = "form-group" >
                                <label class = "col-md-4 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Username</label>
                                <div class = "col-md-5">
                                    <input type = "text" class = "form-control input-sm" name = "username" placeholder="Enter username here" required=""/>
                                </div>
                            </div>
                            <div class = "form-group" >
                                <label class = "col-md-4 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Password</label>
                                <div class = "col-md-5">
                                    <input type = "password" class = "form-control input-sm" name = "password" placeholder="Enter password here" required/>
                                </div>
                            </div>
                            <div class = "form-group">
                                <div class = "col-md-2 col-md-offset-8">
                                    <input type = "submit" class = "btn btn-success" value = "Login" name = "loginbutton"/>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class = "modal-footer">
                        <!--<p align = "left" style="color: #000; font-weight: bold;">Status:</p>-->             
                    </div>
                </div>
            </div>
        </div>
        <?php
            }else{
        ?>
        <div class="container">
            <div id="user_form">
                <form class = "form-horizontal" role ="form" action="view-model/InsertAdmin.php" method="POST">
                    <h3>An administrator account must be created first to set up the page </h3>
                    <div class = "form-group" >
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">First name</label>
                        <div class = "col-md-5">
                            <input type = "text" class = "form-control input-sm" name = "firstname" placeholder="Enter your first name here" required/>
                        </div>
                    </div> 
                    <div class = "form-group" >
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Last name</label>
                        <div class = "col-md-5">
                            <input type = "text" class = "form-control input-sm" name = "lastname" placeholder="Enter your last name here" required/>
                        </div>
                    </div> 
                    <div class = "form-group" >
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Middle name</label>
                        <div class = "col-md-5">
                            <input type = "text" class = "form-control input-sm" name = "middlename" placeholder="Enter your middle name here"/>
                        </div>
                    </div>
                    <div class = "form-group" >
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Gender</label>
                        <div class = "col-md-5">
                            <select class ="form-control" name="gender">
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                                <option value="O">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class = "form-group" >
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Phone</label>
                        <div class = "col-md-5">
                            <input type = "tel" class = "form-control input-sm" name = "phone" placeholder="Enter your phone number here" required/>
                        </div>
                    </div>
                    <div class = "form-group" >
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Email Address</label>
                        <div class = "col-md-5">
                            <input type = "email" class = "form-control input-sm" name = "email" placeholder="Enter your email address here" required/>
                        </div>
                    </div>
                    <div class = "form-group" >
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Username</label>
                        <div class = "col-md-5">
                            <input type = "text" class = "form-control input-sm" name = "username" placeholder="Enter a username" required/>
                        </div>
                    </div>
                    <div class = "form-group" >
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Password</label>
                        <div class = "col-md-5">
                            <input type = "password" class = "form-control input-sm" name = "password" placeholder="Enter password here" required/>
                        </div>
                    </div>
                    <div class = "form-group">
                    <div class = "col-md-3 col-md-offset-6">
                        <button type = "submit" class = "btn btn-success" name = ""/>Create account &nbsp;<span class="glyphicon glyphicon-save"></span></button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        
        <?php
            }
        ?>
        
        
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/SpryMenuBar.js" type="text/javascript"></script>
        <script type="text/javascript">
            var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown: "SpryAssets/SpryMenuBarDownHover.gif", imgRight: "SpryAssets/SpryMenuBarRightHover.gif"});
        
            $(document).ready(function () {
                $("#agent_pin").keyup(function () {
                    var pin = $(this).val();
                    $.ajax({
                        url: "view-model/ShipmentStatus.php",
                        method: "POST",
                        data: {pin: pin},
                        dataType: 'json',
                        success: function (status) {
                            $("#shipping_stat").html(status.shipping_status);
                            $("#arrival_stat").html(status.arrival_status);
                        }
                    });
                });
            });
            
            $(document).ready(function () {
                $("#email").keyup(function () {
                    var email = $(this).val();
                    $.ajax({
                        url: "view-model/RetrievePin.php",
                        method: "POST",
                        data: {email: email},
                        dataType: 'json',
                        success: function (pin) {
                            $("#agent_name").html(pin.agent_name);
                            $("#agent_pin_number").html(pin.agent_pin);
                        }
                    });
                });
            });
        </script>
    </body>
</html>
