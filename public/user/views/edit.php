 <!-- Add New Teacher Area Start Here -->
 <div class="dashboard-content-one">

     <?php
                                if($stmtlist->RecordCount() > 0 ){
                                    $obj = $stmtlist->FetchNextObject();

                                    $objCode = $obj->USR_CODE;
                                    $keys=$objCode;
                                ?>

     <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
         <button type="submit" class="btn btn-fill-md text-15 bg-dark text-light "
             onclick="document.getElementById('pg').value='<?php echo md5('user');?>'; document.getElementById('option').value='<?php echo md5('details'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; ">
             <span class="fas fa-arrow-left"></span> Back </button>




         <button type="button" class="btn btn-fill-md text-15 bg-success text-light"
             onclick="document.getElementById('pg').value='<?php echo md5('user');?>'; document.getElementById('option').value=''; document.getElementById('viewpage').value='update';  document.myform.submit();">
             <span class="fa fa-save"> </span> Update</button>
     </div>


     <div class="card height-auto">
         <div class="card-body">
             <div class="heading-layout1 mb-5">
                 <div class="row">
                     <div class="text-dark  h1 mt-3">USER</div>
                     <span class="vl mr-3 ml-3"></span>
                     <div class="text-dark h1 mt-3">EDIT</div>
                 </div>


             </div>
             <!-- <form class="new-added-form"> -->

             <input type="hidden" name="user_code" id="user_code" value="<?php echo $obj->USR_CODE; ?>">
             <div class="row">
                 <div class="col-xl-3 col-lg-6 col-12 form-group">
                     <label>Username </label>
                     <input type="text" placeholder="" value="<?php echo  $obj->USR_USERNAME; ?>" name="user_name"
                         class="form-control" readonly>
                 </div>

                 <div class="col-xl-3 col-lg-6 col-12 form-group">
                     <label>User Type</label>
                     <select name="user_type" class="select2" id="user_type">
                         <?php foreach($system_user_type as $sysUser) ?> <option selected value="" value=""><?php 
                                    if($obj->USR_USER_TYPE == "1"){
                                        echo "Administrator";
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
                                    ?>
                         </option>
                         <option value="1">Administrator</option>
                         <option value="2">Executive User</option>
                         <option value="3">Manager</option>
                         <option value="4">User</option>
                     </select>

                 </div>

                 <div class="col-xl-3 col-lg-6 col-12 form-group">
                     <label>E-mail </label>
                     <input type="text" placeholder="" value="<?php echo  $obj->USR_EMAIL; ?>" name="user_mail"
                         class="form-control">
                 </div>

                 <div class="col-xl-3 col-lg-6 col-12 form-group">
                     <label> Contact</label>
                     <input type="text" placeholder="" value="<?php echo  $obj->USR_PHONE; ?>" class="form-control"
                         name="user_contact">
                 </div>

             </div>
             <?php } ?>
         </div>
         <!-- Add New Teacher Area End Here -->