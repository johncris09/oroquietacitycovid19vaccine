"use strict";
const primary = '#6993FF';
const success = '#1BC5BD';
const info    = '#8950FC';
const warning = '#FFA800';
const danger  = '#F64E60';
var options, chart;

// Class definition
var Chart = function () {
    var _init = function () {

        const apexChart = "#record-chart"; 

        $(document).on('click', '.filter-by', function(e){
            e.preventDefault();
            // console.info(1)
            $('#record-chart').html('')
            record_chart($(this).data('fileterBy')); 
        })

        $(document).on('submit', 'form#record-date-range-form', function(e){
            e.preventDefault();
            $('#record-chart').html('')

            var data_range = $(this).serializeArray();
            var arr        = [];
            $(data_range).each(function () {
                arr.push(this.value)
            })
            
            record_chart(arr);  
        })

        $(document).on('click', '#reset', function(e){

            $('#record-chart').html('')
            var data_range = $('form#record-date-range-form input');
            $(data_range).each(function () {
                $(this).val('')
            })

            record_chart();
        })

        


        function record_chart(filter_by = 'this month'){
            $.ajax({
                url   : BASE_URL + 'dashboard/record_chart',
                method  : 'post',
                dataType: "json",
                data    : {
                    filter_by: filter_by
                },
                beforeSend: function () {
                    KTApp.block('#record-chart', {
                        overlayColor: '#000000',
                        state       : 'primary',
                        message     : 'Processing...'
                    });
                },
                complete: function () {
                    KTApp.unblock('#record-chart');
                },
                success: function (data) {
                    // console.info(data.pre_registered)
                    $('#range').html(data.range);
                    var options = {
                        series: [
                            {
                                name: 'Pre Registered',
                                data: data.pre_registered
                            },
                            {
                                name: 'Validated',
                                data: data.validated
                            },
                        ],
                        chart: {
                            type  : 'bar',
                            height: 400
                        },
                        plotOptions: {
                            bar: {
                                horizontal : false,
                                columnWidth: '55%',
                                endingShape: 'rounded'
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show  : true,
                            width : 2,
                            colors: ['transparent']
                        },
                        xaxis: {
                            categories: data.categories
                        },
                        title: {
                            text : data.range,
                            align: 'center',
                            // offsetX: 110
                        },
                        yaxis: {
                            title: {
                                text: "# of Record"
                            }
                        },
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function (val) {
                                    return val
                                }
                            }
                        },
                        colors: [warning, success ,primary]
                    };

                    var chart = new ApexCharts(document.querySelector(apexChart), options);
                    chart.render();
                },
                error: function (xhr, status, error) {
                    // error here...   
                    console.info(xhr.responseText);
                }
            });
        }

        record_chart();
        

    };

    return {
        // Init
        init: function () {
            _init();
        },
    };
}();


var BarangayChart = function () {
    var _init = function () {

        const apexChart = "#barangay-chart";

        $(document).on('change', 'select#barangay-chart-filter', function(e){
            e.preventDefault();
            var barangay_type = $(this).val();
            $('#barangay-chart').html('')
            barangay_chart( barangay_type )

        });

        function barangay_chart(barangay_type){
            $.ajax({
                url   : BASE_URL + 'dashboard/barangay_chart',
                method  : 'post',
                dataType: "json",
                data: { 
                    barangay_type: barangay_type 
                },
                beforeSend: function () {
                    KTApp.block('#record-chart', {
                        overlayColor: '#000000',
                        state       : 'primary',
                        message     : 'Processing...'
                    });
                },
                complete: function () {
                    KTApp.unblock('#record-chart');
                },
                success: function (data) {
                    // console.info(data)
                    // console.info(data.pre_registered)
                    $('#range').html(data.range);
                    var options = {
                          series: [{
                          name: 'Pre Registered',
                          data: data.pre_registered
                        }, {
                          name: 'Validated',
                          data: data.validated
                        }],
                          chart: {
                          type: 'bar',
                          height: 2000
                        },
                        plotOptions: {
                          bar: {
                            horizontal: true,
                            columnWidth: '55%',
                            endingShape: 'rounded',
                            dataLabels: {
                              position: 'top',
                            },
                          }
                        },
                        dataLabels: {
                          enabled: true,
                          offsetX: -6,
                          style: {
                            fontSize: '10px',
                            colors: ['black']
                          }
                        },
                        stroke: {
                          show: true,
                          width: 1,
                          colors: ['#fff']
                        },
                        tooltip: {
                          shared: true,
                          intersect: false
                        },
                        xaxis: {
                          categories: data.categories
                        },
                        colors: [warning, success ,primary]
                    };

                    var chart = new ApexCharts(document.querySelector(apexChart), options);
                    chart.render();
                },
                error: function (xhr, status, error) {
                    // error here...   
                    console.info(xhr.responseText);
                }
            });
        }

        barangay_chart("All");
        

    };

    return {
        // Init
        init: function () {
            _init();
        },
    };
}();

