 <!-- Add New Teacher Area Start Here -->
 <div class="dashboard-content-one">
<div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
<a href="index.php?pg=<?php echo md5('dashboard');?>&option=<?php echo md5(''); ?>"
                     class="btn btn-fill-md text-light text-15 bg-dark"><span class="fas fa-arrow"></span> Back</a>

                 <button type="button" class="btn btn-fill-md text-15 bg-success text-light"
                     onclick="changePassword();">
                     <span class="fa fa-save"> </span> Update
                 </button>
</div>
 <div class="card height-auto ">
     <div class="card-body">
         <div class="heading-layout1 mb-5">
             <div class="row">
                 <div class="text-dark h1 mt-3">USER</div>
                 <span class="vl mr-3 ml-3"></span>
                 <div class="text-dark h1 mt-3">PASSWORD</div>
             </div>
             

         </div>
         <!-- <form class="new-added-form"> -->
         <div class="row">

             <?php 
                            $engine->msgBox($msg, $status,);
                            ?>



             <div class="col-xl-4 col-lg-6 col-12 form-group" id="">
                 <label>Old Password</label>
                 <input type="password" placeholder="" class="form-control" name="old_password" id="old_password">
             </div>

             <div class="col-xl-4 col-lg-6 col-12 form-group">
                 <label> New Password</label>
                 <input type="password" placeholder="" class="form-control" name="new_password" id="new_password">
             </div>

             <div class="col-xl-4 col-lg-6 col-12 form-group">
                 <label>Confirm Password</label>
                 <input type="password" placeholder="" class="form-control" name="confirm_password"
                     id="confirm_password">
             </div>

         </div>
         <!-- </form> -->
     </div>

 </div>
 <!-- Add New Teacher Area End Here -->