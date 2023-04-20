
	
<?php  ?>
<script type="text/javascript">




// $(document).ready(function(){
//                             $(".scregion").change(function(){
//                                 alert( "Handler" );
//                             });
//                             });



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



  

</script>














