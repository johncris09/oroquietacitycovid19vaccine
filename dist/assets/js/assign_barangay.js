"use strict";

// Class definition
var AssignBarangay = function () {
    var _init = function () {   

        var vaccination_site_id, barangay_id;

        $('#assign-barangay-btn').on('click', function (e) {
            e.preventDefault();
            // truncate table
            //  $.ajax({
            //     url: BASE_URL + 'vaccination_site/truncate_table',
            //     method: 'post',
            //     dataType: "json",
            //     success: function (data) { 
            //     },
            //     error: function (xhr, status, error) {
            //         console.info(xhr.responseText);
            //     }
            // });
            

            var arr = [];
            $( ".text-center>h4" ).each(function( x ) {
                var barangay = [];
                $('ul.assigned-barangay[data-vaccination-site-id="'+ $(this).data('vaccinationSiteId') +'"]>li').each(function(y){
                    barangay.push( $(this).data('barangayId') );
                });
                arr.push([{vaccination_site: $(this).data('vaccinationSiteId') }, { barangay: barangay}])

            });



            // console.info(arr)

            $.ajax({
                url: BASE_URL + 'vaccination_site/insert_assign_barangay',
                method: 'post',
                data: {
                    data: arr
                },
                // data: {
                //     vaccination_site: vaccination_site_id,
                //     barangay: barangay_id,
                // },
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
                    // console.info(data)

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
            // console.info(barangay)
                

                // vaccination_site_id = $(this).data('vaccinationSiteId');
                // $('ul.assigned-barangay[data-vaccination-site-id="'+vaccination_site_id+'"]>li').each(function(i){
                //     barangay_id = $(this).data('barangayId')
                //     $.ajax({
                //         url: BASE_URL + 'vaccination_site/insert_assign_barangay',
                //         method: 'post',
                //         data: {
                //             vaccination_site: vaccination_site_id,
                //             barangay: barangay_id,
                //         },
                //         dataType: "json",
                //         beforeSend: function () {
                //             $.blockUI({ 
                //             message: '<h1><img src="' + BASE_URL + 'dist/assets/media/img/loader.gif" /> Please wait ...</h1>', 
                //             css: { 
                //             border: '0px !emportant', 
                //             textAlign:      'center', 
                //             },
                //             showOverlay: false,
                //             centerX: true,
                //             centerY: true, 
                //             });
                //         },
                //         complete: function () {
                //             KTApp.unblock('body');
                //         },
                //         success: function (data) {

                //         },
                //         error: function (xhr, status, error) {
                //             console.info(xhr.responseText);
                //         }
                //     }); 



                // })
                // Swal.fire({
                //     title: "Data inserted successfully",
                //     icon: "success",
                //     showCancelButton: true, 
                //     }).then(function(result) {
                //         location.reload();
                // });
            // });
            
            // call keep alive
            // 
            // 
            // console.info( vaccination_site )
            // console.info( arr )

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
    AssignBarangay.init();
});
