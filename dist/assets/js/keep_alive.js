"use strict";

var KeepAlive = function () {
    
    var _init = function () {

        $.ajax({
            url: BASE_URL + 'dashboard/keep_alive',
            method: "post",
            success: function (data) {
                // console.info(data);
            },
            error: function (xhr, status, error) {
                console.info(xhr.responseText);
            }
        });

        setInterval(function(){
            $.ajax({
                url: BASE_URL + 'dashboard/detect_online_user',
                method: "post",
                dataType:'json',
                success: function (data) {
                    // console.info(data);
                    if(data.response){
                        window.location.href = BASE_URL + 'dashboard/signout'
                    }
                    // if(data){
                    //     location.href = BASE_URL + 'dashboard/signout'

                    // }
                },
                error: function (xhr, status, error) {
                    console.info(xhr.responseText);
                }
            });
        }, 1000);

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
    KeepAlive.init();
});


