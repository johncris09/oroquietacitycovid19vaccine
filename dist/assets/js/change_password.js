"use strict";

// Class definition
var ChangePassword = function () {
    var _init = function () {  

        var validation;

        validation = FormValidation.formValidation(
            KTUtil.getById("change-password-form"),
            {
                fields: {
                    current_password: {
                        validators: {
                            notEmpty: {
                                message: 'Current Password is required'
                            }
                        }
                    },
                    new_password: {
                        validators: {
                            notEmpty: {
                                message: 'New Password is required'
                            },
                        }
                    },
                    confirm_password: {
                        validators: {
                            notEmpty: {
                                message: 'Confirm Password is required'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            }
        );

        $('input').keypress(function (e) {
          if (e.which == 13) {
            $('#change-password-btn').click();
            return false;    //<---- Add this line
          }
        });


        $('#change-password-btn').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {

                if (status == 'Valid') {
                    var form = $('#change-password-form') 
                    if($('input[name="new_password"]').val() == $('input[name="confirm_password"]').val() ){
                        $.ajax({
                            url: form.attr('action'),
                            method: form.attr('method'),
                            data: form.serialize(),
                            dataType: "json",
                            beforeSend: function () {
                                $.blockUI({ 
                                    message: '<h1><img src="' + BASE_URL + 'dist/assets/media/img/loader.gif" /> Please wait ...</h1>', 
                                    css: { 
                                        border: '0px !emportant', 
                                        textAlign:      'center', 
                                    },
                                    showOverlay: false,
                                    centerX: true,
                                    centerY: true, 
                                });
                            },
                            complete: function () {
                                KTApp.unblock('body');
                            },
                            success: function (data) {
                                console.info(data);
                                if(!data.response){
                                    Swal.fire({
                                        title: data.message,
                                        icon: "error",
                                        showCancelButton: true, 
                                    })
                                }else{
                                    Swal.fire({
                                        title: data.message,
                                        icon: "success",
                                        showCancelButton: true, 
                                    }).then(function(result) {
                                        form[0].reset()
                                        $('input[name="current_password"]').focus()
                                        KTUtil.scrollTop()
                                    });
                                }  
                            },
                            error: function (xhr, status, error) {
                                console.info(xhr.responseText);
                            }
                        });

                    }else{
                        Swal.fire({
                            title: 'Password and Confirm Password dont\' match',
                            icon: "error",
                            showCancelButton: true, 
                        })
                    }
                } else {
                    KTUtil.scrollTop();
                }
            });



        });
    };

    return {
        // Init
        init: function () {
            _init();
        },
    };
}(); 

// Class Initialization
jQuery(document).ready(function () {
    ChangePassword.init();
});