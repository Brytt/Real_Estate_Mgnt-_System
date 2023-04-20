


<?php    
         $obj = $stmtlist->FetchNextObject();
         ?>


<div class="dashboard-content-one">
    <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">

        <a href="#"
            onclick="document.getElementById('pg').value='<?php echo md5('client');?>'; document.getElementById('option').value='<?php echo md5('rent_details'); ?>'; document.getElementById('viewpage').value='rent_pay_details'; document.getElementById('keys').value='<?php echo $obj->AR_CODE; ?>'; document.myform.submit();"
            class="btn btn-fill-md text-light text-15 bg-dark"><span class="fas fa-times"></span> Cancel </a>

        <button type="button" class="btn btn-fill-md text-15 bg-success text-light"
            onclick="updateApartmentRental('<?php echo $obj->AR_CODE; ?>');">
            <span class="fa fa-save"> </span> Update</button>

    </div>


    <div class="card height-auto ">
        <div class="card-body">
            <div id="first-step-div">
                <div class="heading-layout1 mb-5">
                    <div class="row mb-2">
                        <div class="text-dark h1 mt-3">RENT</div>
                        <span class="vl mr-3 ml-3"></span>
                        <div class="text-dark h1 mt-3">EDIT</div>
                    </div>


                </div>

                <div class="row  mt-5 ">
                    <div class="text-dark h3 ">RENT DETAILS</div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Client ID </label>
                        <input type="text" placeholder="" value="<?php echo  $obj->AR_CLIENT_ID; ?>" name="ar_client_id"
                            id="ar_client_id" class="form-control" readonly>

                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Client Name </label>
                        <input type="text" placeholder="" value="<?php echo  $obj->AR_CLIENT_NAME; ?>"
                            name="ar_client_name" id="ar_client_name" class="form-control" readonly>

                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Client Contact </label>
                        <input type="text" placeholder="" value="<?php echo  $obj->AR_CLIENT_CONTACT; ?>"
                            name="ar_client_contact" id="ar_client_contact" class="form-control" readonly>

                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Client Email </label>
                        <input type="text" placeholder="" value="<?php echo  $obj->AR_CLIENT_EMAIL; ?>"
                            name="ar_client_email" id="ar_client_email" class="form-control" readonly>

                    </div>


                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label> Property Name <span class="text-red">*</span></label>
                        <select class="select2 ar_prop_name" name="ar_prop_name" id="ar_prop_name">
                            <option selected value="">-- Select Property --</option>
                            <?php foreach ($engine->getPropertyApartment() as $key => $value) {
                            
                            if ($value['PROPERTY_CODE'] == $obj->AR_PROPERTY_ID){
                                echo '<option selected value="'.$value['PROPERTY_CODE']."@@@".$value['PROPERTY_NAME'].'">
                               '.strtoupper($value['PROPERTY_NAME']).'</option>';
                            }
                            else{
                                echo '<option value="'.$value['PROPERTY_CODE']."@@@".$value['PROPERTY_NAME'].'">
                               '.strtoupper($value['PROPERTY_NAME']).'</option>';
                            }
                            ?>

                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Unit</label>
                        <input type="text" placeholder="" value="<?php echo  $obj->AR_APARTMENT_NUMBER; ?>"
                            name="ar_apartment_num" id="ar_apartment_num" class="form-control">

                    </div>


                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Check-in Date</label>
                        <input type="text" placeholder="" value="<?php echo  $obj->AR_CHECKED_IN_DATE; ?>"
                            name="ar_checked_in_date" id="checkInDate" class="air-datepicker form-control"
                            onkeydown="return false;" data-position='bottom right'>

                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Rent Duration</label>
                        <input type="text" placeholder="" value="<?php echo  $obj->AR_DURATION; ?>" name="ar_duration"
                            id="ar_duration" class="form-control">

                    </div>


                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Checking-out Date</label>
                        <input type="text" placeholder="" value="<?php echo  $obj->AR_CHECKING_OUT_DATE; ?>"
                            name="ar_checking_out_date" id="checkOutDate" class="air-datepicker form-control"
                            onkeydown="return false;" data-position='bottom right'>

                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Total Cost GH&#8373; </label>
                        <input type="text" placeholder="" value="<?php echo  $obj->AR_TOTAL_COST; ?>"
                            name="ar_total_cost" id="ar_total_cost" class="form-control">
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Total Payment GH&#8373;</label>
                        <input type="text" placeholder="" value="<?php echo  $obj->AR_TOTAL_PAYMENT; ?>"
                            name="ar_total_payment" id="ar_total_payment" class="form-control" readonly>

                    </div>



                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Payment Date </label>
                        <input type="text" placeholder="" value="<?php echo  $obj->AR_PAYMENT_DATE; ?>"
                            name="payment_date" id="payment_date" class="form-control" readonly>

                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <input type="hidden" placeholder="" value=" " name="ar_balance" id="ar_balance"
                            class="form-control">

                    </div>

                </div>

            </div>
        </div>
    </div>