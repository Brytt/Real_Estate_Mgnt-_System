                <?php
                $stmtlist = $paging->paginate();
?>

                <!-- Teacher Table Area Start Here -->

                <div class="dashboard-content-one">
                    <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">

                        <a href="index.php?pg=<?php echo md5('dashboard');?>&option=<?php echo md5(''); ?>"
                            class="btn btn-fill-md text-15 text-light btn-danger"><span class="fas fa-times"></span>
                            Close</a>

                            <?php if($session->get('usertype') == "1" || $session->get('usertype') == "3"){?>

                        <a href="index.php?pg=<?php echo md5('properties');?>&option=<?php echo md5('add'); ?>" type=""
                            class="btn btn-fill-md text-15 text-light btn-primary"><span class="fas fa-plus"></span> ADD
                            PROPERTY</a>

                            <?php } ?>

                    </div>
                    <div class="card  height-auto" >
                        <div class="card-body">
                            <div class="heading-layout1">

                                <div class="row">
                                    <div class="text-dark h1 mt-3">PROPERTIES</div>
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
                                            value="<?php isset($fdsearch)?$fdsearch:""; ?>"
                                            placeholder="Search by Property Code / Name" class="form-control">
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
                                <table class="table table-striped text-nowrap">
                                    <thead>
                                        <tr class="p-5">
                                            <th> # </th>
                                            <th>Property Code</th>
                                            <th>Property Name</th>
                                            <th>Property Types</th>
                                            <th>Available Number</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php
                                        
                                        if($paging->total_rows > 0 ){
                                            $num = 1;
                                            while($obj = $stmtlist->FetchNextObject()){
                                                
                                                $objCode = $obj->PROPERTY_CODE;
                                                $keys=$objCode;
                                                
                                                
                                                ?>

                                        <tr>
                                            <td><?php echo $num++; ?></td>
                                            <td><?php echo $obj->PROPERTY_CODE;?></td>
                                            <td><?php echo ucwords(strtolower($obj->PROPERTY_NAME));?></td>
                                            <td><?php echo  ucwords(strtolower ($obj->PROPERTY_TYPE));?></td>
                                            <td><?php echo $obj->PROPERTY_NUM_AVAILABLE;?></td>
                                            <td><?php echo $system_property_status[$obj->PROPERTY_STATUS];?>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-fill-md text-15 bg-info text-light "
                                                    onclick="document.getElementById('pg').value='<?php echo md5('Property');?>'; document.getElementById('option').value='<?php echo md5('details'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; document.myform.submit();">
                                                    <span class="fa fa-list"></span> DETAILS</button>


                                            </td>
                                        </tr>
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


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
              