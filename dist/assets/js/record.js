"use strict";

// Class definition
var Record = function () {
    var _init = function () {

        // client side proccessing
        var table = $('#record-table').DataTable({
			responsive: true,
			 dom:"<'row'<'col-sm-4 col-xs-4'l><'col-sm-4 col-xs-4 text-center'B><'col-sm-4 col-xs-4'f>>" +
                    "<'row'<'col-sm-12 col-xs-12'tr>>" +
                "<'row'<'col-sm-5 col-xs-5'i><'col-sm-7 col-xs-7'p>>",
			// buttons: ["print", "excelHtml5", "pdfHtml5", "colvis"],
            buttons:   [
                {
                    extend: 'print',
                    className: "btn btn-info btn-sm",
                    text: '<i class="fas fa-print"></i>',
                    title: 'Covid-19 Vaccine Pre Registration',
                    titleAttr: 'Print',
                    autoPrint: false,
                },
                {
                    extend: 'excelHtml5',
                    className: "btn btn-info btn-sm",
                    text: '<i class="fas fa-file-excel"></i>',
                    titleAttr: 'Excel',
                    columns: ':not(:first-child)'
                },
                {
                    extend: 'pdfHtml5',
                    className: "btn btn-info btn-sm",
                    text: '<i class="fas fa-file-pdf"></i>',
                    titleAttr: 'Pdf',
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
                url: BASE_URL + 'record/get_record',
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
                    data  : 'id',
                    render: function(data, type, row, meta){ 
                        return meta.row + meta.settings._iDisplayStart +1;
                    }
                },
                {
                    data: 'dateregistered',
                },
                {
					data: 'lastname',
				},
                {
                    data: 'firstname',
                },
                {
                    data: 'middlename',
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
                    data: 'street',
                },
                {
                    data: 'barangay',
                },
                {
                    data: 'Actions', responsivePriority: -1
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
                    console.info([counter, column.header().textContent] )
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
                    targets  : -1,
                    title    : 'Actions',
                    orderable: false,
                    render   : function(data, type, row, meta) { 
                        return '\
                            <div class = "dropdown dropdown-inline">\
                                <a href = "javascript:;" class = "btn btn-sm btn-clean btn-icon" data-toggle = "dropdown">\
                                    <i class = "fa fa-cog text-primary"></i>\
                                </a>\
                                <div class = "dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                                    <ul class = "nav nav-hoverable flex-column">\
                                        <li class = "nav-item">\
                                            <a href="'+BASE_URL+'record/view/'+row.id+'" class = "nav-link delete-category">\
                                                <i class = "nav-icon fas far fa-eye text-primary"></i>\
                                                <span class = "nav-text text-primary">View</span>\
                                            </a>\
                                        </li>\
                                        <li class = "nav-item">\
                                            <a href="'+BASE_URL+'record/edit/'+row.id+'" class = "nav-link delete-category">\
                                                <i class = "nav-icon fas fa-pencil-alt text-warning"></i>\
                                                <span class = "nav-text text-warning">Edit Details</span>\
                                            </a>\
                                        </li>\
                                        <li class = "nav-item">\
                                            <a href  = "javascript:;" data-id="'+row.id+'" class="nav-link delete-record">\
                                                <i class = "nav-icon la la-trash text-danger"></i>\
                                                <span class = "nav-text text-danger">Delete</span>\
                                            </a>\
                                        </li>\
                                    </ul>\
                                </div>\
                            </div>\
                        ';
                    },
                },
            ],
        });

        $('#export_print').on('click', function(e) {
            e.preventDefault();
            table.button(0).trigger();
        });

        $('#export_copy').on('click', function(e) {
            e.preventDefault();
            table.button(1).trigger();
        });

        $('#export_excel').on('click', function(e) {
            e.preventDefault();
            table.button(2).trigger();
        });

        $('#export_csv').on('click', function(e) {
            e.preventDefault();
            table.button(3).trigger();
        });

        $('#export_pdf').on('click', function(e) {
            e.preventDefault();
            table.button(4).trigger();
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


        $(document).on('click', '.delete-record', function(e){
            e.preventDefault();
            var id = $(this).data('id')
            Swal.fire({
                title: "Are you sure?",
                text: "You won\"t be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: BASE_URL + 'record/delete/' + id,
                        method: "post",
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
                                Swal.fire(
                                    "Deleted!",
                                    "Your file has been deleted.",
                                    "success"
                                )

                                table.ajax.reload()
                                KTUtil.scrollTop() 
                            }  
                        },
                        error: function (xhr, status, error) {
                            console.info(this.data);
                            // console.info(xhr.responseText);
                        }
                    });
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
    Record.init();
});
