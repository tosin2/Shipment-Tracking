// Show user form div
$(document).ready(function () {
    $("#add_user").click(function () {
        $("#user_form").css('display', 'block');
        $("#admin_data").css('display', 'none');
        $("#employee_data").css('display', 'none');
    });
});

// Hide all admin task divs on the page
$(document).ready(function () {
    $("#clear_page").click(function () {
        $("#user_form").css('display', 'none');
        $("#admin_data").css('display', 'none');
        $("#employee_data").css('display', 'none');
        window.location.reload(); 
    });
});

// Hide all employee task divs
$(document).ready(function () {
    $("#clear_employee_page").click(function () {
        $("#shipment_info").css('display', 'none');
        $("#user_form").css('display', 'none');
        $("#admin_data").css('display', 'none');
        window.location.reload(); 
        
    });
});

// Show admin update form
$(document).ready(function () {
    $("#update_admin").click(function () {
        $("#admin_data").css('display', 'block');
        $("#user_form").css('display', 'none');
        $("#employee_data").css('display', 'none'); 
    });
});

// Show employee update form
$(document).ready(function () {
    $("#update_employee").click(function () {
        $("#employee_data").css('display', 'block');
        $("#user_form").css('display', 'none');
        $("#admin_data").css('display', 'none');
    });
});

// Show shipment info div
$(document).ready(function () {
    $("#shipment_update").click(function () {
        $("#shipment_info").css('display', 'block');
        $("#user_form").css('display', 'none');
        $("#admin_data").css('display', 'none');
    });
});

// Handle automatic search for admin
$(document).ready(function () {
    $("#username").keyup(function () {
        var username = $(this).val();
        $.ajax({
            url: "../view-model/Process_request.php",
            method: "POST",
            data: {username: username},
            dataType: 'json',
            success: function (details) {
                $("#admin_id").val(details.id);
                $("#firstname").val(details.firstname);
                $("#lastname").val(details.lastname);
                $("#middlename").val(details.middlename);
                $("#gender").val(details.gender);
                $("#phone").val(details.phone);
                $("#email").val(details.email);
            }
        });
    });
});

// Handle automatic data search for employee
$(document).ready(function () {
    $("#employee_username").keyup(function () {
        var username = $(this).val();
        $.ajax({
            url: "../view-model/EmployeeData.php",
            method: "POST",
            data: {username: username},
            dataType: 'json',
            success: function (details) {
                $("#employeeid").val(details.id);
                $("#employee_firstname").val(details.firstname);
                $("#employee_lastname").val(details.lastname);
                $("#employee_middlename").val(details.middlename);
                $("#employee_gender").val(details.gender);
                $("#employee_phone").val(details.phone);
                $("#employee_email").val(details.email);
            }
        });
    });
});

// Get data from database and create form
$(document).ready(function () {
    $("#transaction_date").change(function () {
        var s_date = $(this).val();
        if (s_date !== '') {
            $.ajax({
                url: "../view-model/ShipmentRequest.php",
                method: "POST",
                data: {transaction_date: s_date},
                dataType: "text",
                success: function (data) {
                    $("#shipment_form").html(data);
                }
            });
        } else {
            $("#shipment_form").html('');
            $.ajax({
                url: "../view-model/ShipmentRequest.php",
                method: "POST",
                data: {transaction_date: s_date},
                dataType: "text",
                success: function (data) {
                    $("#shipment_form").html(data);
                }
            });
        }
    });
});

// Submit shipment update form using ajax
function updateRows(){
    $(function () {
        $('form.shippingForm').on('submit', function (e) { 
            var id = $(this).attr('id');
            $.ajax({
                type: 'POST',
                url: '../view-model/UpdateShipment.php',
                data: $('#'+id).serializeArray(),
                success: function () {
                    alert('Update successful!');
                }
            });
            e.preventDefault();
        });
    });  
}



