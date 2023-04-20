 <!-- Add New Teacher Area Start Here -->


   <?php
                                if($stmtlist->RecordCount() > 0 ){
                                    $obj = $stmtlist->FetchNextObject();

                                    $objCode = $obj->INS_CODE;
                                    $keys=$objCode;
                                ?>



<div class="dashboard-content-one">
 <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
     <button type="submit" class="btn btn-fill-md text-15 bg-dark text-light "
         onclick="document.getElementById('pg').value='<?php echo md5('inspection');?>'; document.getElementById('option').value='<?php echo md5('details'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $obj->INS_CODE; ?>'; ">
         <span class="fas fa-times"></span> Cancel </button>



     <button type="button" class="btn btn-fill-md text-15 bg-success text-light"
     onclick="updateINS();">
         <span class="fa fa-save"> </span> Update</button>
 </div>

 <div class="card height-auto">
     <div class="card-body">
         <div class="heading-layout1 mb-5">
             <div class="row">
                 <div class="text-dark h1 mt-3">INSPECTION</div>
                 <span class="vl mr-3 ml-3"></span>
                 <div class="text-dark h1 mt-3">EDIT</div>
             </div>

           
         </div>
         <!-- <form class="new-added-form"> -->

         <input type="hidden" name="ins_code" id="INS_LAST_NAME" value="<?php echo $obj->INS_CODE; ?>">
         <div class="row">
         <div class="col-xl-6 col-lg-6 col-12 form-group">
                 <label>First Name </label>
                 <input type="text" placeholder="" value="<?php echo  $obj->INS_FIRST_NAME; ?>" name="ins_first_name"  id="ins_first_name"
                     class="form-control mb-3">

             </div>

             <div class="col-xl-6 col-lg-6 col-12 form-group">
                 <label>Middle Name </label>
                 <input type="text" placeholder="" value="<?php echo  $obj->INS_MIDDLE_NAME; ?>" name="ins_middle_name"
                     class="form-control mb-3">

             </div>
             <div class="col-xl-6 col-lg-6 col-12 form-group">
                 <label>Last Name </label>
                 <input type="text" placeholder="" value="<?php echo  $obj->INS_LAST_NAME; ?>" name="ins_last_name"  id="ins_last_name"
                     class="form-control mb-3">

             </div>

             <div class="col-xl-6 col-lg-6 col-12 form-group">
                 <label>E-Mail </label>
                 <input type="text" placeholder=""  value="<?php echo  $obj->INS_EMAIL; ?>" name="ins_email"
                     class="form-control">
             </div>

             <div class="col-xl-6 col-lg-6 col-12 form-group">
                 <label>Address </label>
                 <input type="text" placeholder=""  value="<?php echo  $obj->INS_ADDRESS; ?>" name="ins_address" id="ins_address"
                     class="form-control">
             </div>

             <div class="col-xl-6 col-lg-6 col-12 form-group">
                 <label>Contact </label>
                 <input type="tel" onkeypress="allowNumbersOnly(event)" placeholder="Eg. 024 123 4567" value="<?php echo  $obj->INS_CONTACT; ?>" name="ins_contact" id="ins_contact" class="form-control phone">

             </div>

             <div class="col-xl-6 col-lg-6 col-12 form-group">
                 <label>Inspection Date</label>
                 <input type="text" placeholder="" value="<?php echo  $obj->INS_INSPECTION_DATE; ?>"
                     name="ins_inspection_date" id="ins_inspection_date"   class="air-datepicker form-control" onkeydown="return false;" data-position='bottom right'>

             </div>







             <!-- </form> -->
         </div>
         <?php } ?>
     </div>
 </div>
 <!-- Add New Teacher Area End Here -->