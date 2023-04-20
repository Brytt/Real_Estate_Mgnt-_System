
 
 <div class="dashboard-content-one">

 <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
     <a href="index.php?pg=<?php echo md5('expenditure');?>&option=<?php echo md5(''); ?>"
         class="btn btn-fill-md text-light text-15 bg-dark"><span class="fas fa-times"></span> Cancel </a>



     <button type="button" class="btn btn-fill-md text-15 bg-success text-light " onclick="addExp();">
         <span class="fa fa-save"> </span> Save</button>
 </div>


 <div class="card height-auto">
     <div class="card-body">
         <div class="heading-layout1 mb-5">
             <div class="row">
                 <div class="text-dark h1 mt-3">EXPENDITURE</div>
                 <span class="vl mr-3 ml-3"></span>
                 <div class="text-dark h1 mt-3">ADD</div>
             </div>

             <div class="row">

                 <div class="col-xl-6 col-lg-6 col-12 form-group">
                     <label>Title  <span class="text-red">*</span></label>
                     <input type="text" placeholder="" name="ex_title" id="ex_title" class="form-control">
                 </div>

                 <div class="col-xl-6 col-lg-6 col-12 form-group">
                     <label>Amount  <span class="text-red">*</span> </label>
                     <input type="text" placeholder="" name="ex_amount" id="ex_amount" onkeypress="allowNumbersOnly(event)" class="form-control">
                 </div>
                 <div class="col-xl-6 col-lg-6 col-12 form-group">
                     <label>Name  <span class="text-red">*</span></label>
                     <input type="text" placeholder="" name="ex_name" id="ex_name" class="form-control">
                 </div>
                 <div class="col-xl-6 col-lg-6 col-12 form-group">
                     <label>Contact  </label>
                     <input type="text" placeholder="" name="ex_contact" id="ex_contact" onkeypress="allowNumbersOnly(event)" class="form-control">
                 </div>

                 <div class="col-xl-6 col-lg-6 col-12 text-dark form-group">
                     <label> Date  <span class="text-red">*</span></label>
                     <input type="text" placeholder="DD/MM/YYYY" name="ex_rec_date" id="datepicker1"
                         class="air-datepicker form-control" onkeydown="return false;" data-position='bottom right'>
                     <!-- <i class="far fa-calendar-alt"></i> -->
                 </div>

                 <div class="col-xl-6 col-lg-6 col-12 form-group">
                     <label>Payment Purpose  <span class="text-red">*</span></label>
                     <input type="text" placeholder="" name="ex_purpose" id="ex_purpose"
                         class="form-control"> </input>
                 </div>



             </div>

         </div>
     </div>
     <!-- Add Class Area End Here -->