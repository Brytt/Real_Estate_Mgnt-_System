<script>

function approve(){        
            swal({

        title: "Are you sure?",
        text: "You want to approve!",
        icon: "success",  
        dangerMode: true,
        buttons: ["No", "Yes, approve "],
        })
       
        }

                
        function reject(){        
            swal({

        title: "Are you sure?",
        text: "You want to reject!",
        icon: "warning",  
        dangerMode: true,
        buttons: ["No", "Yes, reject "],
        })
       
        }


//Save button 
function RentApartment() {

if ($('#ar_prop_name :selected').val() == "") {
    swal("Error", "Sorry, property name is required", "error");
    return false;
}
if ($('#ar_apartment_number').val() == "") {
    swal("Error", "Sorry, apartment number is required", "error");
    return false;
}
if ($('#ar_payment_term').val() == "") {
    swal("Error", "Sorry,payment term is required", "error");
    return false;
}

if ($('#ar_duration').val() == "") {
    swal("Error", "Sorry,rent duration is required", "error");
    return false;
}

if ($('#datepicker1').val() == "") {
    swal("Error", "Sorry,checking-in date is required", "error");
    return false;
}

let ar_total_cost = $('#ar_total_cost').val();
ar_total_cost = ar_total_cost.replace(",", "").trim();


    if (ar_total_cost == "") {
        swal("Error", "Sorry, total cost is required", "error");
        return false;
    }


    if (isNaN(ar_total_cost)) {
        swal("Error", "Sorry, Invalid cost entered", "error");
        return false;
    }


let ar_total_payment = $('#ar_total_payment').val();
ar_total_payment = ar_total_payment.replace(",", "").trim();


if (ar_total_payment == "") {
    swal("Error", "Sorry, total payment is required", "error");
    return false;
}


if (isNaN(ar_total_payment)) {
    swal("Error", "Sorry, Invalid payment entered", "error");
    return false;
}

//Calling the payment method 
document.getElementById('pg').value = '<?php echo md5('');?>';
document.getElementById('option').value = '<?php echo md5(''); ?>';
document.getElementById('viewpage').value = 'add';
document.myform.submit()
}

function savePayment(){

    let payment_amt = $('#payment_amt').val();
    payment_amt = payment_amt.replace(",", "").trim();


    if (payment_amt == "") {
        swal("Error", "Sorry, Amount Being Paid  required", "error");
        return false;
    }


    if (isNaN(payment_amt)) {
        swal("Error", "Sorry, Invalid amount entered", "error");
        return false;
    }
    
  
      if($('#payment_date').val()==""){
      swal("Error",  "Sorry, Payment Date is required", "error");
      return false;
      }
     
   
     
  //Calling the payment method 
  document.getElementById('pg').value='<?php echo md5('rent_apartment');?>'; 
  document.getElementById('option').value=''; 
  document.getElementById('viewpage').value='add_payment'; 
  document.myform.submit()
    }

function del(){        
            swal({

        title: "Are you sure?",
        text: "You want to Check out!",
        icon: "warning",  
        dangerMode: true,
        buttons: ["Cancel", "Check-out "],
        }) .then((confirm) => {
        if (confirm) {
            document.getElementById('viewpage').value='delete';
             document.myform.submit();
        }
    }); 

        }

        

function updateApartmentRental(aptCode){
  
    
if($('#ar_prop_name :selected').val()==""){
swal("Error", "Sorry, property name is required", "error");
return false;
}

else if($('#ar_apartment_num').val()==""){
swal("Error", "Sorry, apartment number is required", "error");
return false;
}

else if($('#ar_duration').val()==""){
swal("Error", "Sorry, rent duration is required", "error");
return false;
}

else if($('#checkInDate').val()==""){
swal("Error", "Sorry, Check-In Date is required", "error");
return false;
}

else if($('#checkOutDate').val()==""){
swal("Error", "Sorry, Check-Out Date is required", "error");
return false;
}

var dateOneArr = $('#checkInDate').val().split("/");
var dateTwoArr = $('#checkOutDate').val().split("/");

var date_1 = new Date(dateOneArr[1]+"/"+dateOneArr[0]+"/"+dateOneArr[2]);
var date_2 = new Date(dateTwoArr[1]+"/"+dateTwoArr[0]+"/"+dateTwoArr[2]);

if (date_1 > date_2) {
swal("Error", "Sorry, Check-Out Date must be greater than Check-In Date", "error");
return false;
}


else if($('#ar_total_cost').val()==""){
swal("Error", "Sorry,total cost is required", "error");
return false;
}

else{
//Calling the payment method 
document.getElementById('pg').value='<?php echo md5('client');?>'; 
document.getElementById('option').value='<?php echo md5('details'); ?>';
 document.getElementById('viewpage').value='update_rent_apartment'; 
 document.getElementById('keys').value=aptCode; 
  document.myform.submit();
}

}

