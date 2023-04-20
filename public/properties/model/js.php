<script>


//This method is called when  school region is selected
//It splits the joint region code and name
$(function () {               

$(".prop_region").change(function (e) { 
    $('#prop_district').show();
  
    var regioncodesch=$('.prop_region option:selected').val();
     getschdistrict(regioncodesch.split("@@@")[0]);                  
    
});
});



function deleteProperty(propertyCode){        
            swal({

        title: "Are you sure?",
        text: "You want to delete!",
        icon: "warning",  
        dangerMode: true,
        buttons: ["Cancel", "Delete "],
        }) .then((confirm) => {
        if (confirm) {
            document.getElementById('viewpage').value='delete';
            document.getElementById('keys').value=propertyCode;
             document.myform.submit();
        }
    }); 

        }

//GET school DISTRICTS
function getschdistrict(regioncodesch){

    $.ajax({
                method:'POST',
                url:'public/properties/model/fetch.php',
                data:{'regioncode':regioncodesch},
                success: function(response){               
                $('#prop_district').html(response);

                }
            })

}



//Save button 
function saveProperty(){
  
  if($('#prop_name').val()==""){
    swal("Error",  "Sorry, Property name is required ",  "error");
    return false;
    }

    if($('#type').val()==""){
    swal("Error", "Sorry,  Property  is required", "error");
    return false;
    }

    if($('#prop_location').val()==""){
    swal("Error", "Sorry, Location is required", "error");
    return false;
    }

    if($('#prop_region :selected').val()==""){
    swal("Error", "Please select Region", "error");
    return false;
    }
    
    if($('#prop_district :selected').val()==""){
    swal("Error", "Please select  district", "error");
    return false;
    }

   
 
//Calling the save method
document.getElementById('viewpage').value='add';document.myform.submit();

   
} 

//Save button 
function updateProperty(keys){
  
  if($('#property_agent_name').val()==""){
    swal("Error", "Sorry, Property code is required", "error");
    return false;
    }
    
  if($('#prop_name').val()==""){
    swal("Error",  "Sorry, Property name is required ",  "error");
    return false;
    }

  if($('#prop_lease_Id').val()==""){
    swal("Error",  "Sorry, Lease ID is required ",  "error");
    return false;
    }

    if($('#type').val()==""){
    swal("Error", "Sorry,  Property  is required", "error");
    return false;
    }

    if($('#size').val()==""){
    swal("Error", "Sorry,  Land size  is required", "error");
    return false;
    }

    if($('#postgps').val()==""){
    swal("Error", "Sorry,  Digital address  is required", "error");
    return false;
    }

    if($('#prop_location').val()==""){
    swal("Error", "Sorry, Location is required", "error");
    return false;
    }

    if($('#prop_region :selected').val()==""){
    swal("Error", "Please select Region", "error");
    return false;
    }
    
    if($('#prop_district :selected').val()==""){
    swal("Error", "Please select  district", "error");
    return false;
    }


    if($('#location_type :selected').val()==""){
    swal("Error", "Please select Location type", "error");
    return false;

    
    }
   
 
//Calling the save method
document.getElementById('viewpage').value='update';document.getElementById('keys').value=keys; document.myform.submit();

   
}


$(".remove").click(function(){
  
swal({

        title: "Are you sure?",
        text: "You want to Delete!",
        icon: "warning",  
        dangerMode: true,
        buttons: ["No", "Yes, Delete"],
        })
        .then((confirm) => {
        if (confirm) {
          document.getElementById('viewpage').value='removeimg';document.getElementById('keys').value=$(this).attr('id'); document.myform.submit();
        } 
        });



});
</script>