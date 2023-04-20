<style>
p {
    text-transform: uppercase;
}
</style>

<!-- Student Table Area Start Here -->
<?php

    
                    $engine->msgBox($msg, $status);
                   
                                if($stmtlist->RecordCount() > 0 ){
                                    $obj = $stmtlist->FetchNextObject();
                                    $objCode = $obj->LS_CODE;
                                ?>


<div class="dashboard-content-one">
    <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
        <a href="index.php?pg=<?php echo md5('land_sale');?>&option=<?php echo md5(''); ?>"
            class="btn btn-fill-md text-light text-15 bg-dark"><span class="fa fa-arrow-left"></span> Back </a>
        <button type="button" onclick=" clicktoPrint('printframe');"
            class="btn btn-fill-md bg-success text-15 text-light ">
            <span class="fas fa-print"> </span> Print</button>


        <button type="submit" class="btn btn-fill-md text-15 bg-warning text-dark "
            onclick="document.getElementById('pg').value='<?php echo md5('land_sale');?>'; document.getElementById('option').value='<?php echo md5('edit'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $obj->LS_CODE; ?>'; "><span
                class="far fa-edit"></span> Edit</button>


        <?php if($session->get('usertype') == "1" || $session->get('usertype') == "3"){?>
        <button type="button" class="btn btn-fill-md text-15 bg-danger text-light " onclick="del(); ">
            <span class="fa fa-trash"></span> Delete</button>


    </div>

    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1 mb-5">
                <div class="row">
                    <div class="text-dark h1 mt-3">LAND</div>
                    <span class="vl mr-3 ml-3"></span>
                    <div class="text-dark h1 mt-3">DETAILS</div>
                </div>


                <?php }?>


            </div>
            <div class="row gutters-8" id="printframe">



                <div class="border alert-info" id="printframeHeader" style="display:none;">
                    <div class="row" style="padding:20px;margin-bottom:-50px;margin-top:20px;">
                        <div class="col">
                            <small class="fieldset"><?php echo '@ '.date("F d, Y");?></small><br />
                            <small class="fieldset"><strong>RERIOD </strong></small><br>
                            <small class="fieldset"><strong>FROM : </strong>
                                <?php echo date('d M, Y',strtotime($datefrom));?></small><br />
                            <small>TO : </strong> <?php echo date('d M, Y',strtotime($dateto));?> </small><br /><br />

                        </div>

                    </div>


                </div><br>




                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                    <div class="item-title">

                        <h5 class="m-0">ID :</h5>
                        <p><?php echo  $obj->LS_CODE; ?> </p>

                        <h5 class="m-0">Property Name :</h5>
                        <p><?php echo  $obj->LS_PROPERTY_NAME; ?> </p>

                        <h5 class="m-0">Payment Terms :</h5>
                        <p><?php echo  $obj->LS_PAYMENT_TERM; ?> </p>


                        <h5 class="m-0">Total Cost :</h5>
                        <p>GH&#8373;<?php echo  $obj->LS_TOTAL_COST; ?> </p>

                        <h5 class="m-0">Plot Number :</h5>
                        <p><?php echo  $obj->LS_PLOT_NUMBER; ?> </p>


                    </div>
                </div>

                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                    <div class="item-title">


                        <h5 class="m-0">Client ID :</h5>
                        <p><?php echo  $obj->LS_CLIENT_ID; ?> </p>

                        <h5 class="m-0">Client Contact :</h5>
                        <p><?php echo  $obj->LS_CLIENT_CONTACT; ?> </p>

                        <h5 class="m-0">Payment Plan :</h5>
                        <?php 
                                if($obj->LS_PAYMENT_PLAN == ""){
                                    echo  '<p> N/A </p>';
                                }
                                else{
                                foreach ($system_payment_plan as $key => $value) {
                                    if($key == $obj->LS_PAYMENT_PLAN){
                                        echo  '<p>'.$value.'</p>';
                                    }
                                } 
                                } ?>

                        <h5 class="m-0">Total Payment :</h5>
                        <p>GH&#8373;<?php echo  $obj->LS_TOTAL_PAYMENT; ?> </p>



                        <h5 class="m-0">Status</h5>
                        <p><?php echo  $system_payment_status[$obj->LS_STATUS]; ?> </p>





                    </div>
                </div>



                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                    <div class="item-title">


                        <h5 class="m-0">Client Name :</h5>
                        <p><?php echo  $obj->LS_CLIENT_NAME; ?> </p>

                        <h5 class="m-0">Client Email:</h5>
                        <p><?php echo  strtolower($obj->LS_CLIENT_EMAIL); ?> </p>

                        <h5 class="m-0">Number of Plot:</h5>
                        <p><?php echo  $obj->LS_NUM_OF_PLOT; ?> </p>

                        <h5 class="m-0">Balance :</h5>
                        <p>GH&#8373; <?php echo  $obj->LS_BALANCE; ?> </p>

                        <h5 class="m-0">Next Payment Date:</h5>

                        <p><?php echo ($obj->LS_STATUS == "3")? "N/A": $engine->checkNextPayDate($obj->LS_NEXT_PAY_DATE);?>
                        </p>


                    </div>
                </div>

              

            </div>

            <hr>

            <div class="table-responsive">
                <table class="table table-striped text-nowrap" style="min-height: 150px;">
                    <thead>
                        <tr class="p-5">
                            <th>Payment Code</th>
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