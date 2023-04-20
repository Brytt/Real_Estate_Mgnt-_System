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
                        <div class="text-dark h1 mt-3"> EXPENDITURE</div>
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
                                        <u><b>EXPENDITURE REPORT</b></u>
                                    </div>
                                </center><br>

                                <table
                                    style="font-size: 13px; color: #000; font-family: Arial, Helvetica, sans-serif; color: #000;"
                                    width="100%" cellspacing="0" cellpadding="2" align="center"
                                    border="2">
                                    <thead>
                                        <tr>
                                            <th>#</th>


                                            <th>TITLE</th>
                                            <th>AMOUNT (GHS)</th>
                                            <th>RECIEPT NUMBER</th>
                                            <th>RECIEPT DATE</th>
                                            <th>PAYER NAME</th>
                                            <th>PAYER CONTACT</th>
                                            <th>PAYMENT PURPOSE</th>
                                            <th>STATUS</th>



                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php

                                    if(!empty($history_stmt)){
                                        $n=1;
                                        foreach ($history_stmt as $key => $value) {
                                     
                                            if ($value['EXP_STATUS']=='0') {
                                                  $status='Inactive';                                  
                                            }elseif($value['EXP_STATUS']=='1'){
                                                 $status='New'; 
                                            }elseif($value['EXP_STATUS']=='2'){
                                                $status='Pending'; 
                                           }elseif($value['EXP_STATUS']=='3'){
                                            $status='Approved'; 
                                         }        
                                           
                                       
                                   
                                      ?>
                                        <tr>
                                            <td><?php echo $n++; ?> </td>

                                            <td><?php echo $value['EXP_TITLE']??'N/A'?></td>
                                            <td><?php echo $value['EXP_AMOUNT']??'N/A'?></td>  
                                            <td><?php echo $value['EXP_RECIEPT_NUM']??'N/A'?></td>  
                                            <td><?php echo $value['EXP_RECIEPT_DATE']??'N/A'?></td>  
                                            <td><?php echo $value['EXP_PAYER_NAME']??'N/A'?></td>  
                                            <td><?php echo $value['EXP_PAYER_CONTACT']??'N/A'?></td>
                                            <td><?php echo $value['EXP_PAYMENT_PURPOSE']??'N/A'?></td>
                                            <td><?php echo $status??'N/A'?></td>




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

