<style>
#frame {
    padding-top: 60px;
    display: grid;
    grid-template-columns: auto auto auto;
    /* background-color:; */
    border: 1px solid rgba(0, 0, 0, 0.8);
    padding: 10px;

}

.scrollable {
    height: 500px;
    overflow-y: scroll;
}
</style>

<input type="hidden" name="exporturl" id="export_url" value="<?php echo $export_url;?>" />

<div class="dashboard-content-one">

    <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
        <button type="button" onclick="cancelform();" class="btn btn-fill-md text-15 text-light bg-dark"><span
         class="fas fa-arrow-left"></span> Back 
        </button>

        <button type="button" onclick="clicktoPrint('printframe');"
            class="btn btn-fill-md text-15 text-light bg-primary"><span class="fas fa-print"></span> Print
         </button>

        <button type="button" onclick="exportxls()" class="btn btn-fill-md text-15 text-light bg-info"> <i
            class="fas fa-file-excel"></i> Excel
        </button>

    </div>

    <div class="card height-auto">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="heading-layout1 ">
                    <div class="row">
                        <div class="text-dark h1 mt-3">REPORT</div>
                        <span class="vl mr-3 ml-3"></span>
                        <div class="text-dark h1 mt-3"> STAFF</div>
                    </div>

        <div class="row">

            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-body pl-sm-5">

                        <div class="col-md-12" id="printframe">
                            <div class="scrollable">
                                <div class="border">

                                <div class="">
                                    <div class="row">
                                        <div class="col">
                                            <small><strong>@ : </strong> <?php echo date("F d, Y");?></small><br>
                                            <small><strong>FROM : </strong>
                                                <?php echo date('d M, Y',strtotime($datefrom));?></small><br />
                                            <small><strong>TO : </strong>
                                                <?php echo date('d M, Y',strtotime($dateto));?>
                                            </small><br /><br />



                                        </div>

                                        <div class="col d-flex justify-content-center">

                                            <center> <img style="max-width: 1000px; height: 90px;"
                                                    src="media/img/rke_logo.png" alt="logo">
                                            </center>
                                        </div>

                                        <div class="col" align="right">

                                        </div>

                                    </div>


                                </div>

                                <?php $engine->msg($status,$msg); ?>

                                <center>
                                    <div class="row d-flex justify-content-center">
                                        <u><b>STAFF REPORT</b></u>
                                    </div>
                                </center><br>

                                <table
                                    style="font-size: 13px; color: #000; font-family: Arial, Helvetica, sans-serif,color: #000;"
                                    width="100%" cellspacing="0" cellpadding="2" align="center"
                                    border="2">
                                    <thead>
                                        <tr>

                                            <th>#</th>
                                            <th>STAFF ID</th>
                                            <th>FULLNAME</th>
                                            <th>GENDER</th>
                                            <th>CONTACT</th>
                                            <th>EMAIL</th>
                                            <th>STAFF TYPE</th>
                                            <th>STATUS</th>
                                            <th>DATE</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php

                                    if(!empty($history_stmt)){
                                        $n=1;
                                    
                                        $staff_type=['1'=>'Executive ','2'=>'Manager','3'=>'Engineer','4'=>'Agent','5'=>'Administrator','6'=>'Artisan'];

                                    foreach ($history_stmt as $key => $value) {
                                 
                                        if ($value['STAFF_STATUS']=='O') {
                                              $status='Inactive';                                  
                                        }elseif($value['STAFF_STATUS']=='1'){
                                             $status='Active'; 
                                        }    
                                       
                                      ?>
                                        <tr>
                                        <td><?php echo $n++; ?> </td>
                                       
                                       <td><?php echo $value['STAFF_CODE']??'N/A'?></td>
                                       <td><?php $engine->strToCapitalize($value['STAFF_TITLE'].' '.$value['STAFF_FIRSTNAME'].' '.$value['STAFF_OTHERNAME'].' '.$value['STAFF_LASTNAME']);?></td>
                                       <td><?php echo $value['STAFF_GENDER']??'N/A'?></td>   
                                       <td><?php echo $value['STAFF_CONTACT_1']??'N/A'?></td>  
                                       <td><?php echo strtolower($value['STAFF_EMAIL'])??'N/A';?></td>  
                                       <td><?php echo $staff_type[$value['STAFF_TYPE']]??'N/A'?></td> 
                                       <td><?php echo $status??'N/A'?></td> 
                                       <td><?php echo date('jS M Y',strtotime($value['STAFF_DATE_CREATED']))??'N/A'?></td> 




                                        </tr>

                                        <?php             
                                            } 
                                            }else{
                                            echo '<tr><td colspan="9" align="center">No records found</td></tr>';
                                            }
                                            ?>

                                        </tbody>
                                    </table>

                                            <!-- end of section -->

                                        </div>
                                    </div>

                                </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>








         
      

  
