"use strict";


var SearchPerson = function () {
    var _init = function () { 

        $('input#search-person').typeahead({
            hint: true,
            // highlight: true,
            minLength: 1,
            itemselected: function (val) {
                // $this.$element.val(val)
                console.info(123)
            },
        }, 
        {
            limit: 10,
            async: true,
            source: function (query, process, processAsync) {
                return $.ajax({
                    url: BASE_URL + 'record/search/' + $('input#search-person').val(),
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        // console.info(data)
                        processAsync($.map(data, function (row) {
                            var first_name = row.firstname;
                            var middle_name = row.middlename;
                            var last_name = row.lastname;
                            var full_name = first_name + ' ' + middle_name + ' ' + last_name ;
                            return [{
                                'id': row.id,
                                'full_name': full_name
                            }];
                        }));
                    },
                    error: function (jqXHR, except) {
                        console.info(jqXHR.responseText) 
                    }
                });
            },
            name: 'resident',
            displayKey: 'full_name',
            templates: {
                header: '<li class="ml-2 text-muted"><small>Resident</small></li>',
                suggestion: function (data) {
                    return '<li class="menu-link">' + data.full_name + '</li>'
                }
            },
        }, )
        .bind('typeahead:selected', function (obj, data, name) {
            $('input#search-person').val(data.full_name)
            $('input[name="id"]').val(data.id)
        })
        .on('typeahead:cursorchanged', function (e, data, name) {
            try {
                $('input#search-person').val().val(data.full_name)
            } catch (error) {
                // error here...
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

// Class definition
var EditVaccinated = function () {
    var _init = function () {  

        var validation;

        validation = FormValidation.formValidation(
            KTUtil.getById("update-vaccinated-form"),
            {
                fields: {
                    id: {
                        validators: {
                            notEmpty: {
                                message: 'Unknown Person'
                            }
                        }
                    },
                    person_name: {
                        validators: {
                            notEmpty: {
                                message: 'Person Name is required'
                            }
                        }
                    },
                    dose: {
                        validators: {
                            notEmpty: {
                                message: 'Dose is required'
                            }
                        }
                    },
                    batch_number: {
                        validators: {
                            notEmpty: {
                                message: 'Batch # is required'
                            }
                        }
                    },
                    date_given: {
                        validators: {
                            notEmpty: {
                                message: 'Date Given is required'
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
            $('#update-vaccinated-btn').click();
            return false;    //<---- Add this line
          }
        });


        $('#update-vaccinated-btn').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {

                if (status == 'Valid') {
                    $.ajax({
                        url: $("#update-vaccinated-form").attr('action'),
                        method: $("#update-vaccinated-form").attr('method'),
                        data: $("#update-vaccinated-form").serialize(),
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
                                    // $("#update-vaccinated-form")[0].reset()
                                    // $('input[name="lastname"]').focus()
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

var UnknownPerson = function () {
    var _init = function () {  

        var input = $('input[name="person_name"]');
            input.on('keydown', function() {
            var key = event.keyCode || event.charCode;

            if( key == 8 || key == 46 )
                $('input[name="id"]').val('');
        });
    };

    return {
        // Init
        init: function () {
            _init();
        },
    };
}(); 

jQuery(document).ready(function () {
    EditVaccinated.init();
    SearchPerson.init();
    UnknownPerson.init();
});