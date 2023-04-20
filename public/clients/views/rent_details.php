                <?php
                  
                  if($stmtlist->RecordCount() > 0 ){
                      $obj = $stmtlist->FetchNextObject();
                      
                     
                  ?>


                <div class="dashboard-content-one">
                    <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">

                        <button type="button" class="btn btn-fill-md text-15 text-light bg-dark"
                            onclick="document.getElementById('pg').value='<?php echo md5('client');?>'; document.getElementById('option').value='<?php echo md5('client_rent'); ?>'; document.getElementById('viewpage').value='rent_details'; document.getElementById('keys').value='<?php echo $obj->AR_CLIENT_ID; ?>';  document.myform.submit();">
                            <span class="fas fa-arrow-left"></span> Back</button>


                            <?php if($session->get('usertype') != "2"){?>
                        <button type="submit" class="btn btn-fill-md text-15 bg-warning text-dark "
                            onclick="document.getElementById('pg').value='<?php echo md5('client');?>'; document.getElementById('option').value='<?php echo md5('edit_rent'); ?>'; document.getElementById('viewpage').value='rent_pay_details'; document.getElementById('keys').value='<?php echo $obj->AR_CODE; ?>'; "><span
                                class="far fa-edit"></span> Edit</button>

                        <input type="hidden" name="rent_client_code" value="<?php echo $obj->AR_CLIENT_ID; ?>">
                        <button type="button" class="btn btn-fill-md text-15 bg-danger text-light "
                            onclick="checkoutRent('<?php echo $obj->AR_CODE; ?>'); ">
                            <span class="fa fa-caret-square-o-up"></span>Check-Out</button>

                            <?php } ?>

                    </div>
                    <div class="card height-auto ">
                        <div class="card-body">
                            <div class="heading-layout1 mb-5">

                                <div class="row">
                                    <div class="text-dark h1 mt-3">RENT</div>
                                    <span class="vl mr-3 ml-3"></span>
                                    <div class="text-dark h1 mt-3"> DETAILS</div>
                                </div>

                            </div>

                            <div class="col-md-12 ">
                                <div class="row">

                                    <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                        <div class="item-title">

                                            <h5 class="m-0">ID :</h5>
                                            <p><?php echo  $obj->AR_CODE; ?> </p>

                                            <h5 class="m-0">Property:</h5>
                                            <p><?php echo strtoupper($obj->AR_PROPERTY_NAME); ?> </p>

                                            <h5 class="m-0">Unit</h5>
                                            <p><?php echo $obj->AR_APARTMENT_NUMBER; ?> </p>

                                            <h5 class="m-0">Total Cost</h5>
                                            <p>GH&#8373;<?php echo  $obj->AR_TOTAL_COST; ?> </p>

                                            <h5 class="m-0">Check-Out</h5>
                                            <p><?php echo $engine->checkExpiring($obj->AR_CHECKING_OUT_DATE); ?> </p>

                                        </div>
                                    </div>

                                    <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                        <div class="item-title">

                                            <h5 class="m-0">Client ID :</h5>
                                            <p><?php echo  $obj->AR_CLIENT_ID; ?> </p>

                                            <h5 class="m-0">Contact</h5>
                                            <p><?php echo  $obj->AR_CLIENT_CONTACT; ?> </p>

                                            <h5 class="m-0">Duration</h5>
                                            <p><?php echo  strtoupper($obj->AR_DURATION); ?> </p>

                                            <h5 class="m-0">Total Payment</h5>
                                            <p>GH&#8373; <?php echo  $obj->AR_TOTAL_PAYMENT; ?> </p>

                                            <h5 class="m-0">Status</h5>
                                            <p><?php echo  $system_payment_status[$obj->AR_PAY_STATUS]; ?> </p>



                                        </div>
                                    </div>

                                    <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                        <div class="item-title">

                                            <h5 class="m-0">Client Name</h5>
                                            <p><?php echo  strtoupper($obj->AR_CLIENT_NAME); ?> </p>

                                            <h5 class="m-0">Email</h5>
                                            <p><?php echo  strtolower($obj->AR_CLIENT_EMAIL); ?> </p>

                                            <h5 class="m-0">Check-In</h5>
                                            <p><?php echo $engine->formatDateToRead($obj->AR_CHECKED_IN_DATE); ?> </p>

                                            <h5 class="m-0">Balance :</h5>
                                            <p>GH&#8373; <?php echo  $obj->AR_BALANCE; ?> </p>
                                            
                                        </div>
                                    </div>

                                </div>


                                <!-- Beginning of search pagination -->
                                <br>

                                <hr>
                                <!-- Ending of search pagination -->

                                <?php $engine->msgBox($msg, $status); ?>
                                <!-- </form> -->
                                <div class="table-responsive">
                                    <table class="table table-striped text-nowrap" style="min-height: 150px;">
                                        <thead>
                                            <tr class="p-5">
                                                <th>Transaction ID</th>
                                                <th>Total Cost GH&#8373;</th>
                                                <th>Amount Paid GH&#8373;</th>
                                                <th>Payment Date</th>
                                                <th>Balance GH&#8373;</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody style="min-height:150px;">
                                            <?php
                                                $num = 1;
                                                // $keys=$objCode;
                        
                                                while($payObj = $stmtPayList->FetchNextObject()){
                                                ?>
                                            <tr>
                                                <td><?php echo$payObj->ALT_CODE;?></td>
                                                <td><?php echo$payObj->ALT_TOTAL_COST;?></td>
                                                <td><?php echo$payObj->ALT_TOTAL_PAYMENT;?></td>
                                                <td><?php echo $engine->formatDateToRead($payObj->ALT_PAY_DATE);?></td>
                                                <td><?php echo$payObj->ALT_BALANCE;?></td>
                                                <td><?php echo $engine->formatDateToRead($payObj->ALT_DATE_ADDED);?>
                                                </td>

                                            </tr>
                                            <?php
  
                                                    }
                                                }
                                  
                                                else{
                                                    echo'
                                                    <tr class="even">
                                                    <td colspan="9" class="empty-text text-center">No records found.</td>
                                                    </tr>
                                                    ';
                                                }
                                                ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>