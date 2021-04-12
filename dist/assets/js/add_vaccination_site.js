"use strict";

// Class definition
var AddVaccinationSite = function () {
    var _init = function () {  

        var validation;

        validation = FormValidation.formValidation(
            KTUtil.getById("add-vaccination-site-form"),
            {
                fields: {
                    vaccination_site: {
                        validators: {
                            notEmpty: {
                                message: 'Last Name is required'
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
         

         $('input').keypress(function (e) {
          if (e.which == 13) {
            $('#add-vaccination-site-btn').click();
            return false;    //<---- Add this line
          }
        });


        $('#add-vaccination-site-btn').on('click', function (e) {
            e.preventDefault(); 

            validation.validate().then(function(status) {

                if (status == 'Valid') {
                    $.ajax({
                        url: $("#add-vaccination-site-form").attr('action'),
                        method: $("#add-vaccination-site-form").attr('method'),
                        data: $("#add-vaccination-site-form").serialize(),
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
                                    $("#add-vaccination-site-form")[0].reset()
                                    $('input[name="vaccination_site"]').focus()
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
    AddVaccinationSite.init();
});