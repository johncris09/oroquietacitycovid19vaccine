"use strict";


$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#min').val(), 10 );
        var max = parseInt( $('#max').val(), 10 );
        var age = parseFloat( data[9] ) || 0; // use data for the age column
 
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
        var startDate = new Date(data[3]);
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


function sentencecase(str) {
  var i, j, str, lowers, uppers;
  str = str.toString().replace(/([^\W_]+[^\s-]*) */g, function(txt) {
    return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
  }); 

  return str;
}


// Class definition
var Validated = function () {
    var _init = function () {

        // client side proccessing
        var table = $('#validated-table').DataTable({ 
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
                    title: 'Validated Record',
                    download: 'open',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    exportOptions: {
                      columns: ':visible',
                    },
                    customize: function ( doc ) {
                        console.info(doc.content[0])
                        doc.pageMargins = [10,30,10,20]; 
                        doc.content[0].margin = [100,70,100,0];

                         // doc.defaultStyle.alignment = 'center';
                         // doc.styles.tableHeader.alignment = 'center';
                        doc.content.splice( 1, 0, {
                            margin: [ 0, -120, 0, 40 ],
                            alignment: 'center',
                            image: 'data:image/png;base64,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'
                        } );

                    }
                    // customize: function(doc) {
                    //     // doc.content[1].table.headerRows = 0
                        
                    // }
                    // customize: function(doc) {

                    //     //ensure doc.images exists
                    //     doc.images = doc.images || {};
                    //     console.info(doc)

                    //     //build dictionary
                    //     doc.images['myGlyph'] = getBase64Image(myGlyph);
                    //     //..add more images[xyz]=anotherDataUrl here

                    //     //when the content is <img src="myglyph.png">
                    //     //remove the text node and insert an image node
                    //     for (var i=1;i<doc.content[1].table.body.length;i++) {
                    //         if (doc.content[1].table.body[i][0].text == '<img src="'+BASE_URL+'dist/assets/media/img/city-logo.png">') {
                    //             delete doc.content[1].table.body[i][0].text;
                    //             doc.content[1].table.body[i][0].image = 'myGlyph';
                    //         }
                    //     }
                    // },
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
                url: BASE_URL + 'validated/get_validated',
                type: 'POST',
                data: {
                    pagination: {
                        perpage: 50,
                    },
                },
            },
            columns: [
                {
					data: 'id',
				},
                {
                    data: 'Actions', responsivePriority: -1
                },
                {
                    data  : 'id',
                    render: function(data, type, row, meta){ 
                        return meta.row + meta.settings._iDisplayStart +1;
                    }
                },
                {
                    data: 'dateregistered',
                },
                {
                    data: 'time',
                }, 
                {
                    data  : 'lastname',
                    render: function(data, type, row, meta){
                        return sentencecase(data)
                    }
                }, 
                {
                    data  : 'firstname',
                    render: function(data, type, row, meta){
                        return sentencecase(data)
                    }
                }, 
                {
                    data  : 'middlename',
                    render: function(data, type, row, meta){
                        return sentencecase(data)
                    }
                },
                {
                    data: 'birthdate',
                },
                {
                    data: 'age',
                },
                {
                    data: 'gender',
                },
                {
                    data: 'purok',
                }, 
                {
                    data  : 'street',
                    render: function(data, type, row, meta){
                        return sentencecase(data)
                    }
                },
                {
                    data: 'barangay',
                },
                {
                    data: 'occupation',
                }, 
                {
                    data  : 'position',
                    render: function(data, type, row, meta){
                        return sentencecase(data)
                    }
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
			initComplete: function() {
                var counter = 0;
                this.api().columns().every(function() {
                    var column = this;
                    // console.info([counter, column.header().textContent] )
                    switch ( column.header().textContent ) {
                        case 'Purok':
                            column.data().unique().sort().each(function(d, j) {
                                $('.datatable-input[data-col-index="'+counter+'"]').append('<option value="' + d + '">' + d + '</option>');
                            });
                            break;
                        case 'Street':
                            column.data().unique().sort().each(function(d, j) {
                                $('.datatable-input[data-col-index="'+counter+'"]').append('<option value="' + d + '">' + d + '</option>');
                            });
                            break;
                        case 'Barangay':
                            column.data().unique().sort().each(function(d, j) {
                                $('.datatable-input[data-col-index="'+counter+'"]').append('<option value="' + d + '">' + d + '</option>');
                            });
                            break;
                        case 'Occupation':
                            column.data().unique().sort().each(function(d, j) {
                                $('.datatable-input[data-col-index="'+counter+'"]').append('<option value="' + d + '">' + d + '</option>');
                            });
                            break;
                    }
                    counter++
                });
            },
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
                {
                    targets  : 1,
                    title    : 'Actions',
                    orderable: false,
                    render   : function(data, type, row, meta) { 
                        var action  = '';

                        if(ROLE_TYPE.toLowerCase() == 'super admin'){
                            action =  '\
                                <div class = "dropdown dropdown-inline">\
                                    <a href = "javascript:;" class = "btn btn-sm btn-clean btn-icon" data-toggle = "dropdown">\
                                        <i class = "fa fa-cog text-primary"></i>\
                                    </a>\
                                    <div class = "dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                                        <ul class = "nav nav-hoverable flex-column">\
                                            <li class = "nav-item">\
                                                <a href="javascript:;" data-id="'+row.id+'" class="nav-link cancel-validation">\
                                                    <i class = "nav-icon fas far fa-times text-danger"></i>\
                                                    <span class = "nav-text text-danger" title="Cancel Validation">Cancel Validation</span>\
                                                </a>\
                                            </li>\
                                            <li class = "nav-item">\
                                                <a href="'+BASE_URL+'record/view/'+row.id+'" class = "nav-link">\
                                                    <i class = "nav-icon fas far fa-eye text-primary"></i>\
                                                    <span class = "nav-text text-primary" title="View Details">View Details</span>\
                                                </a>\
                                            </li>\
                                            <li class = "nav-item">\
                                                <a href="'+BASE_URL+'validated/edit/'+row.id+'" class = "nav-link">\
                                                    <i class = "nav-icon fas fa-pencil-alt text-warning"></i>\
                                                    <span class = "nav-text text-warning" title="Edit Details">Edit Details</span>\
                                                </a>\
                                            </li>\
                                        </ul>\
                                    </div>\
                                </div>\
                            ';
                        }else if(ROLE_TYPE.toLowerCase() == 'sub admin'){
                            action =  '\
                                <div class = "dropdown dropdown-inline">\
                                    <a href = "javascript:;" class = "btn btn-sm btn-clean btn-icon" data-toggle = "dropdown">\
                                        <i class = "fa fa-cog text-primary"></i>\
                                    </a>\
                                    <div class = "dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                                        <ul class = "nav nav-hoverable flex-column">\
                                            <li class = "nav-item">\
                                                <a href="javascript:;" data-id="'+row.id+'" class="nav-link cancel-validation">\
                                                    <i class = "nav-icon fas far fa-times text-danger"></i>\
                                                    <span class = "nav-text text-danger" title="Cancel Validation">Cancel Validation</span>\
                                                </a>\
                                            </li>\
                                            <li class = "nav-item">\
                                                <a href="'+BASE_URL+'record/view/'+row.id+'" class = "nav-link">\
                                                    <i class = "nav-icon fas far fa-eye text-primary"></i>\
                                                    <span class = "nav-text text-primary" title="View Details">View Details</span>\
                                                </a>\
                                            </li>\
                                            <li class = "nav-item">\
                                                <a href="'+BASE_URL+'record/edit/'+row.id+'" class = "nav-link">\
                                                    <i class = "nav-icon fas fa-pencil-alt text-warning"></i>\
                                                    <span class = "nav-text text-warning" title="Edit Details">Edit Details</span>\
                                                </a>\
                                            </li>\
                                        </ul>\
                                    </div>\
                                </div>\
                            ';
                        }else if(ROLE_TYPE.toLowerCase() == 'user'){
                            action =  '\
                                <div class = "dropdown dropdown-inline">\
                                    <a href = "javascript:;" class = "btn btn-sm btn-clean btn-icon" data-toggle = "dropdown">\
                                        <i class = "fa fa-cog text-primary"></i>\
                                    </a>\
                                    <div class = "dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                                        <ul class = "nav nav-hoverable flex-column">\
                                            <li class = "nav-item">\
                                                <a href="'+BASE_URL+'record/view/'+row.id+'" class = "nav-link delete-category">\
                                                    <i class = "nav-icon fas far fa-eye text-primary"></i>\
                                                    <span class = "nav-text text-primary" title="View Details">View Details</span>\
                                                </a>\
                                            </li>\
                                        </ul>\
                                    </div>\
                                </div>\
                            ';
                        }
                        
                        return action;
                    },
                },
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

        // cancel validation
        var id;
        $(document).on('click', '.cancel-validation', function(e){
            e.preventDefault();
            id = $(this).data('id')
            Swal.fire({
                title: "Cancel Validation",
                text: "Do you wish to continue?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Yes"
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: BASE_URL + 'validated/cancel_validation',
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
                            console.info(data)
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
                                })
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
                    // KTUtil.scrollTop() 
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
    Validated.init();
});
