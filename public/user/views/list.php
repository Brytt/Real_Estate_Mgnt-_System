                <?php
                $stmtlist = $paging->paginate();
                ?>
                <div class="dashboard-content-one">
                <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">


                    <a href="index.php?pg=<?php echo md5('dashboard');?>&option=<?php echo md5(''); ?>"
                        class="btn btn-fill-md text-15 text-light bg-danger"><span class="fas fa-times"></span>
                        Close</a>

                    <a href="index.php?pg=<?php echo md5('user');?>&option=<?php echo md5('add'); ?>" type=""
                        class="btn btn-fill-md text-15 text-light bg-success"><span class="fas fa-plus"></span> Add
                        User</a>
                </div>


                <div class="card account-settings-box height-auto">
                    <div class="card-body">
                        <div class="heading-layout1 mg-b-20">
                            <div class="row">
                                <div class="text-dark h1 mt-3">USER</div>
                                <span class="vl mr-3 ml-3"></span>
                                <div class="text-dark h1 mt-3">LIST</div>
                            </div>

                        </div>


                        <!-- Beginning of search pagination -->
                        <br>
                        <div class="mg-b-10 text-center">
                            <div class="row gutters-8">
                                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <div class="mt-2">
                                        <?php echo $paging->renderFirst('<span class="fa fa-angle-double-left"></span>');?>
                                        <?php echo $paging->renderPrev('<span class="fa fa-arrow-circle-left"></span>','<span class="fa fa-arrow-circle-left"></span>');?>
                                        <input name="page" size="5" type="text" class="pagedisplay short"
                                            value="<?php echo $paging->renderNavNum();?>" readonly />
                                        <?php echo $paging->renderNext('<span class="fa fa-arrow-circle-right"></span>','<span class="fa fa-arrow-circle-right"></span>');?>
                                        <?php echo $paging->renderLast('<span class="fa fa-angle-double-right "></span>');?>
                                        <?php $paging->limitList($limit,"myform");?>
                                    </div>
                                </div>
                                <div class="col-3-xxxl col-xl-4 col-lg-4x col-12 form-group">
                                    <input type="text" id="fdsearch" name="fdsearch"
                                        value="<?php isset($fdsearch)?$fdsearch:""; ?>" placeholder="Search by Staff ID"
                                        class="form-control">
                                </div>

                                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                    <button type="submit"
                                        onclick="document.getElementById('viewpage').value='search'; document.myform.submit();"
                                        class="fw-btn-fill btn-gradient-yellow">SEARCH</button>

                                </div>

                                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                    <button type="submit"
                                        onclick="document.getElementById('viewpage').value='reset'; document.getElementById('fdsearch').value=''; document.myform.submit(); "
                                        class="fw-btn-fill btn-dark">RESET</button>
                                </div>
                            </div>
                        </div>
                        <!-- Ending of search pagination -->

                        <?php 
                            $engine->msgBox($msg, $status,);
                            ?>

                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <!-- <th>photo</th> -->
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>User Type</th>
                                        <th>Username</th>
                                        <th>Contact</th>
                                        <th>E-mail</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                if($paging->total_rows > 0){
                                    $num = 1;
                                    while($obj = $stmtlist->FetchNextObject()){
                                    
                                        $objCode = $obj->USR_CODE;
                                        $keys=$objCode;
                                ?>

                                    <tr>
                                        <td><?php echo$num++;?> </td>

                                        <td><?php echo$obj->USR_FIRSTNAME;?></td>
                                        <td><?php echo$obj->USR_LASTNAME;?></td>

                                        <?php 
                                    
                                    if($obj->USR_USER_TYPE == "1"){
                                        echo '<td> Administrator</td>';
                                    }
                                    else if($obj->USR_USER_TYPE == "2"){
                                        echo '<td>Executive User</td>';
                                    }
                                    else if($obj->USR_USER_TYPE == "3"){
                                        echo '<td>Manager</td>';
                                    }
                                    else if($obj->USR_USER_TYPE == "4"){
                                        echo '<td> User</td>';
                                    }
                                    ?>
                                        <td><?php echo$obj->USR_USERNAME;?></td>
                                        <td><?php echo$obj->USR_PHONE;?></td>
                                        <td><?php echo$obj->USR_EMAIL;?></td>

                                        <td> <button type="submit" class="btn btn-fill-md text-15 bg-info text-light "
                                                onclick="document.getElementById('pg').value='<?php echo md5('user');?>'; document.getElementById('option').value='<?php echo md5('details'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; ">
                                                <span class="fa fa-list"></span> DETAILS</button>
                                        </td>
                                    </tr>

                                </tbody>
                                <?php

                            }
                            }
                            else{
                                echo'
                                        <tr class="even">
                                        <td colspan="9" class="empty-text text-center">No records found.</td>
                                        </tr>
                                        ';
                                }
                                ?>
                            </table>

                            <?php
                                if($paging->total_rows > 0){
                                    $num = 1;
                                    while($obj = $stmtlist->FetchNextObject()){
                                    
                                        $objCode = $obj->USR_CODE;
                                        $keys=$objCode;
                                ?>

                            <div class="all-user-box">
                                <a href="#">
                                    <div class="media media-none--xs active">
                                        <div class="item-img">
                                            <img src="media/img/figure/user1.jpg" class="media-img-auto" alt="user">
                                        </div>
                                        <div class="media-body space-md">
                                            <h5 class="item-title"><?php echo$obj->USR_USERNAME;?></h5>
                                            <div class="item-subtitle"><?php echo$obj->USR_USER_TYPE;?></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php

}
}
else{
    echo'';
}
?>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-8-xxxl col-xl-7">
                        <div class="card account-settings-box">
                            <div class="card-body">
                                <div class="heading-layout1 mg-b-20">
                                <div class="row">
                             <div class="text-secondary h1 mt-3">USER</div> 
                             <span class="vl mr-3 ml-3"></span> 
                             <div class="text-dark h1 mt-3" >DETAILS</div>
                            </div>
                                  
                                    <div class="mb-5" style="text-align:right;">
                         

                         <button type="edit" class="btn btn-fill-md bg-gold text-15 text-light "
                           > 
                            <span class="far fa-edit"> </span> Edit</button>

                            </div>
                            

                                </div>
                                <div class="user-details-box">
                                    <div class="item-img">
                                        <img src="media/img/figure/user.jpg" alt="user">
                                    </div>
                                    <div class="item-content">
                                        <div class="info-table table-responsive">
                                            <table class="table text-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <td>Name:</td>
                                                        <td class="font-medium text-dark-medium">Steven Johnson</td>
                                                    </tr>
                                                    <tr>
                                                        <td>User Type:</td>
                                                        <td class="font-medium text-dark-medium">Super Admin</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gender:</td>
                                                        <td class="font-medium text-dark-medium">Male</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Father Name:</td>
                                                        <td class="font-medium text-dark-medium">Steve Jones</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mother Name:</td>
                                                        <td class="font-medium text-dark-medium">Naomi Rose</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date Of Birth:</td>
                                                        <td class="font-medium text-dark-medium">07.08.2016</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Religion:</td>
                                                        <td class="font-medium text-dark-medium">Islam</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Joining Date:</td>
                                                        <td class="font-medium text-dark-medium">07.08.2016</td>
                                                    </tr>
                                                    <tr>
                                                        <td>E-mail:</td>
                                                        <td class="font-medium text-dark-medium">stevenjohnson@gmail.com</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Subject:</td>
                                                        <td class="font-medium text-dark-medium">English</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Class:</td>
                                                        <td class="font-medium text-dark-medium">2</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Section:</td>
                                                        <td class="font-medium text-dark-medium">Pink</td>
                                                    </tr>
                                                    <tr>
                                                        <td>ID No:</td>
                                                        <td class="font-medium text-dark-medium">10005</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address:</td>
                                                        <td class="font-medium text-dark-medium">House #10, Road #6, Australia</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phone:</td>
                                                        <td class="font-medium text-dark-medium">+ 88 98568888418</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->