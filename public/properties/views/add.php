<!-- Add New Teacher Area Start Here -->
<?php  include "public/properties/model/js.php"; ?>

<div class="dashboard-content-one">
        <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
            <a href="index.php?pg=<?php echo md5('properties');?>&option=<?php echo md5(''); ?>"
                class="btn btn-fill-md text-light text-15 bg-dark">
                <span class="fas fa-times"></span> Cancel </a>

            <button type="button" class="btn btn-fill-md text-15 bg-success text-light" onclick="saveProperty()">
                <span class="fa fa-save"> </span> Save</button>
        </div>


        <div class="card  height-auto" >
            <div class="card-body">
                <div class="heading-layout1 mb-5">
                    <div class="row">
                        <div class="text-dark h1 mt-3">PROPERTIES</div>
                        <span class="vl mr-3 ml-3"></span>
                        <div class="text-dark h1 mt-3">ADD</div>
                    </div>

                    <div class="row">


                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                            <label>Property Name <span class="text-red">*</span></label>
                            <input type="text" placeholder="" name="prop_name" id="prop_name" class="form-control">
                        </div>

                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                            <label>Property Type<span class="text-red">*</span></label>
                            <select class="select2 text-dark" name="prop_type" id="prop_type" class="form-control">
                                <option selected disabled value="">-- Select Property Type --</option>
                                <option value="Land">LAND</option>
                                <option value="Apartment">APARTMENT</option>
                            </select>
                        </div>





                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                            <label>Available Number<span class="text-red">*</span></label>
                            <input type="text" placeholder="" name="num_available" id="num_available"
                                class="form-control">
                        </div>


                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                            <label>Location <span class="text-red">*</span></label>
                            <input type="text" placeholder="" name="prop_location" id="prop_location"
                                class="form-control">
                        </div>



                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                            <label> Region <span class="text-red">*</span></label>
                            <select class="select2 prop_region" name="prop_region" id="prop_region">
                                <option selected value="">-- Select Regions --</option>
                                <?php foreach ($engine->getregions() as $key => $value) {?>

                                <option value="<?php echo $value['REG_ID']."@@@".$value['REG_NAME'];?>">
                                    <?php echo strtoupper($value['REG_NAME']); ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-xl-4 col-lg-6 col-12 form-group" id="dis_prop__district">
                            <label> District <span class="text-red">*</span></label>
                            <select class="select2 text-dark" name="prop_district" id="prop_district">
                                <option selected disabled value="">-- Select District --</option>

                            </select>
                        </div>
                        
                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                            <label>Latitude</label>
                            <input type="text" placeholder="" name="latitude" id="latitude" class="form-control">
                        </div>

                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                            <label>Longitude</label>
                            <input type="text" placeholder="" name="longitude" id="longitude" class="form-control">
                        </div>


                        



                    </div>



                </div>
            </div>
        </div>
    