 const base_url = site_url;
$(document).ready(function () {
    $("#pageloader").show();
    /*$('#sample_form').on('submit', function (event) {
        event.preventDefault();
        //alert('ok');
        $.ajax({
            url: base_url + "submit-form",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function () { 
                $('#submit_button').hide();
                $("#loading_button").show();
            },
            success: function (data) {
                 $('#submit_button').show();
                $("#loading_button").hide();
                if (data.error) {
                $('#displayError').show();
                console.log(data);
                    if (data.yourName != '') {  
                        $("#yourName").focus();
                        $('#displayError').html(data.yourName);
                    } 
                    else if (data.yourEmail != '') { 
                        $("#yourEmail").focus();
                        $('#displayError').html(data.yourEmail);
                    }  
                    else if (data.yourContact != '') { 
                        $("#yourContact").focus();
                        $('#displayError').html(data.yourContact);
                    } 
                    else if (data.countryName != '') { 
                        $("#countryName").focus();
                        $('#displayError').html(data.countryName);
                    }  */
                    /*else if (data.companyName != '') { 
                        $("#companyName").focus();
                        $('#displayError').html(data.companyName);
                    }  
                    else if (data.jobName != '') { 
                        $("#jobName").focus();
                        $('#displayError').html(data.jobName);
                    }  
                    else if (data.RB != '') { 
                        $("#RB").focus();
                        $('#displayError').html(data.RB);
                } 
                    else if (data.region != '') { 
                        $("#region").focus();
                        $('#displayError').html(data.region);
                } 
                    else if (data.comments != '') { 
                        $("#comments").focus();
                        $('#displayError').html(data.comments);
                } */
               /* }
                if (data.success) {
                    $('.errorData').html('');
                    report = data.report;
                    added_on = data.added_on;
                    if (data.type == 1) {
                        url = base_url + "thankyou/enquiry?success=1&id=" + report;
                    }
                    if (data.type == 2) {
                        url = base_url + "thankyou/request?success=1&id=" + report;
                    }
                    if (data.type == 3) {
                        url = base_url + "thankyou/discount?success=1&id=" + report;
                    }
                    location.href = url;
                }
               $('#submit_button').show();
                $("#loading_button").hide();
            }
        })
    }); */
    
    $('#sample_form').on('submit', function (event) {
        event.preventDefault();
        //alert('ok');
        $.ajax({
            url: base_url + "submit-form",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function () { 
                $('#submit_button1').hide();
                $("#loading_button1").show();
            },
            success: function (data) {
                 $('#submit_button1').show();
                $("#loading_button1").hide();
                if (data.error) {
                $('#displayError').show();
                console.log(data);
                    if (data.yourName != '') {  
                        $("#yourName").focus();
                        $('#displayError').html(data.yourName);
                    } 
                    else if (data.yourEmail != '') { 
                        $("#yourEmail").focus();
                        $('#displayError').html(data.yourEmail);
                    }  
                    /*else if (data.yourContact != '') { 
                        $("#yourContact").focus();
                        $('#displayError').html(data.yourContact);
                    } 
                    else if (data.country != '') { 
                        $("#country").focus();
                        $('#displayError').html(data.country);
                    }
                   else if (data.state != '') { 
                        $("#state").focus();
                        $('#displayError').html(data.state);
                    } */
                    /*else if (data.countryName != '') { 
                        $("#countryName").focus();
                        $('#displayError').html(data.countryName);
                    } */
                    /*else if (data.companyName != '') { 
                        $("#companyName").focus();
                        $('#displayError').html(data.companyName);
                    }  
                    else if (data.jobName != '') { 
                        $("#jobName").focus();
                        $('#displayError').html(data.jobName);
                    }  
                    else if (data.RB != '') { 
                        $("#RB").focus();
                        $('#displayError').html(data.RB);
                } 
                    else if (data.region != '') { 
                        $("#region").focus();
                        $('#displayError').html(data.region);
                } 
                    else if (data.comments != '') { 
                        $("#comments").focus();
                        $('#displayError').html(data.comments);
                } */
                }
                if (data.success) {
                    $('.errorData').html('');
                    report = data.report;
                    added_on = data.added_on;
                    if (data.type == 1) {
                        url = base_url + "thankyou/enquiry?success=1&id=" + report;
                    }
                    if (data.type == 2) {
                        url = base_url + "thankyou/request?success=1&id=" + report;
                    }
                    if (data.type == 3) {
                        url = base_url + "thankyou/discount?success=1&id=" + report;
                    }
                    location.href = url;
                }
               $('#submit_button1').show();
                $("#loading_button1").hide();
            }
        })
    });
   
   $('#contact-form').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: base_url + "submit-form-contact-us",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function () { 
                $('#submit_button').hide();
                $("#loading_button").show();
                 $('#display_error_div').hide();
            },
            success: function (data) {
                 $('#submit_button').show();
                $("#loading_button").hide();
                if (data.error) {
                    $('#display_error_div').show();
                    if (data.yourName != '') {
                        //$('#yourNameError').html(data.yourName); 
                        $("#yourName").focus();
                    } 
                    else if (data.companyName != '') { 
                        $("#companyName").focus();
                    }  
                    else if (data.countryName != '') { 
                        $("#countryName").focus();
                    } 
                    else if (data.yourContact != '') { 
                        $("#yourContact").focus();
                    } 
                    else if (data.yourEmail != '') { 
                        $("#yourEmail").focus();
                    }  
                    else if (data.jobName != '') { 
                        $("#jobName").focus();
                    }  
                    else if (data.comments != '') { 
                        $("#comments").focus();
                    }  
                }
                if (data.success) {
                     $('#display_error_div').hide(); 
                    url = base_url + "contact-thank-you"; 
                    location.href = url;
                }
               $('#submit_button').show();
                $("#loading_button").hide();
            }
        })
    });
    $('#buynow').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: base_url + "submit-buy-now",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function () {
                $('#submit_button').attr('disabled', 'disabled');
                $("#pageloader").show();
            },
            success: function (data) {
                $('#submit_button').removeAttr('disabled');
                if (data.error) {
                    if (data.yourNameError != '') {
                        $('#yourNameError').html(data.yourNameError);
                        $("#yourName").focus();
                    } else {
                        $('#yourNameError').html('');
                    }
                    if (data.companyNameError != '') {
                        $('#companyNameError').html(data.companyNameError);
                        $("#companyName").focus();
                    } else {
                        $('#companyNameError').html('');
                    }
                    if (data.jobNameError != '') {
                        $('#jobNameError').html(data.jobNameError);
                        $("#jobName").focus();
                    } else {
                        $('#jobNameError').html('');
                    }
                    if (data.yourEmailError != '') {
                        $('#yourEmailError').html(data.yourEmailError);
                        $("#yourEmail").focus();
                    } else {
                        $('#yourEmailError').html('');
                    }
                    if (data.yourContactError != '') {
                        $('#yourContactError').html(data.yourContactError);
                        $("#yourContact").focus();
                    } else {
                        $('#yourContactError').html('');
                    }
                    if (data.yourAddressError != '') {
                        $('#yourAddressError').html(data.yourAddressError);
                        $("#yourAddress").focus();
                    } else {
                        $('#yourAddressError').html('');
                    }
                    if (data.yourCountryError != '') {
                        $('#yourCountryError').html(data.yourCountryError);
                        $("#yourCountry").focus();
                    } else {
                        $('#yourCountryError').html('');
                    }
                    if (data.yourCityError != '') {
                        $('#yourCityError').html(data.yourCityError);
                        $("#yourCity").focus();
                    } else {
                        $('#yourCityError').html('');
                    }
                    if (data.yourZipError != '') {
                        $('#yourZipError').html(data.yourZipError);
                        $("#yourZip").focus();
                    } else {
                        $('#yourZipError').html('');
                    }
                    if (data.yourLicenceError != '') {
                        $('#yourLicenceError').html(data.yourLicenceError);
                        $("#yourLicence").focus();
                    } else {
                        $('#yourLicenceError').html('');
                    }
                    if (data.paymentTypeError != '') {
                        $('#paymentTypeError').html(data.paymentTypeError);
                        $("#paymentType").focus();
                    } else {
                        $('#paymentTypeError').html('');
                    }
                }
                if (data.success) {
                    $('.errorData').html('');
                     if(data.payment == 1) {
                        $('#paypalForm').submit();
                     }
                     if(data.payment == 2) {
                     var stripe = Stripe(data.publisher_key); 
                     return stripe.redirectToCheckout({ sessionId: data.session_id });
                     }
                }
                $('#submit_button').removeAttr('disabled');
            }
        })
    }); 
    
    $('#subscribeButton').on('click',function(){
        var email = $('#email').val();
        if(email == "") {
            $('#email').focus();
            return false;
        }
        else if(isEmail(email)) {
              $.ajax({
            url: base_url + "Homepage/SubscriptionMail",
            method: "POST",
            data: {'email' : email},
            dataType: "json", 
            success: function (data) {
                 $('#submit_button').show();
                $("#loading_button").hide();
                if (data.error) {
                     alert("Some Error Occured");
                }
                if (data.success) {
                    alert("Thank you for your subscription.");  
                    $("email").val("");
                }
               
            }
        })
 
        }
        else {
            alert("no email");
        }
        
    })
    function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
});

  
 