var GenderStatistic = function () {
    var _init = function () {
        const apexChart = "#gender-statistic";
        
  
        $.ajax({
                url   : BASE_URL + 'dashboard/gender_statistic',
                method  : 'post',
                dataType: "json",
                beforeSend: function () {
                    KTApp.block('#gender-statistic', {
                        overlayColor: '#000000',
                        state       : 'primary',
                        message     : 'Processing...'
                    });
                },
                complete: function () {
                    KTApp.unblock('#gender-statistic');
                },
                success: function (data) {
                    // console.info(data)
                    var options = {
                        series: data.data,
                        chart: {
                            width: 400,
                            type: 'pie',
                        },
                        labels: [
                            'Male - ' + data.data[0], 
                            'Female - ' + data.data[1]
                        ],
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }],
                        colors: [success, info]
                    };

                    var chart = new ApexCharts(document.querySelector(apexChart), options);
                    chart.render();

                },
                error: function (xhr, status, error) {
                    // error here...   
                    console.info(xhr.responseText);
                    
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


var AgeStatistic = function () {
    var _init = function () {
        const apexChart = "#age-statistic";
        

        $.ajax({
                url   : BASE_URL + 'dashboard/age_statistic',
                method  : 'post',
                dataType: "json",
                beforeSend: function () {
                    KTApp.block('#age-statistic', {
                        overlayColor: '#000000',
                        state       : 'primary',
                        message     : 'Processing...'
                    });
                },
                complete: function () {
                    KTApp.unblock('#age-statistic');
                },
                success: function (data) {
                    // console.info(data)
                    var options = {
                        series: data.data,
                        chart: {
                            width: 400,
                            type: 'pie',
                        },
                        labels: [
                            '18 - 25 yrs. old (' + data.data[0] + ')', 
                            '26 - 35 yrs. old (' + data.data[1] + ')', 
                            '36 - 59 yrs. old (' + data.data[2] + ')', 
                            '60 yrs. old Above(' + data.data[3] + ')', 
                        ],
                        responsive: [{
                            breakpoint: 400,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }],
                        colors: [primary, warning, danger, info]
                    };

                    var chart = new ApexCharts(document.querySelector(apexChart), options);
                    chart.render();

                },
                error: function (xhr, status, error) {
                    // error here...   
                    console.info(xhr.responseText);
                    
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



var ValidatedGenderStatistic = function () {
    var _init = function () {
        const apexChart = "#validated-gender-statistic";
        

        $.ajax({
                url   : BASE_URL + 'dashboard/validated_gender_statistic',
                method  : 'post',
                dataType: "json",
                beforeSend: function () {
                    KTApp.block('#validated-gender-statistic', {
                        overlayColor: '#000000',
                        state       : 'primary',
                        message     : 'Processing...'
                    });
                },
                complete: function () {
                    KTApp.unblock('#validated-gender-statistic');
                },
                success: function (data) {
                    // console.info(data)
                    var options = {
                        series: data.data,
                        chart: {
                            width: 400,
                            type: 'pie',
                        },
                        labels: [
                            'Male - ' + data.data[0], 
                            'Female - ' + data.data[1]
                        ],
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }],
                        colors: [success, info]
                    };

                    var chart = new ApexCharts(document.querySelector(apexChart), options);
                    chart.render();

                },
                error: function (xhr, status, error) {
                    // error here...   
                    console.info(xhr.responseText);
                    
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


var ValidatedAgeStatistic = function () {
    var _init = function () {
        const apexChart = "#validated-age-statistic";
        

        $.ajax({
                url   : BASE_URL + 'dashboard/validated_age_statistic',
                method  : 'post',
                dataType: "json",
                beforeSend: function () {
                    KTApp.block('#validated-age-statistic', {
                        overlayColor: '#000000',
                        state       : 'primary',
                        message     : 'Processing...'
                    });
                },
                complete: function () {
                    KTApp.unblock('#validated-age-statistic');
                },
                success: function (data) {
                    // console.info(data)
                    var options = {
                        series: data.data,
                        chart: {
                            width: 400,
                            type: 'pie',
                        },
                        labels: [
                            '18 - 25 yrs. old (' + data.data[0] + ')', 
                            '26 - 35 yrs. old (' + data.data[1] + ')', 
                            '36 - 59 yrs. old (' + data.data[2] + ')', 
                            '60 yrs. old Above(' + data.data[3] + ')', 
                        ],
                        responsive: [{
                            breakpoint: 400,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }],
                        colors: [primary, warning, danger, info]
                    };

                    var chart = new ApexCharts(document.querySelector(apexChart), options);
                    chart.render();

                },
                error: function (xhr, status, error) {
                    // error here...   
                    console.info(xhr.responseText);
                    
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
    Chart.init();
    BarangayChart.init();
    GenderStatistic.init();
    AgeStatistic.init();
    ValidatedGenderStatistic.init();
    ValidatedAgeStatistic.init();

});
