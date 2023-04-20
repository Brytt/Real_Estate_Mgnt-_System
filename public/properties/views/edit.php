<?php  include "public/properties/model/js.php"; ?>
<div class="dashboard-content-one">
    <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
        <?php
            if($stmtlist->RecordCount() > 0 ){
                $obj = $stmtlist->FetchNextObject();
                
                $objCode = $obj->PROPERTY_CODE;
            }
                ?>
        <button type="button" class="btn btn-fill-md text-15 bg-dark text-light "
        onclick="document.getElementById('pg').value='<?php echo md5('Property');?>'; document.getElementById('option').value='<?php echo md5('details'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; document.myform.submit();">
            <span class="fas fa-times"></span> Cancel </button>



        <button type="button" class="btn btn-fill-md text-15 btn-success text-light"
            onclick="updateProperty('<?php echo $objCode; ?>');">
            <span class="fa fa-save"> </span> Update</button>
    </div>
    <input type="hidden" name="prop_code" id="prop_code" value="<?php echo $obj->PROPERTY_CODE; ?>">

    <div class="card  height-auto" >
        <div class="card-body">
            <div class="heading-layout1 mb-5">
                <div class="row  mb-5">
                    <div class="text-dark h1 mt-3">PROPERTIES</div>
                    <span class="vl mr-3 ml-3"></span>
                    <div class="text-dark h1 mt-3">EDIT</div>
                </div>

                <div style="text-align:right;">
                </div>

                <div class="row">


                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Property Name <span class="text-red">*</span></label>
                        <input type="text" placeholder="" name="prop_name" id="prop_name" class="form-control"
                            value="<?php echo $obj->PROPERTY_NAME; ?>">
                    </div>




                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Property Type <span class="text-red">*</span></label>
                        <select class="select2 text-dark" name="prop_type" id="prop_type">

                            <?php
                                            foreach($system_prop_type as $rg){
                                              if(strtoupper($obj->PROPERTY_TYPE) == strtoupper( $rg)){
                                            echo '<option value="'. $rg.'" selected>'. $rg.'</option>';
                                                }
                                                else{
                                                    echo '<option value="'. $rg.'">'. $rg.'</option>';
                                                }
                                    }
                                    ?>
                        </select>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Available Number <span class="text-red">*</span></label>
                        <input type="number" class="form-control" name="num_available" id="num_available"
                            value="<?php echo $obj->PROPERTY_NUM_AVAILABLE; ?>">

                    </div>


                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Location <span class="text-red">*</span></label>
                        <input type="text" placeholder="" name="prop_location" id="prop_location" class="form-control"
                            value="<?php echo $obj->PROPERTY_LOCATION; ?>">
                    </div>





                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label> Region <span class="text-red">*</span></label>
                        <select class="select2 prop_region" name="prop_region" id="prop_region">
                            <option selected value="">-- Select Regions --</option>
                            <?php foreach ($engine->getregions() as $key => $value) {?>

                            <option value="<?php echo $value['REG_ID']."@@@".$value['REG_NAME'];?>"
                                <?php echo ($value['REG_ID'] == $obj->PROPERTY_REG)? 'selected': '';?>>
                                <?php echo strtoupper($value['REG_NAME']); ?></option>

                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group" id="dis_prop__district">
                        <label> District <span class="text-red">*</span></label>
                        <select class="select2 text-dark" name="prop_district" id="prop_district">
                            <option selected
                                value="<?php echo ($engine->DistrictDetails($obj->PROPERTY_DIST)->DIST_CODE)."@@@".($engine->DistrictDetails($obj->PROPERTY_DIST)->DIST_NAME);  ?>">
                                <?php echo  $engine->GetDistrictnName($obj->PROPERTY_DIST);  ?></option>

                        </select>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Latitude</label>
                        <input type="text" placeholder="" name="latitude" id="latitude" class="form-control"
                            value="<?php echo $obj->PROPERTY_LATITUDE; ?>">
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Longitude</label>
                        <input type="text" placeholder="" name="longitude" id="longitude" class="form-control"
                            value="<?php echo $obj->PROPERTY_LONGITUDE; ?>">
                    </div>


                    
                </div>

            </div>
        </div>
    </div>
    <!-- Add New Teacher Area End Here -->