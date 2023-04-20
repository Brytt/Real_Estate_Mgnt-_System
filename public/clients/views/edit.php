<div class="dashboard-content-one">

    <input type="hidden" name="old_doc_file" id="old_doc_file" class="form-control">

    <?php    
         $obj = $stmtlist->FetchNextObject();
         ?>

    <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">

        <a href="#"
            onclick="document.getElementById('pg').value='<?php echo md5('client');?>'; document.getElementById('option').value='<?php echo md5('details'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $obj->CLIENT_CODE; ?>'; document.myform.submit();"
            class="btn btn-fill-md text-light text-15 bg-dark"><span class="fas fa-times"></span> Cancel </a>

        <button type="button" class="btn btn-fill-md text-15 bg-success text-light"
            onclick="updateClient('<?php echo $obj->CLIENT_CODE; ?>');">
            <span class="fa fa-save"> </span> Update</button>

    </div>



    <!-- Admit Form Area Start Here -->
    <div class="card height-auto ">
        <div class="card-body">
            <div id="first-step-div">
                <div class="heading-layout1 mb-5">
                    <div class="row mb-2">
                        <div class="text-dark h1 mt-3">CLIENT</div>
                        <span class="vl mr-3 ml-3"></span>
                        <div class="text-dark h1 mt-3">EDIT</div>
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
                            <?php
                                foreach ($system_title as $value) {
                                    if(($obj->CLIENT_TITLE == $value)){
                                        echo '<option selected value="'.$value.'">'.$value.'</option>';
                                    }
                                    else{
                                        echo '<option value="'.$value.'">'.$value.'</option>';
                                    }
                                }
                                ?>
                        </select>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>First Name <span class="text-red">*</span></label>
                        <input type="text" placeholder="" name="rk_fname" id="rk_fname" class="form-control"
                            value="<?php echo  $obj->CLIENT_FIRSTNAME; ?>">
                    </div>


                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Last Name <span class="text-red">*</span></label>
                        <input type="text" placeholder="" name="rk_lname" id="rk_lname" class="form-control"
                            value="<?php echo  $obj->CLIENT_LASTNAME; ?>">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Middle Name </label>
                        <input type="text" placeholder="" name="rk_mname" class="form-control"
                            value="<?php echo  $obj->CLIENT_OTHERNAME; ?>">
                    </div>



                    <div class="col-xl-3 col-lg-6 col-12 text-dark form-group">
                        <label>Date Of Birth </label>
                        <input type="text" placeholder="DD/MM/YYYY" name="rk_dob" id="rk_dob"
                            class="air-datepicker form-control" onkeydown="return false;" data-position='bottom right'
                            value="<?php echo  $obj->CLIENT_DOB; ?>">
                        <!-- <i class="far fa-calendar-alt"></i> -->
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Gender <span class="text-red">*</span></label>
                        <select class="select2 text-dark" name="rk_gender" id="rk_gender">
                            <option selected disabled value="">-- Select Gender --</option>
                            <?php foreach ($system_gender as $value) {
                                    if(($obj->CLIENT_GENDER == $value)){
                                        echo '<option selected value="'.$value.'">'.$value.'</option>';
                                    }
                                    else{
                                        echo '<option value="'.$value.'">'.$value.'</option>';
                                    }
                                 } ?>
                        </select>
                    </div>


                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Nationality </label>
                        <input type="text" placeholder="" name="rk_nationality" id="rk_nationality" class="form-control"
                            value="<?php echo  $obj->CLIENT_NATIONALITY; ?>">
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Contact 1 <span class="text-red">*</span></label>
                        <input type="text" placeholder="Eg. 024 123 4567" onkeypress="allowNumbersOnly(event)"
                            name="rk_contact1" id="rk_contact1" class="form-control phone"
                            value="<?php echo  $obj->CLIENT_CONTACT_1; ?>">
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Contact 2 </label>
                        <input type="text" placeholder="Eg. 024 123 4567" onkeypress="allowNumbersOnly(event)"
                            name="rk_contact2" id="rk_contact2" class="form-control phone2"
                            value="<?php echo  $obj->CLIENT_CONTACT_2; ?>">
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>E-Mail</label>
                        <input type="email" placeholder="" name="rk_mail" class="form-control"
                            value="<?php echo  $obj->CLIENT_EMAIL; ?>">
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Residential Address </label>
                        <input type="text" placeholder="" name="rk_address" id="rk_address" class="form-control"
                            value="<?php echo  $obj->CLIENT_ADDRESS; ?>">
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Ghana Digital Address</label>
                        <input type="text" placeholder="" name="rk_dig_address" class="form-control"
                            value="<?php echo  $obj->CLIENT_DIGITAL_ADDRESS; ?>">
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Occupation </label>
                        <input type="text" placeholder="" name="rk_occupation" id="rk_occupation" class="form-control"
                            value="<?php echo  $obj->CLIENT_OCCUPATION; ?>">
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Profile picture </label>
                        <input type="file" placeholder="" name="profile_pic" id="profile_pic" class="form-control">
                        <input type="hidden" name="old_pic" id="old_pic" class="form-control"
                            value="<?php echo   ($obj->CLIENT_PICTURE)?>">
                    </div>
                    <div class="  mt-3 ml-2" id="preview">
                        <img src="<?php echo ($obj->CLIENT_PICTURE)?$obj->CLIENT_PICTURE :'media/img/figure/user.jpg'; ?>"
                            width="120" height="auto" class="img-thumbnail">

                    </div>


                </div>

            </div>





            <div class="row  mt-5 ">
                <div class="text-dark h3 ">NEXT OF KIN</div>
            </div>
            <div class="row">


                <div class="col-xl-3 col-lg-6 col-12 form-group">
                    <label>Full Name </label>
                    <input type="text" placeholder="" name="rk_kin_fname" id="rk_kin_fname" class="form-control"
                        value="<?php echo  $obj->CLIENT_NOK_NAME; ?>">
                </div>


                <div class="col-xl-3 col-lg-6 col-12 form-group">
                    <label>Relationship </label>

                    <select class="select2" name="rk_kinrelation" id="rk_kinrelation">
                        <option selected disabled value="">-- Select Relationship With Next of Kin --</option>
                        <?php 
                                        foreach ($system_next_of_kin_relationship as $value) {
                                            if(($obj->CLIENT_NOK_RELATIONSHIP == $value)){
                                                echo '<option selected value="'.$value.'">'.$value.'</option>';
                                            }
                                            else{
                                                echo '<option value="'.$value.'">'.$value.'</option>';
                                            }
                                         } 
                                         ?>
                    </select>
                </div>

                <div class="col-xl-3 col-lg-6 col-12 form-group">
                    <label>Contact </label>
                    <input type="text" placeholder="Eg. 024 123 4567" onkeypress="allowNumbersOnly(event)"
                        name="rk_kin_contact1" id="rk_kin_contact1" class="form-control phone_kin"
                        value="<?php echo  $obj->CLIENT_NOK_CONTACT; ?>">
                </div>





                <div class="col-xl-3 col-lg-6 col-12 form-group">
                    <label>Residential Address </label>
                    <input type="text" placeholder="" name="rk_kin_address" id="rk_kin_address" class="form-control"
                        value="<?php echo  $obj->CLIENT_NOK_ADDRESS; ?>">
                </div>


            </div>
            <div class="text-dark h3 mt-5 ">DOCUMENT / FILES UPLOAD</div>

            <div class="table-responsive">

                <table id="oldDocTable" class="table table-striped text-nowrap" style="text-align:center;">


                    <?php
                    $uploadedFile = json_decode($obj->CLIENT_DOC_PATH, true);

                    foreach($uploadedFile as $fileItem) { 
                            ?>

                    <tr>

                        <td class="col-xl-4 col-lg-4 col-md-4 col-sm-12 oldFileName" id="">
                            <?php echo $fileItem['name']; ?>
                        </td>

                        <td class="col-xl-5 col-lg-5 col-md-4 col-sm-12 m-3 oldFilePath" id="">
                            <?php echo $fileItem['path']; ?>

                        </td>

                        <td class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                            <button id="removeDoc" type="button" class="btn btn-fill-md text-15 bg-danger text-light"
                                onclick="remove_file()">Remove
                            </button>
                            <a href=" <?php echo $fileItem['path']; ?>"
                                class="btn btn-fill-md text-15 bg-info text-light" target="_blank">
                                <span class="fa fa-file"></span> View Document</a>
                        </td>
                    </tr>



                    <?php
                            }
                            ?>

                </table>
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