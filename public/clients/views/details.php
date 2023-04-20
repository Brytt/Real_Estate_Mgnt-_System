<!-- Student Details Area Start Here -->
<?php
                    if($stmtlist->RecordCount() > 0 ){
                        $obj = $stmtlist->FetchNextObject();
                        
                        $objCode = $obj->CLIENT_CODE;
                        $keys=$objCode;
                        ?>

<div class="dashboard-content-one">
        <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
            <a href="index.php?pg=<?php echo md5('client');?>&option=<?php echo md5(''); ?>"
                class="btn btn-fill-md text-light text-15 bg-dark"><span class="fa fa-arrow-left"></span> Back </a>
           
                <?php if($session->get('usertype') != "2"){?>

            <button type="submit" class="btn btn-fill-md text-15 bg-warning text-dark "
                onclick="document.getElementById('pg').value='<?php echo md5('client');?>'; document.getElementById('option').value='<?php echo md5('edit'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; ">
                <span class="far fa-edit"></span> Edit</button>
            <?php } ?>



            <button type="button" onclick="clicktoPrint('printframe');"
                class="btn btn-fill-md bg-success text-15 text-light ">
                <span class="fas fa-print"> </span> Print</button>


                <?php if($session->get('usertype') == "1" || $session->get('usertype') == "3"){?>
            <button type="button" class="btn btn-fill-md text-15 bg-danger text-light "
                onclick="removeClient('<?php echo $obj->CLIENT_CODE; ?>');">
                <span class="fa fa-trash"></span> Delete</button>
            <?php }?>
        </div>
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1 mb-5">
                    <div class="row">
                        <div class="text-dark h1 mt-3">CLIENT</div>
                        <span class="vl mr-3 ml-3"></span>
                        <div class="text-dark h1 mt-3">DETAILS</div>
                    </div>


                </div>
                <div id="printframe">



                    <div class="row">


                        <div class="single-info-details">
                            <div class="row gutters-20">

                                <div class="col-3-xxxl col-xl-3 col-md-3 col-sm-12 mb-3">
                                    <div class="item-img ">
                                        <img src="<?php echo ($obj->CLIENT_PICTURE)?$obj->CLIENT_PICTURE :'media/img/figure/user.jpg'; ?>"
                                            alt="client" style="width: 150px; height: auto;">

                                    </div>
                                </div>
                                <div class="col-9-xxxl col-xl-9 col-md-9 col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-4 col-xl-4 col-4-xxxl form-group">
                                            <div class="item-title">

                                                <h5 class="m-0">Client ID : </h5>
                                                <p><?php echo strtoupper($obj->CLIENT_CODE); ?> </p>

                                                <h5 class="m-0">Full Name :</h5>
                                                <p> <?php echo strtoupper( $obj->CLIENT_TITLE." ".$obj->CLIENT_FIRSTNAME." ".$obj->CLIENT_LASTNAME." ".$obj->CLIENT_OTHERNAME); ?>
                                                </p>

                                                <h5 class="m-0">Contact 1 :</h5>
                                                <p><?php echo  $obj->CLIENT_CONTACT_1; ?> </p>

                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-4 col-xl-4 col-4-xxxl form-group">
                                            <div class="item-title">
                                                <h5 class="m-0">Gender :</h5>
                                                <p><?php echo   strtoupper($obj->CLIENT_GENDER); ?> </p>

                                                <h5 class="m-0">Nationality :</h5>
                                                <p><?php echo  strtoupper($obj->CLIENT_NATIONALITY); ?> </p>

                                                <h5 class="m-0">Contact 2 :</h5>
                                                <p><?php echo  $obj->CLIENT_CONTACT_2; ?> </p>



                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-4 col-xl-4 col-4-xxxl form-group">
                                            <div class="item-title">


                                                <h5 class="m-0">Date Of Birth : </h5>
                                                <p><?php echo ($obj->CLIENT_DOB != "")? $engine->formatDateToRead($obj->CLIENT_DOB) :'N/A'; ?> </p>

                                                <h5 class="m-0">Address :</h5>
                                                <p><?php echo   strtoupper($obj->CLIENT_ADDRESS); ?> </p>

                                                <h5 class="m-0">Occupation :</h5>
                                                <p><?php echo   strtoupper($obj->CLIENT_OCCUPATION); ?> </p>

                                            </div>
                                        </div>

                                    </div>

                                </div>


                                <div class="col-12 text-dark h3 ">NEXT OF KIN:</div>


                                <div class="row col-12">

                                    <div class="col-sm-12 col-md-3 col-l-3 col-xl-3 form-group">
                                        <div class="item-title">
                                            <h5 class="m-0">Full Name :</h5>
                                            <p> <?php echo strtoupper( $obj->CLIENT_NOK_NAME); ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-3 col-l-3 col-xl-3 form-group">
                                        <div class="item-title">
                                            <h5 class="m-0">Relation :</h5>
                                            <p><?php echo  strtoupper($obj->CLIENT_NOK_RELATIONSHIP); ?> </p>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-3 col-l-3 col-xl-3 form-group">
                                        <div class="item-title">
                                            <h5 class="m-0">Contact :</h5>
                                            <p><?php echo  $obj->CLIENT_NOK_CONTACT; ?> </p>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-3 col-l-3 col-xl-3 form-group">
                                        <div class="item-title">
                                            <h5 class="m-0">Address :</h5>
                                            <p><?php echo  strtoupper($obj->CLIENT_NOK_ADDRESS); ?> </p>
                                        </div>
                                    </div>





                                </div>


                                <hr>

                                <div class="text-dark h3 mt-3 ">DOCUMENT / FILES UPLOAD</div>

                                <div class="table-responsive">
                                    <table class="table table-striped ">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th>DOCUMENT TITLE </th>
                                                <th>DOCUMENT PATH</th>
                                                <th>ACTION</th>

                                            </tr>
                                        </thead>
                                        <?php
                            $uploadedFile = json_decode($obj->CLIENT_DOC_PATH, true);
                            $fileCount=1;
                            foreach($uploadedFile as $fileItem) { 
                                    ?>

                                        <tr>
                                            <td class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                                <?php echo $fileCount++; ?>
                                            </td>

                                            <td class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                                <?php echo $fileItem['name']; ?>
                                            </td>

                                            <td class="col-xl-5 col-lg-5 col-md-4 col-sm-12 m-3">
                                                <?php echo str_replace( "media/uploads/".$obj->CLIENT_CODE."/", "", $fileItem['path']); ?>
                                            </td>

                                            <td class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                                <a href=" <?php echo $fileItem['path']; ?>"
                                                    class="btn btn-fill-md text-15 bg-info text-light" target="_blank">
                                                    <span class="fa fa-file"></span> View Document</a>

                                            </td>
                                        </tr>



                                        <?php
                            }
                            ?>
                                    </table>

                                </div>


                                <?php }  ?>





                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>