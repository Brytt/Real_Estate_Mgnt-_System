
	
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


            
$(function () {       
      
      $(".scregion").change(function (e) { 

          $('#disdistrict').show();
          var regioncode=$('.scregion option:selected').val();
          getdistrict(regioncode);                  
          e.preventDefault();
          
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














