<style>
.docFile::-webkit-file-upload-button {
    visibility: hidden;
}
</style>
<div class="dashboard-content-one">
    <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">

        <a href="index.php?pg=<?php echo md5('client');?>&option=<?php echo md5(''); ?>"
            class="btn btn-fill-md text-light text-15 bg-dark"><span class="fas fa-times"></span> Cancel </a>

        <button type="button" class="btn btn-fill-md text-15 bg-success text-light" onclick="saveClient();">
            <span class="fa fa-save"> </span>Save</button>

    </div>


    <!-- Admit Form Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div id="first-step-div">
                <div class="heading-layout1 mb-5">
                    <div class="row mb-2">
                        <div class="text-dark h1 mt-3">CLIENT</div>
                        <span class="vl mr-3 ml-3"></span>
                        <div class="text-dark h1 mt-3">ADD</div>
                    </div>


                </div>
                <!-- <form class="new-added-form"> -->

                <div class="row  mt-5 ">
                    <div class="text-dark h3 ">CLIENT'S DETAILS</div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Title <span class="text-red">*</span></label>
                        <select class="select2 text-dark" name="rk_title" id="rk_title">
                            <option selected disabled value="">-- Select Title --</option>
                            <?php
                                foreach ($system_title as $value) {
                                echo '<option value="'.$value.'">'.$value.'</option>';
                                }
                                ?>
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
                        <label>Date Of Birth </label>
                        <input type="text" placeholder="DD/MM/YYYY" name="rk_dob" id="rk_dob"
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
                        <label>Nationality </label>
                        <input type="text" placeholder="" name="rk_nationality" id="rk_nationality"
                            class="form-control">
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Contact 1 <span class="text-red">*</span></label>
                        <input type="tel" placeholder="Eg. 024 123 4567" onkeypress="allowNumbersOnly(event)"
                            name="rk_contact1" id="rk_contact1" class="form-control phone">
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Contact 2 </label>

                        <input type="tel" placeholder="Eg. 024 123 4567" onkeypress="allowNumbersOnly(event)"
                            name="rk_contact2" id="rk_contact2" min="9" max="10" class="form-control phone2 " />
                    </div>


                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>E-Mail</label>
                        <input type="email" placeholder="" name="rk_mail" class="form-control">
                    </div>


                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Residential Address </label>
                        <input type="text" placeholder="" name="rk_address" id="rk_address" class="form-control">
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Ghana Digital Address</label>
                        <input type="text" placeholder="" name="rk_dig_address" class="form-control">
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Occupation </label>
                        <input type="text" placeholder="" name="rk_occupation" id="rk_occupation" class="form-control">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Profile picture </label>
                        <input type="file" placeholder="" name="profile_pic" id="profile_pic" class="form-control">
                    </div>
                    <div class="  mt-5 ml-0" id="preview"></div>



                    <!--                                  
                                    <div class= "  mt-5 ml-0"id="filepreview"></div> -->
                </div>
                <!-- </form> -->
            </div>





            <div class="row  mt-5 ">
                <div class="text-dark h3 ">NEXT OF KIN</div>
            </div>
            <div class="row">


                <div class="col-xl-3 col-lg-6 col-12 form-group">
                    <label>Full Name </label>
                    <input type="text" placeholder="" name="rk_kin_fname" id="rk_kin_fname" class="form-control">
                </div>


                <div class="col-xl-3 col-lg-6 col-12 form-group">
                    <label>Relationship </label>

                    <select class="select2" name="rk_kinrelation" id="rk_kinrelation">
                        <option selected disabled value="">-- Select Relationship With Next of Kin --</option>
                        <?php 
                                        foreach ($system_next_of_kin_relationship as $value) {?>
                        <option value="<?php echo strtoupper($value); ?>"><?php echo strtoupper($value); ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-xl-3 col-lg-6 col-12 form-group">
                    <label>Contact </label>
                    <input type="text" placeholder="Eg. 024 123 4567" onkeypress="allowNumbersOnly(event)"
                        name="rk_kin_contact1" id="rk_kin_contact1" class="form-control phone_kin">
                </div>





                <div class="col-xl-3 col-lg-6 col-12 form-group">
                    <label>Residential Address </label>
                    <input type="text" placeholder="" name="rk_kin_address" id="rk_kin_address" class="form-control">
                </div>


            </div>
            <div class="text-dark h3 mt-5 ">DOCUMENT / FILES UPLOAD</div>

            <div class="table-responsive">
                <table id="fileTable" class="table table-striped text-nowrap" style="text-align:center;">

                    <tr>
                        <td class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <input type="text" placeholder="" class="docFileName form-control">
                        </td>

                        <td class="col-xl-5 col-lg-5 col-md-4 col-sm-12 m-3">
                            <input type="file" placeholder="Select file"
                                accept="image/png, image/gif, image/jpg, image/jpeg, application/pdf,application/vnd.ms-excel"
                                class="docFile custom-file-label mt-3">
                        </td>

                        <td class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                            <button id="addDoc" type="button" class="btn btn-fill-md text-15 bg-primary text-light"
                                onclick="addDocFile()"> Add Document</button>
                            <button id="removeDoc" type="button" style="display:none;"
                                class="btn btn-fill-md text-15 bg-danger text-light" onclick="remove_file()">Remove
                            </button>
                        </td>
                    </tr>



                </table>

            </div>
        </div>
    </div>