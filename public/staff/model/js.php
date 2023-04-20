<script type="text/javascript">
function approve() {
    swal({

        title: "Are you sure?",
        text: "You want to approve!",
        icon: "success",
        dangerMode: true,
        buttons: ["No", "Yes, approve staff"],
    })


}


function removeClient(e) {

    swal({

        title: "Are you sure?",
        text: "You want to delete!",
        icon: "warning",
        dangerMode: true,
        buttons: ["No", "Yes, remove staff"],
    }).then((confirm) => {
        if (confirm) {
            document.getElementById('viewpage').value = 'deletestaff';
            document.getElementById('keys').value = (e);
            document.myform.submit();
        }
    });


}


function saveStaff() {

    if ($('#rk_fname').val() == "") {
        // displayFormErrorMessage("First name");
        swal("Error", "Sorry, First Name is required", "error");
        return false;
    } else

    if ($('#rk_lname').val() == "") {
        swal("Error", "Sorry, Last Name is required", "error");
        return false;
    } else

    if ($('#rk_mail').val() == "") {
        swal("Error", "Sorry, Email is required", "error");
        return false;
    } else


    if ($('#rk_title').val() == "") {
        swal("Error", "Sorry, Title is required", "error");
        return false;
    } else

    if ($('#rk_dob').val() == "") {
        swal("Error", "Select your Date of Birth", "error");
        return false;
    } else

    if ($('#rk_hometown').val() == "") {
        swal("Error", "Enter your Hometown", "error");
        return false;
    }

    if ($('#rk_gender :selected').val() == "") {
        swal("Error", "Select your Gender", "error");
        return false;
    } else


    if ($('#rk_nationality').val() == "") {
        swal("Error", "Sorry, your Nationality is required", "error");
        return false;
    } else

    if ($('#staff_type :selected').val() == "") {
        swal("Error", "Select the staff type", "error");
        return false;
    } else

    if ($('#rk_contact1').val()=="") {
        swal("Error", "Sorry, Contact 1 is required", "error");
        return false;
    } else if ((phoneInput.getNumber().length < 9) || (phoneInput.getNumber().length > 16)) {
        swal("Error", "Sorry, Contact 1 is required", "error");
        return false;
    } else {

        if ((phoneInput2.getNumber().length >= 9) || (phoneInput2.getNumber().length <= 16)) {
            $('#rk_contact2').val(phoneInput2.getNumber());
        }

        $('#rk_contact1').val(phoneInput.getNumber());
        document.getElementById('viewpage').value = 'add';
        document.myform.submit();
    }






}




function updateStaff() {

    if ($('#rk_fname').val() == "") {
        // displayFormErrorMessage("First name");
        swal("Error", "Sorry, First Name is required", "error");
        return false;
    }

    if ($('#rk_lname').val() == "") {
        swal("Error", "Sorry, Last Name is required", "error");
        return false;
    }

    if ($('#rk_mail').val() == "") {
        swal("Error", "Sorry, Email is required", "error");
        return false;
    }


    if ($('#rk_title').val() == "") {
        swal("Error", "Sorry, Title is required", "error");
        return false;
    }

    if ($('#rk_dob').val() == "") {
        swal("Error", "Select your Date of Birth", "error");
        return false;
    }

    if ($('#rk_hometown').val() == "") {
        swal("Error", "Enter your Hometown", "error");
        return false;
    }

    if ($('#rk_gender :selected').val() == "") {
        swal("Error", "Select your Gender", "error");
        return false;
    }


    if ($('#rk_nationality').val() == "") {
        swal("Error", "Sorry, your Nationality is required", "error");
        return false;
    }


    if ($('#staff_type :selected').val() == "") {
        swal("Error", "Select the staff type", "error");
        return false;
    } 

    if ($('#rk_contact1').val()=="") {
        swal("Error", "Sorry, Contact 1 is required", "error");
        return false;
    } 
    else if ((phoneInput.getNumber().length < 9) || (phoneInput.getNumber().length > 16)) {
        swal("Error", "Sorry, Enter a valid Contact", "error");
        return false;
    } else {

        if ((phoneInput2.getNumber().length >= 9) || (phoneInput2.getNumber().length <= 16)) {
            $('#rk_contact2').val(phoneInput2.getNumber());
        }

        $('#rk_contact1').val(phoneInput.getNumber());
        document.getElementById('viewpage').value = 'update';
        document.myform.submit();

    }

}



function imagePreview(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function(event) {
            $('#preview').html('<img src="' + event.target.result +
                '" width="120"  height="auto"  class="img-thumbnail"/>');
        };
        fileReader.readAsDataURL(fileInput.files[0]);
    }
}
$("#pic").change(function() {
    imagePreview(this);
});
</script>