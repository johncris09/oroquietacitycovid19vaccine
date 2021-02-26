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
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            }
        ); 

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