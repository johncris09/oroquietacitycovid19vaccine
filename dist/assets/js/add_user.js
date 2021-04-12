"use strict";

// Class definition
var AddUser = function () {
    var _init = function () {  

        var validation;

        validation = FormValidation.formValidation(
            KTUtil.getById("add-user-form"),
            {
                fields: {
                    lastname: {
                        validators: {
                            notEmpty: {
                                message: 'Last Name is required'
                            }
                        }
                    },
                    firstname: {
                        validators: {
                            notEmpty: {
                                message: 'First Name is required'
                            }
                        }
                    },
                    username: {
                        validators: {
                            notEmpty: {
                                message: 'Username is required'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Password is required'
                            },
                            stringLength: {
                                min: 8,
                                message: 'Password must be at least 8 characters'
                            },
                        }
                    },
                    confirm_password: {
                        validators: {
                            notEmpty: {
                                message: 'Confirm Password is required'
                            },
                            identical: {
                                compare: function() {
                                    return $('input[name="password"]').val()
                                },
                                message: 'The password and confirm password are not the same'
                            }
                        }
                    },
                    roletype: {
                        validators: {
                            notEmpty: {
                                message: 'Role Type is required'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    bootstrap: new FormValidation.plugins.Bootstrap(),
                }
            }
        ); 

        KTUtil.getById("add-user-form").querySelector('[name="password"]').addEventListener('input', function() {
            validation.revalidateField('confirm_password');
        });


         $('input').keypress(function (e) {
          if (e.which == 13) {
            $('#save-btn').click();
            return false;    //<---- Add this line
          }
        });


        $('#save-btn').on('click', function (e) {
            e.preventDefault(); 

            validation.validate().then(function(status) {

                if (status == 'Valid') {
                    $.ajax({
                        url: $("#add-user-form").attr('action'),
                        method: $("#add-user-form").attr('method'),
                        data: $("#add-user-form").serialize(),
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
                            // console.info(data);
                            if(!data.response){
                                ERROR_ALERT_SOUND.play()
                                Swal.fire({
                                    title: data.message,
                                    icon: "error",
                                    showCancelButton: true, 
                                })
                            }else{
                                SUCCESS_ALERT_SOUND.play()
                                Swal.fire({
                                    title: data.message,
                                    icon: "success",
                                    showCancelButton: true, 
                                }).then(function(result) {
                                    $("#add-user-form")[0].reset()
                                    $('input[name="lastname"]').focus()
                                    KTUtil.scrollTop()
                                });
                            }  
                        },
                        error: function (xhr, status, error) {
                            console.info(xhr.responseText);
                        }
                    });
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
    AddUser.init();
});