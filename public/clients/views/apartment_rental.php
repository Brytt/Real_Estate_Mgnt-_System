

 <?php
if($stmtlist->RecordCount() > 0 ){
                        $obj = $stmtlist->FetchNextObject();
                        
                        $objCode = $obj->CLIENT_CODE;
                        $keys=$objCode;
                        ?>

 <div class="dashboard-content-one">
     <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
         <button type="button" class="btn btn-fill-md text-15 text-light bg-dark"
             onclick="document.getElementById('pg').value='<?php echo md5('client');?>'; document.getElementById('option').value='<?php echo md5('client_rent'); ?>'; document.getElementById('viewpage').value='rent_details'; document.getElementById('keys').value='<?php echo $obj->CLIENT_CODE; ?>';  document.myform.submit();">
             <span class="fas fa-times"></span> Cancel </button>

         <button type="button" class="btn btn-fill-md text-15 bg-success text-light " onclick="RentApartment();">
             <span class="fa fa-save"> </span> Save</button>

     </div>
     <div class="card height-auto">
         <div class="card-body">
             <div class="heading-layout1 mb-5">
                 <div class="row">
                     <div class="text-dark h1 mt-3">RENT</div>
                     <span class="vl mr-3 ml-3"></span>
                     <div class="text-dark h1 mt-3">ADD</div>
                 </div>

             </div>


             <div class="row">
                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label>Client ID </label>
                     <input type="text" placeholder="" value="<?php echo  $obj->CLIENT_CODE; ?>" name="ar_client_id"
                         id="ar_client_id" class="form-control" readonly>

                 </div>

                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label>Client Name </label>
                     <input type="text" placeholder=""
                         value="<?php echo  $obj->CLIENT_TITLE." ".$obj->CLIENT_FIRSTNAME." ".$obj->CLIENT_OTHERNAME." ".$obj->CLIENT_LASTNAME; ?>"
                         name="ar_client_name" id="ar_client_name" class="form-control" readonly>

                 </div>

                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label>Client Contact </label>
                     <input type="text" placeholder="" value="<?php echo  $obj->CLIENT_CONTACT_1; ?>"
                         name="ar_client_contact" id="ar_client_contact" class="form-control" readonly>

                 </div>

                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label>Client Email </label>
                     <input type="text" placeholder="" value="<?php echo  $obj->CLIENT_EMAIL; ?>" name="ar_client_email"
                         id="ar_client_email" class="form-control" readonly>

                 </div>


                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label> Property Name <span class="text-red">*</span></label>
                     <select class="select2 ar_prop_name" name="ar_prop_name" id="ar_prop_name">
                         <option selected value="">-- Select Property --</option>
                         <?php foreach ($engine->getPropertyApartment() as $key => $value) {?>
                         <option value="<?php echo $value['PROPERTY_CODE']."@@@".$value['PROPERTY_NAME'];?>">
                             <?php echo strtoupper($value['PROPERTY_NAME']); ?></option>
                         <?php } ?>
                     </select>
                 </div>

                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label>Unit Number</label>
                     <input type="text" placeholder="" value="" name="ar_apartment_num" id="ar_apartment_num"
                         class="form-control">

                 </div>


                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label>Check-in Date</label>
                     <input type="text" placeholder="" value="" name="ar_checked_in_date" id="checkInDate"
                         class="air-datepicker form-control" onkeydown="return false;" data-position='bottom right'>

                 </div>

                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label>Rent Duration</label>
                     <input type="text" placeholder="" value="" name="ar_duration" id="ar_duration"
                         class="form-control">

                 </div>


                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label>Checking-out Date</label>
                     <input type="text" placeholder="" value="" name="ar_checking_out_date" id="checkOutDate"
                         class="air-datepicker form-control" onkeydown="return false;" data-position='bottom right'>

                 </div>
                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label>Total Cost GH&#8373; </label>
                     <input type="text" placeholder="" value="" name="ar_total_cost" id="ar_total_cost"
                         class="form-control">
                 </div>

                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label>Amount Paid GH&#8373;</label>
                     <input type="text" placeholder="" value="" name="ar_total_payment" id="ar_total_payment"
                         class="form-control">

                 </div>



                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label>Payment Date </label>
                     <input type="text" placeholder="" name="payment_date" id="payment_date"
                         class="air-datepicker form-control" onkeydown="return false;" data-position='bottom right'>

                 </div>


                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <input type="hidden" placeholder="" value=" " name="ar_balance" id="ar_balance"
                         class="form-control">

                 </div>











                 <!-- </form> -->
             </div>
             <?php } ?>
         </div>
     </div>
     <!-- Add New Teacher Area End Here -->