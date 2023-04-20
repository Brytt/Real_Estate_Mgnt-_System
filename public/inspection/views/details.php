<!-- Student Table Area Start Here -->

<?php
                                if($stmtlist->RecordCount() > 0 ){
                                    $obj = $stmtlist->FetchNextObject();

                                    $objCode = $obj->INS_CODE;
                                    $keys=$objCode;
                                ?>
<div class="dashboard-content-one">
<div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
    <a href="index.php?pg=<?php echo md5('inspection');?>&option=<?php echo md5(''); ?>"
        class="btn btn-fill-md text-light text-15 bg-dark"><span class="fa fa-arrow-left"></span> Back </a>


    <button type="submit" class="btn btn-fill-md text-15 bg-warning text-dark "
        onclick="document.getElementById('pg').value='<?php echo md5('inspection');?>'; document.getElementById('option').value='<?php echo md5('edit'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; ">
        <span class="far fa-edit"></span> Edit</button>

    <button type="button" onclick=" clicktoPrint('printframe');" class="btn btn-fill-md bg-success text-15 text-light ">
        <span class="fas fa-print"> </span> Print</button>

        <?php if($session->get('usertype') == "1" || $session->get('usertype') == "3"){?>
    <button type="button" class="btn btn-fill-md text-15 bg-danger text-light " onclick="del(); ">
        <span class="fa fa-trash"></span> Delete</button>
    <?php }?>

</div>

<div class="card height-auto ">
    <div class="card-body">
        <div class="heading-layout1 mb-5">
            <div class="row ">
                <div class="text-dark h1 mt-3">INSPECTION</div>
                <span class="vl mr-3 ml-3"></span>
                <div class="text-dark h1 mt-3">DETAILS</div>
            </div>




        </div>
        <div class="row gutters-8" id="printframe">
            <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                <div class="item-title">

                    <h5 class="m-0">First Name :</h5>
                    <p><?php echo strtoupper ($obj->INS_FIRST_NAME); ?></p>

                    <h5 class="m-0">Middle Name :</h5>
                    <p><?php echo strtoupper ($obj->INS_MIDDLE_NAME); ?></p>

                    <h5 class="m-0">Last Name :</h5>
                    <p><?php echo strtoupper ($obj->INS_LAST_NAME); ?></p>





                </div>
            </div>
            <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                <div class="item-title">

                    <h5 class="m-0">E-Mail :</h5>
                    <p><?php echo strtoupper ($obj->INS_EMAIL); ?> </p>


                    <h5 class="m-0">Address : </h5>
                    <p><?php echo strtoupper ($obj->INS_ADDRESS); ?> </p>

                </div>
            </div>
            <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                <div class="item-title">

                    <h5 class="m-0">Contact : </h5>
                    <p><?php echo strtoupper ($obj->INS_CONTACT); ?> </p>

                    <h5 class="m-0">Inspection Date :</h5>
                    <p><?php echo $engine->checkNextInspection($obj->INS_INSPECTION_DATE); ?> </p>



                </div>
            </div>

        </div>


        <?php } ?>

    </div>
</div>