"use strict";
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#min').val(), 10 );
        var max = parseInt( $('#max').val(), 10 );
        var age = parseFloat( data[8] ) || 0; // use data for the age column
 
        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && age <= max ) ||
             ( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age <= max ) )
        {
            return true;
        }
        return false;
    }
);

$.fn.dataTable.ext.search.push(
    function (settings, data, dataIndex) {
        var min       = $('input[name="date-range-start"]').datepicker('getDate');
        var max       = $('input[name="date-range-end"]').datepicker('getDate');
        var startDate = new Date(data[4]);
        // console.info(startDate);
        if (min == null && max == null) return true;
        if (min == null && startDate <= max) return true;
        if (max == null && startDate >= min) return true;
        if (startDate <= max && startDate >= min) return true;
        return false;
    }
);

$('input[name="date-range-start"]').datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
$('input[name="date-range-end"]').datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });


$('#date-range').datepicker({
    todayHighlight: true,
    templates: {
        leftArrow: '<i class="la la-angle-left"></i>',
        rightArrow: '<i class="la la-angle-right"></i>',
    },
    dateFormat: 'yyyy/mm/dd',
});

// Class definition
var Log = function () {
    var _init = function () {

        // client side proccessing
        var table = $('#log-table').DataTable({ 
             "scrollY": 450,
             "scrollX": true,
			// responsive: true, 
			 dom:"<'row'<'col-sm-4 col-xs-4'l><'col-sm-4 col-xs-4 text-center'B><'col-sm-4 col-xs-4'f>>" +
                    "<'row'<'col-sm-12 col-xs-12'tr>>" +
                "<'row'<'col-sm-5 col-xs-5'i><'col-sm-7 col-xs-7'p>>",
			// buttons: ["print", "excelHtml5", "pdfHtml5", "colvis"],
            buttons:   [
                // {
                //     extend: 'print',
                //     className: "btn btn-info btn-sm",
                //     text: '<i class="fas fa-print"></i>',
                //     title: 'Covid-19 Vaccine Pre Registration',
                //     repeatingHead: {
                //         logo: 'https://www.google.co.in/logos/doodles/2018/world-cup-2018-day-22-5384495837478912-s.png',
                //         logoPosition: 'right',
                //         logoStyle: '',
                //         title: '<h3>Sample Heading</h3>'
                //     },
                //     titleAttr: 'Print',
                //     autoPrint: false,
                //     exportOptions: {
                //       columns: ':visible'
                //     },
                //     customize: function ( win ) {
                //         $(win.document.body).find( 'table' ).find('td:last-child, th:last-child').remove();
                //         $(win.document.body)
                //             .css( 'font-size', '9pt' )

                //         $(win.document.body).find( 'table' )
                //             .addClass( 'compact' )
                //             .css( 'font-size', 'inherit' );

                //         var last = null;
                //         var current = null;
                //         var bod = []; 
                //         var css = '@page { size: landscape;margin: 0; border: none; }',
                //             head = win.document.head || win.document.getElementsByTagName('head')[0],
                //             style = win.document.createElement('style');
         
                //         style.type = 'text/css';
                //         style.media = 'print';
         
                //         if (style.styleSheet)
                //         {
                //           style.styleSheet.cssText = css;
                //         }
                //         else
                //         {
                //           style.appendChild(win.document.createTextNode(css));
                //         }
         
                //         head.appendChild(style);
                //     }
                //     // customize: function(win)
                //     // {
                //     //     $(win.document.body).find( 'table' ).find('td:last-child, th:last-child').remove();
         
                //     //     var last = null;
                //     //     var current = null;
                //     //     var bod = [];
         
                //     //     var css = '@page { size: landscape; }',
                //     //         head = win.document.head || win.document.getElementsByTagName('head')[0],
                //     //         style = win.document.createElement('style');
         
                //     //     style.type = 'text/css';
                //     //     style.media = 'print';
         
                //     //     if (style.styleSheet)
                //     //     {
                //     //       style.styleSheet.cssText = css;
                //     //     }
                //     //     else
                //     //     {
                //     //       style.appendChild(win.document.createTextNode(css));
                //     //     }
         
                //     //     head.appendChild(style);
                //     // }
                // },
                {
                    extend: 'excelHtml5',
                    className: "btn btn-info btn-sm",
                    text: '<i class="fas fa-file-excel"></i>',
                    titleAttr: 'Excel',
                    columns: ':not(:first-child)',
                    exportOptions: {
                      columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    className: "btn btn-info btn-sm",
                    text: '<i class="fas fa-file-pdf"></i>',
                    titleAttr: 'Pdf',
                    title: 'Task Logs',
                    download: 'open',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    exportOptions: {
                      columns: ':visible'
                    }
                },
                {
                    extend: 'colvis',
                    className: "btn btn-info btn-sm",
                    text: 'Column Visibility',
                    titleAttr: 'Column Visibility',
                    columns: ':not(:first-child)'
                },
                // {
                //   extend: 'colvis',
                //   className: "btn-sm",
                //   text: 'Colonne'
                // }, 
            ], 
            // scrollY: '50vh',
            // scrollX: true,
            // scrollCollapse: true,
            // buttons: [
            //     'print',
            //     'copyHtml5',
            //     'excelHtml5',
            //     'csvHtml5',
            //     'pdfHtml5',
            // ],
            ajax: {
                url: BASE_URL + 'log/get_log',
                type: 'POST',
                data: {
                    pagination: {
                        perpage: 50,
                    },
                },
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
            },
            columns: [
                {
					data: 'log_id',
				}, 
                // {
                //     data: 'Actions', responsivePriority: -1
                // },
                {
                    data  : 'log_id',
                    render: function(data, type, row, meta){ 
                        return meta.row + meta.settings._iDisplayStart +1;
                    }
                },
                {
                    data: 'description',
                },
                {
                    data: 'user',
                },
                {
                    data: 'date',
                },
                {
                    data: 'time',
                },
               
            ],
			select: {
				style: 'multi',
				selector: 'td:first-child .checkable',
			},
			headerCallback: function(thead, data, start, end, display) {
				thead.getElementsByTagName('th')[0].innerHTML = `
                    <label class="checkbox checkbox-single checkbox-solid checkbox-primary mb-0">
                        <input type="checkbox" value="" class="group-checkable"/>
                        <span></span>
                    </label>`;
			},
			// initComplete: function() {
   //              var counter = 0;
   //              this.api().columns().every(function() {
   //                  var column = this;
   //                  // console.info([counter, column.header().textContent] )
   //                  switch ( column.header().textContent ) {
   //                      case 'Purok':
   //                          column.data().unique().sort().each(function(d, j) {
   //                              $('.datatable-input[data-col-index="'+counter+'"]').append('<option value="' + d + '">' + d + '</option>');
   //                          });
   //                          break;
   //                      case 'Street':
   //                          column.data().unique().sort().each(function(d, j) {
   //                              $('.datatable-input[data-col-index="'+counter+'"]').append('<option value="' + d + '">' + d + '</option>');
   //                          });
   //                          break;
   //                      case 'Barangay':
   //                          column.data().unique().sort().each(function(d, j) {
   //                              $('.datatable-input[data-col-index="'+counter+'"]').append('<option value="' + d + '">' + d + '</option>');
   //                          });
   //                          break;
   //                      case 'Occupation':
   //                          column.data().unique().sort().each(function(d, j) {
   //                              $('.datatable-input[data-col-index="'+counter+'"]').append('<option value="' + d + '">' + d + '</option>');
   //                          });
   //                          break;
   //                  }
   //                  counter++
   //              });
   //          },
            columnDefs: [
				{
					targets: 0,
					orderable: false,
					render: function(data, type, full, meta) {
						return `
                        <label class="checkbox checkbox-single checkbox-primary mb-0">
                            <input type="checkbox" value="" class="checkable"/>
                            <span></span>
                        </label>`;
					},
				},
                // {
                //     targets  : 1,
                //     title    : 'Actions',
                //     orderable: false,
                //     render   : function(data, type, row, meta) { 
                //         var action  = '';

                //         if(ROLE_TYPE.toLowerCase() == 'super admin'){
                //             action =  '\
                //                 <div class = "dropdown dropdown-inline">\
                //                     <a href = "javascript:;" class = "btn btn-sm btn-clean btn-icon" data-toggle = "dropdown">\
                //                         <i class = "fa fa-cog text-primary"></i>\
                //                     </a>\
                //                     <div class = "dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                //                         <ul class = "nav nav-hoverable flex-column">\
                //                             <li class = "nav-item">\
                //                                 <a href="javascript:;" data-id="'+row.id+'" class="nav-link validate-log">\
                //                                     <i class = "nav-icon fas fa-stamp text-info"></i>\
                //                                     <span class = "nav-text text-info" title="Validte">Validate</span>\
                //                                 </a>\
                //                             </li>\
                //                             <li class = "nav-item">\
                //                                 <a href="'+BASE_URL+'log/view/'+row.id+'" class="nav-link">\
                //                                     <i class = "nav-icon fas far fa-eye text-primary"></i>\
                //                                     <span class = "nav-text text-primary" title="View Details">View Details</span>\
                //                                 </a>\
                //                             </li>\
                //                             <li class = "nav-item">\
                //                                 <a href="'+BASE_URL+'log/edit/'+row.id+'" class = "nav-link">\
                //                                     <i class = "nav-icon fas fa-pencil-alt text-warning"></i>\
                //                                     <span class = "nav-text text-warning" title="Edit Details">Edit Details</span>\
                //                                 </a>\
                //                             </li>\
                //                             <li class = "nav-item">\
                //                                 <a href="javascript:;" data-id="'+row.id+'" class="nav-link delete-log">\
                //                                     <i class = "nav-icon la la-trash text-danger"></i>\
                //                                     <span class = "nav-text text-danger" title="Delete">Delete</span>\
                //                                 </a>\
                //                             </li>\
                //                         </ul>\
                //                     </div>\
                //                 </div>\
                //             ';
                //         }else if(ROLE_TYPE.toLowerCase() == 'sub admin'){
                //             action =  '\
                //                 <div class = "dropdown dropdown-inline">\
                //                     <a href = "javascript:;" class = "btn btn-sm btn-clean btn-icon" data-toggle = "dropdown">\
                //                         <i class = "fa fa-cog text-primary"></i>\
                //                     </a>\
                //                     <div class = "dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                //                         <ul class = "nav nav-hoverable flex-column">\
                //                             <li class = "nav-item">\
                //                                 <a href="'+BASE_URL+'log/view/'+row.id+'" class = "nav-link delete-category">\
                //                                     <i class = "nav-icon fas far fa-eye text-primary"></i>\
                //                                     <span class = "nav-text text-primary">View</span>\
                //                                 </a>\
                //                             </li>\
                //                             <li class = "nav-item">\
                //                                 <a href="'+BASE_URL+'log/edit/'+row.id+'" class = "nav-link delete-category">\
                //                                     <i class = "nav-icon fas fa-pencil-alt text-warning"></i>\
                //                                     <span class = "nav-text text-warning">Edit Details</span>\
                //                                 </a>\
                //                             </li>\
                //                         </ul>\
                //                     </div>\
                //                 </div>\
                //             ';
                //         }else if(ROLE_TYPE.toLowerCase() == 'user'){
                //             action =  '\
                //                 <div class = "dropdown dropdown-inline">\
                //                     <a href = "javascript:;" class = "btn btn-sm btn-clean btn-icon" data-toggle = "dropdown">\
                //                         <i class = "fa fa-cog text-primary"></i>\
                //                     </a>\
                //                     <div class = "dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                //                         <ul class = "nav nav-hoverable flex-column">\
                //                             <li class = "nav-item">\
                //                                 <a href="'+BASE_URL+'log/view/'+row.id+'" class = "nav-link delete-category">\
                //                                     <i class = "nav-icon fas far fa-eye text-primary"></i>\
                //                                     <span class = "nav-text text-primary">View</span>\
                //                                 </a>\
                //                             </li>\
                //                         </ul>\
                //                     </div>\
                //                 </div>\
                //             ';
                //         }
                        
                //         return action;
                //     },
                // },
            ],
        });
 
		table.on('change', '.group-checkable', function() {
			var set = $(this).closest('table').find('td:first-child .checkable');
			var checked = $(this).is(':checked'); 
			$(set).each(function() {
				if (checked) {
					$(this).prop('checked', true);
					table.rows($(this).closest('tr')).select();
				}
				else {
					$(this).prop('checked', false);
					table.rows($(this).closest('tr')).deselect();
				}
			});
		});

		$('#kt_search').on('click', function(e) {
            e.preventDefault();
            var params = {};
            $('.datatable-input').each(function() {
                var i = $(this).data('col-index');
                
                if (params[i]) {
                    params[i] += '|' + $(this).val();
                }
                else {
                    params[i] = $(this).val();
                }
                
            }); 

            $.each(params, function(i, val) { 
                // apply search params to datatable
                table.column(i).search(val ? val : '', true, true);
            });
            table.table().draw();
        });

        $('#kt_reset').on('click', function(e) {
            e.preventDefault();
            $('.datatable-input').each(function() {
                $(this).val('');
                table.column($(this).data('col-index')).search('', false, false);
            });
            table.table().draw();
        });

        $('#min, #max').keyup( function() {
            table.table().draw();
        } );
        // Search by Date Range
        $('input[name="date-range-start"], input[name="date-range-end"]').change(function () {
            table.draw();
        });


        var id = 0;
        $(document).on('click', '.delete-log', function(e){
            e.preventDefault();
            id = $(this).data('id')
            Swal.fire({
                title: "Are you sure?",
                text: "You won\"t be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then(function(result) {
                if (result.value) {
                    
                    $('#auth-delete-modal').modal('show')

                   
                }
            });

        })

        function auth_delete()
        {

            $.ajax({
                url: BASE_URL + 'log/delete/' + id,
                method: "post",
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
                        Swal.fire({
                            title: data.message,
                            icon: "error",
                            showCancelButton: true, 
                        })
                    }else{
                        Swal.fire(
                            "Deleted!",
                            "Your file has been deleted.",
                            "success"
                        )

                        table.ajax.reload()
                        // KTUtil.scrollTop() 
                    }  
                },
                error: function (xhr, status, error) {
                    console.info(this.data);
                    // console.info(xhr.responseText);
                }
            });
        }

        $(document).on('submit', 'form#auth-delete-form', function(e){
            e.preventDefault();

            $.ajax({
                url: $("form#auth-delete-form").attr('action'),
                method: $("form#auth-delete-form").attr('method'),
                data: $("form#auth-delete-form").serialize(),
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
                    if( data ){
                        auth_delete()
                        $('#auth-delete-modal').modal('hide')
                        $("#auth-delete-form")[0].reset()
                    }else{
                        Swal.fire("Error!", "Wrong Password!", "error");
                    }
                },
                error: function (xhr, status, error) {
                    console.info(this.data);
                    // console.info(xhr.responseText);
                }
            });

        });


        // validate
        
        $(document).on('click', '.validate-log', function(e){
            e.preventDefault();
            id = $(this).data('id')
            Swal.fire({
                title: "Oooppss!",
                text: "Is this validated?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Yes"
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: BASE_URL + 'validated/validate',
                        method: 'post',
                        data: {id: id},
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
                                    KTUtil.scrollTop()
                                });
                            }

                            table.ajax.reload()
                            
                        },
                        error: function (xhr, status, error) {
                            // console.info(this.data);
                            console.info(xhr.responseText);
                        }
                    });
                }else{
                    table.ajax.reload()
                    KTUtil.scrollTop() 
                }
            });

        }) 

 
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
    Log.init();
});
