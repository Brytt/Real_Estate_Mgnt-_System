<script>
function resetPassword() {
    swal({

            title: "Are you sure?",
            text: "You want to reset this user's password!",
            icon: "warning",
            buttons: ["No", "Yes, Reset"],
        })
        .then((confirm) => {
            if (confirm) {
                document.getElementById('viewpage').value = 'resetpassword';
                document.myform.submit();
            }
        });
}



function removeUser(e) {

    swal({

        title: "Are you sure?",
        text: "You want to delete this user!",
        icon: "warning",
        dangerMode: true,
        buttons: ["No", "Yes, Delete"],
    }).then((confirm) => {
        if (confirm) {
            document.getElementById('viewpage').value = 'delete';
            document.getElementById('keys').value = (e);
            document.myform.submit();
        }
    });


}


//Save button 
function saveUser() {

    if ($('#user_staff_id').val() == "") {
        swal("Error", "Sorry, Staff ID is required", "error");
        return false;
    }

    if ($('#rk_username').val() == "") {
        swal("Error", "Sorry, Username is required", "error");
        return false;
    }

    if ($('#rk_username').val().length < 6) {
        swal("Error", "Sorry, Username should have a minimum of 6 Characters.", "error");
        return false;
    }

    if ($('#user_type :selected').val() == "") {
        swal("Error", "Please select User Type", "error");
        return false;
    }


    //Calling the save method
    document.getElementById('viewpage').value = 'add';
    document.myform.submit();


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
$("#staff_images").change(function() {
    imagePreview(this);
});


function changePassword() {

    if ($('#old_password').val() == "") {
        swal("Error", "Sorry, Current password is required ", "error");
        return false;
    }

    if ($('#new_password').val() == "") {
        swal("Error", "Sorry, Enter the new password", "error");
        return false;
    } else {
        let newPass = $('#new_password').val();
        let confirmPass = $('#confirm_password').val();
        if (newPass != confirmPass) {
            swal("Error", "Sorry, New password and confirm password must match!", "error");
            return false;
        }
    }

    swal({

            title: "Are you sure?",
            text: "You want to change your password!",
            icon: "warning",
            buttons: ["cancel", "Yes, Update"],
        })
        .then((confirm) => {
            if (confirm) {
                document.getElementById('pg').value = '<?php echo md5('user');?>';
                document.getElementById('option').value = 'password';
                document.getElementById('viewpage').value = 'changepassword';
                document.myform.submit();
            } else {
                // swal("Your imaginary file is safe!");
            }
        });

}



$(function() {


    $(".scregion").change(function(e) {

        $('#disdistrict').show();
        var regioncode = $('.scregion option:selected').val();
        getdistrict(regioncode);
        e.preventDefault();

    });
});



//GET DISTRICTS
function getdistrict(regioncode) {

    // alert(regioncode);
    $.ajax({
        method: 'POST',
        url: 'public/report/staffreport/model/fetch.php',
        data: {
            'regioncode': regioncode
        },
        success: function(response) {
            if (!response) {
                $("#district").html('<option >--No District available--</option>')
                return
            }
            hasCompanies = true;
            $('#district').html(response);

        }
    })

}
</script>