<input id="user_fname" name="user_fname" value="" type="hidden" />
<input id="user_lname" name="user_lname" value="" type="hidden" />

<?php
$stmtlist = $paging->paginate();
?> 

<div class="row">
    <div class="col-lg-12">
        <div  style="text-align:right; margin-top: 20px; margin-bottom: 20px;" >
                
                <a  href="index.php?pg=<?php echo md5('dashboard');?>&option=<?php echo md5(''); ?>"
                    class="btn btn-fill-md text-15 text-light bg-danger"
                    ><span class="fas fa-times"></span> Close</a>
                    
                    <a  href="index.php?pg=<?php echo md5('ticket');?>&option=<?php echo md5('add'); ?>"
                        type="" class="btn btn-fill-md text-15 text-light bg-primary"><span class="fas fa-plus"></span> TICKET</a>
                        
                        
                    </div>
                    
<div class="card height-auto mt-20">
    <div class="card-body">
        <div class="heading-layout1">
            
            <div class="row">
                <div class="text-dark h1 mt-3">TICKET</div> 
                <span class="vl mr-3 ml-3"></span> 
                <div class="text-dark h1 mt-3" >LIST</div>
            </div>
              </div>
            </div>
            <div class="card-body">
              
 <!-- Beginning of search pagination -->
 <div class="mg-b-10 text-center">
                            <div class="row gutters-8">
                                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                <div class="mt-2">
                                <?php echo $paging->renderFirst('<span class="fa fa-angle-double-left"></span>');?>
									<?php echo $paging->renderPrev('<span class="fa fa-arrow-circle-left"></span>','<span class="fa fa-arrow-circle-left"></span>');?>
									<input name="page" size="5" type="text" class="pagedisplay short" value="<?php echo $paging->renderNavNum();?>" readonly />
									<?php echo $paging->renderNext('<span class="fa fa-arrow-circle-right"></span>','<span class="fa fa-arrow-circle-right"></span>');?>
									<?php echo $paging->renderLast('<span class="fa fa-angle-double-right "></span>');?>
									<?php $paging->limitList($limit,"myform");?>
								</div>
                                </div>
                                <div class="col-3-xxxl col-xl-4 col-lg-4x col-12 form-group">
                                    <input type="text" id="fdsearch" name="fdsearch" value="<?php isset($fdsearch)?$fdsearch:""; ?>"   placeholder="Search by Ticket ID" class="form-control" >
                                    </div>

                                    
                           <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                <button type="submit" onclick="document.getElementById('viewpage').value='search'; document.myform.submit();" class="btn btn-warning btn-icon-split mr-3">
                              <span class="icon text-white-50 pt-2">
                               <i class="fas fa-search"></i>
                             </span>
                             </button>
                              
                             <button type="submit" onclick="document.getElementById('viewpage').value='reset'; document.getElementById('fdsearch').value=''; document.myform.submit();" class="btn btn-dark btn-icon-split ">
                              <span class="icon text-white-50 pt-2">
                               <i class="fas fa-undo"></i>
                             </span>
                             </button>
                             </div>

                            


                            </div>
                        </div>
                        <br>
                        <!-- Ending of search pagination -->
                        <?php 
                            $engine->msgBox($msg, $status,);
                            ?>

                  <div class="table-responsive">
                        <table class="table table-striped text-nowrap" style="min-height: 150px;">
                            <thead>
                                <tr   class="p-5">
                      <th>#</th>
                      <th>Client Name</th>
                      <th>Client Contact</th>
                      <th>Subject</th>
                      <!-- <th>Message</th> -->
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody >
                  <?php

        if($paging->total_rows > 0 ){
          $num = 1;
          while($obj = $stmtlist->FetchNextObject()){
          
          $objCode = $obj->TCK_CODE;
          $keys=$objCode;
                      
                                 
                                ?>

                    <tr>
                    <td><?php echo$num++;?></td>
                    <td><?php echo$obj->TCK_CLIENT_NAME;?></td>
                    <td><?php echo$obj->TCK_CLIENT_CONTACT;?></td>
                    <td><?php echo$obj->TCK_SUBJECT;?></td>
                    <!-- <td><?php

                      if(strlen($obj->TCK_CURRENT_MESSAGE)>30){
                        echo$obj->TCK_CURRENT_MESSAGE=substr($obj->TCK_CURRENT_MESSAGE,0,40).'.......';
                         }
                     ?></td> -->
                    <td><?php echo$system_ticket_status[$obj->TCK_STATUS];?></td>
      
                      <td>
                      <button onclick="document.getElementById('pg').value='<?php echo md5('ticket');?>'; document.getElementById('option').value='<?php echo md5('details'); ?>'; document.getElementById('viewpage').value='details'; document.getElementById('keys').value='<?php echo $objCode; ?>'; document.myform.submit();" class="btn btn-info btn-icon-split ">
                        <span class="icon text-white-50 pt-2">
                          <i class="fas fa-list"></i>
                        </span>
                        <span class="text">Details</span>
                      </button>
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

        </div>
        <!-- /.container-fluid -->