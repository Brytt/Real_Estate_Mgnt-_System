<div class="dashboard-content-one">
    <div style="text-align:right; margin-top: 20px; margin-bottom: 20px;">
        <a href="index.php?pg=<?php echo md5('user');?>&option=<?php echo md5(''); ?>"
            class="btn btn-fill-md text-light text-15 bg-dark"><span class="fas fa-times"></span> Cancel </a>


        <button type="button" class="btn btn-fill-md text-15 bg-success text-light " onclick="saveUser();">
            <span class="fa fa-save"> </span> Save</button>
    </div>
    <div class="card height-auto">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="heading-layout1 mb-5">
                        <div class="row">
                            <div class="text-dark  h1 mt-3">USER</div>
                            <span class="vl mr-3 ml-3"></span>
                            <div class="text-dark h1 mt-3">ADD</div>
                        </div>

                    </div>

                    <form class="new-added-form">
                        <div class="row">

                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Staff ID <span class="text-red">*</span></label>
                                <input name="user_staff_id" type="text" placeholder="Staff ID" id="user_staff_id"
                                    class="form-control">
                            </div>

                            <div class="col-xl-3 col-lg-6 col-12 form-group ">
                                <label>Username <span class="text-red">*</span></label>
                                <input name="rk_username" type="test" placeholder="Username" id="rk_username"
                                    class="form-control">
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group d-none">
                                <label>Username <span class="text-red">*</span></label>
                                <input name="rk_username" type="test" placeholder="Username" id="rk_username"
                                    class="form-control">
                            </div>

                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>User Type <span class="text-red">*</span></label>
                                <select name="user_type" class="select2" id="user_type">
                                    <option selected disabled value="" value="">Please Select User Type</option>
                                    <option value="1">Administrator</option>
                                    <option value="2">Executive User</option>
                                    <option value="3">Manager</option>
                                    <option value="4">User</option>
                                </select>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>