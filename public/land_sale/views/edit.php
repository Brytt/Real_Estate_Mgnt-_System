 <!-- Add New Teacher Area Start Here -->
 <div class="dashboard-content-one">
    <?php
                  
                
                  if($stmtlist->RecordCount() > 0 ){
                      $obj = $stmtlist->FetchNextObject();

                      $objCode = $obj->LS_CODE;
                      $keys=$objCode;
                  ?>
    <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">

        <a href="#"
            onclick="document.getElementById('pg').value='<?php echo md5('land_sale');?>'; document.getElementById('option').value='<?php echo md5('details'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $obj->LS_CODE; ?>'; document.myform.submit();"
            class="btn btn-fill-md text-light text-15 bg-dark"> <span class="fas fa-times"></span> Cancel </a>

        <button type="button" class="btn btn-fill-md text-15 bg-success text-light"
            onclick="updateLand();">
            <span class="fa fa-save"> </span> Update</button>
    </div>

    <div class="card height-auto ">
        <div class="card-body">
            <div class="heading-layout1 mb-5">

                <div class="row mb-2">
                    <div class="text-dark h1 mt-3">LAND</div>
                    <span class="vl mr-3 ml-3"></span>
                    <div class="text-dark h1 mt-3">EDIT</div>
                </div>

                <div class="col-md-12 ">
                    <div class="row">


                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                            <label>Client ID </label>
                            <input type="text" placeholder="" value="<?php echo  strtoupper($obj->LS_CLIENT_ID); ?>"
                                name="ls_client_id" id="ls_client_id" class="form-control" readonly>

                        </div>

                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                            <label>Client Name </label>
                            <input type="text" placeholder="" value="<?php echo  strtoupper($obj->LS_CLIENT_NAME); ?>"
                                name="ls_client_name" id="ls_client_name" class="form-control" readonly>

                        </div>

                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                            <label>Client Contact </label>
                            <input type="text" placeholder=""
                                value="<?php echo  strtoupper($obj->LS_CLIENT_CONTACT); ?>" name="ls_client_contact"
                                id="ls_client_contact" class="form-control" readonly>

                        </div>

                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                            <label>Client Email </label>
                            <input type="text" placeholder="" value="<?php echo  strtoupper($obj->LS_CLIENT_EMAIL); ?>"
                                name="ls_client_email" id="ls_client_email" class="form-control" readonly>

                        </div>

                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                            <label> Property Name <span class="text-red">*</span></label>
                            <select class="select2 ls_prop_name" name="ls_prop_name" id="ls_prop_name">
                                <?php foreach ($engine->getPropertyLand() as $key => $value) {
                                 if($key == $obj->LS_PROPERTY_ID)
                                 echo '<option selected value="'.$value['PROPERTY_CODE']."@@@".$value['PROPERTY_NAME'].'">'.strtoupper($value['PROPERTY_NAME']).'</option>';
                                 else
                                 echo '<option  value="'.$value['PROPERTY_CODE']."@@@".$value['PROPERTY_NAME'].'">'.strtoupper($value['PROPERTY_NAME']).'</option>';
                                 } ?>
                            </select>
                        </div>

                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                            <label>Plot Number </label>
                            <input type="text" placeholder="" value="<?php echo  strtoupper($obj->LS_PLOT_NUMBER); ?>"
                                name="ls_plot_number" id="ls_plot_number" class="form-control">

                        </div>

                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                            <label>Payment term </label>
                            <select class="select2 text-dark" name="ls_payment_term" id="ls_payment_term_et"
                                class="form-control">
                                <?php foreach ($system_payment_term as $value) {
                            if($value == $obj->LS_PAYMENT_TERM)
                            echo '<option selected value="'.$value.'">'.strtoupper($value).'</option>';
                            else
                            echo '<option value="'.$value.'">'.strtoupper($value).'</option>';

                         }
                            ?>
                            </select>
                        </div>


                        <div class="col-xl-4 col-lg-6 col-12 form-group" id="ls_payment_plan_layout"
                            <?php echo ($obj->LS_PAYMENT_TERM == "installment")? "" : 'style="display: none";'; ?>
                            class="form-control">
                            <label>Payment-Plan </label>
                            <select class="select2 text-dark" name="ls_payment_plan" id="ls_payment_plan"
                                class="form-control">

                                <?php foreach ($system_payment_plan as $key => $value) {
                            if($key == $obj->LS_PAYMENT_PLAN)
                            echo '<option selected value="'.$key.'">'.$value.'</option>';
                            else
                            echo '<option value="'.$key.'">'.$value.'</option>';

                         }
                            ?>
                            </select>
                        </div>


                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                            <label>Number of Plot</label>
                            <input type="number" placeholder="" value="<?php echo  strtoupper($obj->LS_NUM_OF_PLOT); ?>"
                                name="ls_num_plot" id="ls_num_plot" class="form-control">

                        </div>

                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                            <label>Total Cost GH&#8373; </label>
                            <input type="text" placeholder="" value="<?php echo  strtoupper($obj->LS_TOTAL_COST); ?>"
                                name="ls_total_cost" id="ls_total_cost" class="form-control">
                        </div>

                        
                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                            <label>Amount Paid GH&#8373; </label>
                            <input type="text" placeholder="" value="<?php echo  strtoupper($obj->LS_TOTAL_PAYMENT); ?>"
                                name="ls_total_payment" id="ls_total_payment" class="form-control" readonly>

                        </div>
               
                        <input type="hidden" placeholder="" value=" " name="ls_balance" class="form-control">

                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                            <label>Total Balance GH&#8373; </label>
                            <input type="text" placeholder="" value="<?php echo  strtoupper($obj->LS_BALANCE); ?>"
                                name="ls_balance" id="ls_balance" class="form-control" readonly>

                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>


    <?php } ?>