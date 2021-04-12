"use strict";

// Class definition
var EditValidate = function () {
    var _init = function () {  

        var validation;

        validation = FormValidation.formValidation(
            KTUtil.getById("update-validated-form"),
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
                    // governmentissuedid: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'This field is required'
                    //         }
                    //     }
                    // },
                    // idnumber: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'This field is required'
                    //         }
                    //     }
                    // },
                    // contactnumber: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'This field is required'
                    //         }
                    //     }
                    // },
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
            $('#update-validated-btn').click();
            return false;    //<---- Add this line
          }
        });


        $('#update-validated-btn').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {

                if (status == 'Valid') {
                    $.ajax({
                        url: $("#update-validated-form").attr('action'),
                        method: $("#update-validated-form").attr('method'),
                        data: $("#update-validated-form").serialize(),
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
                                    // $("#update-validated-form")[0].reset()
                                    // $('input[name="lastname"]').focus()
                                    // KTUtil.scrollTop()
                                    window.location.href = BASE_URL + 'validated'
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
    EditValidate.init();
});