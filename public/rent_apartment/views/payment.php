 <!-- Add New Teacher Area Start Here -->
 </style>
 <div class="dashboard-content-one">
     <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
         <button type="submit" class="btn btn-fill-md text-15 bg-dark text-light "
             onclick="document.getElementById('pg').value='<?php echo md5('rent_apartment');?>'; document.getElementById('option').value='<?php echo md5(''); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; ">
             <span class="fa fa-arrow-left"></span> Back </button>

         <button type="button" class="btn btn-fill-md text-15 bg-success text-light " onclick="savePayment();">
             <span class="fa fa-save"> </span> Add Payment</button>
     </div>


     <div class="card height-auto">
         <div class="card-body">
             <div class="heading-layout1 mb-5">
                 <div class="row">
                     <div class="text-dark h1 mt-3">APARTMENT</div>
                     <span class="vl mr-3 ml-3"></span>
                     <div class="text-dark h1 mt-3">ADD PAYMENT</div>
                 </div>

                 <?php
                                if($stmtlist->RecordCount() > 0 ){
                                    $obj = $stmtlist->FetchNextObject();

                                    $objCode = $obj->AR_CODE;
                                    $keys=$objCode;
                                ?>


             </div>
             <!-- <form class="new-added-form"> -->

             <input type="hidden" name="ar_code" id="ar_code" readonly value="<?php echo $obj->AR_CODE; ?>">

             <div class="row">
                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label>Client Name </label>
                     <input type="text" placeholder="" value="<?php echo  $obj->AR_CLIENT_NAME; ?>"
                         name="ar_client_name" id="ar_client_name" class="form-control" readonly>

                 </div>

                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label>Client ID </label>
                     <input type="text" placeholder="" value="<?php echo  $obj->AR_CLIENT_ID; ?>" name="ar_client_id"
                         id="ar_client_id" class="form-control" readonly>

                 </div>

                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label> Property Name <span class="text-red">*</span></label>
                     <input type="text" placeholder="" value="<?php echo  $obj->AR_PROPERTY_NAME; ?>"
                         name="ar_prop_name" id="ar_prop_name" class="form-control" readonly>
                 </div>

                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label>Property ID</label>
                     <input type="text" placeholder="" value="<?php echo  $obj->AR_PROPERTY_ID; ?>" name="ar_prop_id"
                         id="ar_prop_id" class="form-control" readonly>

                 </div>

                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label>Unit Number</label>
                     <input type="text" placeholder="" value="<?php echo  $obj->AR_APARTMENT_NUMBER; ?>"
                         name="ar_prop_id" id="ar_prop_id" class="form-control" readonly>

                 </div>



                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label>Total Cost GH&#8373; </label>
                     <input type="text" placeholder="" value="<?php echo  $obj->AR_TOTAL_COST; ?>" name="ar_total_cost"
                         class="form-control" readonly>
                 </div>

                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label>Total Payment GH&#8373; </label>
                     <input type="text" placeholder="" value="<?php echo  $obj->AR_TOTAL_PAYMENT; ?>"
                         name="ar_total_payment" class="form-control" readonly>

                 </div>

                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label>Balance GH&#8373; </label>
                     <input type="text" placeholder="" value="<?php echo  $obj->AR_BALANCE; ?>" name=""
                         class="form-control" readonly>

                 </div>




                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label>Amount Being Paid GH&#8373; </label>
                     <input type="text" placeholder="" name="payment_amt" id="payment_amt" class="form-control">

                 </div>

                 <div class="col-xl-4 col-lg-6 col-12 form-group">
                     <label>Payment Date </label>
                     <input type="text" placeholder="" name="payment_date" id="payment_date" id="datepicker1"
                         class="air-datepicker form-control" onkeydown="return false;" data-position='bottom right'>

                 </div>




             </div>
             <!-- </form> -->
         </div>
         <?php } ?>
     </div>
     <!-- Add New Teacher Area End Here -->