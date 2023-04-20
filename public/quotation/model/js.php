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

//   function clicktoPrint(divName){

// var printContents = document.getElementById(divName).innerHTML;
// var originalContents = document.body.innerHTML;
// document.body.innerHTML = printContents;
// window.print();
// document.body.innerHTML = originalContents;

// }

function del(){        
            swal({

        title: "Are you sure?",
        text: "You want to delete!",
        icon: "warning",  
        dangerMode: true,
        buttons: ["Cancel", "Delete "],
        }) .then((confirm) => {
        if (confirm) {
            document.getElementById('viewpage').value='delete';
             document.myform.submit();
        }
    }); 

        }

//Save button 
function saveQuotation(){
    
    if($('#qut_name').val()==""){
      swal("Error",  "Sorry, Name is Required ",  "error");
      return false;
      }
  
      if(!$('#qut_contact').val().match('[0-9]{10}')){
      swal("Error",  "Sorry, Enter a valid Contact", "error");
      return false;
      }
      
      if ((phoneInput.getNumber().length < 9) || (phoneInput.getNumber().length > 16)) {
        swal("Error", "Sorry, Enter a valid Contact for your user country", "error");
        return false;
    } 

      if($('#qut_comment').val().trim()==""){
      swal("Error",  "Sorry, Comment is required", "error");
      return false;
      }
    
  
  //Calling the save method 
  $('#qut_contact').val(phoneInput.getNumber());
  document.getElementById('viewpage').value='add'; document.myform.submit();
  }

//   update button
function updateMe(){
    
    if($('#qut_name').val()==""){
      swal("Error",  "Sorry, Name is Required ",  "error");
      return false;
      }
  
      if(!$('#qut_contact').val().match('[0-9]{10}')){
      swal("Error",  "Sorry, Enter a valid Contact", "error");
      return false;
      }
       
      if ((phoneInput.getNumber().length < 9) || (phoneInput.getNumber().length > 16)) {
        swal("Error", "Sorry, Enter a valid Contact for your user country", "error");
        return false;
    } 

      if($('#qut_comment').val().trim()==""){
      swal("Error",  "Sorry, Comment is required", "error");
      return false;
      }
    

  $('#qut_contact').val(phoneInput.getNumber());
  document.getElementById('viewpage').value='update'; document.myform.submit();
    
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