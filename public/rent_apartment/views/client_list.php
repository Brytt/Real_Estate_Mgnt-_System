<input id="user_fname" name="user_fname" value="" type="hidden" />
<input id="user_lname" name="user_lname" value="" type="hidden" />


<div class="dashboard-content-one">

<?php
if($viewpage == "search"){
    if(isset($fdsearch) && $fdsearch != ""){
      
      $query = "SELECT  CLIENT_CODE, CLIENT_TITLE, CLIENT_FIRSTNAME, CLIENT_OTHERNAME, CLIENT_LASTNAME, CLIENT_DOB,CLIENT_GENDER, CLIENT_NATIONALITY, CLIENT_CONTACT_1, CLIENT_CONTACT_2, CLIENT_EMAIL, CLIENT_ADDRESS, CLIENT_DIGITAL_ADDRESS, CLIENT_OCCUPATION, CLIENT_STATUS, CLIENT_DATE_CREATED, CLIENT_CREATED_BY 
      FROM rk_clients_tb   WHERE  CLIENT_STATUS IN  ('1','0') AND CLIENT_CODE = ".$sql->Param('a')." OR CLIENT_FIRSTNAME LIKE ".$sql->Param('b')." OR CLIENT_OTHERNAME LIKE ".$sql->Param('c')." OR CLIENT_LASTNAME LIKE ".$sql->Param('d')." ORDER BY CLIENT_ID DESC";
      $input =array($fdsearch, "%".$fdsearch."%",  "%".$fdsearch."%",  "%".$fdsearch."%"); 
  
      
    }else{ 
      $query = "SELECT CLIENT_CODE, CLIENT_TITLE, CLIENT_FIRSTNAME, CLIENT_OTHERNAME, CLIENT_LASTNAME, CLIENT_DOB,CLIENT_GENDER, CLIENT_NATIONALITY, CLIENT_CONTACT_1, CLIENT_CONTACT_2, CLIENT_EMAIL, CLIENT_ADDRESS, CLIENT_DIGITAL_ADDRESS, CLIENT_OCCUPATION, CLIENT_STATUS, CLIENT_DATE_CREATED, CLIENT_CREATED_BY 
      FROM rk_clients_tb   WHERE  CLIENT_STATUS='1'  ORDER BY CLIENT_ID DESC";
      $input =array();
    }
  }
  else{ 
    $query = "SELECT CLIENT_CODE, CLIENT_TITLE, CLIENT_FIRSTNAME, CLIENT_OTHERNAME, CLIENT_LASTNAME, CLIENT_DOB,CLIENT_GENDER, CLIENT_NATIONALITY, CLIENT_CONTACT_1, CLIENT_CONTACT_2, CLIENT_EMAIL, CLIENT_ADDRESS, CLIENT_DIGITAL_ADDRESS, CLIENT_OCCUPATION, CLIENT_STATUS, CLIENT_DATE_CREATED, CLIENT_CREATED_BY 
    FROM rk_clients_tb  WHERE  CLIENT_STATUS IN  ('1','0') ORDER BY CLIENT_ID DESC";
    $input =array();
  }
    

    
    $session->set("limited",$limit);
    $lenght = 100;
    $paging = new OS_Pagination($sql,$query,$limit,$lenght,"pg=".$pg."&option=".$option, isset($input) ?$input:  []);
    
$stmtlist = $paging->paginate();
?>

    <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">

        <a href="index.php?pg=<?php echo md5('rent_apartment');?>&option=<?php echo md5(''); ?>"
            class="btn btn-fill-md text-15 text-light bg-dark"><span class="fas fa-arrow-left"></span> Back</a>
      
    </div>

    <div class="card height-auto mt-20">
        <div class="card-body">
            <div class="heading-layout1">

                <div class="row">
                    <div class="text-dark h1 mt-3">RENT</div>
                    <span class="vl mr-3 ml-3"></span>
                    <div class="text-dark h1 mt-3">CLIENT</div>
                </div>



            </div>


            <!-- Beginning of search pagination -->
            <br>
            <div class="mg-b-10 text-center">
            <div class="row gutters-8 pr-5 pl-5">
                    
                    <div class="col-6-xxxl col-xl-6 col-lg-6x col-md-6 col-sm-12 form-group">
                        <input type="text" id="fdsearch" name="fdsearch" value="<?php isset($fdsearch)?$fdsearch:""; ?>"
                            placeholder="Search by Client Code, Name" class="form-control">
                    </div>

                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-md-3 col-sm-12 form-group">
                        <button type="button"
                            onclick="document.getElementById('pg').value='<?php echo md5('rent_apartment');?>'; document.getElementById('option').value='<?php echo md5('client'); ?>'; document.getElementById('viewpage').value='search'; document.myform.submit();"
                            class="fw-btn-fill btn-gradient-yellow">SEARCH</button>

                    </div>



                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-md-3 col-sm-12 form-group">
                        <button type="submit"
                            onclick="document.getElementById('pg').value='<?php echo md5('rent_apartment');?>'; document.getElementById('option').value='<?php echo md5('client'); ?>'; document.getElementById('viewpage').value='reset'; document.getElementById('fdsearch').value=''; document.myform.submit(); "
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
                            <th>ID</th>
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
                            <td><?php echo$objCode;?></td>
                            <td><?php echo strtoupper( $obj->CLIENT_FIRSTNAME." ".$obj->CLIENT_LASTNAME." ".$obj->CLIENT_OTHERNAME);?>
                            </td>
                            <td><?php echo $obj->CLIENT_GENDER  =='M'?'Male':'Female'  ?></td>
                            <td><?php echo $obj->CLIENT_CONTACT_1;?></td>
                            <td><?php echo $obj->CLIENT_EMAIL;?></td>

                            <td style="text-align:center;">



                                <button type="button" class="btn btn-fill-md text-15 bg-info text-light "
                                    onclick="document.getElementById('pg').value='<?php echo md5('rent_apartment');?>'; document.getElementById('option').value='<?php echo md5('add'); ?>'; document.getElementById('viewpage').value='client_details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; document.myform.submit(); ">
                                    <span class="fa fa-plus"></span> New Rent </button>

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