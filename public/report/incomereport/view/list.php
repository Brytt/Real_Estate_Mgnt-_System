<style>
    #frame{
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

<div class="row">
    <div class="col-lg-12">
        <div  style="text-align:right; margin-top: 20px; margin-bottom: 20px;" >
            <button type="button" onclick="cancelform();" class="btn btn-fill-md text-15 text-light bg-dark"><span class="fas fa-arrow-left"></span> Back </button>
            
            <button type="button" onclick="clicktoPrint('printframe');" class="btn btn-fill-md text-15 text-light bg-success"><span class="fas fa-print"></span> Print </button>
            
            <button type="button" onclick="exportxls()" class="btn btn-fill-md text-15 text-light bg-info"> <i class="fas fa-file-excel"></i> Excel </button>
            
        </div>
    </div>
</div>

<input type="hidden" name="exporturl" id="export_url" value="<?php echo $export_url;?>" />

<div class="card" style="padding:20px;">
    <div class="col-12"> 
                <div class="heading-layout1 mb-5">
                    <div class="item-title">
                        <h3>Income Report</h3>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12"> 
                                <div class="col-md-12"  id="printframe">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <small><?php echo '@ '.date("F d, Y");?></small><br/>
                                            <small><strong>PERIOD </strong></small><br>
                                            <small><strong>FROM : </strong> <?php echo date('d M, Y',strtotime($datefrom));?></small> - 
                                            <small><strong>TO :</strong>  </strong> <?php echo date('d M, Y',strtotime($dateto));?> </small><br /><br />
                                            
                                        </div>
                                        
                                        
                                        <div class="col-md-12">
                                        <center>    <img style="width: auto; height: 120px; margin-top: -30px;"src="media/img/rke_logo.png" alt="logo"></center>
                                        </div>
                                        
                                      
                                    </div>
                                    
                                    
                              
                                
                                <?php $engine->msg($status,$msg); ?>
                                
         
                                <center>   <div class="row d-flex justify-content-center"><h5><u><b>INCOME REPORT</b></u></h6></div><br></center> 
                       
        <table style="font-size: 13px; color: #000; font-family: Arial, Helvetica, sans-serif,color: #000;" width="100%" cellspacing="0"  cellpadding="2" align="center" border="2" >
                                   <thead>                     
                                        <tr>
                                        <th>#</th>
                                            <th>TYPE</th>
                                            <th>AMOUNT</th>
                                            <th>COMMENT</th>
                                              <th>RECIEVED FROM</th>  
                                            <th>DATE OF PAYMENT</th>
                                            
                                        
                                            
                                            <!-- <th>REGION</th> -->
                                           
                                           
                                            <!-- <th>DATE</th> -->

                                          
                                         
                                        </tr>                               
                                    </thead>
                                                       
                                    <tbody>
                                      <?php
                                  
                                    if(!empty($history_stmt)){
                                            $n=1;
                                          //  $cat_status=['1'=>'Teaching ','2'=>'Non-Teaching','3'=>'Unregistered'];
                                        foreach ($history_stmt as $key => $value) {
                                     
                                            if ($value['GEN_REV_STATUS']=='O') {
                                                  $status='Inactive';                                  
                                            }elseif($value['GEN_REV_STATUS']=='1'){
                                                 $status='Active'; 
                                            }    
                                           
                                           
                                       
                                   
                                      ?>   
                                      <tr>                        
                                        <td><?php echo $n++; ?> </td>
                                       
                                        <td><?php echo $value['GEN_REV_TYPE']??'N/A'?></td>
                                        <td><?php echo $value['GEN_REV_AMOUNT']??'N/A'?></td>
                                        <td><?php echo $value['GEN_REV_COMMENT']??'N/A'?></td>
                                        <td><?php echo $value['GEN_REV_RECEIVE']??'N/A'?></td>   
                                        <td><?php echo $value['GEN_REV_PAY_DATE']??'N/A';?></td>  

                                        <!-- <td><?php echo date('d/m/Y',strtotime($value['GEN_REV_CREATED_DATE']))??'N/A'?></td>                                                                    -->
                                      </tr>   
                                      
                                      <?php  

                                         

                                            }  ?>

 
                                            <?php
                                            }else{
                                            echo '<tr><td colspan="8" align="center">No records found</td></tr>';
                                            }
                                            ?>
                                  
                                    </tbody>
                                </table>
                          
                             <!-- end of section -->
                         
                        </div>
                        </div>

                        </div>
                     </p>


                             </div>
                        </div>
                    </div>
               
         
      

  
