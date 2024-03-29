"use strict";

// Class definition
var AddValidated = function () {
    var _init = function () {  

        var validation;

        validation = FormValidation.formValidation(
            KTUtil.getById("add-validated-form"),
            {
                fields: {
                    lastname: {
                        validators: {
                            notEmpty: {
                                message: 'Lastname is required'
                            }
                        }
                    },
                    firstname: {
                        validators: {
                            notEmpty: {
                                message: 'Firstname is required'
                            }
                        }
                    },
                    gender: {
                        validators: {
                            notEmpty: {
                                message: 'Gender is required'
                            }
                        }
                    },
                    registeredvoter: {
                        validators: {
                            notEmpty: {
                                message: 'This field is required'
                            }
                        }
                    },
                    purok: {
                        validators: {
                            notEmpty: {
                                message: 'This field is required'
                            }
                        }
                    },
                    barangay: {
                        validators: {
                            notEmpty: {
                                message: 'This field is required'
                            }
                        }
                    },
                    birthdate: {
                        validators: {
                            notEmpty: {
                                message: 'This field is required'
                            }
                        }
                    },
                    occupation: {
                        validators: {
                            notEmpty: {
                                message: 'This field is required'
                            }
                        }
                    },
                    date_registered: {
                        validators: {
                            notEmpty: {
                                message: 'This field is required'
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
            $('#add-validated-btn').click();
            return false;    //<---- Add this line
          }
        });


        $('#add-validated-btn').on('click', function (e) {
            e.preventDefault(); 

            validation.validate().then(function(status) {

                if (status == 'Valid') {
                    $.ajax({
                        url: $("#add-validated-form").attr('action'),
                        method: $("#add-validated-form").attr('method'),
                        data: $("#add-validated-form").serialize(),
                        dataType: "json",
                        beforeSend: function () {
                            KTApp.block('body', {
                                overlayColor: '#000000',
                                state: 'primary',
                                message: 'Please wait ...'
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
                                    $("#add-validated-form")[0].reset()
                                    $('input[name="lastname"]').focus()
                                    KTUtil.scrollTop()
                                });
                            }  
                        },
                        error: function (xhr, status, error) {
                            // console.info([xhr, status, error])
                            console.info(xhr.responseText);
                        }
                    });
                } else {
                    KTUtil.scrollTop();
                }
            });
            
            // call keep alive
            $.ajax({
                url: BASE_URL + 'dashboard/keep_alive',
                method: "post",
                success: function (data) {
                    console.info(data);
                },
                error: function (xhr, status, error) {
                    console.info(xhr.responseText);
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
    AddValidated.init();
});
