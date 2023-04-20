<div class="dashboard-content-one">
    <?php
                                if($stmtlist->RecordCount() > 0 ){
                                    $obj = $stmtlist->FetchNextObject();

                                    $objCode = $obj->USR_CODE;
                                    $keys=$objCode;
                                ?>
    <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
        <button type="submit" class="btn btn-fill-md text-15 bg-dark text-light "
            onclick="document.getElementById('pg').value='<?php echo md5('profile');?>'; document.getElementById('option').value='<?php echo md5('details'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; ">
            <span class="fas fa-times"></span> Cancel </button>



        <button type="button" class="btn btn-fill-md text-15 bg-success text-light"
            onclick="document.getElementById('pg').value='<?php echo md5('profile');?>'; document.getElementById('option').value='<?php echo md5('details'); ?>'; document.getElementById('viewpage').value='update'; document.getElementById('keys').value='<?php echo $objCode; ?>'; document.myform.submit();">
            <span class="fa fa-save"> </span> Update</button>
    </div>

    <div class="card height-auto mt-5">
        <div class="card-body">
            <div class="heading-layout1 mb-5">
                <div class="row">
                    <div class="text-dark h1 mt-3">USER</div>
                    <span class="vl mr-3 ml-3"></span>
                    <div class="text-dark h1 mt-3">EDIT</div>
                </div>

            </div>
            <!-- <form class="new-added-form"> -->

            <input type="hidden" name="user_code" id="user_code" value="<?php echo $obj->USR_CODE; ?>">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12 form-group">
                    <label>Username </label>
                    <input type="text" placeholder="" readonly value="<?php echo  $obj->USR_USERNAME; ?>"
                        name="user_name" class="form-control">
                </div>

                <div class="col-xl-3 col-lg-6 col-12 form-group">
                    <label>User Type</label>
                    <input name="user_type" type="hidden" placeholder="" id="user_type" class="form-control"
                        value="<?php echo  $obj->USR_USER_TYPE; ?>">
                    <input type="text" placeholder="" readonly id="user_type" class="form-control" value="<?php 
                                    if($obj->USR_USER_TYPE == "1"){
                                        echo "Adminidtrator";
                                    }
                                    else if($obj->USR_USER_TYPE == "2"){
                                        echo "Executive User";
                                    }
                                    else if($obj->USR_USER_TYPE == "3"){
                                        echo " Manager";
                                    }
                                    else if($obj->USR_USER_TYPE == "4"){
                                        echo "User";
                                    }   
                                    ?>">

                </div>

                <div class="col-xl-3 col-lg-6 col-12 form-group">
                    <label>Contact</label>
                    <input type="text" placeholder="" value="<?php echo  $obj->USR_PHONE; ?>" name="user_contact"
                        class="form-control">
                </div>

                <div class="col-xl-3 col-lg-6 col-12 form-group">
                    <label>E-mail </label>
                    <input type="text" placeholder="" value="<?php echo  $obj->USR_EMAIL; ?>" name="user_mail"
                        class="form-control">
                </div>



                <!-- <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Region</label>
                                    <select class="select2" type="" placeholder="" value="" name="user_region" class="form-control">
                                    <?php
                                    foreach($system_region as $rg){
                                        if($obj->USR_REGION.strtoupper('') == $rg.strtoupper('')){
                                            echo '<option value="'. $rg.'" selected>'. $rg.'</option>';
                                        }
                                        else{
                                            echo '<option value="'. $rg.'">'. $rg.'</option>';
                                        }
                                    }
                                    ?>
                                    </select>
                            </div>
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label> District</label>
                                    <select class="select2" type="" placeholder="" value="" name="user_district" class="form-control">
                                    <?php
                                    foreach($system_district as $rg){
                                        if($obj->USR_DISTRICT.strtoupper('') == $rg.strtoupper('')){
                                            echo '<option value="'. $rg.'" selected>'. $rg.'</option>';
                                        }
                                        else{
                                            echo '<option value="'. $rg.'">'. $rg.'</option>';
                                        }
                                    }
                                    ?>
                                    </select>

                                </div> -->

                <!-- </form> -->
            </div>

        </div>
    </div>
    <?php } ?>