<!-- Begin Page Content -->
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header  col-sm-12 row m-0">
    <div class="col-sm-3 " style="font-size:1.5vw;">Opened Ticket [:Edit]</div>
    <div class="col-sm-9 text-right">

    <?php
                                if($stmtlist->RecordCount() > 0 ){
                                    $obj = $stmtlist->FetchNextObject();

                                    $objCode = $obj->EMG_CODE;
                                    $keys=$objCode;
                                ?>

        <button type="submit" onclick="document.getElementById('pg').value='<?php echo md5('ticket');?>'; document.getElementById('option').value='<?php echo md5('details'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; "
         class="btn btn-dark btn-icon-split mr-2">
          <span class="icon text-white-50 pt-2">
            <i class="fas fa fa-arrow-left " ></i>
          </span>
          <span class="text">Back</span>
        </button>

        <button type="button" onclick="document.getElementById('pg').value='<?php echo md5('ticket');?>'; document.getElementById('option').value=''; document.getElementById('viewpage').value='update';  document.myform.submit();" class="btn btn-success btn-icon-split ">
          <span class="icon text-white-50 pt-2">
            <i class="fas fa-save"></i>
          </span>
          <span class="text">Update</span>
        </button>

    </div>
  </div>
  <div class="card-body mb-3">
      <div class="row">

      <input type="hidden" name="emg_code" id="emg_code" readonly value="<?php echo $obj->EMG_CODE; ?>">

         <div class="col-sm-12 col-md-6">
            <label for="">Emergency Type</label>
            <input  type="text" placeholder="" readonly value="<?php echo  $obj->EMG_TYPE; ?>" name="emg_type" class="form-control">
         </div>

         <div class="col-sm-12 col-md-6">
            <label for="">Sender Name</label>
            <input type = "text" class = "form-control"  value="<?php echo  $obj->EMG_SENDER; ?>" id="emg_sender" name="emg_sender"  placeholder = "" required>
         </div>
  
         <div class="col-sm-12 col-md-6 mt-3">
            <label for="">Sender Contact</label>
            <input type = "text" class = "form-control"  value="<?php echo  $obj->EMG_SENDER_CONTACT; ?>" id="emg_sender_contact" name="emg_sender_contact"  placeholder = "" required>
         </div>

         <div class="col-sm-12 col-md-6 mt-3">
            <label for="">Title </label>
            <input type = "text" class = "form-control"  value="<?php echo  $obj->EMG_TITLE; ?>" id="emg_title" name="emg_title"  placeholder = "" required>
         </div>
    
      <div class="col-sm-12 col-md-6 mt-3">
            <label for="">Emergency Source </label>
            <input type = "text" class = "form-control"  readonly value="<?php echo  $obj->EMG_SOURCE; ?>" id="emg_source" name="emg_source"  placeholder = "" required>
         </div>

         <div class="col-sm-12 col-md-6 mt-3">
            <label for="">Description</label>
         <input class="form-control" name="emg_description" value="<?php echo  $obj->EMG_DESCRIPTION; ?>" id="emg_description" cols="30" rows="5"></input>
         </div>
         
      </div>

   </div>
   <?php } ?>
</div>
</div>
<!-- /.container-fluid -->

