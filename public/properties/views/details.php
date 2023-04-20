<div class="dashboard-content-one">

    <?php
                if($stmtlist->RecordCount() > 0 ){
                    $obj = $stmtlist->FetchNextObject();
                    
                    $objCode = $obj->PROPERTY_CODE;
                
                     
                    ?>
    <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
        <a href="index.php?pg=<?php echo md5('properties');?>&option=<?php echo md5(''); ?>"
            class="btn btn-fill-md text-light text-15 bg-dark"><span class="fa fa-arrow-left"></span> Back </a>

            <?php if($session->get('usertype') == "1" || $session->get('usertype') == "3"){?>
        <button type="button" class="btn btn-fill-md text-15 bg-warning text-dark "
            onclick="document.getElementById('pg').value='<?php echo md5('properties');?>'; document.getElementById('option').value='<?php echo md5('edit'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>';document.myform.submit();">
            <span class="far fa-edit"></span> Edit</button>
<?php } ?>

        <button type="button" onclick="clicktoPrint('printframe');"
            class="btn btn-fill-md bg-primary text-15 text-light ">
            <span class="fas fa-print"> </span> Print</button>

            <?php if($session->get('usertype') == "1" ){?>
        <button type="button" class="btn btn-fill-md text-15 bg-danger text-light " onclick="deleteProperty('<?php echo $objCode; ?>'); ">
            <span class="fa fa-trash"></span> Delete</button>

        <?php }?>


    </div>
    <!-- Student Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1 mb-5">
                <div class="row">
                    <div class="text-dark h1 mt-3">PROPERTIES</div>
                    <span class="vl mr-3 ml-3"></span>
                    <div class="text-dark h1 mt-3">DETAILS</div>
                </div>

            </div>
            <div class="row gutters-8" id="printframe">


                <div class="col-4-xxxl col-xl-4 col-lg-4 col-md-6 col-sm-12 form-group">
                    <div class="item-title">


                        <h5 class="m-0">Property Code :</h5>
                        <p><?php echo strtoupper($obj->PROPERTY_CODE); ?></p>


                        <h5 class="m-0">Status :</h5>
                        <p><?php echo  $obj->PROPERTY_STATUS ? 'Available'  : 'Not Availabe'; ?> </p>


                        <h5 class="m-0">Region :</h5>
                        <p><?php echo  $engine->GetRegionName($obj->PROPERTY_REG); ?> </p>




                    </div>
                </div>
                <div class="col-4-xxxl col-xl-4 col-lg-4 col-md-6 col-sm-12 form-group">
                    <div class="item-title">

                        <h5 class="m-0">Property Name :</h5>
                        <p><?php echo strtoupper($obj->PROPERTY_NAME); ?></p>

                        <h5 class="m-0">Available Number:</h5>
                        <p><?php echo  $obj->PROPERTY_NUM_AVAILABLE?> </p>

                        <h5 class="m-0">Ditrict :</h5>
                        <p><?php echo  $engine->GetDistrictnName($obj->PROPERTY_DIST);  ?> </p>





                    </div>
                </div>

                <div class="col-4-xxxl col-xl-4 col-lg-4 col-md-6 col-sm-12 form-group">
                    <div class="item-title">


                        <h5 class="m-0">Property Type : </h5>
                        <p><?php echo  $obj->PROPERTY_TYPE; ?> </p>



                        <h5 class="m-0">Location : </h5>
                        <p><?php echo  strtoupper($obj->PROPERTY_LOCATION); ?></p>





                    </div>
                </div>
                <div class="col-4-xxxl col-xl-4 col-lg-4 col-md-6 col-sm-12 form-group">
                    <div class="item-title">







                    </div>
                </div>

            </div>






            <div class="clearfix">&nbsp;</div>
            <div class="row">
                <div class="col-lg-12">

                    <div class="mapouter">
                        <div class="gmap_canvas">

                        
                            
                        <iframe width="100%" height="500" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=<?php echo$obj->PROPERTY_LATITUDE ; ?>,<?php echo$obj->PROPERTY_LONGITUDE; ?>&hl=en&z=14&amp;output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                                href="https://www.whatismyip-address.com"></a><br>
                            <style>
                            .mapouter {
                                position: relative;
                                text-align: right;
                                height: 500px;
                                width: 600px;
                            }
                            </style><a href="https://www.embedgooglemap.net"></a>
                            <style>
                            .gmap_canvas {
                                overflow: hidden;
                                background: none !important;
                                height: 500px;
                                width: 600px;
                            }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <style>
    .mapouter,
    .gmap_canvas {
        width: auto;
    }
    </style>

    <?php
}   ?>