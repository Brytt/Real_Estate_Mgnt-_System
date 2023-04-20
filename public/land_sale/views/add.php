 <!-- Add New Teacher Area Start Here -->
 
 <style>
input{
    text-transform: uppercase;
}
</style>


<div class="dashboard-content-one">

<?php
                                if($stmtlist->RecordCount() > 0 ){
                                    $obj = $stmtlist->FetchNextObject();

                                    $objCode = $obj->CLIENT_CODE;
                                    $keys=$objCode;
                                ?>
    <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">

    <button type="submit" class="btn btn-fill-md text-15 bg-dark text-light "
                                onclick="document.getElementById('pg').value='<?php echo md5('land_client');?>'; document.getElementById('option').value='<?php echo md5(''); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; ">  
                             <span class="fa fa-arrow-left"></span> Back </button>
                            


        <button type="button" class="btn btn-fill-md text-15 bg-success text-light "
        onclick="SellLand();"> 
        <span class="fa fa-save"></span> Save</button>

    </div>
 <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1 mb-5">
                        <div class="row">
                             <div class="text-dark h1 mt-3">LAND</div> 
                             <span class="vl mr-3 ml-3"></span> 
                             <div class="text-dark h1 mt-3" >ADD</div>
                            </div>
                            
                        </div>
                        <!-- <form class="new-added-form"> -->

                        <!-- <input type="hidden" name="ls_code" id="ls_code" readonly value="<?php echo $obj->LS_CODE; ?>"> -->
      
                            <div class="row">
                            <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Client ID </label>
                                    <input  type="text" placeholder="" value="<?php echo  $obj->CLIENT_CODE; ?>" name="ls_client_id"  id="ls_client_id"class="form-control" readonly>
                                
                                </div>

                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Client Name </label>
                                    <input  type="text" placeholder="" value="<?php echo  $obj->CLIENT_TITLE." ".$obj->CLIENT_FIRSTNAME." ".$obj->CLIENT_OTHERNAME." ".$obj->CLIENT_LASTNAME; ?>" name="ls_client_name"  id="ls_client_name"class="form-control" readonly>
                                
                                </div>

                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Client Contact </label>
                                    <input  type="text" placeholder="" value="<?php echo  $obj->CLIENT_CONTACT_1; ?>" name="ls_client_contact"  id="ls_client_contact"class="form-control" readonly>
                                
                                </div>

                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Client Email </label>
                                    <input  type="text" placeholder="" value="<?php echo  $obj->CLIENT_EMAIL; ?>" name="ls_client_email"  id="ls_client_email"class="form-control" readonly>
                                
                                </div>


                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label> Property Name  <span class="text-red">*</span></label>
                                    <select class="select2 ls_prop_name" name="ls_prop_name" id="ls_prop_name">
                                        <option selected  value="">-- Select Property --</option>
                                        <?php foreach ($engine->getPropertyLand() as $key => $value) {?>
                                  
                                         <option value="<?php echo $value['PROPERTY_CODE']."@@@".$value['PROPERTY_NAME'];?>"><?php echo strtoupper($value['PROPERTY_NAME']); ?></option>
                                  
                                      <?php } ?> 
                                    </select>
                                </div>
                                
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Plot Number</label>
                                    <input  type="text" placeholder="" value="" name="ls_plot_number" id="ls_plot_number" class="form-control">
                                </div>
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Payment term </label>
                                    <select class="select2 text-dark" name="ls_payment_term" id="ls_payment_term"class="form-control">
                                        <option  selected disabled value="">-- Select payment Term --</option>
                                        <?php foreach ($system_payment_term as $value) {
                            echo '<option value="'.$value.'">'.strtoupper($value).'</option>';
                         }
                            ?>
                                    </select>
                                    </div>    
        

                                    <div class="col-xl-4 col-lg-6 col-12 form-group" id="ls_payment_plan_add_layout" style="display: none" class="form-control">
                                    <label>Payment-Plan </label>
                                    <select  class="select2 text-dark" name="ls_payment_plan_add" id="ls_payment_plan" class="form-control">
                                        <option  selected disabled value="">-- Select payment plan --</option>
                                        <?php foreach ($system_payment_plan as $key => $value) {
                                            echo '<option value="'.$key.'">'.$value.'</option>';
                                        }
                            ?>
                                    </select>
                                        </div>

                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Number of Plot</label>
                                    <input  type="number" placeholder="" value="" name="ls_num_plot" id="ls_num_plot" class="form-control">
                                  
                                </div>

                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Total Cost (GHS) </label>
                                    <input  type="text" placeholder="" value="" name="ls_total_cost" id="ls_total_cost" onkeypress="allowNumbersOnly(event)" class="form-control">
                                </div>

                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Total Payment (GHS)</label>
                                    <input  type="text" placeholder="" value="" name="ls_total_payment" id="ls_total_payment" onkeypress="allowNumbersOnly(event)" class="form-control">
                                    
                                </div>

                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                 <label>Payment Date </label>
                 <input type="text" placeholder="" name="payment_date" id="payment_date" id="datepicker1"
                     class="air-datepicker form-control" onkeydown="return false;" data-position='bottom right'>

             </div>

                     <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <input  type="hidden" placeholder="" value=" " name="ls_balance" id="ls_balance" class="form-control">
                                    
                                </div>
                            
                    </div>
                    <?php } ?>
                </div>
                