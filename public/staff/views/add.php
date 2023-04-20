
 <?php  include "public/staff/model/js.php"; ?>

 <div class="dashboard-content-one">
     <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">

         <a href="index.php?pg=<?php echo md5('staff');?>&option=<?php echo md5(''); ?>"
             class="btn btn-fill-md text-light text-15 bg-dark"><span class="fa fa-arrow-left"></span> Back </a>

         <button type="button" class="btn btn-fill-md text-15 bg-success text-light" onclick="saveStaff();">
             <span class="fa fa-save"> </span> Save</button>

     </div>

     <input id="useraccessgroup" name="useraccessgroup" value="<?php echo $session->get('useraccessgroup'); ?>"
         type="hidden" />

     <!-- Admit Form Area Start Here -->
     <div class="card height-auto ">
         <div class="card-body">
             <div id="first-step-div">
                 <div class="heading-layout1 mb-5">
                     <div class="row mb-2">
                         <div class="text-dark h1 mt-3">STAFF</div>
                         <span class="vl mr-3 ml-3"></span>
                         <div class="text-dark h1 mt-3">ADD</div>
                     </div>


                 </div>
                 <!-- <form class="new-added-form"> -->

                 <div class="row  mt-5 ">
                     <div class="text-dark h3 ">STAFF'S DETAILS</div>
                 </div>
                 <div class="row">
                     <div class="col-xl-3 col-lg-6 col-12 form-group">
                         <label>Title <span class="text-red">*</span></label>
                         <select class="select2 text-dark" name="rk_title" id="rk_title">
                             <option selected disabled value="">-- Select Title --</option>
                             <?php foreach ($system_title as $value) {?>
                             <option value="<?php echo $value;?>"><?php echo strtoupper($value); ?></option>
                             <?php } ?>
                         </select>
                     </div>

                     <div class="col-xl-3 col-lg-6 col-12 form-group">
                         <label>First Name <span class="text-red">*</span></label>
                         <input type="text" placeholder="" name="rk_fname" id="rk_fname" class="form-control">
                     </div>


                     <div class="col-xl-3 col-lg-6 col-12 form-group">
                         <label>Last Name <span class="text-red">*</span></label>
                         <input type="text" placeholder="" name="rk_lname" id="rk_lname" class="form-control">
                     </div>
                     <div class="col-xl-3 col-lg-6 col-12 form-group">
                         <label>Middle Name </label>
                         <input type="text" placeholder="" name="rk_mname" class="form-control">
                     </div>



                     <div class="col-xl-3 col-lg-6 col-12 text-dark form-group">
                         <label>Date Of Birth <span class="text-red">*</span></label>
                         <input type="text" placeholder="DD/MM/YYYY" name="rk_dob" id="datepicker1"
                             class="air-datepicker form-control" onkeydown="return false;" data-position='bottom right'>
                         <!-- <i class="far fa-calendar-alt"></i> -->
                     </div>

                     <div class="col-xl-3 col-lg-6 col-12 form-group">
                         <label>Gender <span class="text-red">*</span></label>
                         <select class="select2 text-dark" name="rk_gender" id="rk_gender">
                             <option selected disabled value="">-- Select Gender --</option>
                             <?php foreach ($system_gender as $value) {?>
                             <option value="<?php echo $value;?>"><?php echo strtoupper($value); ?></option>

                             <?php } ?>
                         </select>
                     </div>



                     <div class="col-xl-3 col-lg-6 col-12 form-group">
                         <label>Nationality <span class="text-red">*</span></label>
                         <input type="text" placeholder="" name="rk_nationality" id="rk_nationality"
                             class="form-control">
                     </div>
                     <div class="col-xl-3 col-lg-6 col-12 form-group">
                         <label> Hometown <span class="text-red">*</span></label>
                         <input type="text" placeholder="" name="rk_hometown" id="rk_hometown"
                         class="form-control">
                        
                     </div>


                     <div class="col-xl-3 col-lg-6 col-12 form-group">
                         <label>Place of Birth</label>
                         <input type="text" placeholder="" name="rk_placeofbirth" id="rk_placeofbirth"
                             class="form-control">
                     </div>

                     <div class="col-xl-3 col-lg-6 col-12 form-group">
                         <label>Type of Staff <span class="text-red">*</span></label>
                         <select class="form-control" name="staff_type" id="staff_type" >
                             <option selected disabled value="">-- Select Staff Type --</option>
                             <?php foreach ($system_staff_type as $key => $value) {
                                            echo '<option value="'.$key.'">'.$value.'</option>';
                                        }
                            ?>
                        

                         </select>
                     </div>

                     <div class="col-xl-3 col-lg-6 col-12 form-group">
                         <label>Highest Qualification</label>
                         <input type="text" placeholder="" name="rk_qualification" id="rk_qualification"
                             class="form-control">
                     </div>

                     <div class="col-xl-3 col-lg-6 col-12 form-group">
                         <label>Course Offered</label>
                         <input type="text" placeholder="" name="rk_course" id="rk_course" class="form-control">
                     </div>





                     <div class="col-xl-3 col-lg-6 col-12 form-group">
                         <label>Contact 1 <span class="text-red">*</span></label>
                         <input type="text" placeholder="Eg. 024 123 4567"onkeypress="allowNumbersOnly(event)"  name="rk_contact1" id="rk_contact1" class="form-control phone">
                     </div>

                     <div class="col-xl-3 col-lg-6 col-12 form-group">
                         <label>Contact 2 </label>
                         <input type="text" placeholder="Eg. 024 123 4567" onkeypress="allowNumbersOnly(event)"
                             name="rk_contact2" id="rk_contact2" class="form-control phone2">
                     </div>


                     <div class="col-xl-3 col-lg-6 col-12 form-group">
                         <label>E-Mail</label>
                         <input type="email" placeholder="" name="rk_mail" class="form-control">
                     </div>


                     <div class="col-xl-3 col-lg-6 col-12 form-group">
                         <label>Residential Address <span class="text-red">*</span></label>
                         <input type="text" placeholder="" name="rk_address" id="rk_address" class="form-control">
                     </div>

                     <div class="col-xl-3 col-lg-6 col-12 form-group">
                         <label>Ghana Digital Address</label>
                         <input type="text" placeholder="" name="rk_dig_address" class="form-control">
                     </div>


                     <div class="col-xl-3 col-lg-6 col-12 form-group">
                         <label>Profile picture </label>
                         <input type="file" placeholder="" name="pic" id="pic" class="form-control">
                     </div>
                     <div class="  mt-3 ml-0" id="preview"></div>
                 </div>
                 <!-- </form> -->
             </div>

           <!-- <div class="row  mt-5 ">
                 <div class="text-dark h3 ">NEXT OF KIN</div>
             </div> -->
            
             <!-- </form> -->
         </div>
     </div>