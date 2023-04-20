<div class="card height-auto mt-5">
                    <div class="card-body">
                        <div class="heading-layout1 mb-5">
                        <div class="row ">
                             <div class="text-dark h1 mt-3">TICKET</div> 
                             <span class="vl mr-3 ml-3"></span> 
                             <div class="text-dark h1 mt-3" >DETAILS</div>
                            
    <div class="col-sm-9 text-right">
        <a href="index.php?action=index&pg=<?php echo md5('ticket')."&option=".md5(''); ?>"
         class="btn btn-dark btn-icon-split mr-2">
          <span class="icon text-white-50 pt-2">
            <i class="fas fa fa-arrow-left " ></i>
          </span>
          <span class="text">Back</span>
        </a>

        <?php
                                if($stmtlist->RecordCount() > 0 ){
                                    $obj = $stmtlist->FetchNextObject();

                                    $objCode = $obj->TCK_CODE;
                                    $keys=$objCode;
                                ?>

<?php if($obj->TCK_STATUS == 1){?>
                
        <button type="button"  onclick= "closeTicket();"
            class="btn btn-danger btn-icon-split mr-2">
                  <span class="icon text-white-50 pt-2">
                      <i class="fas fa-times"></i>
                    </span>
                    <span class="text">Close Ticket</span>
                  </button>

        <span id="ticket"><button type="button"  class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#ticket-modal<?php echo$obj->TCK_CODE;?>">
          <span class="icon text-white-50 pt-2">
            <i class="fas fa-paper-plane"></i>
          </span>
          <span class="text">Reply</span>
        </button></span>
        <?php } ?>

        
        <?php if( $session->get('USR_USER_TYPE') == "1" ||  $session->get('USR_USER_TYPE') == "2" ||  $session->get('USR_USER_TYPE') == "3" ){?>
        <?php if($obj->TCK_STATUS == 2){?>
        <button type="button"  onclick= "deleteTicket();"
            class="btn btn-danger btn-icon-split mr-2">
                  <span class="icon text-white-50 pt-2">
                      <i class="fa fa-trash"></i>
                    </span>
                    <span class="text">Delete</span>
                  </button>
                   <?php } }?>

    </div>
  </div>
  <div class="card-body mb-3 text-dark">
      <div class="row">
<div class="col-sm-12 col-md-4 col-lg-4 ">

      <div class="col-sm-12 col-md-12 col-lg-12 ">
            <h5>Client Name :</h5>
            <p><?php echo  $obj->TCK_CLIENT_NAME; ?></p>
         </div>

         <div class="col-sm-12 col-md-12 col-lg-12 mt-5">
            <h5>Client Contact :</h5>
            <p><?php echo  $obj->TCK_CLIENT_CONTACT; ?></p>
         </div>

         <div class="col-sm-12 col-md-12 col-lg-12 mt-5">
            <h5>Subject :</h5>
            <p><?php echo  $obj->TCK_SUBJECT; ?></p>
         </div>
         </div>

         <div class="col-sm-12 col-md-8 col-lg-8 ">
            <h5>Message(s) :</h5>
            <?php 
            $tmp = json_decode($obj->TCK_CHAT, true);
            $result = $tmp;
            $result = array_reverse($result);
            ?>
             <input type="hidden" name="rtk_chat" id="rtk_chat" value = "<?php echo htmlspecialchars($obj->TCK_CHAT); ?>">

           
            <?php
            foreach ($result as $key => $value) {
            ?>

            <div class="col-sm-12 bg-light pt-2 pb-2 mb-3">
              <div class="col-sm-12 text-sm-right text-info"><span class="fa fa-clock-o "></span> <?php echo  $value["date_time"]; ?> </div>
              <div class="col-sm-12 mt-2"><?php echo  $value["message"]; ?></div>
            </div>

            <?php
             }
             ?>

            
         </div>
         
      </div>
 

   </div>
   <?php } ?>
</div>

<!-- /.container-fluid -->


		<!-- Beginning Of Reply Modal -->
<div id="ticket-modal<?php echo$obj->TCK_CODE;?>" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary text-center text-light pt-3">
				<h3>Ticket Reply Form</h3>
				<!-- <a class="close" data-dismiss="modal"> X </a>  -->
			</div>
			<!-- <form id="attendanceForm" name="attendanceForm" role="form"> -->
				<div class="modal-body">	
        
                <div class="pr-3 pl-3">



                        <div class="row">

                        <div class="col-xl-12 col-lg-12 col-12">
            <label>Message</label>
            <textarea type = "text" class = "form-control" id="rtk_message" name="rtk_message" cols="30" rows="10"  placeholder = "" required></textarea>
         </div>

                    </div>				
				</div>
				<div class="modal-footer">

        <button type="button"  class="btn btn-danger btn-icon-split" data-dismiss="modal">
          <span class="icon text-white-50 pt-2">
            <i class="fa fa-times"></i>
          </span>
          <span class="text">Close</span>
        </button>

					<button type="button" class="btn btn-success btn-icon-split" 
                      onclick="sendReply();"> 
                    <span class="icon text-white-50 pt-2">
                    <i class="fa fa-paper-plane"></i> </span>
                     <span class="text">Send</span> </button>
				</div></div>
			<!-- </form> -->
		</div>
	</div>
</div>
		<!-- End Of Reply Modal -->

<script>

function deleteTicket(){        
                swal({
    
            title: "Are you sure",
            text: "You want to delete ticket?",
            icon: "warning",  
            dangerMode: true,
            buttons: ["No", "Yes, Delete"],
            })
            .then((confirm) => {
            if (confirm) {
              document.getElementById('viewpage').value='delete_ticket';document.myform.submit();
            } 
            });
    
            }

            function closeTicket(){        
                swal({
    
            title: "Are you sure",
            text: "You want to close ticket?",
            icon: "warning",  
            dangerMode: true,
            buttons: ["No", "Yes, Close"],
            })
            .then((confirm) => {
            if (confirm) {
              document.getElementById('viewpage').value='close_ticket';document.myform.submit();
            } 
            });
    
            }

            //Save button 
function sendReply(){


  if($('#rtk_message').val()==""){
  swal("Error",  "Sorry, Message is required ",  "error");
  return false;
  }


//Calling the save method
document.getElementById('pg').value='<?php echo md5('ticket');?>'; document.getElementById('option').value='<?php echo md5('details'); ?>';document.getElementById('viewpage').value='reply';document.myform.submit();

}


</script>
