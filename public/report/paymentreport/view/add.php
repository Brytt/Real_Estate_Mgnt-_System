<div class="dashboard-content-one">

    <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
        <a href="index.php?action=index&pg=dashboard" class="btn btn-fill-md text-15 text-light bg-danger"><span
                class="fa fa-times"></span> Cancel </a>

        <button type="submit" class="btn btn-fill-md text-15 text-light bg-primary"
            onclick=";$('#view').val('list');$('#viewpage').val('report')"><span class="fa fa-check"></span>
            Generate</button>

    </div>
<div class="card height-auto">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="heading-layout1 mb-5">
                    <div class="item-title">
                        <h3>Payment Report</h3>
                    </div>
                    
                    
                    
                </div>
                
                <?php  $engine->msgBox($msg, $status);?>
                <form class="new-added-form">
                    <div class="form-group row">
                        
                        
                        
                        <div class="col-lg-4">
                            <label for="contact">From : <font color="red">*</font></label>
                            <input type="text" class="air-datepicker form-control" onkeydown="return false;" id="datepicker1" placeholder="dd/mm/yyyy" name="datefrom" data-position='bottom right'> 
                            <span id="contact-feedback" class="alert-danger"></span><br>
                        </div>  
                        
                        
                        <div class="col-lg-4">
                            <label for="contact">To : <font color="red">*</font></label>
                            <input type="text" class="air-datepicker form-control" id="datepicker2" placeholder="dd/mm/yyyy" name="dateto" data-position='bottom right'> 
                            <span id="contact-feedback" class="alert-danger"></span><br>
                        </div>
                        
                        
                    
                    <div class="col-lg-4">
                        <label>Payment</label>
                        <select class="select2 payment_type" name="payment_type" id="payment_type">
                            <option selected value="">Select Payment</option>
                            <option value="3">All Payments</option>
                            <option value="1">Lands</option>
                            <option value="2">Apartment</option>
                            </select>
                        </div>
                        
                                        
                                     
                                        
                                        
                                    </div>
                                    
                                </form>
                                
                                
                                
                                
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            