<script>


//Save button 
function SellLand() {

if ($('#ls_prop_name :selected').val() == "") {
    swal("Error", "Sorry, property name is required", "error");
    return false;
}
if ($('#ls_plot_number').val() == "") {
    swal("Error", "Sorry, Plot number is required", "error");
    return false;
}
if ($('#ls_payment_term').val() == "") {
    swal("Error", "Sorry,payment term is required", "error");
    return false;
}

if ($('#ls_payment_term :selected').val() == "installment") {
        if ($('#ls_payment_plan :selected').val() == "") {
            swal("Error", "Sorry, payment plan is required", "error");
            return false;
        }
    }

if ($('#ls_num_plot').val() == "") {
    swal("Error", "Sorry,number of plot Required is required", "error");
    return false;
}


if ($('#ls_total_cost').val() == "") {
    swal("Error", "Sorry,total cost is required", "error");
    return false;
}

if ($('#ls_total_payment').val() == "") {
    swal("Error", "Sorry, payment is required", "error");
    return false;
}

document.getElementById('pg').value = '<?php echo md5('land_sale');?>';
document.getElementById('option').value = '';
document.getElementById('viewpage').value = 'add';
document.myform.submit()

}




//Update land method
function updateLand() {

    var ls_total_payment = $('#ls_total_payment').val();
    var ls_total_cost = $('#ls_total_cost').val();

    

    if (isNaN(ls_total_cost)) {
        swal("Error", "Sorry, Total Cost is Invalid ", "error");
        return false;
    }
    if (parseFloat(ls_total_payment) > parseFloat(ls_total_cost)) {
        swal("Error", "Sorry, Total Payment Amount can't exceed  Total Cost", "error");
        return false;
    }

    if ($('#ls_prop_name :selected').val() == "") {
        swal("Error", "Sorry, property name is required", "error");
        return false;
    }
    if ($('#ls_plot_number').val() == "") {
        swal("Error", "Sorry, Plot number is required", "error");
        return false;
    }
    if ($('#ls_payment_term_et :selected').val() == "") {
        swal("Error", "Sorry, payment term is required", "error");
        return false;
    }

    if ($('#ls_payment_term_et :selected').val() == "installment") {
        if ($('#ls_payment_plan :selected').val() == "") {
            swal("Error", "Sorry, payment plan is required", "error");
            return false;
        }
    }

    if ($('#ls_num_plot').val() == "") {
        swal("Error", "Sorry,number of plot Required is required", "error");
        return false;
    }


    if ($('#ls_total_cost').val() == "") {
        swal("Error", "Sorry,total cost is required", "error");
        return false;
    }

    if ($('#ls_total_payment').val() == "") {
        swal("Error", "Sorry, payment is required", "error");
        return false;
    }



    //Calling the payment method 

    document.getElementById('pg').value = '<?php echo md5('land_sale');?>';
    document.getElementById('option').value = '<?php echo md5('details'); ?>';
    document.getElementById('viewpage').value = 'update_land_edit';
    document.myform.submit()

}



$(function() {
    $("#ls_payment_term").change(function() {
        if ($(this).val() == "installment") {
            $("#ls_payment_plan_add_layout").show();
        } else {
            $("#ls_payment_plan_add_layout").hide();
        }
    });
});



$(function() {
    $("#ls_payment_term_et").change(function() {
        if ($(this).val() == "installment") {
            $("#ls_payment_plan_layout").show();
        } else {
            $("#ls_payment_plan_layout").hide();
        }
    });
});

function allowNumbersOnly(e) {
        let code = (e.which) ? e.which : e.keyCode;
        if (code > 31 && (code < 48 || code > 57)) {
            e.preventDefault();
        }
    }


function del() {
    swal({

        title: "Are you sure?",
        text: "You want to delete!",
        icon: "warning",
        dangerMode: true,
        buttons: ["Cancel", "Delete "],
    }).then((confirm) => {
        if (confirm) {
            document.getElementById('viewpage').value = 'delete';
            document.myform.submit();
        }
    });

}

//Payment button 
function savePayment() {
    let payment_amt = $('#payment_amt').val();
    payment_amt = payment_amt.replace(",", "").trim();


if(payment_amt ==""){
swal("Error", "Sorry, Amount is required", "error");
return false;
}

if (isNaN(payment_amt)) {
    swal("Error", "Sorry, Invalid amount entered", "error");
    return false;
}



if ($('#payment_date').val() == "") {
swal("Error", "Sorry, Payment Date is required", "error");
return false;
}



    //Calling the payment method 
    document.getElementById('pg').value = '<?php echo md5('land_sale');?>';
    document.getElementById('option').value = '';
    document.getElementById('viewpage').value = 'add_payment';
    document.myform.submit()
}




</script>