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



    $(function() {
        $("#ls_payment_term").change(function() {
            if ($(this).val() == "installment") {
                $("#ls_payment_plan_add_layout").show();
            } else {
                $("#ls_payment_plan_add_layout").hide();
            }
        });
    });



    $(function() {
        $("#ls_payment_term_et").change(function() {
            if ($(this).val() == "installment") {
                $("#ls_payment_plan_layout").show();
            } else {
                $("#ls_payment_plan_layout").hide();
            }
        });
    });



    function removeClient(e) {

        swal({

            title: "Are you sure?",
            text: "You want to delete this client!",
            icon: "warning",
            dangerMode: true,
            buttons: ["No", "Yes, Delete"],
        }).then((confirm) => {
            if (confirm) {
                document.getElementById('viewpage').value = 'deleteclient';
                document.getElementById('keys').value = (e);
                document.myform.submit();
            }
        });


    }


    function saveClient() {

        if ($('#rk_fname').val() == "") {
            swal("Error", "Sorry, First Name is required", "error");
            return false;
        } else if ($('#rk_lname').val() == "") {
            swal("Error", "Sorry, Last Name is required", "error");
            return false;
        } else if ($('#rk_mail').val() == "") {
            swal("Error", "Sorry, Email is required", "error");
            return false;
        } else if ($('#rk_title').val() == "") {
            swal("Error", "Sorry, Title is required", "error");
            return false;
        } else if ($('#rk_gender :selected').val() == "") {
            swal("Error", "Please select your Gender", "error");
            return false;
        } else if ((phoneInput.getNumber().length < 9) || (phoneInput.getNumber().length > 16)) {
            swal("Error", "Sorry, Contact 1 is required", "error");
            return false;
        } else {

            if ((phoneInput2.getNumber().length >= 9) || (phoneInput2.getNumber().length <= 16)) {
                $('#rk_contact2').val(phoneInput2.getNumber());
            } else {
                $('#rk_contact2').val("");
            }

            if ((phoneInputKin.getNumber().length >= 9) || (phoneInputKin.getNumber().length <= 16)) {
                $('#rk_kin_contact1').val(phoneInputKin.getNumber());
            } else {
                $('#rk_kin_contact1').val("");
            }

            $('#rk_contact1').val(phoneInput.getNumber());
            document.getElementById('viewpage').value = 'add';
            document.myform.submit();
        }



    }


    function deleteLand(landCode) {
        swal({

            title: "Are you sure?",
            text: "You want to delete!",
            icon: "warning",
            dangerMode: true,
            buttons: ["Cancel", "Delete "],
        }).then((confirm) => {
            if (confirm) {
                document.getElementById('pg').value = '<?php echo md5('client'); ?>';
                document.getElementById('option').value = '<?php echo md5('client_landlist'); ?>';
                document.getElementById('keys').value = landCode;
                document.getElementById('viewpage').value = 'deleteland';
                document.myform.submit();
            }
        });

    }


    function checkoutRent(rentCode) {
        swal({

            title: "Are you sure?",
            text: "You want to Check out!",
            icon: "warning",
            dangerMode: true,
            buttons: ["Cancel", "Check-out "],
        }).then((confirm) => {
            if (confirm) {
                document.getElementById('pg').value = '<?php echo md5('client'); ?>';
                document.getElementById('option').value = '<?php echo md5('client_rent'); ?>';
                document.getElementById('keys').value = rentCode;
                document.getElementById('viewpage').value = 'checkout_rent';
                document.myform.submit();
            }
        });

    }




    //Save button 
    function RentApartment() {

        let ar_total_cost = $('#ar_total_cost').val();
        ar_total_cost = ar_total_cost.replace(",", "").trim();

        let ar_total_payment = $('#ar_total_payment').val();
        ar_total_payment = ar_total_payment.replace(",", "").trim();


        if ($('#ar_prop_name :selected').val() == "") {
            swal("Error", "Sorry, property name is required", "error");
            return false;
        }
        if ($('#ar_apartment_number').val() == "") {
            swal("Error", "Sorry, unit number is required", "error");
            return false;
        }

        if ($('#ar_duration').val() == "") {
            swal("Error", "Sorry, rent duration is required", "error");
            return false;
        }

        if ($('#checkInDate').val() == "") {
            swal("Error", "Sorry, Check-In Date is required", "error");
            return false;
        }

        if ($('#checkOutDate').val() == "") {
            swal("Error", "Sorry, Check-Out Date is required", "error");
            return false;
        }

        var dateOneArr = $('#checkInDate').val().split("/");
        var dateTwoArr = $('#checkOutDate').val().split("/");

        var date_1 = new Date(dateOneArr[1] + "/" + dateOneArr[0] + "/" + dateOneArr[2]);
        var date_2 = new Date(dateTwoArr[1] + "/" + dateTwoArr[0] + "/" + dateTwoArr[2]);

        if (date_1 > date_2) {
            swal("Error", "Sorry, Check-Out Date must be greater than Check-In Date", "error");
            return false;
        }

        if (ar_total_cost == "") {
            swal("Error", "Sorry,total cost is required", "error");
            return false;
        }

        if (isNaN(ar_total_cost)) {
            swal("Error", "Sorry, Invalid total cost entered", "error");
            return false;
        }

        if (ar_total_payment == "") {
            swal("Error", "Sorry, payment is required", "error");
            return false;
        }

        if (isNaN(ar_total_payment)) {
            swal("Error", "Sorry, Invalid amount entered", "error");
            return false;
        }

        if ($('#payment_date').val() == "") {
            swal("Error", "Sorry, Payment Date is required", "error");
            return false;
        }




        //Calling the payment method 
        document.getElementById('pg').value = '<?php echo md5('client'); ?>';
        document.getElementById('option').value = '<?php echo md5('client_rent'); ?>';
        document.getElementById('viewpage').value = 'rentapartment';
        document.myform.submit()
    }


    function updateApartmentRental(aptCode) {
        
        let ar_total_cost = $('#ar_total_cost').val();
        ar_total_cost = ar_total_cost.replace(",", "").trim();


        if ($('#ar_prop_name :selected').val() == "") {
            swal("Error", "Sorry, property name is required", "error");
            return false;
        }
        if ($('#ar_apartment_num').val() == "") {
            swal("Error", "Sorry, apartment number is required", "error");
            return false;
        }

        if ($('#ar_duration').val() == "") {
            swal("Error", "Sorry, rent duration is required", "error");
            return false;
        }

        if ($('#checkInDate').val() == "") {
            swal("Error", "Sorry, Check-In Date is required", "error");
            return false;
        }

        if ($('#checkOutDate').val() == "") {
            swal("Error", "Sorry, Check-Out Date is required", "error");
            return false;
        }

        var dateOneArr = $('#checkInDate').val().split("/");
        var dateTwoArr = $('#checkOutDate').val().split("/");

        var date_1 = new Date(dateOneArr[1] + "/" + dateOneArr[0] + "/" + dateOneArr[2]);
        var date_2 = new Date(dateTwoArr[1] + "/" + dateTwoArr[0] + "/" + dateTwoArr[2]);

        if (date_1 > date_2) {
            swal("Error", "Sorry, Check-Out Date must be greater than Check-In Date", "error");
            return false;
        }

        if (ar_total_cost== "") {
            swal("Error", "Sorry,total cost is required", "error");
            return false;
        }
        if (isNaN(ar_total_cost)) {
            swal("Error", "Sorry, Invalid total cost entered", "error");
            return false;
        }

        //Calling the payment method 
        document.getElementById('pg').value = '<?php echo md5('client'); ?>';
        document.getElementById('option').value = '<?php echo md5('rent_details'); ?>';
        document.getElementById('viewpage').value = 'update_rent_apartment';
        document.getElementById('keys').value = aptCode;
        document.myform.submit()
    }



    function SellLand() {
        
        let ls_total_payment = $('#ls_total_payment').val();
        ls_total_payment = ls_total_payment.replace(",", "").trim();
        
        let ls_total_cost = $('#ls_total_cost').val();
        ls_total_cost = ls_total_cost.replace(",", "").trim();


        if ($('#ls_prop_name :selected').val() == "") {
            swal("Error", "Sorry, property name is required", "error");
            return false;
        }
        if ($('#ls_plot_number').val() == "") {
            swal("Error", "Sorry, Plot number is required", "error");
            return false;
        }
        if ($('#ls_payment_term').val() == "") {
            swal("Error", "Sorry,payment term is required", "error");
            return false;
        }

        if ($('#ls_num_plot').val() == "") {
            swal("Error", "Sorry,number of plot Required is required", "error");
            return false;
        }


        if (ls_total_cost == "") {
            swal("Error", "Sorry,total cost is required", "error");
            return false;
        }

        if (isNaN(ls_total_cost)) {
            swal("Error", "Sorry, Invalid cost amount entered", "error");
            return false;
        }


        if (ls_total_payment == "") {
            swal("Error", "Sorry, payment is required", "error");
            return false;
        }

        if (isNaN(ls_total_payment)) {
            swal("Error", "Sorry, Invalid total payment entered", "error");
            return false;
        }


        if ($('#payment_date').val() == "") {
            swal("Error", "Sorry, payment is required", "error");
            return false;
        }

        //Calling the payment method 

        document.getElementById('pg').value = '<?php echo md5('clients'); ?>';
        document.getElementById('option').value = '<?php echo md5('client_landlist'); ?>';
        document.getElementById('viewpage').value = 'landpurchase';
        document.myform.submit()

    }



    function updateLand() {

        var ls_total_payment = $('#ls_total_payment').val();
        var ls_total_cost = $('#ls_total_cost').val();


        ls_total_payment = ls_total_payment.replace(",", "").trim();
        ls_total_cost = ls_total_cost.replace(",", "").trim();

        if (isNaN(ls_total_cost)) {
            swal("Error", "Sorry, Total Cost is Invalid ", "error");
            return false;
        }
        if (parseFloat(ls_total_payment) > parseFloat(ls_total_cost)) {
            swal("Error", "Sorry, Total Payment Amount can't exceed  Total Cost", "error");
            return false;
        }

        if ($('#ls_prop_name :selected').val() == "") {
            swal("Error", "Sorry, property name is required", "error");
            return false;
        }
        if ($('#ls_plot_number').val() == "") {
            swal("Error", "Sorry, Plot number is required", "error");
            return false;
        }
        if ($('#ls_payment_term_et :selected').val() == "") {
            swal("Error", "Sorry, payment term is required", "error");
            return false;
        }

        if ($('#ls_payment_term_et :selected').val() == "installment") {
            if ($('#ls_payment_plan :selected').val() == "") {
                swal("Error", "Sorry, payment plan is required", "error");
                return false;
            }
        }

        if ($('#ls_num_plot').val() == "") {
            swal("Error", "Sorry,number of plot Required is required", "error");
            return false;
        } else

        if (ls_total_cost == "") {
            swal("Error", "Sorry,total cost is required", "error");
            return false;
        } else

        if (isNaN(ls_total_cost)) {
            swal("Error", "Sorry, Invalid cost amount entered", "error");
            return false;
        } else

        if (ls_total_payment == "") {
            swal("Error", "Sorry, payment is required", "error");
            return false;
        }

        if (isNaN(ls_total_payment)) {
            swal("Error", "Sorry, Invalid total payment entered", "error");
            return false;
        }




        //Calling the payment method 

        document.getElementById('pg').value = '<?php echo md5('clients'); ?>';
        document.getElementById('option').value = '<?php echo md5('land_details'); ?>';
        document.getElementById('viewpage').value = 'update_land_edit';
        document.myform.submit()

    }



    function saveRentPayment() {

        var payment_amt = $('#payment_amt').val();
        payment_amt = payment_amt.replace(",", "").trim();


        var ar_balance = $('#ar_balance').val();

        if (payment_amt == "") {
            swal("Error", "Sorry, Amount Being Paid is required ", "error");
            return false;
        } else

        if (isNaN(payment_amt)) {
            swal("Error", "Sorry, Amount Being Paid is Invalid ", "error");
            return false;
        } else

        if (parseFloat(payment_amt) > parseFloat(ar_balance)) {
            swal("Error", "Sorry, Payment Amount can't exceed Balance", "error");
            return false;
        }

        if ($('#payment_date').val() == "") {
            swal("Error", "Sorry, Payment Date is required", "error");
            return false;
        }


        document.getElementById('pg').value = '<?php echo md5('client'); ?>';
        document.getElementById('option').value = '<?php echo md5('client_rent'); ?>';
        document.getElementById('viewpage').value = 'rent_paymentupdate';
        document.myform.submit()

    }




    //Land Payment button 
    function LandsavePayment(clientCode) {
        var payment_amt = $('#payment_amt').val();
        payment_amt = payment_amt.replace(",", "").trim();

        var ls_balance = $('#ls_balance').val();


        if (payment_amt == "") {
            swal("Error", "Sorry, Amount Being Paid is required ", "error");
            return false;
        }


        if (isNaN(payment_amt)) {
            swal("Error", "Sorry, Amount Being Paid is Invalid ", "error");
            return false;
        }

        if (parseFloat(payment_amt) > parseFloat(ls_balance)) {
            swal("Error", "Sorry, Payment Amount can't exceed Balance", "error");
            return false;
        }

        if ($('#payment_date').val() == "") {
            swal("Error", "Sorry, Payment Date is required", "error");
            return false;
        }



        document.getElementById('pg').value = '<?php echo md5('client'); ?>';
        document.getElementById('option').value = '<?php echo md5('client_landlist'); ?>';
        document.getElementById('viewpage').value = 'land_paymentupdate';
        document.getElementById('keys').value = clientCode;
        document.myform.submit()

    }



    function updateClient(e) {

        if ($('#rk_fname').val() == "") {
            // displayFormErrorMessage("First name");
            swal("Error", "Sorry, First Name is required", "error");
            return false;
        } else

        if ($('#rk_lname').val() == "") {
            swal("Error", "Sorry, Last Name is required", "error");
            return false;
        } else

        if ($('#rk_title').val() == "") {
            swal("Error", "Sorry, Title is required", "error");
            return false;
        } else

        if ($('#rk_gender :selected').val() == "") {
            swal("Error", "Please select your Gender", "error");
            return false;
        } else if ((phoneInput.getNumber().length < 9) || (phoneInput.getNumber().length > 16)) {
            swal("Error", "Sorry, Contact 1 is required", "error");
            return false;
        } else {

            const temp_old_file = [];
            $('#oldDocTable tr').each(function() {
                let doc_file = {
                    "name": $.trim($(this).find(".oldFileName").text()),
                    "path": $.trim($(this).find(".oldFilePath").text())
                }
                temp_old_file.push(doc_file);
            });


            if ((phoneInput2.getNumber().length >= 9) || (phoneInput2.getNumber().length <= 16)) {
                $('#rk_contact2').val(phoneInput2.getNumber());
            } else {
                $('#rk_contact2').val("");
            }

            if ((phoneInputKin.getNumber().length >= 9) || (phoneInputKin.getNumber().length <= 16)) {
                $('#rk_kin_contact1').val(phoneInputKin.getNumber());
            } else {
                $('#rk_kin_contact1').val("");
            }

            $('#rk_contact1').val(phoneInput.getNumber());
            $('#rk_kin_contact1').val(phoneInputKin.getNumber());

            //Calling the save method
            document.getElementById('viewpage').value = 'update';
            document.getElementById('old_doc_file').value = JSON.stringify(temp_old_file);
            document.getElementById('keys').value = e;
            document.myform.submit();
        }



    }


    //Save button 
    function savePayment() {

        var clp_amount = $('#clp_amount').val();
        clp_amount = clp_amount.replace(",", "").trim();

        if ($('#clp_pay_type :selected').val() == "") {
            swal("Error", "Sorry, payment type is required", "error");
            return false;
        } else


        if (clp_amount == "") {
            swal("Error", "Sorry,amount is required", "error");
            return false;
        } else

        if (isNaN(clp_amount)) {
            swal("Error", "Sorry, cost is Invalid ", "error");
            return false;
        }


        if ($('#datepicker1').val() == "") {
            swal("Error", "Sorry, payment date Required is required", "error");
            return false;
        } else {
            //Calling the payment method 
            document.getElementById('viewpage').value = 'add_payment';
            document.myform.submit();
        }

    }



    $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                            imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#chooseFile').on('change', function() {
            multiImgPreview(this, 'div.imgGallery');
        });
    });


    //Function allows only numbers
    function allowNumbersOnly(e) {
        let code = (e.which) ? e.which : e.keyCode;
        if (code > 31 && (code < 48 || code > 57)) {
            e.preventDefault();
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
    $("#profile_pic").change(function() {
        imagePreview(this);
    });

    function filePreview(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function(event) {
                $('#filepreview').html('<img src="' + event.target.result +
                    '" width="120"  height="auto"  class="img-thumbnail"/>');
            };
            fileReader.readAsDataURL(fileInput.files[0]);
        }
    }
    $("#file_image").change(function() {
        filePreview(this);
    });




    function selectCateItem() {
        var cateCode = document.getElementById('order_item_cat').value.split("@@@")[0];

        $.ajax({
            method: 'POST',
            url: 'public/clients/model/fetch.php',
            data: {
                'orderItemCate': cateCode
            },
            success: function(response) {
                if (!response) {
                    $('#order_item').html('<option> No land available</option>')
                    return
                }
                hasCompanies = true;
                $('#order_item').html(response)


            }
        })
    }



    function addCartItem(file, name) {


        validfile = true;

        $.each(selected_items, function(index, value) {
            if (value.itemCode == obj.itemCode) {
                validItem = false;
            }
        });


        if (validItem == true) {
            selected_items.push(obj);
        } else {
            alert("Item already added to cart!");
        }


        $("#cart_items").empty();

        $("#cart_item_count").html(selected_items.length)
    }



    $(document).ready(function() {
        $("#myTable").on('click', '.btnDelete', function() {
            $(this).closest('tr').remove();
        });
    });


    function performClick(docFile) {
        var elem = document.getElementById(docFile);
        if (elem && document.createEvent) {
            var evt = document.createEvent("MouseEvents");
            evt.initEvent("click", true, false);
            elem.dispatchEvent(evt);
        }
    }

    //Removing a file form the list
    function remove_file() {
        var td = event.target.parentNode;
        var tr = td.parentNode;
        tr.parentNode.removeChild(tr);
    }


    // adding a file to the list
    function addDocFile() {


        var addStatus = false;
        var docNum = 0;
        $('#fileTable tr').each(function() {

            var fileName = $(this).find(".docFileName").val();
            var filePath = $.trim($(this).find(".docFile").val());

            if (fileName == "") {
                swal("Error", "Sorry, file name is required", "error");
                addStatus = false;
                return false;

            } else if (filePath == "") {
                swal("Error", "Sorry, invalid file selected", "error");
                addStatus = false;
                return false;
            } else {
                addStatus = true;

                $(this).find(".docFileName").attr("name", "docFileTitle" + docNum);
                $(this).find(".docFile").attr("name", "docFile[]")
                $(this).find(".docFileName").attr("readonly", true);
                $(this).find("#addDoc").hide();
                $(this).find("#removeDoc").show();

            }


            docNum++;


        })

        if (addStatus == true) {
            $("#fileTable").append(
                '<tr> <td class="col-xl-4 col-lg-4 col-md-4 col-sm-12"><input type="text" placeholder="" class="docFileName form-control"> </td><td class="col-xl-5 col-lg-5 col-md-4 col-sm-12 m-3"> <input type="file" placeholder="Select file" accept="image/png, image/gif, image/jpg, image/jpeg, application/pdf,application/vnd.ms-excel"  class="docFile custom-file-label mt-3">  </td> <td class="col-xl-3 col-lg-3 col-md-4 col-sm-12"> <button id="addDoc" type="button" class="btn btn-fill-md text-15 bg-primary text-light" onclick="addDocFile()"> Add Document</button>  <button id="removeDoc" type="button" style="display:none;" class="btn btn-fill-md text-15 bg-danger text-light" onclick="remove_file()">Remove </button> </td> </tr>'
            );
        }


    }
</script>