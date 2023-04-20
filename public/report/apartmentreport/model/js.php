
	
<?php  ?>
<script type="text/javascript">
  function clicktoPrint(divName){

var printContents = document.getElementById(divName).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = printContents;
window.print();
document.body.innerHTML = originalContents;

}

// function to cancel report list
function cancelform() {

$("#export_url").val('');
$('#view').val('');
$('#viewpage').val('');
$('#myform').attr('action', $("#export_url").val()).submit();


}

// function to export excel
function exportxls() {

// alert('cckjckj');

var export_url=$('#export_url').val();
//   alert(export_url);
$("#myform").attr('action',export_url);
$("#myform").submit(); 

}



//Attrition search type



            
$(function () {       
      
      $(".scregion").change(function (e) { 

          $('#disdistrict').show();
          var regioncode=$('.scregion option:selected').val();
          getdistrict(regioncode);                  
          e.preventDefault();
          
      });

            
      $("#search_type").change(function (e) { 
          
        let search_type=$('#search_type option:selected').val();

        if(search_type == "1"){
        $('#staff_id_layout').show();
        $('#group_search_layout').hide();
    }
    else{
        $('#staff_id_layout').hide();
        $('#group_search_layout').show();
    }


});
      
  });



                        //GET DISTRICTS
    function getdistrict(regioncode){

        // alert(regioncode);
        $.ajax({
                    method:'POST',
                    url:'public/report/staffreport/model/fetch.php',
                    data:{'regioncode':regioncode},
                    success: function(response){
                    if(!response){
                        $("#district").html('<option >--No District available--</option>')
                        return
                    }
                    hasCompanies = true ;
                    $('#district').html(response);

                    }
                })

      }



$(function () {
$("#district").change(function (e) { 

$('#school_layout').show();
let districtcode=$('#district option:selected').val();
getSchool(districtcode);                  
e.preventDefault();
            
});
});

//Function to get shcool
function getSchool(districtcode){
$.ajax({
method:'POST',
url:'public/report/staffreport/model/fetch.php',
data:{'districtcode':districtcode},
success: function(response){
if(!response){
$("#school").html('<option >--No School available--</option>')
return
}

$('#school').html(response);

}
})

}





</script>














