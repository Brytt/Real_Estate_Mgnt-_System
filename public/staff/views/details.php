<!-- Student Details Area Start Here -->
<?php
        if($stmtlist->RecordCount() > 0 ){
            $obj = $stmtlist->FetchNextObject();
            
            $objCode = $obj->STAFF_CODE;
            $keys=$objCode;


            ?>


<div class="dashboard-content-one">
    <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
        <a href="index.php?pg=<?php echo md5('staff');?>&option=<?php echo md5(''); ?>"
            class="btn btn-fill-md text-light text-15 bg-dark"><span class="fa fa-arrow-left"></span> Back </a>
        
            
            <?php if($session->get('usertype') == "1" || $session->get('usertype') == "3"){?>
        <button type="submit" class="btn btn-fill-md text-15 bg-warning text-dark "
            onclick="document.getElementById('pg').value='<?php echo md5('edit');?>'; document.getElementById('option').value='<?php echo md5('edit'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; ">
            <span class="far fa-edit"></span> Edit</button>
        <?php } ?>



        <button type="button" onclick="clicktoPrint('printframe');"
            class="btn btn-fill-md bg-success text-15 text-light ">
            <span class="fas fa-print"> </span> Print</button>


        <button type="button" onclick="removeClient('<?php echo $obj->STAFF_CODE; ?>');"
            class="btn btn-fill-md bg-danger text-15 text-light ">
            <span class="fa fa-trash"> </span> Delete</button>



    </div>
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1 mb-5">
                <div class="row">
                    <div class="text-dark h1 mt-3">STAFF</div>
                    <span class="vl mr-3 ml-3"></span>
                    <div class="text-dark h1 mt-3">DETAILS</div>
                </div>

                <div class="mb-5" style="text-align:right;">



                </div>

            </div>
            <div id="printframe">


                <div class="row  mt-5 ">

                    <div class="single-info-details">
                        <div class="row gutters-20">

                            <div class="col-3-xxxl col-xl-3 col-md-3 col-sm-12 mb-3">
                                <div class="item-img mb-3">
                                    <img src="<?php echo ($obj->STAFF_PICTURE)?$obj->STAFF_PICTURE :'media/img/figure/user.jpg'; ?>"
                                        alt="staff" style="width: 150px; height: auto;">

                                </div>
                            </div>
                            <div class="col-9-xxxl col-xl-9 col-md-9 col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 col-xl-4 col-4-xxxl form-group">
                                        <div class="item-title">
                                            <h5 class="m-0">Full Name</h5>
                                            <p> <?php echo strtoupper( $obj->STAFF_TITLE." ".$obj->STAFF_FIRSTNAME." ".$obj->STAFF_LASTNAME." ".$obj->STAFF_OTHERNAME); ?>
                                            </p>
                                            <h5 class="m-0">Contact 1 :</h5>
                                            <p><?php echo  $obj->STAFF_CONTACT_1; ?> </p>

                                            

                                            

                                            <h5 class="m-0">Place of Birth</h5>
                                            <p><?php echo  strtoupper($obj->STAFF_PLACE_OF_BIRTH); ?> </p>

                                            
                                                <h5 class="m-0">Ghana Digital Address :</h5>
                                                <p><?php echo  $obj->STAFF_DIGITAL_ADDRESS; ?> </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-xl-4 col-4-xxxl form-group">
                                        <div class="item-title">
                                            <h5 class="m-0">Date Of Birth </h5>
                                            <p><?php echo $engine->formatDateToRead($obj->STAFF_DOB); ?> </p>

                                            
                                            <h5 class="m-0">Contact 2 :</h5>
                                            <p><?php echo  $obj->STAFF_CONTACT_2; ?> </p>

                                            <h5 class="m-0">Nationality</h5>
                                        <p><?php echo  strtoupper($obj->STAFF_NATIONALITY); ?> </p>

                                            </p>

                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4 col-xl-4 col-4-xxxl form-group">
                                        <div class="item-title">
                                            <h5 class="m-0">Gender</h5>
                                            <p><?php echo  strtoupper($obj->STAFF_GENDER); ?> </p>

                                            <h5 class="m-0">E-Mail : </h5>
                                            <p><?php echo  $obj->STAFF_EMAIL; ?> </p>
                                            
                                            <h5 class="m-0">Hometown</h5>
                                            <p><?php echo  strtoupper($obj->STAFF_HOMETOWN); ?>  </p>

                                        </div>
                                    </div>



                                </div>

                                
                            </div>



                            <div class="row col-12">
                                <div class="col-sm-12 col-md-3 col-l-3 col-xl-3">
                                    <div class="item-title">
                                    <h5 class="m-0">Heighest Qualification: </h5>
                                    <p><?php echo  strtoupper($obj->STAFF_QUALIFICATION); ?> </p>

                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-3 col-l-3 col-xl-3">
                                    <div class="item-title">
                                    <h5 class="m-0">Course Studied</h5>
                                     <p><?php echo  strtoupper($obj->STAFF_COURSE_STUDIED); ?> </p>

                                    </div>
                                </div>


                                


                                <div class="col-sm-12 col-md-3 col-l-3 col-xl-3 form-group">
                                    <div class="item-title">
                                    
                                        <h5 class="m-0">Residential Address</h5>
                                        <p><?php echo  strtoupper($obj->STAFF_ADDRESS); ?> </p>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-l-3 col-xl-3 form-group">
                                    <div class="item-title">
                                    <h5 class="m-0">Staff Type</h5>
                                    <?php foreach ($system_staff_type as $key => $value) {
                                 if($obj->STAFF_TYPE == $key){
                                    echo strtoupper($value);
                                }
                            
                              }
                            ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php } ?>
    </div>