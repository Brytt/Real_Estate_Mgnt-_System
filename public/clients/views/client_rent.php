        <?php
            
        if($stmtlist->RecordCount() > 0 ){
            $obj = $stmtlist->FetchNextObject();
            
            $objCode = $obj->CLIENT_CODE;
            

        $stmtlist = $paging->paginate();
        ?>


        <div class="dashboard-content-one">
            <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
                <a href="index.php?pg=<?php echo md5('client');?>&option=<?php echo md5(''); ?>"
                    class="btn btn-fill-md text-15 text-light bg-dark"><span class="fas fa-arrow-left"></span>
                    Back</a>

                <?php if($session->get('usertype') != "2"){?>
                <button type="submit" class="btn btn-fill-md text-15 bg-warning text-dark "
                    onclick="document.getElementById('pg').value='<?php echo md5('client');?>'; document.getElementById('option').value='<?php echo md5('apartment_rental'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; ">
                    <span class="far fa-edit"></span>New Rent</button>
                <?php } ?>
            </div>
            <div class="card height-auto ">
                <div class="card-body">
                    <div class="heading-layout1 mb-5">

                        <div class="row">
                            <div class="text-dark h1 mt-3">CLIENT</div>
                            <span class="vl mr-3 ml-3"></span>
                            <div class="text-dark h1 mt-3"> RENT</div>
                        </div>
                    </div>

                    <div class="col-md-12 ">
                        <div class="row">

                            <div class="col-md-9 row">
                                <div class="item-title mr-3 ">
                                    <p class="text-dark mr-3">Client Code:</p>
                                    <h4><?php echo  $obj->CLIENT_CODE; ?></h4>

                                    <p class="text-dark mr-3 ">Email:</p>
                                    <h4 class="text-dark"><?php echo  $obj->CLIENT_EMAIL; ?></h4>

                                </div>
                                <div class="item-title  ml-5">
                                    <p class="text-dark  pl-4 ml-4 ">Full Name :</hp>
                                    <h4 class="text-dark mr-5 pl-4 ml-4">
                                        <?php echo strtoupper( $obj->CLIENT_TITLE." ".$obj->CLIENT_FIRSTNAME." ".$obj->CLIENT_LASTNAME." ".$obj->CLIENT_OTHERNAME); ?>
                                    </h4>

                                    <p class="text-dark pl-4 ml-4">Contact:</p>
                                    <h4 class="text-dark mr-5 pl-4 ml-4"><?php echo  $obj->CLIENT_CONTACT_1; ?>
                                    </h4>

                                </div>
                            </div>
                            <div class="col-md-3  mr-2 pr-2">
                                <img class="item-img mr-0"
                                    src="<?php echo ($obj->CLIENT_PICTURE)?$obj->CLIENT_PICTURE :'media/img/figure/user.jpg'; ?>"
                                    alt="client" style="float:right; width:30%; height: auto;">
                            </div>
                        </div>
                    </div>


                    <!-- Beginning of search pagination -->
                    <br>

                    <hr>
                    <!-- Ending of search pagination -->

                    <?php 
            $engine->msgBox($msg, $status);
            ?>
                    <!-- </form> -->
                    <div class="table-responsive">
                        <table class="table table-striped text-nowrap" style="min-height: 150px;">
                            <thead>
                                <tr class="p-5">

                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Property</th>
                                    <th>Unit</th>
                                    <th>Total Cost</th>
                                    <th>Total Payment</th>
                                    <th>Check-Out</th>
                                    <th style="text-align:center;">ACTION</th>
                                </tr>
                            </thead>
                            <tbody style="min-height:150px;">
                                <?php
                $num = 1;

                while($rentObj = $stmtRentList->FetchNextObject()){
                ?>
                                <tr>

                                    <td><?php echo$num++;?></td>
                                    <td><?php echo$rentObj->AR_CODE;?></td>
                                    <td><?php echo$rentObj->AR_PROPERTY_NAME;?></td>
                                    <td><?php echo$rentObj->AR_APARTMENT_NUMBER;?></td>
                                    <td><?php echo$rentObj->AR_TOTAL_COST;?></td>
                                    <td><?php echo$rentObj->AR_TOTAL_PAYMENT;?></td>
                                    <td> <?php echo $engine->checkExpiring($rentObj->AR_CHECKING_OUT_DATE);?>
                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <button href="#" class="btn btn-fill-md text-15 text-light bg-info"
                                                class="dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false">
                                                MORE <i class="fas fa-caret-down mg-l-10"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">

                                                <a class="dropdown-item" href="#"
                                                    onclick="document.getElementById('pg').value='<?php echo md5('client');?>'; document.getElementById('option').value='<?php echo md5('rent_details'); ?>'; document.getElementById('viewpage').value='rent_pay_details'; document.getElementById('keys').value='<?php echo $rentObj->AR_CODE; ?>'; document.myform.submit();"><i
                                                        class="fa fa-list text-info"></i> Details</a>
                                                <?php 
                                                if($session->get('usertype') != "2"){
                                            if($rentObj->AR_PAY_STATUS != "3"){ ?>

                                                <a class="dropdown-item" href="#"
                                                    onclick="document.getElementById('pg').value='<?php echo md5('client');?>'; document.getElementById('option').value='<?php echo md5('rent_payment'); ?>'; document.getElementById('viewpage').value='apartment_payment_details'; document.getElementById('keys').value='<?php echo $rentObj->AR_CODE; ?>'; document.myform.submit();"><i
                                                        class="fa fa-history text-warning"></i> Payment</a>

                                                <?php }} ?>

                                            </div>
                                        </div>

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