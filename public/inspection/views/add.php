
<div class="dashboard-content-one">
 <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">

     <a href="index.php?pg=<?php echo md5('inspection');?>&option=<?php echo md5(''); ?>"
         class="btn btn-fill-md text-light text-15 bg-dark"><span class="fas fa-times"></span> Cancel </a>



     <button type="button" class="btn btn-fill-md text-15 bg-success text-light"
     onclick="addINS();">
         <span class="fa fa-save"> </span> Save</button>

 </div>

 <div class="card height-auto">
     <div class="card-body">
         <div class="heading-layout1 mb-5">
             <div class="row">
                 <div class="text-dark h1 mt-3">INSPECTION</div>
                 <span class="vl mr-3 ml-3"></span>
                 <div class="text-dark h1 mt-3">ADD</div>
             </div>

         </div>

         <div class="row">

             <div class="col-xl-6 col-lg-6 col-12 form-group">
                 <label>First Name <span class="text-red">*</span></label>
                 <input type="text" placeholder="" name="ins_first_name" id="ins_first_name" class="form-control">
             </div>

             <div class="col-xl-6 col-lg-6 col-12 form-group">
                 <label>Middle Name </label>
                 <input type="text" placeholder="" name="ins_middle_name" id="ins_middle_name" class="form-control">
             </div>

             <div class="col-xl-6 col-lg-6 col-12 form-group">
                 <label>Last Name <span class="text-red">*</span> </label>
                 <input type="text" placeholder="" name="ins_last_name" id="ins_last_name" class="form-control">
             </div>

             <div class="col-xl-6 col-lg-6 col-12 form-group">
                 <label>E-Mail <span class="text-red">*</span> </label>
                 <input type="email" placeholder="" name="ins_email" id="ins_email" class="form-control">
             </div>

             <div class="col-xl-6 col-lg-6 col-12 form-group">
                 <label>Address <span class="text-red">*</span></label>
                 <input type="text" placeholder="" name="ins_address" id="ins_address" class="form-control">
             </div>

             <div class="col-xl-6 col-lg-6 col-12 form-group">
                 <label>Contact <span class="text-red">*</span></label>
                 <input type="tel" onkeypress="allowNumbersOnly(event)" placeholder="Eg. 024 123 4567"  name="ins_contact" id="ins_contact" class="form-control phone">
             </div>

             <div class="col-xl-6 col-lg-6 col-12 text-dark form-group">
                 <label>Inspection Date <span class="text-red">*</span></label>
                 <input type="text" placeholder="DD/MM/YYYY" name="ins_inspection_date" id="ins_contact"
                     class="air-datepicker form-control" onkeydown="return false;" data-position='bottom right'>
                 <!-- <i class="far fa-calendar-alt"></i> -->
             </div>



         </div>

     </div>
 </div>
 <!-- Add Class Area End Here -->