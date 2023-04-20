<?php  include "public/clients/model/js.php"; ?>
<!-- <form class="new-added-form"> -->
<?php    $obj = $stmtlist->FetchNextObject();
        
        $objCode = $obj->STAFF_CODE;
        $keys=$objCode;
        
        ?>

<div class="dashboard-content-one">
    <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
        <!-- 
             <a href="index.php?pg=<?php echo md5('staff');?>&option=<?php echo md5('details'); ?>"
                 class="btn btn-fill-md text-light text-15 bg-dark"><span class="fa fa-arrow-left"></span> Back </a> -->

        <button type="submit" class="btn btn-fill-md text-15 bg-dark text-light "
            onclick="document.getElementById('pg').value='<?php echo md5('staff');?>'; document.getElementById('option').value='<?php echo md5('details'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; ">
            <span class="fa fa-arrow-left"></span> Back </button>

        <button type="button" class="btn btn-fill-md text-15 bg-success text-light" onclick="updateStaff();">
            <span class="fa fa-save"> </span> Update</button>

    </div>

    <input id="useraccessgroup" name="useraccessgroup" value="<?php echo $session->get('useraccessgroup'); ?>"
        type="hidden" />

    <!-- Admit Form Area Start Here -->
    <div class="card height-auto mt-5 ">
        <div class="card-body">
            <div id="first-step-div">
                <div class="heading-layout1 mb-5">
                    <div class="row mb-2">
                        <div class="text-dark h1 mt-3">STAFF</div>
                        <span class="vl mr-3 ml-3"></span>
                        <div class="text-dark h1 mt-3">EDIT</div>
                    </div>


                </div>

                <div class="row  mt-5 ">
                    <div class="text-dark h3 ">STAFF'S DETAILS</div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Title <span class="text-red">*</span></label>
                        <select class="select2 text-dark" name="rk_title" id="rk_title">
                            <option selected disabled value="">-- Select Title --</option>
                            <?php foreach ($system_title as $value) {
                                    if($obj->STAFF_TITLE == $value){
                                        echo '<option selected value="'.$value.'">'.$value.'</option>';
                                    }
                                    else{
                                        echo '<option value="'.$value.'">'.$value.'</option>';
                                    }
                                 } ?>
                        </select>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>First Name <span class="text-red">*</span></label>
                        <input type="text" placeholder="" name="rk_fname" id="rk_fname" class="form-control"
                            value="<?php echo  strtoupper($obj->STAFF_FIRSTNAME)?>">
                    </div>


                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Last Name <span class="text-red">*</span></label>
                        <input type="text" placeholder="" name="rk_lname" id="rk_lname" class="form-control"
                            value="<?php echo  strtoupper($obj->STAFF_LASTNAME)?>">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Middle Name </label>
                        <input type="text" placeholder="" name="rk_mname" class="form-control"
                            value="<?php echo  strtoupper($obj->STAFF_OTHERNAME)?>">
                    </div>



                    <div class="col-xl-3 col-lg-6 col-12 text-dark form-group">
                        <label>Date Of Birth <span class="text-red">*</span></label>
                        <input type="text" placeholder="DD/MM/YYYY" name="rk_dob" id="datepicker1"
                            class="air-datepicker form-control" onkeydown="return false;" data-position='bottom right'
                            value="<?php echo  date($obj->STAFF_DOB)?>">
                        <!-- <i class="far fa-calendar-alt"></i> -->
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Gender <span class="text-red">*</span></label>
                        <select class="select2 text-dark" name="rk_gender" id="rk_gender">
                            <option selected disabled value="">-- Select Gender --</option>
                            <?php foreach ($system_gender as $value) {
                                    if($obj->STAFF_GENDER == $value){
                                        echo '<option selected value="'.$value.'">'.$value.'</option>';
                                    }
                                    else{
                                        echo '<option value="'.$value.'">'.$value.'</option>';
                                    }
                                 } ?>
                        </select>
                    </div>



                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Nationality <span class="text-red">*</span></label>
                        <input type="text" placeholder="" name="rk_nationality" id="rk_nationality" class="form-control"
                            value="<?php echo  strtoupper($obj->STAFF_NATIONALITY)?>">
                    </div>


                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label> Hometown <span class="text-red">*</span></label>
                        <input type="text" placeholder="" name="rk_hometown" id="rk_hometown" class="form-control"
                            value="<?php echo  strtoupper($obj->STAFF_HOMETOWN)?>">


                    </div>


                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Place of Birth</label>
                        <input type="text" placeholder="" name="rk_placeofbirth" id="rk_placeofbirth"
                            class="form-control" value="<?php echo  strtoupper($obj->STAFF_PLACE_OF_BIRTH)?>">
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Staff Type</label>
                        <select class="form-control" name="staff_type" id="staff_type">
                            <option selected disabled value="">-- Select Staff Type --</option>
                            <?php foreach ($system_staff_type as $key => $value) {
                                 if($obj->STAFF_TYPE == $key){
                                    echo '<option selected value="'.$key.'">'.$value.'</option>';
                                }
                                else{
                                    echo '<option value="'.$key.'">'.$value.'</option>';
                                }
                              }
                            ?>
                        </select>
                    </div>



                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Highest Qualification</label>
                        <input type="text" placeholder="" name="rk_qualification" id="rk_qualification"
                            class="form-control" value="<?php echo  strtoupper($obj->STAFF_QUALIFICATION)?>">
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Course Offered</label>
                        <input type="text" placeholder="" name="rk_course" id="rk_course" class="form-control"
                            value="<?php echo  strtoupper($obj->STAFF_COURSE_STUDIED)?>">
                    </div>




                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Contact 1 <span class="text-red">*</span></label>
                        <input type="text" placeholder="Eg. 024 123 4567" onkeypress="allowNumbersOnly(event)"
                            name="rk_contact1" id="rk_contact1" class="form-control phone"
                            value="<?php echo  strtoupper($obj->STAFF_CONTACT_1)?>">
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Contact 2 </label>
                        <input type="text" placeholder="Eg. 024 123 4567" onkeypress="allowNumbersOnly(event)"
                            name="rk_contact2" id="rk_contact2" class="form-control phone2"
                            value="<?php echo  strtoupper($obj->STAFF_CONTACT_1)?>">
                    </div>


                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>E-Mail</label>
                        <input type="email" placeholder="" name="rk_mail" class="form-control"
                            value="<?php echo  strtoupper($obj->STAFF_EMAIL)?>">
                    </div>


                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Residential Address <span class="text-red">*</span></label>
                        <input type="text" placeholder="" name="rk_address" id="rk_address" class="form-control"
                            value="<?php echo  strtoupper($obj->STAFF_ADDRESS)?>">
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Ghana Digital Address</label>
                        <input type="text" placeholder="" name="rk_dig_address" class="form-control"
                            value="<?php echo  strtoupper($obj->STAFF_DIGITAL_ADDRESS)?>">
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Profile picture - <span class="text-red"></span></label>
                        <input type="file" name="pic" id="pic" class="form-control">
                        <input type="hidden" name="old_pic" id="old_pic" class="form-control"
                            value="<?php echo   ($obj->STAFF_PICTURE)?>">
                    </div>
                    <div class="  mt-3 ml-2" id="preview">
                        <img src="<?php echo ($obj->STAFF_PICTURE)?$obj->STAFF_PICTURE :'media/img/figure/user.jpg'; ?>"
                            width="120" height="auto" class="img-thumbnail">

                    </div>

                </div>
                <!-- </form> -->
            </div>







            <!-- </form> -->
        </div>
    </div>