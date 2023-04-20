 <!-- Add New Teacher Area Start Here -->


 <?php
                                if($stmtlist->RecordCount() > 0 ){
                                    $obj = $stmtlist->FetchNextObject();

                                    $objCode = $obj->EXP_CODE;
                                    $keys=$objCode;
                                ?>

<div class="dashboard-content-one">
 <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
     <button type="submit" class="btn btn-fill-md text-15 bg-dark text-light "
         onclick="document.getElementById('pg').value='<?php echo md5('expenditure');?>'; document.getElementById('option').value='<?php echo md5('details'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $obj->EXP_CODE; ?>'; ">
         <span class="fas fa-times"></span> Cancel </button>



     <button type="button" class="btn btn-fill-md text-15 bg-success text-light"
     onclick="UpdateExp();">
         <span class="fa fa-save"> </span> Update</button>
         </div>
 <div class="card height-auto">
     <div class="card-body">
         <div class="heading-layout1 mb-5">
             <div class="row">
                 <div class="text-dark h1 mt-3">EXPENDITURE</div>
                 <span class="vl mr-3 ml-3"></span>
                 <div class="text-dark h1 mt-3">EDIT</div>
             </div>

            

         </div>
         <!-- <form class="new-added-form"> -->

         <input type="hidden" name="exp_code" id="exp_code" value="<?php echo $obj->EXP_CODE; ?>">
         <div class="row">
             <div class="col-xl-3 col-lg-6 col-12 form-group">
                 <label>Title</label>
                 <input type="text" placeholder="" value="<?php echo  $obj->EXP_TITLE; ?>" name="ex_title"  id="ex_title"
                     class="form-control">
             </div>

             <div class="col-xl-3 col-lg-6 col-12 form-group">
                 <label>Amount GH&#8373;</label>
                 <input type="text" placeholder="" value="<?php echo  $obj->EXP_AMOUNT; ?>" name="ex_amount"  id="ex_amount"
                 onkeypress="allowNumbersOnly(event)" class="form-control">
             </div>
             <div class="col-xl-3 col-lg-6 col-12 form-group">
                 <label>Name </label> <input type="text" placeholder=""
                     value="<?php echo  $obj->EXP_PAYER_NAME; ?>" name="ex_name" id="ex_name" class="form-control">
             </div>
             <div class="col-xl-3 col-lg-6 col-12 form-group" id="ex_amount">
                 <label>Contact </label>
                 <input type="text" placeholder="" value="<?php echo  $obj->EXP_PAYER_CONTACT; ?>" name="ex_contact"
                     id="ex_contact" class="form-control">
             </div>
             

             <div class="col-xl-3 col-lg-6 col-12 form-group">
                 <label>Reciept Date</label>
                 <input type="text" placeholder="" value="<?php echo  $obj->EXP_RECIEPT_DATE; ?>" name="ex_rec_date"
                     id="ex_rec_date" class="air-datepicker form-control" onkeydown="return false;" data-position='bottom right'>

             </div>

             <div class="col-xl-3 col-lg-6 col-12 form-group">
                 <label> Payment Purpose</label>
                 <input type="text" placeholder="" value="<?php echo  $obj->EXP_PAYMENT_PURPOSE; ?>"
                     class="form-control" id="ex_purpose" name="ex_purpose">
             </div>





             <!-- </form> -->
         </div>
         <?php } ?>
     </div>
     <!-- Add New Teacher Area End Here -->