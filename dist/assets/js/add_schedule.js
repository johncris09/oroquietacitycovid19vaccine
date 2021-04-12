"use strict";

// Class definition
var GenerateSchedule = function () {
    var _init = function () {  

        var validation;

        validation = FormValidation.formValidation(
            KTUtil.getById("generate-schedule-form"),
            {
                fields: {
                    vaccination_site: {
                        validators: {
                            notEmpty: {
                                message: 'Vaccination Site is required'
                            }
                        }
                    },
                    date: {
                        validators: {
                            notEmpty: {
                                message: 'Date is required'
                            },
                            date: {
                                format: 'MM/DD/YYYY',
                                message: 'The value is not a valid date',
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
            $('#generate-schedule-btn').click();
            return false;    //<---- Add this line
          }
        });


        $('#generate-schedule-btn').on('click', function (e) {
            e.preventDefault(); 

            validation.validate().then(function(status) {

                if (status == 'Valid') {
                    $.ajax({
                        url: $("#generate-schedule-form").attr('action'),
                        method: $("#generate-schedule-form").attr('method'),
                        data: $("#generate-schedule-form").serialize(),
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
                            $('#generate-schedule-table > tbody').html('');  

                            if( data.length > 0 ){
                                $('#generate-schedule-table > tbody').html(data);  
                            }else{

                                ERROR_ALERT_SOUND.play()
                                Swal.fire({
                                    title: "No record",
                                    icon: "error",
                                    showCancelButton: true,
                                })
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


var InsertSchedule = function () {
    var _init = function () {   

        $('#insert-schedule-btn').on('click', function (e) {
            e.preventDefault(); 

            // console.info( e )
            var vaccination_site = $('select[name="vaccination_site"]').val()
            var date = $('input[name="date"]').val()
            console.info(vaccination_site)

            var record_id = new Array();
            $('#generate-schedule-table td:nth-child(4)').each(function () {
                record_id.push($(this).data('recordId'));
            });

            if( record_id.length > 0 ){
                $.ajax({
                    url: BASE_URL + 'schedule/insert',
                    method: 'post',
                    data: {
                        date: date,
                        vaccination_site : vaccination_site,
                        record_id : record_id
                    },
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
                        console.info(data)
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
                                location.reload()
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.info(xhr.responseText);
                    }
                });

            }else{
                Swal.fire({
                    title: "Unable to save schedule",
                    text: "Please generate schedule first!",
                    icon: "info",
                    showCancelButton: true, 
                })
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
    GenerateSchedule.init();
    InsertSchedule.init();
});