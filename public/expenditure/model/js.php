<script>
    function approve() {
        swal({

            title: "Are you sure?",
            text: "You want to approve!",
            icon: "success",
            dangerMode: true,
            buttons: ["No", "Yes, approve "],
        })


    }


    function reject() {
        swal({

            title: "Are you sure?",
            text: "You want to reject!",
            icon: "warning",
            dangerMode: true,
            buttons: ["No", "Yes, reject "],
        })


    }

    //Selecting teaching and none teaching staff type


    $(function() {

        $(".gvt_category").change(function(e) {

            var staffCate = $('.gvt_category :selected').val();
            if (staffCate == "1") {
                $('#div_vac_sch_level').show();
                $('#div_staff_subject').show();
                $('#div_staff_rank').hide();
            } else if (staffCate == "2") {
                $('#div_vac_sch_level').hide();
                $('#div_staff_subject').hide();
                $('#div_staff_rank').show();
            }

        });
    });



    //                    $(function () {

    // $(".gvt_category_et").change(function (e) { 

    //   var category =  $('.gvt_category_et :selected').val();
    //  if(category == "1"){
    //      $('#staff_subject_layout').show();
    //      $('#div_staff_rank').hide();
    //  }
    //  else if(category == "2"){
    //      $('#staff_subject_layout').hide();
    //      $('#div_staff_rank').show();
    //      }

    // });
    // });


    //This method is called when  school region is selected
    //It splits the joint region code and name
    $(function() {

        $(".st_sch_region").change(function(e) {

            $('#dis_st_sch__district').show();
            var regioncodesch = $('.st_sch_region option:selected').val();
            getschdistrict(regioncodesch.split("@@@")[0]);
            e.preventDefault();

        });
    });

    //GET school DISTRICTS
    function getschdistrict(regioncodesch) {

        $.ajax({
            method: 'POST',
            url: 'public/vacancies/model/fetch.php',
            data: {
                'regioncode': regioncodesch
            },
            success: function(response) {
                if (!response) {
                    $("#st_sch_district").html('<option >--No District available--</option>')
                    return
                }

                $('#st_sch_district').html(response);

            }
        })

    }


    function allowNumbersOnly(e) {
        let code = (e.which) ? e.which : e.keyCode;
        if (code > 31 && (code < 48 || code > 57)) {
            e.preventDefault();
        }
    }



    $(function() {
        $(".st_sch_district").change(function(e) {

            $('#div_st_school').show();
            var districtcode = $('.st_sch_district option:selected').val();
            getSchool(districtcode.split("@@@")[0]);
            e.preventDefault();

        });
    });

    //Function to get shcool
    function getSchool(districtcode) {
        $.ajax({
            method: 'POST',
            url: 'public/vacancies/model/fetch.php',
            data: {
                'districtcode': districtcode
            },
            success: function(response) {
                if (!response) {
                    $("#st_school").html('<option value="">--No School available--</option>')
                    return
                }

                $('#st_school').html(response);

            }
        })

    }

    function del() {
        swal({

            title: "Are you sure?",
            text: "You want to delete!",
            icon: "warning",
            dangerMode: true,
            buttons: ["Cancel", "Delete "],
        }).then((confirm) => {
            if (confirm) {
                document.getElementById('viewpage').value = 'delete';
                document.myform.submit();
            }
        });

    }



    //Function allows only numbers
    function allowNumbersOnly(e) {
        var code = (e.which) ? e.which : e.keyCode;
        if (code > 31 && (code < 48 || code > 57)) {
            e.preventDefault();
        }
    }

    //Save button 
    function addExp() {
        let ex_amount = $('#ex_amount').val();
        ex_amount = ex_amount.replace(",", "").trim();


        if ($('#ex_title').val() == "") {
            swal("Error", "Sorry, Expenses Title is required", "error");
            return false;
        }

        if (ex_amount == "") {
            swal("Error", "Sorry, Amount is required", "error");
            return false;
        } else


        if (isNaN(ex_amount)) {
            swal("Error", "Sorry, Invalid income amount entered", "error");
            return false;
        }else


        if ($('#datepicker1').val() == "") {
            swal("Error", "Sorry, Date is required", "error");
            return false;
        }

        if ($('#ex_name').val() == "") {
            swal("Error", "Sorry, Payer Name is required", "error");
            return false;
        }

        if ($('#ex_purpose').val() == "") {
            swal("Error", "Purpse of Expenses is required", "error");
            return false;
        } else


            //Calling the save method
            document.getElementById('viewpage').value = 'add';
        document.myform.submit();


    }



    function UpdateExp() {


        let ex_amount = $('#ex_amount').val();
        ex_amount = ex_amount.replace(",", "").trim();



        if ($('#ex_title').val() == "") {
            swal("Error", "Sorry, Expenses Title is required", "error");
            return false;
        } else


        if (ex_amount == "") {
            swal("Error", "Sorry, Amount is required", "error");
            return false;
        } else


        if (isNaN(ex_amount)) {
            swal("Error", "Sorry, Invalid income amount entered", "error");
            return false;
        }else


        if ($('#datepicker1').val() == "") {
            swal("Error", "Sorry, Date is required", "error");
            return false;
        }

        if ($('#ex_name').val() == "") {
            swal("Error", "Sorry, Payer Name is required", "error");
            return false;
        } else


        if ($('#ex_purpose').val() == "") {
            swal("Error", "Purpse of Expenses is required", "error");
            return false;
        } else

            //Calling the save method
            document.getElementById('viewpage').value = 'update';
        document.myform.submit();


    }
</script>