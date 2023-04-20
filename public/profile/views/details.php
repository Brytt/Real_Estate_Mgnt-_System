<div class="dashboard-content-one">

    <?php
                                if($stmtlist->RecordCount() > 0 ){
                                    $obj = $stmtlist->FetchNextObject();

                                    $objCode = $obj->USR_CODE;
                                    $uname = $obj->USR_USERNAME;
                                ?>
    <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
        <a href="index.php?pg=<?php echo md5('dashboard');?>&option=<?php echo md5(''); ?>"
            class="btn btn-fill-md text-light text-15 bg-dark"><span class="fa fa-arrow-left"></span> Back </a>


        <button type="submit" class="btn btn-fill-md text-15 bg-warning text-dark "
            onclick="document.getElementById('pg').value='<?php echo md5('profile');?>'; document.getElementById('option').value='<?php echo md5('edit'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; ">
            <span class="far fa-edit"></span> Edit</button>


        <input type="hidden" name="rs_username" value="<?php echo $uname; ?>">
        <input type="hidden" name="rs_usercode" value="<?php echo $obj->USR_CODE;; ?>">


        <button type="button" onclick="clicktoPrint('printframe');"
            class="btn btn-fill-md bg-success text-15 text-light ">
            <span class="fas fa-print"> </span> Print</button>

    </div>

    <div class="card height-auto account-settings-box">
        <div class="card-body">
            <div class="heading-layout1 mb-5">
                <div class="row">
                    <div class="text-dark h1 mt-3">USER</div>
                    <span class="vl mr-3 ml-3"></span>
                    <div class="text-dark h1 mt-3">PROFILE</div>
                </div>




            </div>
            <div class="user-details-box">

                <div class="img mb-3">
                    <div class="item-img ">
                        <img src="<?php echo ($obj->CLIENT_PICTURE)?$obj->CLIENT_PICTURE :'media/img/figure/user.jpg'; ?>"
                            alt="client" style="width: 150px; height: auto;">

                    </div>
                </div>

                <div class="item-content ">
                    <div class="info-table table-responsive">
                        <table class="table text-nowrap">
                            <tbody>


                                <tr>
                                    <td>Username:</td>
                                    <td class="font-medium text-dark-medium"><?php echo$uname;?> </td>
                                </tr>
                                <tr>
                                    <td>User Type:</td>
                                    <?php  if($obj->USR_USER_TYPE == "1"){
                                                        echo '<td class="font-medium text-dark-medium">ADMINISTRATOR</td>';
                                                    }
                                                    else if($obj->USR_USER_TYPE == "2"){
                                                        echo '<td class="font-medium text-dark-medium">EXECUTIVE USER</td>';
                                                    }
                                                    else if($obj->USR_USER_TYPE == "3"){
                                                        echo '<td class="font-medium text-dark-medium">MANAGER</td>';
                                                    }
                                                    else if($obj->USR_USER_TYPE == "4"){
                                                        echo '<td class="font-medium text-dark-medium">USER</td>';
                                                    }
                                                    else{
                                                        echo '<td>Unregistered</td>';
                                                    }
                                                    ?>

                                </tr>

                                <tr>
                                    <td>E-mail:</td>
                                    <td class="font-medium text-dark-medium"><?php echo$obj->USR_EMAIL;?></td>
                                </tr>
                                <tr>
                                    <td>Contact:</td>
                                    <td class="font-medium text-dark-medium"><?php echo$obj->USR_PHONE;?></td>
                                </tr>






                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>