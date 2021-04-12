"use strict";



var Schedule = function () {
    var _init = function () {


        var table = $('#schedule-table').DataTable({
             "scrollY": 450,
             "scrollX": true,
             dom:"<'row'<'col-sm-4 col-xs-4'l><'col-sm-4 col-xs-4 text-center'B><'col-sm-4 col-xs-4'f>>" +
                    "<'row'<'col-sm-12 col-xs-12'tr>>" +
                "<'row'<'col-sm-5 col-xs-5'i><'col-sm-7 col-xs-7'p>>",
            buttons:   [
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
                    title: 'User',
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
            ], 
            ajax: {
                url: BASE_URL + 'schedule/get_schedule',
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
                    data: 'schedule_id',
                },
                {
                    data: 'Actions', responsivePriority: -1
                },
                {
                    data  : 'schedule_id',
                    render: function(data, type, row, meta){ 
                        return meta.row + meta.settings._iDisplayStart +1;
                    }
                },
                {
                    data  : 'date',
                }, 
                {
                    data  : 'vaccination_site',
                }, 
                {
                    data  : 'username',
                },
                {
                    data  : 'created_on',
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
                        var action = '';
                     
                       action =  '\
                            <div class = "dropdown dropdown-inline">\
                                <a href = "javascript:;" class = "btn btn-sm btn-clean btn-icon" data-toggle = "dropdown">\
                                    <i class = "fa fa-cog text-primary"></i>\
                                </a>\
                                <div class = "dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                                    <ul class = "nav nav-hoverable flex-column">\
                                        <li class = "nav-item">\
                                            <a href="'+BASE_URL+'schedule/view/'+row.schedule_id+'" class = "nav-link">\
                                                <i class = "nav-icon fas fa-eye text-primary"></i>\
                                                <span class = "nav-text text-primary">View Details</span>\
                                            </a>\
                                        </li>\
                                        <li class = "nav-item">\
                                            <a href="'+BASE_URL+'schedule/edit/'+row.schedule_id+'" class = "nav-link">\
                                                <i class = "nav-icon fas fa-pencil-alt text-warning"></i>\
                                                <span class = "nav-text text-warning">Edit Details</span>\
                                            </a>\
                                        </li>\
                                        <li class = "nav-item">\
                                            <a href  = "javascript:;" data-user-id="'+row.schedule_id+'" class="nav-link delete-user">\
                                                <i class = "nav-icon la la-trash text-danger"></i>\
                                                <span class = "nav-text text-danger">Delete</span>\
                                            </a>\
                                        </li>\
                                    </ul>\
                                </div>\
                            </div>\
                        '; 
                        return action;
                    },
                },
                {
                  targets: -1,
                  width: "75px",
                  render: function (t, a, l, s) {
                    var e = {
                      0: { title: "Offline", state: "danger" },
                      1: { title: "Online", state: "success" },
                    };
                    return void 0 === e[t]
                      ? t
                      : '<span class="label label-' +
                          e[t].state +
                          ' label-dot mr-2"></span><span class="font-weight-bold text-' +
                          e[t].state +
                          '">' +
                          e[t].title +
                          "</span>";
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


        $(document).on('click', '.delete-user', function(e){
            e.preventDefault();
            var id = $(this).data('userId')

            Swal.fire({
                title: "Are you sure?",
                text: "You won\"t be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: BASE_URL + 'schedule/delete/' + id,
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
    Schedule.init()
});
