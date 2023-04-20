<style>
    input{
        text-transform: uppercase;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <div  style="text-align:right; margin-top: 20px; margin-bottom: 20px;" >
            
            <a  href="index.php?pg=<?php echo md5('ticket');?>&option=<?php echo md5(''); ?>"
                class="btn btn-fill-md text-light text-15 bg-dark"  
                ><span class="fa fa-arrow-left"></span> Back </a>
                
                <button type="button" onclick="saveTicket();" class="btn btn-success btn-icon-split ">
          <span class="icon text-white-50 pt-2">
            <i class="fas fa-save"></i>
          </span>
          <span class="text">Save</span>
        </button>
            </div> 
            
            <input id="useraccessgroup" name="useraccessgroup" value="<?php echo $session->get('useraccessgroup'); ?>" type="hidden" />
            
            <!-- Admit Form Area Start Here -->
            <div class="card height-auto mt-5 ">
                <div class="card-body" >
                    <div id="first-step-div">
                        <div class="heading-layout1 mb-5" >
                            <div class="row mb-2">
                                <div class="text-dark h1 mt-3">TICKET</div> 
                                <span class="vl mr-3 ml-3"></span> 
                                <div class="text-dark h1 mt-3" >ADD</div>
                            </div>
                            
                            
                        </div>
  <div class="card-body mb-3">
      <div class="row">

         <div class="col-sm-12 col-md-6">
            <label for="">Client Name</label>
            <input type = "text" class = "form-control" id="tk_client" name="tk_client"  placeholder = "" required>
         </div>
  
         <div class="col-sm-12 col-md-6">
            <label for="">Subject </label>
            <input type = "text" class = "form-control" id="tk_subject" name="tk_subject"  placeholder = "" required>
         </div>

         <div class="col-sm-12 col-md-6 mt-3 ">
            <label for="">Client Contact</label>
            <input type = "text" class = "form-control" id="tk_client_contact" name="tk_client_contact"  placeholder = "" onkeypress="allowNumbersOnly(event)" maxlength="10" required>
         </div>

        

         <div class="col-sm-12 col-md-6 mt-3">
            <label for="">Message</label>
         <textarea class="form-control" name="tk_message" id="tk_message" cols="30" rows="5" required></textarea>
         </div>
         
      </div>

   </div>
</div>
<!-- /.container-fluid -->
<script>

//Function allows only numbers
function allowNumbersOnly(e) {
    let code = (e.which) ? e.which : e.keyCode;
    if (code > 31 && (code < 48 || code > 57)) {
        e.preventDefault();
    }
}


//Save button 
function saveTicket(){


if($('#tk_client').val()==""){
  swal("Error", "Sorry, Client Name is required", "error");
  return false;
  }
  
if($('#tk_subject').val()==""){
  swal("Error",  "Sorry, Subject is required ",  "error");
  return false;
  }

if($('#tk_client_contact').val()==""){
  swal("Error",  "Sorry, Client's contact is required ",  "error");
  return false;
  }

  if($('#tk_message').val()==""){
  swal("Error",  "Sorry, Message is required ",  "error");
  return false;
  }


//Calling the save method
document.getElementById('viewpage').value='add';document.myform.submit();

}



</script>