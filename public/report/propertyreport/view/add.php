<div class="dashboard-content-one">

    <div  style="text-align:right; margin-top: 20px; margin-bottom: 20px;" >
        <a href="index.php?action=index&pg=dashboard" class="btn btn-fill-md text-15 text-light bg-danger"><span class="fa fa-times"></span> Cancel </a>
        
        <button type="submit"class="btn btn-fill-md text-15 text-light bg-primary" onclick=";$('#view').val('list');$('#viewpage').val('report')"><span class="fa fa-check"></span> Generate</button>
    </div>


    <div class="card height-auto">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="heading-layout1 mb-5">
                    <div class="item-title">
                        <h3>Property Report</h3>
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
                        
                        
                        
                        
                        <?php if($session->get('useraccessgroup') == "2"){?>
                            
                            <input name="region" id="region" value="<?php echo $session->get('userregion'); ?>"  type="hidden">
                            
                            <div class="col-lg-4" id="disdistrict" >
                                <label>District </label>
                                <select class="select2 text-dark" name="district" id="district">
                                    
                                    <option selected value=""> All Districts </option>
                                    <?php foreach ($engine->getDistrictByRegion($session->get('userregion')) as $key => $value) {?>
                                        <option value="<?php echo $value['DIST_CODE']?>"><?php echo $value['DIST_NAME'] ?></option>
                                        
                                        <?php } ?> 
                                        
                                    </select>
                                </select>
                            </div>   
                            
                            
                            <?php } 
                            
                            else if($session->get('useraccessgroup') == "3"){?> 
                                <input name="region" id="region" value="<?php echo $session->get('userregion'); ?>" type="hidden">
                                <input name="district" id="district" value="<?php echo $session->get('userdistrict'); ?>"  type="hidden">
                                
                                <?php }   
                                else { ?>
                                    
                                    <div class="col-lg-4">
                                        <label>Region</label>
                                        <select class="select2 scregion" name="region" id="scregion">
                                            <option selected value="">All Regions</option>
                                            <?php foreach ($engine->getregions() as $key => $value) {?>
                                                
                                                <option value="<?php echo $value['REG_ID']?>"><?php echo $value['REG_NAME'] ?></option>
                                                
                                                <?php } ?> 
                                            </select>
                                        </div>
                                        
                                        
                                        <div class="col-lg-4" id="disdistrict" style="display:none;">
                                            <label>District </label>
                                            <select class="select2 text-dark" name="district" id="district">
                                                <option selected disabled value="">Select District  </option>
                                                
                                            </select>
                                        </div>      
                                        
                                        <?php } ?>
                                        
                                        
                                    </div>
                                    
                                </form>
                                
                                
                                
                                
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                <script>
                    
                    $(function () {
                        
                        
                        $(".scregion").change(function (e) { 
                            
                            $('#disdistrict').show();
                            var regioncode=$('.scregion option:selected').val();
                            getdistrict(regioncode);                  
                            e.preventDefault();
                            
                        });
                    });
                    
                    
                    
                    //GET DISTRICTS
                    function getdistrict(regioncode){
                        
                        // alert(regioncode);
                        $.ajax({
                            method:'POST',
                            url:'public/report/staffreport/model/fetch.php',
                            data:{'regioncode':regioncode},
                            success: function(response){
                                if(!response){
                                    $("#district").html('<option >--No District available--</option>')
                                    return
                                }
                                hasCompanies = true ;
                                $('#district').html(response);
                                
                            }
                        })
                        
                    }
                    
                </script>