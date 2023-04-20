<script>
function take_snapshot() {
    // take snapshot and get image data
    Webcam.snap(function(data_uri) {

        Webcam.upload(data_uri, 'saveimage.php', function(code, text) {

        });
        // display results in page
        document.getElementById('editImageDiv').innerHTML =
            '<img id="imageprev" src="' + data_uri + '"/>';
    });


    Webcam.reset();

}

function launch_webcam() {
    Webcam.set({
        width: 460,
        height: 400,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach("#camera_wrapper");

}

function exit_webcam() {
    Webcam.reset();
}




function reject(keys, user) {
    swal({

        title: "Are you sure?",
        text: "You want to reject " + user + "!",
        icon: "warning",
        dangerMode: true,
        buttons: ["No", "Yes, Reject "],
    }).then((confirm) => {
        if (confirm) {
            document.getElementById('viewpage').value = 'reject';
            document.getElementById('keys').value = keys;
            document.myform.submit();
        }
    });

}

function approve(keys, user) {
    swal({

        title: "Are you sure?",
        text: "You want to approve " + user + "!",
        icon: "success",
        dangerMode: false,
        buttons: ["Cancel", "Approve "],
    }).then((confirm) => {
        if (confirm) {
            document.getElementById('viewpage').value = 'approve';
            document.getElementById('keys').value = keys;
            document.myform.submit();
        }
    });

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

function clicktoPrint(divName) {

    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;

}

function selectConvenantFamily() {
    let convenantFamily = $('#ind_convenant_fam').val();
    ind_mem_code = convenantFamily.split("@@@")[0];

}

function selectDepartment() {
    let department = $('#ind_department').val();
    ind_mem_code = department.split("@@@")[0];

}



//Save button 
function addINS() {

    if ($('#ins_first_name').val() == "") {
        swal("Error", "Sorry, Client's First Name is required", "error");
        return false;
    }

    if ($('#ins_last_name').val() == "") {
        swal("Error", "Sorry, Client's Last name is required", "error");
        return false;
    }


    if ($('#ins_address').val() == "") {
        swal("Error", "Sorry, Address is required", "error");
        return false;
    }


    if ($('#ins_contact').val() == "") {
        swal("Error", "Sorry, Contact is required", "error");
        return false;
    }

    if ((phoneInput.getNumber().length < 9) || (phoneInput.getNumber().length > 16)) {
        swal("Error", "Sorry, Enter a valid Contact", "error");
        return false;
    }

    if ($('#datepicker1').val() == "") {
        swal("Error", "Sorry, Date of Inspection is required", "error");
        return false;
    }



    $('#ins_contact').val(phoneInput.getNumber());
    document.getElementById('viewpage').value = 'add';
    document.myform.submit();


}


function updateINS() {

    if ($('#ins_first_name').val() == "") {
        swal("Error", "Sorry, Client's First Name is required", "error");
        return false;
    }

    if ($('#ins_last_name').val() == "") {
        swal("Error", "Sorry, Client's Last name is required", "error");
        return false;
    }


    if ($('#ins_address').val() == "") {
        swal("Error", "Sorry, Address is required", "error");
        return false;
    }


    if ($('#ins_contact').val() == "") {
        swal("Error", "Sorry, Contact is required", "error");
        return false;
    }


if ((phoneInput.getNumber().length < 9) || (phoneInput.getNumber().length > 16)) {
        swal("Error", "Sorry, Enter a valid Contact", "error");
        return false;
    } 

    if ($('#ins_inspection_date').val() == "") {
        swal("Error", "Sorry, Date of Inspection is required", "error");
        return false;
    }


    
    $('#ins_contact').val(phoneInput.getNumber());
    document.getElementById('viewpage').value = 'update';
    document.myform.submit();


}






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
        url: 'public/enrollment/model/fetch.php',
        data: {
            'regioncode': regioncodesch
        },
        success: function(response) {
            if (!response) {
                $("#st_sch_district").html('<option >--No District Available--</option>')
                return
            }

            $('#st_sch_district').html(response);

        }
    })

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
        url: 'public/enrollment/model/fetch.php',
        data: {
            'districtcode': districtcode
        },
        success: function(response) {
            if (!response) {
                $("#st_school").html('<option >--No School available--</option>')
                return
            }

            $('#st_school').html(response);

        }
    })

}
</script>