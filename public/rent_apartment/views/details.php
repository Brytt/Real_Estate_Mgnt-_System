<?php
                                if($stmtlist->RecordCount() > 0 ){
                                    $obj = $stmtlist->FetchNextObject();

                                    $objCode = $obj->AR_CODE;
                                    $keys=$objCode;
                                ?>



<div class="dashboard-content-one">
    <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">


        <a href="index.php?pg=<?php echo md5('rent_apartment');?>&option=<?php echo md5(''); ?>"
            class="btn btn-fill-md text-light text-15 bg-dark"><span class="fa fa-arrow-left"></span> Back </a>

        <button type="submit" class="btn btn-fill-md text-15 bg-warning text-dark "
            onclick="document.getElementById('pg').value='<?php echo md5('rent_apartment');?>'; document.getElementById('option').value='<?php echo md5('edit'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $obj->AR_CODE; ?>'; "><span
                class="far fa-edit"></span> Edit</button>


        <button type="button" onclick=" clicktoPrint('printframe');"
            class="btn btn-fill-md bg-success text-15 text-light ">
            <span class="fas fa-print"> </span> Print</button>

        <?php if( $session->get('useraccesslevel') != "4"  ){?>
        <button type="button" class="btn btn-fill-md text-15 bg-danger text-light " onclick="del(); ">
            <span class="fa fa-caret-square-o-up"></span>Check-Out</button>
    </div>
    <div class="card height-auto ">
        <div class="card-body">
            <div class="heading-layout1 mb-5">
                <div class="row">
                    <div class="text-dark h1 mt-3">RENT</div>
                    <span class="vl mr-3 ml-3"></span>
                    <div class="text-dark h1 mt-3">DETAILS</div>
                </div>



                <?php }?>





            </div>
            <div class="row gutters-8" id="printframe">



                <div class="border alert-info" id="printframeHeader" style="display:none;">
                    <!-- <img class="card-img-top" src="media/assets/img/comologo.png" alt="" style> -->
                    <div class="row" style="padding:20px;margin-bottom:-50px;margin-top:20px;">
                        <div class="col">
                            <small class="fieldset"><?php echo '@ '.date("F d, Y");?></small><br />
                            <small class="fieldset"><strong>RERIOD </strong></small><br>
                            <small class="fieldset"><strong>FROM : </strong>
                                <?php echo date('d M, Y',strtotime($datefrom));?></small><br />
                            <small>TO : </strong> <?php echo date('d M, Y',strtotime($dateto));?> </small><br /><br />

                        </div>

                        <div class="col d-flex justify-content-center">

                        </div>

                        <div class="col" align="right">
                           
                        </div>

                    </div>


                </div><br>


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
                    <hr>

                    <?php $engine->msgBox($msg, $status); ?>
                    <div class="table-responsive">
                        <table class="table table-striped text-nowrap" style="min-height: 150px;">
                            <thead>
                                <tr class="p-5">

                                    <th>Transaction ID</th>
                                    <th>Total Cost GH&#8373;</th>
                                    <th>Amount Paid GH&#8373;</th>
                                    <th>Payment date</th>
                                    <th>Balance GH&#8373;</th>
                                    <th>DATE</th>
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
                                    <td><?php echo $engine->formatDateToRead($payObj->ALT_DATE_ADDED);?></td>

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

    </div>