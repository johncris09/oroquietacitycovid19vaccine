"use strict";

function sentencecase(str) {
  var i, j, str, lowers, uppers;
  str = str.toString().replace(/([^\W_]+[^\s-]*) */g, function(txt) {
    return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
  }); 

  return str;
}


function forLoop(str) {
  let upper = true;
  let newStr = "";
  for (let i = 0, l = str.length; i < l; i++) {
    if (str[i] == " ") {
      upper = true;
        newStr += " ";
      continue;
    }
    newStr += upper ? str[i].toUpperCase() : str[i].toLowerCase();
    upper = false;
  }
  return newStr;
}

// Class definition
var RecycleBinRecord = function () {
    var _init = function () {

        // client side proccessing
        var table = $('#recycle-bin-record-table').DataTable({
             "scrollY": 450,
             "scrollX": true,
            // responsive: true,
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
            deferRender: true,
            ajax: {
                url: BASE_URL + 'recycle_bin/get_deleted_record',
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
                    data  : 'lastname',
                    render: function(data, type, row, meta){
                        return sentencecase(data)
                    }
                },
                {
                    data  : 'firstname',
                    render: function(data, type, row, meta){
                        return forLoop(data)
                    }
                },
                {
                    data  : 'middlename',
                    render: function(data, type, row, meta){
                        return forLoop(data)
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
                    data: 'contactnumber',
                },
                {
                    data: 'purok',
                },
                {
                    data  : 'street',
                    render: function(data, type, row, meta){
                        return forLoop(data)
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
                        return forLoop(data)
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
                                            <a href  = "javascript:;" data-record-id="'+row.id+'" class="nav-link restore-recycle-bin-record">\
                                                <i class = "nav-icon fas fa-trash-restore text-primary"></i>\
                                                <span class = "nav-text text-primary">Restore</span>\
                                            </a>\
                                        </li>\
                                        <li class = "nav-item">\
                                            <a href  = "javascript:;" data-record-id="'+row.id+'" class="nav-link delete-recycle-bin-record">\
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


        // delete completely record
        $(document).on('click', '.delete-recycle-bin-record', function(e){
            e.preventDefault();
            var id = $(this).data('recordId')

            // console.info(id);
            ERROR_ALERT_SOUND.play()
            Swal.fire({
                title: "Are you sure?",
                text: "Are you sure you wan't to completely delete this?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: BASE_URL + 'record/delete_completely/' + id,
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
                                ERROR_ALERT_SOUND.play()
                                Swal.fire({
                                    title: data.message,
                                    icon: "error",
                                    showCancelButton: true, 
                                })
                            }else{
                                SUCCESS_ALERT_SOUND.play()
                                Swal.fire(
                                    "Deleted!",
                                    "Your file was finally removed from the system.",
                                    "success"
                                )

                                table.ajax.reload()
                            }  
                        },
                        error: function (xhr, status, error) {
                            // console.info(xhr.responseText);
                        }
                    });
                }
            });

        })


        $(document).on('click', '.restore-recycle-bin-record', function(e){
            e.preventDefault();
            var id = $(this).data('recordId')

            ERROR_ALERT_SOUND.play()
            Swal.fire({
                title: "Are you sure?",
                text: "Are you sure you wan't to restore this?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, restore it!"
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: BASE_URL + 'record/restore_record/' + id,
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
                            if(!data.response){
                                ERROR_ALERT_SOUND.play()
                                Swal.fire({
                                    title: data.message,
                                    icon: "error",
                                    showCancelButton: true, 
                                })
                            }else{
                                SUCCESS_ALERT_SOUND.play()
                                Swal.fire(
                                    "Restored!",
                                    "Your file has been restored successfully.",
                                    "success"
                                )

                                table.ajax.reload()
                            }  
                        },
                        error: function (xhr, status, error) {
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


var RecycleBinUser = function () {
    var _init = function () {

        // client side proccessing
        var table = $('#recycle-user-table').DataTable({
             "scrollY": 450,
             "scrollX": true,
            // responsive: true,
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
            deferRender: true,
            ajax: {
                url: BASE_URL + 'recycle_bin/get_deleted_user',
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
                    data: 'user_id',
                },
                {
                    data: 'Actions', responsivePriority: -1
                },
                {
                    data  : 'user_id',
                    render: function(data, type, row, meta){ 
                        return meta.row + meta.settings._iDisplayStart +1;
                    }
                },
                {
                    data: 'dateregistered',
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
                    data: 'username',
                },
                {
                    data: 'role_type',
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
                                            <a href  = "javascript:;" data-user-id="'+row.user_id+'" class="nav-link restore-recycle-bin-user">\
                                                <i class = "nav-icon fas fa-trash-restore text-primary"></i>\
                                                <span class = "nav-text text-primary">Restore</span>\
                                            </a>\
                                        </li>\
                                        <li class = "nav-item">\
                                            <a href  = "javascript:;" data-user-id="'+row.user_id+'" class="nav-link delete-recycle-bin-user">\
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



        $(document).on('click', '.restore-recycle-bin-user', function(e){
            e.preventDefault();
            var id = $(this).data('userId')
            // console.info(id)

            ERROR_ALERT_SOUND.play()
            Swal.fire({
                title: "Are you sure?",
                text: "Are you sure you wan't to restore this?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, restore it!"
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: BASE_URL + 'user/restore_user/' + id,
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
                                Swal.fire(
                                    "Restored!",
                                    "Your file has been restored successfully.",
                                    "success"
                                )

                                table.ajax.reload()
                            }  
                        },
                        error: function (xhr, status, error) {
                            // console.info(xhr.responseText);
                        }
                    });
                }
            });

        })


        $(document).on('click', '.delete-recycle-bin-user', function(e){
            e.preventDefault();
            var id = $(this).data('userId')

            ERROR_ALERT_SOUND.play()
            Swal.fire({
                title: "Are you sure?",
                text: "Are you sure you wan't to completely delete this?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: BASE_URL + 'user/delete_completely/' + id,
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
                                ERROR_ALERT_SOUND.play()
                                Swal.fire({
                                    title: data.message,
                                    icon: "error",
                                    showCancelButton: true, 
                                })
                            }else{
                                SUCCESS_ALERT_SOUND.play()
                                Swal.fire(
                                    "Deleted!",
                                    "Your file was finally removed from the system.",
                                    "success"
                                )

                                table.ajax.reload()
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



var RecycleBinVaccinationSite = function () {
    var _init = function () {

        // client side proccessing
        var table = $('#recycle-vaccination-site-table').DataTable({
             "scrollY": 450,
             "scrollX": true,
            // responsive: true,
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
            deferRender: true,
            ajax: {
                url: BASE_URL + 'recycle_bin/get_deleted_vaccination_site',
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
                    data: 'vaccination_site_id',
                },
                {
                    data: 'Actions', 
                    responsivePriority: -1
                },
                {
                    data  : 'vaccination_site_id',
                    render: function(data, type, row, meta){ 
                        return meta.row + meta.settings._iDisplayStart +1;
                    }
                },
                {
                    data  : 'vaccination_site',
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
                                            <a href  = "javascript:;" data-vaccination-site-id="'+row.vaccination_site_id+'" class="nav-link restore-recycle-bin-vaccination-site">\
                                                <i class = "nav-icon fas fa-trash-restore text-primary"></i>\
                                                <span class = "nav-text text-primary">Restore</span>\
                                            </a>\
                                        </li>\
                                        <li class = "nav-item">\
                                            <a href  = "javascript:;" data-vaccination-site-id="'+row.vaccination_site_id+'" class="nav-link delete-recycle-bin-vaccination-site">\
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



        $(document).on('click', '.restore-recycle-bin-vaccination-site', function(e){
            e.preventDefault();
            var id = $(this).data('vaccinationSiteId')
            // console.info()

            ERROR_ALERT_SOUND.play()
            Swal.fire({
                title: "Are you sure?",
                text: "Are you sure you wan't to restore this?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, restore it!"
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: BASE_URL + 'vaccination_site/restore_vaccination_site/' + id,
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
                                Swal.fire(
                                    "Restored!",
                                    "Your file has been restored successfully.",
                                    "success"
                                )

                                table.ajax.reload()
                            }  
                        },
                        error: function (xhr, status, error) {
                            // console.info(xhr.responseText);
                        }
                    });
                }
            });

        })


        $(document).on('click', '.delete-recycle-bin-vaccination-site', function(e){
            e.preventDefault();
            var id = $(this).data('vaccinationSiteId')
            // console.info(id)

            ERROR_ALERT_SOUND.play()
            Swal.fire({
                title: "Are you sure?",
                text: "Are you sure you wan't to completely delete this?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: BASE_URL + 'vaccination_site/delete_completely/' + id,
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
                            // console.info(data);
                            if(!data.response){
                                ERROR_ALERT_SOUND.play()
                                Swal.fire({
                                    title: data.message,
                                    icon: "error",
                                    showCancelButton: true, 
                                })
                            }else{
                                SUCCESS_ALERT_SOUND.play()
                                Swal.fire(
                                    "Deleted!",
                                    "Your file was finally removed from the system.",
                                    "success"
                                )

                                table.ajax.reload()
                            }  
                        },
                        error: function (xhr, status, error) {
                            // console.info(this.data);
                            console.info(xhr.responseText);
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
    RecycleBinRecord.init();
    RecycleBinUser.init();
    RecycleBinVaccinationSite.init();
});
