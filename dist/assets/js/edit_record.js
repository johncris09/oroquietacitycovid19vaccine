"use strict";

// Class definition
var EditRecord = function () {
    var _init = function () {  

        var validation;

        validation = FormValidation.formValidation(
            KTUtil.getById("update-record-form"),
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
            $('#update-record-btn').click();
            return false;    //<---- Add this line
          }
        });


        $('#update-record-btn').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {

                if (status == 'Valid') {
                    $.ajax({
                        url: $("#update-record-form").attr('action'),
                        method: $("#update-record-form").attr('method'),
                        data: $("#update-record-form").serialize(),
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
                                    // $("#update-record-form")[0].reset()
                                    // $('input[name="lastname"]').focus()
                                    // KTUtil.scrollTop()
                                    window.location.href = BASE_URL + 'record'
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
    EditRecord.init();
});