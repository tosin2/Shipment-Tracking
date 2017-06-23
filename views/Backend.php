<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/backend.css" rel="stylesheet" type="text/css"/>

        <title>
            Control centre
        </title>
    </head>
    <body>
        <nav class = "navbar navbar-default navbar-fixed-top">
            <div class = "container">
                <img class="navbar-brand navbar-static-top img-responsive" src="../images/Mriver2.jpg" id="eds_image"/>
                <a class = "navbar-brand navbar-static-top" href = "#" id = "brand_name" style="color: #B1964F;">Mtrackers</a>
                <?php
                if (!empty($_SESSION['firstname'])) {
                    if ($_SESSION['status'] == 0) {
                ?>
                        <div class = "navbar-collapse collapse">
                            <ul class = "nav navbar-nav navbar-right nav-tabs">
                                <!--Dropdown menus begin here--> 
                                <li class="active">
                                    <a href = "#" class="menu-items" id="clear_employee_page"><strong>Home</strong></a> 
                                </li>
                                <li><a href = "#" class="menu-items" id="shipment_update">Update Shipping Status</a></li>
                                <li><a href = "#" class="menu-items"></a></li>
                                <li class = "dropdown-toggle">
                                    <a href = "#" class = "dropdown-toggle menu-items" data-toggle = "dropdown">Reports<b class = "caret"></b></a>
                                    <ul class = "dropdown-menu">
                                        <li id = "changeformat"><a href = "#" data-toggle = "modal" data-target = "#report_modal" target = "">Agent & Recipient Info</a></li>
                                        <li id = "changeformat"><a href = "#" data-toggle = "modal" data-target = "#shipping_history" target = "">Shipping History</a></li>
                                    </ul>
                                </li>
                                <li class = "dropdown-toggle">
                                    <a href="#" class="menu-items" data-toggle = "dropdown"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $_SESSION['firstname'] ?><b class = "caret"></b></a>
                                    <ul class = "dropdown-menu">
                                        <li id = "changeformat"><a href = "../view-model/Logout.php" target = "">Logout&nbsp;&nbsp;<span class="glyphicon glyphicon-log-out"></span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                <?php
                    } else if ($_SESSION['status'] == 1){
                ?>
                        <div class = "navbar-collapse collapse">
                            <ul class = "nav navbar-nav navbar-right nav-tabs">
                                <!--Dropdown menus begin here--> 
                                <li class="active">
                                    <a href = "#" class="menu-items" id="clear_page"><strong>Home</strong></a> 
                                </li>
                                <li>
                                    <a href = "#" class="menu-items" id="add_user">Add User</a> 
                                </li>
                                <li class="dropdown-toggle">
                                    <a href = "#" class="menu-items" data-toggle = "dropdown"><span class="glyphicon glyphicon-edit"></span>&nbsp;Update Info<b class = "caret"></b></a>
                                    <ul class = "dropdown-menu">
                                        <li id = "update_admin"><a href = "#" target = "">Admin</a></li>
                                        <li id = "update_employee"><a href = "#" target = "">Employee</a></li>
                                    </ul>
                                </li>
                                <li class = "dropdown-toggle">
                                    <a href = "#" class = "dropdown-toggle menu-items" data-toggle = "dropdown"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;Reports<b class = "caret"></b></a>
                                    <ul class = "dropdown-menu">
                                        <li id = "changeformat"><a href = "#" target = "">Agent & Recipient Info</a></li>
                                        <li id = "changeformat"><a href = "#" target = "">Admin Info</a></li>
                                        <li id = "changeformat"><a href = "#" target = "">Employee Info</a></li>
                                        <li id = "changeformat"><a href = "#" target = "">Shipment History</a></li>
                                    </ul>
                                </li>
                                <li class = "dropdown-toggle">
                                    <a href="#" class="menu-items" data-toggle = "dropdown"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $_SESSION['firstname'] ?><b class = "caret"></b></a>
                                    <ul class = "dropdown-menu">
                                        <li id = "changeformat"><a href = "../view-model/Logout.php" target = "">Logout&nbsp;&nbsp;<span class="glyphicon glyphicon-log-out"></span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </nav> <!-- Header ends here -->

        <div class="container">
            <div id="user_form">
                <form class = "form-horizontal" role ="form" action="../view-model/InsertUser.php" method="POST">
                    <h3>Fill the form below</h3>
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
                    <div class = "form-group" >
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Status</label>
                        <div class = "col-md-5">
                            <select class ="form-control" name="status">
                                <option value="Admin" selected>Admin</option>
                                <option value="Employee">Employee</option>
                            </select>
                        </div>
                    </div>
                    <div class = "form-group">
                    <div class = "col-md-3 col-md-offset-6">
                        <button type = "submit" class = "btn btn-success" name = ""/>Save &nbsp;<span class="glyphicon glyphicon-save"></span></button>
                    </div>
                </div>
                </form>
            </div>
            <div id="admin_data">
                <form class = "form-horizontal" role ="form" action="" method="POST">
                    <h3>Search for Admin</h3>
                    <div class="form-group">
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Admin Username</label>
                        <div class = "col-md-5">
                            <input type="text" class = "form-control input-sm"  name="username" id="username">
                        </div>
                    </div>
                </form> 
                <form class = "form-horizontal" role ="form" action="../view-model/UpdateAdmin.php" method="POST">
                    <h3>Edit fields to be updated</h3>
                    <input type="hidden" name="admin_id" id="admin_id"/>
                    <div class = "form-group" >
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">First name</label>
                        <div class = "col-md-5">
                            <input type = "text" class = "form-control input-sm" name = "firstname" id="firstname" required/>
                        </div>
                    </div> 
                    <div class = "form-group" >
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Last name</label>
                        <div class = "col-md-5">
                            <input type = "text" class = "form-control input-sm" name = "lastname" id="lastname" required/>
                        </div>
                    </div> 
                    <div class = "form-group" >
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Middle name</label>
                        <div class = "col-md-5">
                            <input type = "text" class = "form-control input-sm" name = "middlename" id="middlename"/>
                        </div>
                    </div>
                    <div class = "form-group" >
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Gender</label>
                        <div class = "col-md-5">
                            <input type = "text" class = "form-control input-sm" name = "gender" id="gender"/>
                        </div>
                    </div>

                    <div class = "form-group" >
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Phone</label>
                        <div class = "col-md-5">
                            <input type = "tel" class = "form-control input-sm" name = "phone" id="phone" required />
                        </div>
                    </div>
                    <div class = "form-group" >
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Email Address</label>
                        <div class = "col-md-5">
                            <input type = "email" class = "form-control input-sm" name = "email" id="email" required />
                        </div>
                    </div>
                    <div class = "form-group">
                    <div class = "col-md-3 col-md-offset-6">
                        <button type = "submit" class = "btn btn-success" name = ""/>Update &nbsp;<span class="glyphicon glyphicon-edit"></span></button>
                    </div>
                </div>
                </form>
            </div>
            <div id="employee_data">
                <form class = "form-horizontal" role ="form" action="" method="POST">
                    <h3>Search for Employee</h3>
                    <div class="form-group">
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Employee Username</label>
                        <div class = "col-md-5">
                            <input type="text" class = "form-control input-sm"  name="search_field" id="employee_username">
                        </div>
                    </div>
                </form> 
                <form class = "form-horizontal" role ="form" action="../view-model/UpdateEmployee.php" method="POST">
                    <h3>Edit fields to be updated</h3>
                    <input type="hidden" name="employeeid" id="employeeid"/>
                    <div class = "form-group" >
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">First name</label>
                        <div class = "col-md-5">
                            <input type = "text" class = "form-control input-sm" name = "firstname" id="employee_firstname" required/>
                        </div>
                    </div> 
                    <div class = "form-group" >
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Last name</label>
                        <div class = "col-md-5">
                            <input type = "text" class = "form-control input-sm" name = "lastname" id="employee_lastname" required/>
                        </div>
                    </div> 
                    <div class = "form-group" >
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Middle name</label>
                        <div class = "col-md-5">
                            <input type = "text" class = "form-control input-sm" name = "middlename" id="employee_middlename"/>
                        </div>
                    </div>
                    <div class = "form-group" >
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Gender</label>
                        <div class = "col-md-5">
                            <input type = "text" class = "form-control input-sm" name = "gender" id="employee_gender"/>
                        </div>
                    </div>

                    <div class = "form-group" >
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Phone</label>
                        <div class = "col-md-5">
                            <input type = "tel" class = "form-control input-sm" name = "phone" id="employee_phone" required/>
                        </div>
                    </div>
                    <div class = "form-group" >
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Email Address</label>
                        <div class = "col-md-5">
                            <input type = "email" class = "form-control input-sm" name = "email" id="employee_email" required/>
                        </div>
                    </div>
                    <div class = "form-group">
                    <div class = "col-md-3 col-md-offset-6">
                        <button type = "submit" class = "btn btn-success" name = ""/>Update &nbsp;<span class="glyphicon glyphicon-edit"></span></button>
                    </div>
                </div>
                </form>
            </div>
            <div id="shipment_info">
                <form class = "form-horizontal" role ="form" action="" method="POST" id="update_info_form">
                    <h3>Select date below</h3>
                    <div class="form-group">
                        <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Date of Transaction</label>
                        <div class = "col-md-5">
                            <?php 
                            require_once '../view-model/DB_Connection.php';
                            date_default_timezone_set("GMT");
                            $year = date("Y");
                            $connect = new DB_Connection();
                            $connection = $connect->DB_Connect();
                            $query = $connection->prepare("SELECT DISTINCT(transaction_date) FROM shipment WHERE year = :year");
                            $query->execute(['year' => $year]);
                            ?>
                            <select class="form-control" name="transaction_date" id="transaction_date">
                            <?php 
                                while ($result = $query->fetch()){
                            ?>
                                <option value="<?php echo $result['transaction_date']; ?>"><?php echo $result['transaction_date'];?></option>
                            <?php
                                }
                            ?> 
                            </select>
                        </div>
                    </div>
                </form>
                <div id="shipment_form">
                </div>
            </div>
            <div id="report_frame">
                <div class = "modal fade" id = "report_modal">
                    <div class = "modal-dialog">
                        <div class = "modal-content">
                            <div class = "modal-header">
                                <button type = "button" class = "close" data-dismiss = "modal" arial-label = ""><span>&times;</span></button>
                            </div>
                            <div class = "modal-body">
                                <form class = "form-horizontal" action = "../view-model/AgentReport.php" method = "POST">
                                    <div class = "form-group" >
                                        <label class = "col-md-4 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Transaction Date</label>
                                        <div class = "col-md-5">
                                            <?php 
                                            require_once '../view-model/DB_Connection.php';
                                            date_default_timezone_set("GMT");
                                            $year1 = date("Y");
                                            $connect1 = new DB_Connection();
                                            $connection1 = $connect1->DB_Connect();
                                            $query1 = $connection1->prepare("SELECT DISTINCT(transaction_date) FROM shipment WHERE year = :year");
                                            $query1->execute(['year' => $year1]);
                                            ?>
                                            <select class="form-control" name="transaction_date">
                                            <?php 
                                                while ($result = $query1->fetch()){
                                            ?>
                                                <option value="<?php echo $result['transaction_date']; ?>"><?php echo $result['transaction_date'];?></option>
                                            <?php
                                                }
                                            ?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class = "form-group">
                                    <div class = "col-md-2 col-md-offset-6">
                                        <input type = "submit" class = "btn btn-success" value = "Generate Report" name = "loginbutton"/>
                                    </div>
                                    </div>
                                </form>
                            </div>
                            <div class = "modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "modal fade" id = "shipping_history">
                    <div class = "modal-dialog">
                        <div class = "modal-content">
                            <div class = "modal-header">
                                <button type = "button" class = "close" data-dismiss = "modal" arial-label = ""><span>&times;</span></button>
                            </div>
                            <div class = "modal-body">
                                <form class = "form-horizontal" action = "../view-model/ShippingHistory.php" method = "POST">
                                    <div class = "form-group" >
                                        <label class = "col-md-4 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Transaction Date</label>
                                        <div class = "col-md-5">
                                            <?php 
                                            require_once '../view-model/DB_Connection.php';
                                            date_default_timezone_set("GMT");
                                            $year2 = date("Y");
                                            $connect2 = new DB_Connection();
                                            $connection2 = $connect2->DB_Connect();
                                            $query2 = $connection2->prepare("SELECT DISTINCT(transaction_date) FROM shipment WHERE year = :year");
                                            $query2->execute(['year' => $year2]);
                                            ?>
                                            <select class="form-control" name="transaction_date">
                                            <?php 
                                                while ($result = $query2->fetch()){
                                            ?>
                                                <option value="<?php echo $result['transaction_date']; ?>"><?php echo $result['transaction_date'];?></option>
                                            <?php
                                                }
                                            ?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class = "form-group">
                                    <div class = "col-md-2 col-md-offset-6">
                                        <input type = "submit" class = "btn btn-success" value = "Generate Report" name = "loginbutton"/>
                                    </div>
                                    </div>
                                </form>
                            </div>
                            <div class = "modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../js/jquery.js" type="text/javascript"></script>
        <script src="../js/backend.js" type="text/javascript"></script>
        <script src="../js/jquery.form.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>

