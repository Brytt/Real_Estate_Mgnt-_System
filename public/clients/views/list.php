<input id="user_fname" name="user_fname" value="" type="hidden" />
<input id="user_lname" name="user_lname" value="" type="hidden" />

<?php
$stmtlist = $paging->paginate();
?>

<div class="dashboard-content-one">
        <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">

            <a href="index.php?pg=<?php echo md5('dashboard');?>&option=<?php echo md5(''); ?>"
                class="btn btn-fill-md text-15 text-light bg-danger"><span class="fas fa-times"></span> Close</a>

                <?php if($session->get('usertype') != "2"){?>
            <a href="index.php?pg=<?php echo md5('client');?>&option=<?php echo md5('add'); ?>" type=""
                class="btn btn-fill-md text-15 text-light bg-primary"><span class="fas fa-plus"></span> New Client</a>
                <?php } ?>


        </div>

        <div class="card height-auto" style="min-height:450px;">
            <div class="card-body">
                <div class="heading-layout1">

                    <div class="row">
                        <div class="text-dark h1 mt-3">CLIENT</div>
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
                                placeholder="Search by Client Code / Name" class="form-control">
                        </div>

                        <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                            <button type="button"
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
                    $engine->msgBox($msg, $status);
                    ?>
                <!-- </form> -->
                <div class="table-responsive">
                    <table class="table table-striped text-nowrap" style="min-height: 150px;">
                        <thead>
                            <tr class="p-5">
                                <th>
                                    #
                                </th>
                                <th>Client ID</th>
                                <th>NAME</th>
                                <th>GENDER</th>
                                <th>CONTACT</th>
                                <th>EMAIL</th>
                                <th style="text-align:center;">ACTION</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody style="min-height:150px;">
                            <?php
                        if($paging->total_rows > 0 ){
                            $num = 1;
                            while($obj = $stmtlist->FetchNextObject()){
                        
                        $objCode = $obj->CLIENT_CODE;
                        // $keys=$objCode;
                        ?>
                            <tr>
                                <td><?php echo$num++;?></td>
                                <td><?php echo $obj->CLIENT_CODE;?></td>
                                <td style="text-transform:capitalize">
                                    <?php echo ucwords(strtolower( $obj->CLIENT_FIRSTNAME." ".$obj->CLIENT_LASTNAME." ".$obj->CLIENT_OTHERNAME))?>
                                </td>
                                <td><?php echo $obj->CLIENT_GENDER;?></td>
                                <td><?php echo $obj->CLIENT_CONTACT_1;?></td>
                                <td><?php  echo strtolower($obj->CLIENT_EMAIL);?></td>

                                <td style="text-align:center;">

                                    <div class="dropdown">
                                        <button href="#" class="btn btn-fill-md text-15 text-light bg-info"
                                            class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            MORE <i class="fas fa-caret-down mg-l-10"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">


                                            <a class="dropdown-item" href="#"
                                                onclick="document.getElementById('pg').value='<?php echo md5('client');?>'; document.getElementById('option').value='<?php echo md5('details'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; document.myform.submit();"><i
                                                    class="fa fa-list text-info"></i> Details</a>

                                            <a class="dropdown-item" href="#"
                                                onclick="document.getElementById('pg').value='<?php echo md5('client');?>'; document.getElementById('option').value='<?php echo md5('client_landlist'); ?>'; document.getElementById('viewpage').value='land_details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; document.myform.submit();"><i
                                                    class="fa fa-map-marker text-success"></i> Land</a>

                                            <a class="dropdown-item" href="#"
                                                onclick="document.getElementById('pg').value='<?php echo md5('client');?>'; document.getElementById('option').value='<?php echo md5('client_rent'); ?>'; document.getElementById('viewpage').value='rent_details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; document.myform.submit();"><i
                                                    class="fa fa-school text-warning"></i> Rent</a>

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