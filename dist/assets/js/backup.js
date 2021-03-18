"use strict";

// Class definition
var BackUp = function () {

    var _init = function () {

        $(document).on('click','#export',function (e) {
             $.ajax({
                url       : BASE_URL + 'backup/export',
                method    : "POST",
                dataType  : "json",
                beforeSend: function () {
                    KTApp.block('body', {
                        overlayColor: '#000000',
                        state       : 'primary',
                        message     : 'Processing...'
                    });
                },
                complete: function () {
                    KTApp.unblock('body');
                },
                success: function (data) {
                    if(data.response){
                        Swal.fire("Good job!", data.message, "success");
                    } 
                },
                error: function (xhr, status, error) {
                    // error here ... 
                    console.info(xhr.responsetext); 
                },
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
    BackUp.init();
});