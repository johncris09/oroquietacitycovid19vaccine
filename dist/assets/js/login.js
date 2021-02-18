"use strict";

// Class definition
var Login = function () {
    var _init = function () {  

         var validation;

        validation = FormValidation.formValidation(
            KTUtil.getById("login-form"),
            {
                fields: {
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
                    }
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
            $('#login-btn').click();
            return false;    //<---- Add this line
          }
        });

        $('#login-btn').on('click', function (e) {
            e.preventDefault(); 

            validation.validate().then(function(status) {

                if (status == 'Valid') {
                    $.ajax({
                        url: $("#login-form").attr('action'),
                        method: $("#login-form").attr('method'),
                        data: $("#login-form").serialize(),
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
                                window.location.reload();
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

var ShowPassword = function () {
    var _init = function () {  


        $('.show-password').on('click', function (e) {
            e.preventDefault();
            $(this).toggleClass('fa-eye fa-eye-slash');
            var input = $('input[name="password"]')
            if(input.attr("type") === "password"){
                input.attr("type", "text")
                $(this).closest('span').attr('title', 'Hide Password')
            }else{
                input.attr("type", "password")
                $(this).closest('span').attr('title', 'Show Password')
            }

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
    Login.init();
    ShowPassword.init();
});