<!-- Student Table Area Start Here -->
<div class="dashboard-content-one">

<?php
    if($stmtlist->RecordCount() > 0 ){
        $obj = $stmtlist->FetchNextObject();

        $objCode = $obj->QUT_CODE;
        
 ?>

<div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
    <a href="index.php?pg=<?php echo md5('quotation');?>&option=<?php echo md5(''); ?>"
        class="btn btn-fill-md text-light text-15 bg-dark"><span class="fa fa-arrow-left"></span> Back </a>

    <button type="button" class="btn btn-fill-md text-15 bg-warning text-dark "
        onclick="document.getElementById('pg').value='<?php echo md5('quotation');?>'; document.getElementById('option').value='<?php echo md5('edit'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>';  document.myform.submit();">
        <span class="far fa-edit"></span> Edit</button>

    <button type="button" onclick=" clicktoPrint('printframe');" class="btn btn-fill-md bg-success text-15 text-light ">
        <span class="fas fa-print"> </span> Print</button>

    <?php if($session->get('usertype') == "1" || $session->get('usertype') == "3"){?>
    <button type="button" class="btn btn-fill-md text-15 bg-danger text-light " onclick="del(); ">
        <span class="fa fa-trash"></span> Delete</button>
        <?php }?>



</div>
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1 mb-5">
            <div class="row">
                <div class="text-dark h1 mt-3">QUOTATION</div>
                <span class="vl mr-3 ml-3"></span>
                <div class="text-dark h1 mt-3">DETAILS</div>
            </div>

        </div>
        <div class="row gutters-8" id="printframe">



            <div class="border alert-info" id="printframeHeader" style="display:none;">
                <!-- <img class="card-img-top" src="media/assets/img/comologo.png" alt="" style> -->
                <div class="row" style="padding:20px;margin-bottom:-50px;margin-top:20px;">
                    <div class="col">
                        <small class="fieldset"><?php echo '@ '.date("F d, Y");?></small><br />
                        <small class="fieldset"><strong>RERIOD </strong></small><br>
                        <small class="fieldset"><strong>FROM : </strong>
                            <?php echo date('d M, Y',strtotime($datefrom));?></small><br />
                        <small>TO : </strong> <?php echo date('d M, Y',strtotime($dateto));?> </small><br /><br />

                    </div>

                    <div class="col d-flex justify-content-center">

                        <img style="max-width: 1000px; height: 80px;" src="media/img/Ghana_Education_Service_logo.png"
                            alt="logo">
                    </div>

                    <div class="col" align="right">
                
                    </div>

                </div>


            </div><br>


            <div class="col-4-xxxl col-xl-4 col-lg-4 col-md-4 col-sm-12 form-group">
                <div class="item-title">

                    <h5 class="m-0">Name :</h5>
                    <p><?php echo  strtoupper($obj->QUT_NAME); ?></p>

                </div>
                <div class="item-title">

                    <h5 class="m-0">E-Mail :</h5>
                    <p><?php echo  strtolower($obj->QUT_EMAIL); ?></p>

                </div>
            </div>

            <div class="col-8-xxxl col-xl-8 col-lg-3 col-md-8 col-sm-12 form-group">
                <div class="item-title">
                    <div class="item-title">

                        <h5 class="m-0">Contact :</h5>
                        <p><?php echo  $obj->QUT_CONTACT; ?></p>

                    </div>

                    <h5 class="m-0">Comment:</h5>
                    <p><?php echo  strtoupper($obj->QUT_COMMENT); ?></p>

                </div>
            </div>

        </div>
        <?php } ?>
    </div>
</div>