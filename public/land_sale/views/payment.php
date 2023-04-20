 <!-- Add New Teacher Area Start Here -->
 
 <style>
input{
    text-transform: uppercase;
}
</style>


<div class="dashboard-content-one">
<div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
<button type="submit" class="btn btn-fill-md text-15 bg-dark text-light "
                                onclick="document.getElementById('pg').value='<?php echo md5('land_sale');?>'; document.getElementById('option').value='<?php echo md5(''); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; ">  
                             <span class="fa fa-arrow-left"></span> Back </button>

                             <button type="button" class="btn btn-fill-md text-15 bg-success text-light "
                                onclick="savePayment();">
                                <span class="fa fa-save"> </span> Add Payment</button>
                                </div>

                <div class="card height-auto">
                     <div class="card-body">
                        <div class="heading-layout1 mb-5">
                        <div class="row">
                             <div class="text-dark h1 mt-3">LAND</div> 
                             <span class="vl mr-3 ml-3"></span> 
                             <div class="text-dark h1 mt-3" >PAYMENT</div>
                            </div>
                       
                            <?php
                                if($stmtlist->RecordCount() > 0 ){
                                    $obj = $stmtlist->FetchNextObject();

                                    $objCode = $obj->LS_CODE;
                                    $keys=$objCode;
                                ?>
                           
                           
                        </div>
                        <!-- <form class="new-added-form"> -->

                        <input type="hidden" name="ls_code" id="ls_code" readonly value="<?php echo $obj->LS_CODE; ?>">
                        <input  type="hidden" placeholder=""name="ls_payment_plan" id="ls_payment_plan" readonly class="form-control" value=" <?php echo $obj->LS_PAYMENT_PLAN ?> " >
                            <div class="row">
                            <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Client Name </label>
                                    <input  type="text" placeholder="" value="<?php echo  $obj->LS_CLIENT_NAME; ?>" name="ls_client_name"  id="ls_client_name"class="form-control" readonly>
                                
                                </div>


                                
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Client ID </label>
                                    <input  type="text" placeholder="" value="<?php echo  $obj->LS_CLIENT_ID; ?>" name="ls_client_id"  id="ls_client_id"class="form-control" readonly>
                                
                                </div>



                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label> Property Name  <span class="text-red">*</span></label>
                                    <input  type="text" placeholder="" value="<?php echo  $obj->LS_PROPERTY_NAME; ?>" name="ls_prop_name"  id="ls_prop_name"class="form-control" readonly>
                                </div>
                                
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Property ID</label>
                                    <input  type="text" placeholder="" value="<?php echo  $obj->LS_PROPERTY_ID; ?>" name="ls_prop_id" id="ls_prop_id" class="form-control" readonly>
                                  
                                </div>

                           
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Total Cost GH&#8373;</label>
                                    <input  type="text" placeholder="" value="<?php echo  $obj->LS_TOTAL_COST; ?>" name="ls_total_cost" class="form-control" readonly>
                                </div>

                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Total Payment GH&#8373;</label>
                                    <input  type="text" placeholder="" value="<?php echo  $obj->LS_TOTAL_PAYMENT; ?>" name="ls_total_payment" class="form-control"readonly>
                                    
                                </div>

                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Balance GH&#8373;</label>
                                    <input  type="text" placeholder="" value="<?php echo  $obj->LS_BALANCE; ?>" name="" class="form-control"readonly>
                                    
                                </div>
                                
                    
                             

                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Amount Being Paid</label>
                                    <input  type="text" placeholder="" name="payment_amt" id="payment_amt"  onkeypress="allowNumbersOnly(event)" class="form-control">
                                    
                                </div>

                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Payment Date </label>
                                    <input  type="text" placeholder="" name="payment_date" id="payment_date"  id="datepicker1" class="air-datepicker form-control" 
                                    onkeydown="return false;" data-position='bottom right'>
                                    
                            </div>


                          
                              
                            </div>
                        <!-- </form> -->
                    </div>
                    <?php } ?>
                </div>
                <!-- Add New Teacher Area End Here -->