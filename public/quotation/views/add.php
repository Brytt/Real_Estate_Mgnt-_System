<style>

</style>
<div class="dashboard-content-one">
<div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">

    <a href="index.php?pg=<?php echo md5('quotation');?>&option=<?php echo md5(''); ?>"
        class="btn btn-fill-md text-light text-15 bg-dark "><span class="fas fa-times"></span> Cancel </a>



    <button type="button" class="btn btn-fill-md text-15 bg-success text-light"
        onclick="saveQuotation()">
        <span class="fa fa-save"> </span> Save</button>
</div>

<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1 mb-5">
            <div class="row">
                <div class="text-dark h1 mt-3">QUOTATION</div>
                <span class="vl mr-3 ml-3"></span>
                <div class="text-dark h1 mt-3">ADD</div>
            </div>



        </div>
        <div class="row">

            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label>Name <span class="text-red">*</span></label>
                <input type="text" placeholder="" name="qut_name" id="qut_name" class="form-control">
            </div>

            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label>E-Mail</label>
                <input type="text" placeholder="" name="qut_email" id="qut_email" class="form-control">
            </div>

            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label>Contact <span class="text-red">*</span></label>
                <input type="tel" onkeypress="allowNumbersOnly(event)" name="qut_contact" id="qut_contact" class="form-control phone" placeholder="Eg. 024 123 4567" >
            </div>


            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label>Comment <span class="text-red">*</span></label>

                <textarea type="text" placeholder="" name="qut_comment" id="qut_comment" cols="10" rows="9" 
                    class="textarea form-control" style="min-height:150px;" > </textarea>
                
            </div>


        </div>
        <!-- </form> -->
    </div>
</div>