<style>
    body{
        text-transform: uppercase;
    }
</style>

<?php
        if($stmtlist->RecordCount() > 0 ){
            $obj = $stmtlist->FetchNextObject();

            $objCode = $obj->EXP_CODE;
            
        ?>

<div class="dashboard-content-one">
<div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">

    <a href="index.php?pg=<?php echo md5('expenditure');?>&option=<?php echo md5(''); ?>"
        class="btn btn-fill-md text-light text-15 bg-dark"><span class="fa fa-arrow-left"></span> Back </a>

        <button type="button" onclick="clicktoPrint('printframe');" class="btn btn-fill-md bg-success text-15 text-light ">
        <span class="fas fa-print"> </span> Print</button>

        <?php if($session->get('usertype') == "1" || $session->get('usertype') == "3"){?>
    <button type="submit" class="btn btn-fill-md text-15 bg-warning text-dark "
        onclick="document.getElementById('pg').value='<?php echo md5('expenditure');?>'; document.getElementById('option').value='<?php echo md5('edit'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; ">
        <span class="far fa-edit"></span> Edit</button>

    <button type="button" class="btn btn-fill-md text-15 bg-danger text-light " onclick="del(); ">
        <span class="fa fa-trash"></span> Delete</button>

    <?php } ?>
</div>
<div class="card height-auto ">
    <div class="card-body">
        <div class="heading-layout1 mb-5">
            <div class="row ">
                <div class="text-dark h1 mt-3">EXPENDITURE</div>
                <span class="vl mr-3 ml-3"></span>
                <div class="text-dark h1 mt-3">DETAILS</div>
            </div>


        </div>
        <div class="row gutters-8" id="printframe">
            <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                <div class="item-title">

                    <h5 class="m-0">Title :</h5>
                    <p><?php echo  $obj->EXP_TITLE; ?> </p>

                    <h5 class="m-0">Contact :</h5>
                    <p><?php echo  $obj->EXP_PAYER_CONTACT; ?> </p>

                </div>
            </div>
            <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                <div class="item-title">

                    <h5 class="m-0">Amount : </h5>
                    <p>GH&#8373; <?php echo $obj->EXP_AMOUNT; ?> </p>

                    <h5 class="m-0">Reciept Date :</h5>
                    <p><?php echo  $obj->EXP_RECIEPT_DATE; ?> </p>


                </div>
            </div>
            <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                <div class="item-title">
                    <h5 class="m-0"> Name :</h5>
                    <p><?php echo  $obj->EXP_PAYER_NAME; ?> </p>

                    <h5 class="m-0">Payment Purpose : </h5>
                    <p><?php echo  $obj->EXP_PAYMENT_PURPOSE; ?> </p>

                </div>
            </div>

        </div>


        <?php } ?>

    </div>
</div>