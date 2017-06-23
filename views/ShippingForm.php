<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Shipping details</title>
        <link href="../css/hd.css" rel="stylesheet" type="text/css"/>
        <link href="../css/shf.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <?php
        date_default_timezone_set("GMT")
        ?>
        <div id="header">
            <img src="../images/top side.jpg" width="120" height="120" alt="topview" />
            <!-- #BeginDate format:fcAm1 --><?php echo date("l d, M Y") ?><!-- #EndDate -->

        </div>
        <div id="form">
            <form class = "form-horizontal" role ="form" action="../view-model/PostShipping.php" method="POST">
                <h3>Agent Details</h3>
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
                    <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Country</label>
                    <div class = "col-md-5">
                        <select class="form-control" name="agent_country">
                            <?php
                                require_once '../view-model/Countries.php';
                                foreach ($countries as $key => $value) {
                            ?>
                                <option value="<?= $value ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
                            <?php
                                }
                            ?>
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
                <h3>Container Details</h3>
                <div class = "form-group" >
                    <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Container ID</label>
                    <div class = "col-md-5">
                        <input type = "text" class = "form-control input-sm" name = "containerid" placeholder="Enter the container's id here" required/>
                    </div>
                </div>
                <div class = "form-group" >
                    <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Shipping date</label>
                    <div class = "col-md-5">
                        <input type = "date" class = "form-control input-sm" name = "shipping_date" placeholder="Provide date of shipping" required/>
                    </div>
                </div>
                <div class = "form-group" >
                    <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Item #1</label>
                    <div class = "col-md-5">
                        <input type = "text" class = "form-control input-sm" name = "item_one" placeholder="If any" required/>
                    </div>
                </div>
                <div class = "form-group" >
                    <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Item #2</label>
                    <div class = "col-md-5">
                        <input type = "text" class = "form-control input-sm" name = "item_two" placeholder="If any"/>
                    </div>
                </div>
                <div class = "form-group" >
                    <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Item #3</label>
                    <div class = "col-md-5">
                        <input type = "text" class = "form-control input-sm" name = "item_three" placeholder="If any"/>
                    </div>
                </div>
                <div class = "form-group" >
                    <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Item #4</label>
                    <div class = "col-md-5">
                        <input type = "text" class = "form-control input-sm" name = "item_four" placeholder="If any"/>
                    </div>
                </div>
                <div class = "form-group" >
                    <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Item #5</label>
                    <div class = "col-md-5">
                        <input type = "text" class = "form-control input-sm" name = "item_five" placeholder="If any"/>
                    </div>
                </div>
                <h3>Recipient Details</h3>
                <div class = "form-group" >
                    <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">First name</label>
                    <div class = "col-md-5">
                        <input type = "text" class = "form-control input-sm" name = "recipientFirstname" placeholder="Enter your first name here" required/>
                    </div>
                </div> 
                <div class = "form-group" >
                    <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Last name</label>
                    <div class = "col-md-5">
                        <input type = "text" class = "form-control input-sm" name = "recipientLastname" placeholder="Enter your last name here" required/>
                    </div>
                </div> 
                <div class = "form-group" >
                    <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Middle name</label>
                    <div class = "col-md-5">
                        <input type = "text" class = "form-control input-sm" name = "recipientMiddlename" placeholder="Enter your middle name here"/>
                    </div>
                </div>
                <div class = "form-group" >
                    <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Country</label>
                    <div class = "col-md-5">
                        <select class="form-control" name="recipient_country">
                            <?php
                                require_once '../view-model/Countries.php';
                                foreach ($countries as $key => $value) {
                            ?>
                                <option value="<?= $value ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class = "form-group" >
                    <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Phone</label>
                    <div class = "col-md-5">
                        <input type = "tel" class = "form-control input-sm" name = "recipientPhone" placeholder="Enter your phone number here" required/>
                    </div>
                </div>
                <div class = "form-group" >
                    <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Email Address</label>
                    <div class = "col-md-5">
                        <input type = "email" class = "form-control input-sm" name = "recipientEmail" placeholder="Enter your email address here" required/>
                    </div>
                </div>
                <div class = "form-group" >
                    <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Company name</label>
                    <div class = "col-md-5">
                        <input type = "text" class = "form-control input-sm" name = "company" placeholder="Provide your company name here" required/>
                    </div>
                </div>
                <div class = "form-group" >
                    <label class = "col-md-3 col-md-offset-1" style="font-weight:normal; font-size: 16px;">Shipping harbour</label>
                    <div class = "col-md-5">
                        <input type = "text" class = "form-control input-sm" name = "shippingharbour" placeholder="Enter name of shipping harbour here" required/>
                    </div>
                </div>
                <div class = "form-group">
                    <div class = "col-md-3 col-md-offset-7">
                        <button type = "submit" class = "btn btn-success" name = ""/>Submit &nbsp;<span class="glyphicon glyphicon-save"></span></button>
                    </div>
                </div>
            </form>
        </div>
        <script src="../js/jquery.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
