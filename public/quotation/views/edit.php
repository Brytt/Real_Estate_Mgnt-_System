 <!-- Add New Teacher Area Start Here -->

 <style>
input {
    text-transform: uppercase;
}
 </style>




<div class="dashboard-content-one">
<?php
    if($stmtlist->RecordCount() > 0 ){
        $obj = $stmtlist->FetchNextObject();

        $objCode = $obj->QUT_CODE;
        $keys=$objCode;
    ?>


 <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
     <button type="submit" class="btn btn-fill-md text-15 bg-dark text-light "
         onclick="document.getElementById('pg').value='<?php echo md5('quotation');?>'; document.getElementById('option').value='<?php echo md5('details'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; ">
         <span class="fas fa-times"></span> Cancel </button>



     <button type="button" class="btn btn-fill-md text-15 bg-success text-light"
         onclick="updateMe()">
         <span class="fa fa-save"> </span> Update</button>
 </div>
 <div class="card height-auto ">
     <div class="card-body">
         <div class="heading-layout1 mb-5">
             <div class="row">
                 <div class="text-dark h1 mt-3">QUOTATION </div>
                 <span class="vl mr-3 ml-3"></span>
                 <div class="text-dark h1 mt-3">EDIT</div>
             </div>
             
         </div>
         <!-- <form class="new-added-form"> -->

         <input type="hidden" name="qut_code" id="qut_code" value="<?php echo $obj->QUT_CODE; ?>">
         <div class="row">

            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label>Name <span class="text-red">*</span></label>
                <input type="text" placeholder="" name="qut_name" id="qut_name" value="<?php echo  $obj->QUT_NAME; ?>" class="form-control">
            </div>

            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label>E-Mail</label>
                <input type="text" placeholder="" name="qut_email" id="qut_email" value="<?php echo $obj->QUT_EMAIL; ?>" class="form-control">
            </div>

            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label>Contact <span class="text-red">*</span></label>
                <input type="tel" onkeypress="allowNumbersOnly(event)" placeholder="Eg. 024 123 4567"  name="qut_contact" id="qut_contact" value="<?php echo  $obj->QUT_CONTACT; ?>"  class="form-control phone">
            </div>

            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label>Comment<span class="text-red">*</span></label>
                <textarea type="text" placeholder="" name="qut_comment" id="qut_comment" cols="10" rows="9"
                    class="form-control textarea" style="min-height:150px;"><?php echo  $obj->QUT_COMMENT; ?></textarea>
            </div>

        </div>
         <?php } ?>
     </div>
     <!-- Add New Teacher Area End Here -->