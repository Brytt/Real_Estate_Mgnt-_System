<?php
                $stmtlist = $paging->paginate();
                ?>

<div class="dashboard-content-one">
<div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">


    <a href="index.php?pg=<?php echo md5('dashboard');?>&option=<?php echo md5(''); ?>"
        class="btn btn-fill-md text-15 text-light bg-danger"><span class="fas fa-times"></span> Close</a>

    <a href="index.php?pg=<?php echo md5('inspection');?>&option=<?php echo md5('add'); ?>" type=""
        class="btn btn-fill-md text-15 text-light bg-success"><span class="fas fa-plus"></span> Add Inspection</a>
</div>

<div class="card height-auto ">
    <div class="card-body">
        <div class="heading-layout1">

            <div class="row">
                <div class="text-dark h1 mt-3">INSPECTION</div>
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
                    <input type="text" id="fdsearch" name="fdsearch" value="<?php isset($fdsearch)?$fdsearch:""; ?>"
                        placeholder="Search by First Name OR Phone number" class="form-control">
                </div>

                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                    <button type="button"
                        onclick="document.getElementById('viewpage').value='search'; document.myform.submit();"
                        class="fw-btn-fill btn-gradient-yellow">SEARCH</button>

                </div>

                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                    <button type="button"
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
            <table class="table table-striped text-nowrap" style="min-height: 150px;">
                <thead>
                    <tr class="p-5">
                        <th>#</th>

                        <th>Full Name</th>
                       
                        <th>Contact</th>
                        <th>Inspection Date</th>

                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                                if($paging->total_rows > 0 ){
                                    $num = 1;
                                    while($obj = $stmtlist->FetchNextObject()){
                                    
                                        $objCode = $obj->INS_CODE;
                                        $keys=$objCode;
                                ?>
                    <tr>
                        <td><?php echo$num++;?></td>



                        <td><?php echo ucwords(strtolower( $obj->INS_FIRST_NAME." ".$obj->INS_LAST_NAME." ".$obj->INS_MIDDLE_NAME));?>
                        </td>

                      
                        <td><?php echo strtoupper( $obj->INS_CONTACT) ;?></td>
                        <td><?php $engine->checkNextInspection($obj->INS_INSPECTION_DATE);?></td>
                        <td><?php echo $system_inspection_status[$obj->INS_STATUS];?></td>



                        <td>
                            <div class="dropdown">
                                <button href="#" class="btn btn-fill-md text-15 text-light bg-info"
                                    class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    MORE <i class="fas fa-caret-down mg-l-10"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">


                                    <?php 

                                                if($obj->INS_STATUS == "2"){

                                                  $fullName =  strtoupper($obj->INS_FIRST_NAME." ".$obj->INS_LAST_NAME." ".$obj->INS_MIDDLE_NAME);?>
                                    <a class="dropdown-item" href="#"
                                        onclick="approve('<?php echo$obj->INS_CODE;?>','<?php echo $fullName;?>' ); "><i
                                            class="fa fa-check text-green"></i> Inspected</a>

                                    <a class="dropdown-item" href="#"
                                        onclick="reject('<?php echo$obj->INS_CODE;?>','<?php echo $fullName;?>' ); "><i
                                            class="fas fa-times text-red"></i> Cancelled</a>
                                    <?php 
                                                            } 
                                               
                                                ?>


                                    <a class="dropdown-item" href="#"
                                        onclick="document.getElementById('pg').value='<?php echo md5('inspection');?>'; document.getElementById('option').value='<?php echo md5('details'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; document.myform.submit();"><i
                                            class="fa fa-list text-info"></i> Details</a>



                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php

                                    }
                                    }
                                    else{
                                        echo'
                                        <tr class="even">
                                        <td colspan="8" class="empty-text text-center">No records found.</td>
                                        </tr>
                                        ';
                                    }
                                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Student Table Area End Here -->