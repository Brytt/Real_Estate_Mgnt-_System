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
                        <div class="text-dark h1 mt-3"> LAND</div>
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
                                        <u><b>LAND REPORT</b></u>
                                    </div>
                                </center><br>

                                <table
                                    style="font-size: 13px; color: #000; font-family: Arial, Helvetica, sans-serif,color: #000;"
                                    width="100%" cellspacing="0" cellpadding="2" align="center"
                                    border="2">
                                    <thead>
                                        <tr>
                                            <th>#</th>

                                            <th>ID</th>
                                            <th>CLIENT NAME</th>
                                            <th>PROPERTY </th> 
                                            <th>NEXT PAYMENT DATE </th> 
                                            <th>STATUS </th> 
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php

                                    if(!empty($history_stmt)){
                                        $n=1;
                                        foreach ($history_stmt as $key => $value) {
                                    
                                           
                                         $status=['0'=>'Deleted','1'=>'Pending Payment','2'=>'Part Payment', '3'=>'Fully Paid'];
                                   
                                      ?>
                                        <tr>
                                            <td><?php echo $n++; ?> </td>
                                        
                                            <td><?php echo $value['LS_CODE']??'N/A'?></td> 
                                            <td><?php echo $value['LS_CLIENT_NAME']??'N/A'?></td>  
                                            <td><?php echo $value['LS_PROPERTY_NAME']??'N/A'?></td>  
                                            <td><?php echo  ($value['LS_NEXT_PAY_DATE'] == "" )?'N/A' : $engine->formatDateToRead($value['LS_NEXT_PAY_DATE']); ?></td>  
                                            <td><?php echo $status[$value['LS_STATUS']]??'N/A'?></td>


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