function delchck_out(){        
            swal({

        title: "Are you sure?",
        text: "You want to Check out!",
        icon: "warning",  
        dangerMode: true,
        buttons: ["Cancel", "Delete "],
        }) .then((confirm) => {
        if (confirm) {
            document.getElementById('viewpage').value='checkout';
             document.myform.submit();
        }
    }); 

        }


//Save button 
function saveEnrolment(){
    
    if($('#sch_session').val()==""){
      swal("Error",  "Sorry, Academic Year is required ",  "error");
      return false;
      }
  
      if($('#sch_term').val()==""){
      swal("Error",  "Sorry, Term is required", "error");
      return false;
      }
     
      if($('#sch_name').val()==""){
      swal("Error", "Sorry, School Name is required", "error");
      return false;
      }
  
      if($('#sch_level :selected').val()==""){
      swal("Error", "Please select School Level", "error");
      return false;
      }
      
      if($('#sch_class :selected').val()==""){
      swal("Error", "Please select Class", "error");
      return false;
      }

      if($('#sch_male').val()==""){
      swal("Error", "Sorry, Number of Male is required", "error");
      return false;
      }
      
      if($('#sch_female').val()==""){
      swal("Error", "Sorry, Number of Female is required", "error");
      return false;
      }
  
  //Calling the save method 
  document.getElementById('sch_total').value= parseFloat($('#sch_male').val()) + parseFloat($('#sch_female').val());
  document.getElementById('viewpage').value='add';
  document.myform.submit();
  
     
  }



  
//This method is called when  school region is selected
//It splits the joint region code and name
$(function () {               

$(".st_sch_region").change(function (e) { 

    $('#dis_st_sch__district').show();
    var regioncodesch=$('.st_sch_region option:selected').val();
    getschdistrict(regioncodesch.split("@@@")[0]);                  
    e.preventDefault();
    
});
});

//GET school DISTRICTS
function getschdistrict(regioncodesch){

    $.ajax({
                method:'POST',
                url:'public/enrollment/model/fetch.php',
                data:{'regioncode':regioncodesch},
                success: function(response){
                if(!response){
                    $("#st_sch_district").html('<option >--No District Available--</option>')
                    return
                }
                
                $('#st_sch_district').html(response);

                }
            })

}

function getRevenueCategory(revenue_category){
$.ajax({
            method:'POST',
            url:'public/revenue/model/fetch.php',
            data:{'non_teach_grade':non_teach_grade},
            success: function(response){
            if(!response){
                $("#non_st_rank").html('<option >--No Grade available--</option>')
                return
            }
            hasCompanies = true ;
            $('#non_st_rank').html(response);

            }
        })

}





$(function () {
    $(".st_sch_district").change(function (e) { 

    $('#div_st_school').show();
    var districtcode=$('.st_sch_district option:selected').val();
    getSchool(districtcode.split("@@@")[0]);                  
    e.preventDefault();
                           
        });
    });

        //Function to get shcool
        function getSchool(districtcode){
            $.ajax({
            method:'POST',
            url:'public/enrollment/model/fetch.php',
            data:{'districtcode':districtcode},
            success: function(response){
            if(!response){
                $("#st_school").html('<option >--No School available--</option>')
                return
            }
            
            $('#st_school').html(response);

            }
        })

}


</script>